<?php

namespace App\Http\Controllers;

use App\Mail\ContactDetail;
use App\Models\AttributeValue;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Brand;
use App\Models\BrandSeries;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductPrimaryCategory;
use App\Models\ProductSecondaryCategory;
use App\Models\ProductValue;
use App\Models\Setting;
use App\Models\SiteBanner;
use App\Models\Slider;


use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    protected $blog = null;
    protected $bcategory = null;
    protected $slider = null;
    protected $settting = null;
    protected $product_primary_category = null;
    protected $product_attribute = null;
    protected $product = null;
    protected $brand = null;
    protected $brand_series = null;
    protected $product_secondary_category = null;
    

    public function __construct(BrandSeries $brand_series,ProductSecondaryCategory $product_secondary_category,Brand $brand,Product $product,ProductAttribute $product_attribute, ProductPrimaryCategory $product_primary_category,Setting $setting,BlogCategory $bcategory,Blog $blog,Slider $slider)
    {
        $this->bcategory = $bcategory;
        $this->blog = $blog;
        $this->slider = $slider;
        $this->setting = $setting;
        $this->product_primary_category = $product_primary_category;
        $this->product_attribute = $product_attribute;
        $this->product = $product;
        $this->brand = $brand;
        $this->brand_series = $brand_series;
        $this->product_secondary_category = $product_secondary_category;

    }


    public function index()
    {
        $sliders =$this->slider->where('status','active')->orderBy('created_at', 'asc')->get();
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();
        $product_primary_categories   = $this->product_primary_category->get();
        $latestProducts = $this->product->with('primaryCategory','brand')->orderBy('created_at', 'DESC')->where('status','active')->take(12)->get();
        $primary_categories_tab   = $this->product_primary_category
                                    ->with(['products'])
                                    ->take(4)
                                    ->orderBy(\DB::raw('RAND()'))
                                    ->get()
                                    ->map(function ($query) {
                                        $query->setRelation('products', $query->products->take(4)->sortBy('RAND()'));
                                        return $query;
                                    });
        $laptopbybrands = $this->product->with('primaryCategory','brand')->orderBy('created_at', 'DESC')->where('status','active')->where('type','laptops')->take(12)->get();
        $electronics = $this->product->with('primaryCategory','brand')->orderBy('created_at', 'DESC')->where('status','active')->where('type','electronics')->take(12)->get();

        return view('welcome',compact('primary_categories_tab','sliders','latestPosts','product_primary_categories','latestProducts','laptopbybrands','electronics'));
    }

    public function productBrands($brand,Request $request)
    {
        $data=[];
        $product_brands             = $this->brand->with('series')->where('slug',$brand)->get();
        $product_brand       = $this->brand->with('series')->where('slug',$brand)->first();
        $p_brand_id          = $product_brand->id;
        $allProductAttribute = $this->product->with(['brand','primaryCategory','secondaryCategory','attributeValue'])
                                ->whereHas('brand',function($query)use($p_brand_id){
                                    $query->where('brand_id',$p_brand_id);
                                })->get();

        foreach($allProductAttribute as $allattribute_v){
            foreach($allattribute_v->attributeValue as $attribute_v){
                $data[]= $attribute_v->pivot->product_attribute_id;
            }
        }
        $unique_attribute= array_unique($data);
        $product_attributes   = $this->product_attribute->with('values')->whereIn('id',$unique_attribute)
                                ->get();


        $latestProducts = $this->product->with('primaryCategory')->orderBy('created_at', 'DESC')->where('status','active')->take(3)->get();
        $query = $request->s;

        $allProducts = $this->product->with(['primaryCategory','secondaryCategory','brand'])
                    ->where('status','active')
                    ->where('name', 'LIKE', '%' . $query . '%')
                    ->whereHas('brand',function($query)use($brand){
                        $query->where('slug',$brand);
                    })
                    ->paginate(9);
        $product_banners = SiteBanner::all();
        return view('frontend.pages.products.brand',compact('product_brands','product_brand','allProducts','product_attributes','latestProducts','product_banners'));
    }

    
    public function productBrandFilter(Request $request)
    {
        
        $query = $request->s;
        $allProducts = $this->product->with(['primaryCategory','secondaryCategory','attributeValue','brand'])
                        ->where('status','active')
                        ->where('name', 'LIKE', '%' . $query . '%');

        if (isset($request->min_price) && isset($request->max_price)) {
            $minprice = $request->min_price;
            $maxprice = $request->max_price;
            $allProducts->whereBetween('price', [$minprice, $maxprice]);
        }

        if (isset($request->pattribute)) {
            $slug = $request->pattribute;
            $allProducts->whereHas('attributeValue',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }

        if (isset($request->pbrand)) {
            $slug = $request->pbrand;
            $allProducts->whereHas('brand',function($query)use($slug){
                $query->where('slug', $slug );
            });
        }

        if (isset($request->orderby)) {
            if ($request->orderby == "latest") {
              $allProducts->orderBy('created_at','desc');
            }
            if ($request->orderby == "old") {
              $allProducts->orderBy('created_at','asc');
            }
            if ($request->orderby == "asc") {
              $allProducts->orderBy('name','asc');
            }
            if ($request->orderby == "desc") {
              $allProducts->orderBy('name','desc');
            }
        }else{
            $allProducts->orderBy(\DB::raw('RAND()'));
        }
        $allProducts = $allProducts->paginate(9);

        $view = view('frontend.pages.products.filter_product',compact('allProducts'))->render();
        $topnav = view('frontend.pages.products.filter_pagination',compact('allProducts'))->render();
        $alltopnav = view('frontend.pages.products.filter_all_pagination',compact('allProducts'))->render();

        return response()->json(['view' => $view,'topnav' => $topnav,'alltopnav' => $alltopnav]);

    }

    public function productBrandSeries($brand,$series,Request $request)
    {
        $data=[];
        $product_brands             = $this->brand->with('series')->where('slug',$brand)->get();
        $product_brand       = $this->brand->with('series')->where('slug',$brand)->first();
        $brand_serie   = $this->brand_series->where('slug',$series)->first();

        
        $p_brand_id          = $product_brand->id;
        $allProductAttribute = $this->product->with(['brand','primaryCategory','secondaryCategory','attributeValue'])
                                ->whereHas('brand',function($query)use($p_brand_id){
                                    $query->where('brand_id',$p_brand_id);
                                })->get();

        foreach($allProductAttribute as $allattribute_v){
            foreach($allattribute_v->attributeValue as $attribute_v){
                $data[]= $attribute_v->pivot->product_attribute_id;
            }
        }
        $unique_attribute= array_unique($data);
        $product_attributes   = $this->product_attribute->with('values')->whereIn('id',$unique_attribute)
                                ->get();


        $latestProducts = $this->product->with('primaryCategory')->orderBy('created_at', 'DESC')->where('status','active')->take(3)->get();
        $query = $request->s;

        $allProducts = $this->product->with(['primaryCategory','secondaryCategory','brandSeries'])
                    ->where('status','active')
                    ->where('name', 'LIKE', '%' . $query . '%')
                    ->whereHas('brandSeries',function($query)use($series){
                        $query->where('slug',$series);
                    })
                    ->paginate(9);
        $product_banners = SiteBanner::all();
        return view('frontend.pages.products.brand_series',compact('brand_serie','product_brands','product_brand','allProducts','product_attributes','latestProducts','product_banners'));

    }

    
    public function productBrandSeriesFilter(Request $request)
    {
        
        $query = $request->s;
        $allProducts = $this->product->with(['primaryCategory','secondaryCategory','attributeValue','brand','brandSeries'])
                        ->where('status','active')
                        ->where('name', 'LIKE', '%' . $query . '%');

        if (isset($request->min_price) && isset($request->max_price)) {
            $minprice = $request->min_price;
            $maxprice = $request->max_price;
            $allProducts->whereBetween('price', [$minprice, $maxprice]);
        }

        if (isset($request->pattribute)) {
            $slug = $request->pattribute;
            $allProducts->whereHas('attributeValue',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }

        if (isset($request->pbrand)) {
            $slug = $request->pbrand;
            $allProducts->whereHas('brand',function($query)use($slug){
                $query->where('slug', $slug );
            });
        }

        
        if (isset($request->pbrandseries)) {
            $slug = $request->pbrandseries;
            $allProducts->whereHas('brandSeries',function($query)use($slug){
                $query->where('slug', $slug );
            });
        }


        if (isset($request->orderby)) {
            if ($request->orderby == "latest") {
              $allProducts->orderBy('created_at','desc');
            }
            if ($request->orderby == "old") {
              $allProducts->orderBy('created_at','asc');
            }
            if ($request->orderby == "asc") {
              $allProducts->orderBy('name','asc');
            }
            if ($request->orderby == "desc") {
              $allProducts->orderBy('name','desc');
            }
        }else{
            $allProducts->orderBy(\DB::raw('RAND()'));
        }
        $allProducts = $allProducts->paginate(9);

        $view = view('frontend.pages.products.filter_product',compact('allProducts'))->render();
        $topnav = view('frontend.pages.products.filter_pagination',compact('allProducts'))->render();
        $alltopnav = view('frontend.pages.products.filter_all_pagination',compact('allProducts'))->render();

        return response()->json(['view' => $view,'topnav' => $topnav,'alltopnav' => $alltopnav]);

    }

    public function products(Request $request)
    {
        $product_primary_categories   = $this->product_primary_category->with('secondary')->get();
        $product_attributes   = $this->product_attribute->with('values')->get();
        $product_brands   = $this->brand->with('series')->get();
        $latestProducts = $this->product->with('primaryCategory')->orderBy('created_at', 'DESC')->where('status','active')->take(3)->get();
        $query = $request->s;
        $allProducts = $this->product->with(['primaryCategory','secondaryCategory'])
                    ->where('status','active')
                    ->where('name', 'LIKE', '%' . $query . '%')
                    ->paginate(9);
        $product_banners = SiteBanner::all();

        return view('frontend.pages.products.index',compact('product_brands','allProducts','product_attributes','product_primary_categories','latestProducts','product_banners'));
    }

    public function productFilter(Request $request)
    {
        $query = $request->s;
        $allProducts = $this->product->with(['primaryCategory','secondaryCategory','attributeValue'])
                        ->where('status','active')
                        ->where('name', 'LIKE', '%' . $query . '%');
                        

        if (isset($request->min_price) && isset($request->max_price)) {
            $minprice = $request->min_price;
            $maxprice = $request->max_price;
            $allProducts->whereBetween('price', [$minprice, $maxprice]);
        }

        
        if (isset($request->pattribute)) {
            $slug = $request->pattribute;
            $allProducts->whereHas('attributeValue',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }

        if (isset($request->pbrand)) {
            $slug = $request->pbrand;
            $allProducts->whereHas('brand',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }

        if (isset($request->orderby)) {
            if ($request->orderby == "latest") {
              $allProducts->orderBy('created_at','desc');
            }
            if ($request->orderby == "old") {
              $allProducts->orderBy('created_at','asc');
            }
            if ($request->orderby == "asc") {
              $allProducts->orderBy('name','asc');
            }
            if ($request->orderby == "desc") {
              $allProducts->orderBy('name','desc');
            }
        }else{
            $allProducts->orderBy(\DB::raw('RAND()'));
        }
        $allProducts = $allProducts->paginate(9);

        $view = view('frontend.pages.products.filter_product',compact('allProducts'))->render();
        $topnav = view('frontend.pages.products.filter_pagination',compact('allProducts'))->render();
        $alltopnav = view('frontend.pages.products.filter_all_pagination',compact('allProducts'))->render();


        return response()->json(['view' => $view,'topnav' => $topnav,'alltopnav' => $alltopnav]);

    }

    public function productCategoryFilter(Request $request)
    {
        $query = $request->s;
        $allProducts = $this->product->with(['primaryCategory','secondaryCategory','attributeValue'])
                        ->where('status','active')
                        ->where('name', 'LIKE', '%' . $query . '%');

        if (isset($request->min_price) && isset($request->max_price)) {
            $minprice = $request->min_price;
            $maxprice = $request->max_price;
            $allProducts->whereBetween('price', [$minprice, $maxprice]);
        }

        if (isset($request->pattribute)) {
            $slug = $request->pattribute;
            $allProducts->whereHas('attributeValue',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }

        
        if (isset($request->pcategory)) {
            $slug = $request->pcategory;
            $allProducts->whereHas('primaryCategory',function($query)use($slug){
                $query->where('slug', $slug );
            });
        }

        if (isset($request->pbrand)) {
            $slug = $request->pbrand;
            $allProducts->whereHas('brand',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }

        if (isset($request->orderby)) {
            if ($request->orderby == "latest") {
              $allProducts->orderBy('created_at','desc');
            }
            if ($request->orderby == "old") {
              $allProducts->orderBy('created_at','asc');
            }
            if ($request->orderby == "asc") {
              $allProducts->orderBy('name','asc');
            }
            if ($request->orderby == "desc") {
              $allProducts->orderBy('name','desc');
            }
        }else{
            $allProducts->orderBy(\DB::raw('RAND()'));
        }
        $allProducts = $allProducts->paginate(9);

        $view = view('frontend.pages.products.filter_product',compact('allProducts'))->render();
        $topnav = view('frontend.pages.products.filter_pagination',compact('allProducts'))->render();
        $alltopnav = view('frontend.pages.products.filter_all_pagination',compact('allProducts'))->render();

        return response()->json(['view' => $view,'topnav' => $topnav,'alltopnav' => $alltopnav]);

    }

    public function productCategory($category,Request $request)
    {
        $data=[];
        $product_primary_categories   = $this->product_primary_category->with('secondary')->where('slug',$category)->get();
        $product_primary_category   = $this->product_primary_category->with('secondary')->where('slug',$category)->first();
        $p_category_id = $product_primary_category->id;
        $allProductAttribute = $this->product->with(['primaryCategory','secondaryCategory','attributeValue'])
                                ->whereHas('primaryCategory',function($query)use($p_category_id){
                                    $query->where('primary_category_id',$p_category_id);
                                })->get();

        foreach($allProductAttribute as $allattribute_v){
            foreach($allattribute_v->attributeValue as $attribute_v){
                $data[]= $attribute_v->pivot->product_attribute_id;
            }
        }
        $unique_attribute= array_unique($data);
        $product_attributes   = $this->product_attribute->with('values')->whereIn('id',$unique_attribute)
                                ->get();


        $latestProducts = $this->product->with('primaryCategory')->orderBy('created_at', 'DESC')->where('status','active')->take(3)->get();
        $query = $request->s;
        $product_brands   = $this->brand->with('series')->get();

        $allProducts = $this->product->with(['primaryCategory','secondaryCategory'])
                    ->where('status','active')
                    ->where('name', 'LIKE', '%' . $query . '%')
                    ->whereHas('primaryCategory',function($query)use($category){
                        $query->where('slug',$category);
                    })
                    ->paginate(9);
        $product_banners = SiteBanner::all();

        return view('frontend.pages.products.category',compact('product_brands','product_primary_category','allProducts','product_attributes','product_primary_categories','latestProducts','product_banners'));

    }

    public function productSecondaryFilter(Request $request)
    {
        $query = $request->s;
        $allProducts = $this->product->with(['primaryCategory','secondaryCategory','attributeValue'])
                        ->where('status','active')
                        ->where('name', 'LIKE', '%' . $query . '%');

        if (isset($request->min_price) && isset($request->max_price)) {
            $minprice = $request->min_price;
            $maxprice = $request->max_price;
            $allProducts->whereBetween('price', [$minprice, $maxprice]);
        }

        if (isset($request->pattribute)) {
            $slug = $request->pattribute;
            $allProducts->whereHas('attributeValue',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }

        
        if (isset($request->pcategory)) {
            $slug = $request->pcategory;
            $allProducts->whereHas('primaryCategory',function($query)use($slug){
                $query->where('slug', $slug );
            });
        }


        if (isset($request->scategory)) {
            $slug = $request->scategory;
            $allProducts->whereHas('secondaryCategory',function($query)use($slug){
                $query->where('slug', $slug );
            });
        }

        if (isset($request->pbrand)) {
            $slug = $request->pbrand;
            $allProducts->whereHas('brand',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }

        if (isset($request->orderby)) {
            if ($request->orderby == "latest") {
              $allProducts->orderBy('created_at','desc');
            }
            if ($request->orderby == "old") {
              $allProducts->orderBy('created_at','asc');
            }
            if ($request->orderby == "asc") {
              $allProducts->orderBy('name','asc');
            }
            if ($request->orderby == "desc") {
              $allProducts->orderBy('name','desc');
            }
        }else{
            $allProducts->orderBy(\DB::raw('RAND()'));
        }
        $allProducts = $allProducts->paginate(9);

        $view = view('frontend.pages.products.filter_product',compact('allProducts'))->render();
        $topnav = view('frontend.pages.products.filter_pagination',compact('allProducts'))->render();
        $alltopnav = view('frontend.pages.products.filter_all_pagination',compact('allProducts'))->render();

        return response()->json(['view' => $view,'topnav' => $topnav,'alltopnav' => $alltopnav]);

    }
    
    public function productSecondary($category,$secondary,Request $request)
    {
        $data=[];
        $product_primary_categories   = $this->product_primary_category->with('secondary')->where('slug',$category)->get();
        $product_primary_category   = $this->product_primary_category->with('secondary')->where('slug',$category)->first();
        $product_secondary_category   = $this->product_secondary_category->where('slug',$secondary)->first();
        $p_category_id = $product_primary_category->id;
        $allProductAttribute = $this->product->with(['primaryCategory','secondaryCategory','attributeValue'])
                                ->whereHas('primaryCategory',function($query)use($p_category_id){
                                    $query->where('primary_category_id',$p_category_id);
                                })->get();

        foreach($allProductAttribute as $allattribute_v){
            foreach($allattribute_v->attributeValue as $attribute_v){
                $data[]= $attribute_v->pivot->product_attribute_id;
            }
        }
        $unique_attribute= array_unique($data);
        $product_attributes   = $this->product_attribute->with('values')->whereIn('id',$unique_attribute)
                                ->get();


        $latestProducts = $this->product->with('primaryCategory')->orderBy('created_at', 'DESC')->where('status','active')->take(3)->get();
        $query = $request->s;
        $product_brands   = $this->brand->with('series')->get();

        $allProducts = $this->product->with(['primaryCategory','secondaryCategory'])
                    ->where('status','active')
                    ->where('name', 'LIKE', '%' . $query . '%')
                    ->whereHas('secondaryCategory',function($query)use($secondary){
                        $query->where('slug',$secondary);
                    })
                    ->paginate(9);
        $product_banners = SiteBanner::all();

        return view('frontend.pages.products.secondary_category',compact('product_secondary_category','product_brands','product_primary_category','allProducts','product_attributes','product_primary_categories','latestProducts','product_banners'));

    }

    public function productSingle($slug)
    {
        $product_primary_categories = $this->product_primary_category->with('secondary')->get();
        $latestProducts             = $this->product->with('primaryCategory')->orderBy('created_at', 'DESC')->where('status','active')->take(7)->get();
        $product                    = $this->product->with(['primaryCategory','brand','productSpecification','secondaryCategory','gallery','productSEO'])
                                                    ->where('status','active')
                                                    ->where('slug',$slug)->first();

        return view('frontend.pages.products.single',compact('product','product_primary_categories','latestProducts'));
    }

    public function searchProduct(Request $request)
    {
        $product_primary_categories   = $this->product_primary_category->with('secondary')->get();
        $product_attributes   = $this->product_attribute->with('values')->get();
        $latestProducts = $this->product->with('primaryCategory')->orderBy('created_at', 'DESC')->where('status','active')->take(3)->get();
        $product_brands   = $this->brand->with('series')->get();
        $query = $request->s;
        $allProducts = $this->product->with(['primaryCategory','secondaryCategory'])
                    ->where('status','active')
                    ->where('name', 'LIKE', '%' . $query . '%')
                    ->paginate(9);
        $product_banners = SiteBanner::all();


        return view('frontend.pages.products.search',compact('query','product_brands','allProducts','product_attributes','product_primary_categories','latestProducts','product_banners'));

    }

    public function productSearchFilter(Request $request)
    {
        $query = $request->s;
        $searchq = $request->searchby;
        $allProducts = $this->product->with(['primaryCategory','secondaryCategory','attributeValue'])
                        ->where('status','active')
                        ->where('name', 'LIKE', '%' . $query . '%')
                        ->where('name', 'LIKE', '%' . $searchq . '%');

        if (isset($request->min_price) && isset($request->max_price)) {
            $minprice = $request->min_price;
            $maxprice = $request->max_price;
            $allProducts->whereBetween('price', [$minprice, $maxprice]);
        }

        if (isset($request->pattribute)) {
            $slug = $request->pattribute;
            $allProducts->whereHas('attributeValue',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }
        if (isset($request->pbrand)) {
            $slug = $request->pbrand;
            $allProducts->whereHas('brand',function($query)use($slug){
                $query->whereIn('slug', $slug );
            });
        }

        if (isset($request->orderby)) {
            if ($request->orderby == "latest") {
              $allProducts->orderBy('created_at','desc');
            }
            if ($request->orderby == "old") {
              $allProducts->orderBy('created_at','asc');
            }
            if ($request->orderby == "asc") {
              $allProducts->orderBy('name','asc');
            }
            if ($request->orderby == "desc") {
              $allProducts->orderBy('name','desc');
            }
        }else{
            $allProducts->orderBy(\DB::raw('RAND()'));
        }
        $allProducts = $allProducts->paginate(9);

        $view = view('frontend.pages.products.filter_product',compact('allProducts'))->render();
        $topnav = view('frontend.pages.products.filter_pagination',compact('allProducts'))->render();
        $alltopnav = view('frontend.pages.products.filter_all_pagination',compact('allProducts'))->render();


        return response()->json(['view' => $view,'topnav' => $topnav,'alltopnav' => $alltopnav]);

    }

    public function blogs()
    {
        $bcategories = $this->bcategory->get();
        $allPosts = $this->blog->orderBy('title', 'asc')->where('status','publish')->paginate(4);
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();

        return view('frontend.pages.blogs.index',compact('allPosts','latestPosts','bcategories'));
    }

    public function blogSingle($slug)
    {
        $singleBlog = $this->blog->where('slug', $slug)->first();
        $catid = $singleBlog->blog_category_id;
        $relatedBlogs = Blog::where('blog_category_id', '=', $catid)->where('status','publish')->take(2)->get();
        $bcategories = $this->bcategory->get();
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();

        return view('frontend.pages.blogs.single',compact('singleBlog','relatedBlogs','bcategories','latestPosts'));
    }

    public function blogCategories($slug)
    {
        $bcategory = $this->bcategory->where('slug', $slug)->first();
        $catid = $bcategory->id;
        $cat_name = $bcategory->name;
        $allPosts = $this->blog->where('blog_category_id', $catid)->where('status','publish')->orderBy('title', 'asc')->paginate(4);
        $bcategories = $this->bcategory->get();
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();

        return view('frontend.pages.blogs.category',compact('allPosts','cat_name','latestPosts','bcategories'));
    }

    public function searchBlog(Request $request)
    {
        $query = $request->s;
        $allPosts = $this->blog->where('title', 'LIKE', '%' . $query . '%')->where('status','publish')->orderBy('title', 'asc')->paginate(4);
        $bcategories = $this->bcategory->get();
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();

        return view('frontend.pages.blogs.search',compact('allPosts','query','latestPosts','bcategories'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');

    }

    public function contactStore(Request $request)
    {
        $theme_data = Setting::first();
            $data = array(
                'fullname'        =>$request->input('fullname'),
                'message'        =>$request->input('message'),
                'email'        =>$request->input('email'),
                'subject'        =>$request->input('subject'),
                'customer_phone'        =>$request->input('phone'),
                'address'        =>ucwords($theme_data->address),
                'site_email'        =>ucwords($theme_data->email),
                'site_name'        =>ucwords($theme_data->website_name),
                'phone'        =>ucwords($theme_data->phone),
                'logo'        =>ucwords($theme_data->logo),
            );
//             Mail::to('surajmzn75@gmail.com')->send(new ContactDetail($data));

            // Mail::to($theme_data->email)->cc(['suraj@canosoft.com.np','info@canosoft.com.np'])->send(new ContactDetail($data));

            Session::flash('success','Thank you for contacting us!');

        return redirect()->back();
    }

}
