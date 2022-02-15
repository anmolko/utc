<?php

namespace App\Http\Controllers;


use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\BrandSeries;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductGallery;
use App\Models\ProductPrimaryCategory;
use App\Models\ProductSecondaryCategory;
use App\Models\ProductSpecification;
use App\Models\ProductValue;
use App\Models\SiteBanner;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $photos_path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->photos_path   = public_path('/images/uploads/products/gallery');
    }


    public function index()
    {
        $products      = Product::with('primaryCategory','secondaryCategory')->get();
        $productbanner = SiteBanner::where('name','product')->first();

        return view('backend.products.index',compact('products','productbanner'));
    }

    public function galleryindex($id)
    {
        $product           =  Product::find($id);
        return view('backend.products.gallery.index',compact('product'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $primary        = ProductPrimaryCategory::with('secondary')->get();
        $secondary      = ProductSecondaryCategory::all();
        $attributes     = ProductAttribute::with('values')->get();
        $specifications  = Specification::all();
        $brands         = Brand::with('series')->get();
        $values         = AttributeValue::all();

        return view('backend.products.create',compact('primary','secondary','specifications','attributes','values','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Product::where('slug', $request->input('slug'))->first();
        if ($slug !== null) {
            return 'duplicate';
        }else{
            $data=[
                'name'                  => $request->input('name'),
                'slug'                  => $request->input('slug'),
                'status'                => $request->input('status'),
                'summary'               => $request->input('summary'),
                'primary_category_id'   => $request->input('primary_category_id'),
                'secondary_category_id' => $request->input('secondary_category_id'),
                'brand_id'              => $request->input('brand_id'),
                'price'                 => $request->input('price'),
                'brand_series_id'       => $request->input('brand_series_id'),
                'created_by'            => Auth::user()->id,
            ];

            if(!empty($request->file('thumbnail'))){
                $image          = $request->file('thumbnail');
                $name           = uniqid().'_'.$image->getClientOriginalName();
                $path           = base_path().'/public/images/uploads/products/';
                $moved          = Image::make($image->getRealPath())->resize(265, 210, function ($constraint) {
                    $constraint->aspectRatio(); //maintain image ratio
                })->orientate()->save($path.$name);
                if ($moved){
                    $data['thumbnail']=$name;
                }
            }
            $product = Product::create($data);
            $attribute     = $request->input('product_attribute_id');
            $specification = $request->input('specification_id');
            if ($product){
                foreach ($attribute as $key=>$value){
                    $attrValue = $request->input('attribute_value_id_'.$value);
                    foreach ($attrValue as $av){
                        $data1=[
                            'product_id'           => $product->id,
                            'product_attribute_id' => $value,
                            'attribute_value_id'   => $av,
                            'created_by'            => Auth::user()->id,
                        ];
                        $productValue = ProductValue::create($data1);
                    }
                }
                foreach ($specification as $key=>$value){
                    $specificDetails = $request->input('specification_details_'.$value);
                    $data2=[
                        'product_id'                => $product->id,
                        'specification_id'          => $value,
                        'specification_details'     => $specificDetails,
                        'created_by'                => Auth::user()->id,
                    ];
                    $productSpecification = ProductSpecification::create($data2);

                }
                Session::flash('success','Product Created Successfully');
            }
            else{
                Session::flash('error','Product Creation Failed');
            }

            return route('products.index');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $primary            = ProductPrimaryCategory::with('secondary')->get();
        $attributes         = ProductAttribute::with('values')->get();
        $values             = AttributeValue::all();
        $allspecifications  = Specification::all();
        $product            = Product::with('attributeValue','productSpecification')->find($id);
        $secondary          = ProductSecondaryCategory::where('primary_category_id',$product->primary_category_id)->get();
        $brands             = Brand::with('series')->get();
        $brand_series       = BrandSeries::where('brand_id',$product->brand_id)->get();

        //getting product attribute ID from the pivot table because the attribute id is repeated as one attribute can have many saved values
        foreach ($product->attributeValue as $values) {
            if($values->pivot->product_id == $id){
                $attributeID[]    = $values->pivot->product_attribute_id;
                //take all the attribute values and remove the repetitive one by making them unique.
                $new = array_unique($attributeID);
            }
        }

        //take all the product related specification ID from pivot table in this loop as one specification ID has one detail attached to it.
        foreach ($product->productSpecification as $pro){
            $pivotSpecification[$pro->pivot->specification_id] = $pro->pivot->specification_details;
        }

        //take the new unique attribute array and find the details in product attr table and its values from pivot table
        foreach ($new as $n){
            $relatedAttr[]  = ProductAttribute::with('values')->find($n);
            $pivotValues[]  = ProductValue::where('product_id',$id)->where('product_attribute_id',$n)->get();
        }

        //add all the values that are in use in pivot table to different array to use it in jquery.
        foreach ($pivotValues as $pivot){
            foreach ($pivot as $p){
                $selectedValues[] = $p->attribute_value_id;
            }
        }
        return view('backend.products.edit',compact('product','primary','brands','brand_series','pivotSpecification','allspecifications','secondary','attributes','values','relatedAttr','selectedValues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
        $slug = Product::where('slug', $request->input('slug'))->where('id', '!=' , $id)->first();
        if ($slug !== null) {
            return 'duplicate';
        }else{
            $product                            =  Product::find($id);
            $product->name                      =  $request->input('name');
            $product->slug                      =  $request->input('slug');
            $product->status                    =  $request->input('status');
            $product->summary                   =  $request->input('summary');
            $product->primary_category_id       =  $request->input('primary_category_id');
            $product->secondary_category_id     =  $request->input('secondary_category_id');
            $product->brand_id                  =  $request->input('brand_id');
            $product->brand_series_id           =  $request->input('brand_series_id');
            $product->price                     =  $request->input('price');
            $product->updated_by                = Auth::user()->id;
            $oldimage                           = $product->thumbnail;

            if (!empty($request->file('thumbnail'))){
                $image       = $request->file('thumbnail');
                $name1       = uniqid().'_'.$image->getClientOriginalName();
                $path        = base_path().'/public/images/uploads/products/';
                $moved       = Image::make($image->getRealPath())->resize(265, 210, function ($constraint) {
                    $constraint->aspectRatio(); //maintain image ratio
                })->orientate()->save($path.$name1);

                if ($moved){
                    $product->thumbnail= $name1;
                    if (!empty($oldimage) && file_exists(public_path().'/images/uploads/products/'.$oldimage)){
                        @unlink(public_path().'/images/uploads/products/'.$oldimage);
                    }
                }
            }


            $status = $product->update();
            $incoming_attribute     = $request->input('product_attribute_id');
            $incoming_specification = $request->input('specification_id');
            if($status){
                $removeValues        = ProductValue::where('product_id',$id)->get();
                $removeSpecification = ProductSpecification::where('product_id',$id)->get();
                foreach ($removeValues as $val){
                    $val->delete();
                }//remove all the values from the pivot table
                foreach ($removeSpecification as $spec){
                    $spec->delete();
                }
                if($incoming_attribute !== null) {
                    foreach ($incoming_attribute as $key=>$value) {
                        $attrValue = $request->input('attribute_value_id_' . $value);
                        foreach ($attrValue as $av) {
                            $data1 = [
                                'product_id'            => $product->id,
                                'product_attribute_id'  => $value,
                                'attribute_value_id'    => $av,
                                'created_by'            => Auth::user()->id,
                            ];
                            $productValue = ProductValue::create($data1);
                        }
                    }
                }// recreate all the incoming values in pivot table again.
                if($incoming_specification !== null) {
                    foreach ($incoming_specification as $key=>$value) {
                        $specificDetails = $request->input('specification_details_'.$value);
                        $data2=[
                            'product_id'                => $product->id,
                            'specification_id'          => $value,
                            'specification_details'     => $specificDetails,
                            'created_by'                => Auth::user()->id,
                        ];
                        $productSpecification = ProductSpecification::create($data2);
                    }
                }
                    Session::flash('success','Product was updated successfully');
            }
            else{
                Session::flash('error','Something Went Wrong. Product could not be Updated');
            }
            return route('products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete          = Product::find($id);
        $rid             = $delete->id;
        $thumbimage      = $delete->thumbnail;
        $image           = $delete->image;

        if (!empty($thumbimage) && file_exists(public_path().'/images/uploads/products/banners/'.$thumbimage)){
            @unlink(public_path().'/images/uploads/products/banners/'.$thumbimage);
        }
        if (!empty($image) && file_exists(public_path().'/images/uploads/products/'.$image)){
            @unlink(public_path().'/images/uploads/products/'.$image);
        }
//        $checkproduct       = $deletecategory->blogs()->get();
//        if ($checkproduct->count() > 0) {
//            return 0;
//        }else{
        $delete->delete();
//        }
        return '#products'.$rid;
    }

    public function updateStatus(Request $request, $id){
        $product          = Product::find($id);
        $product->status  = $request->status;
        $status           = $product->update();
        if($status){
            $confirmed = "yes";
        }
        else{
            $confirmed = "no";
        }
        return response()->json($confirmed);
    }

    public function attributeGetValues(Request $request){
        $id                 = $request->id;
        $productAttribute   = ProductAttribute::with('values')->find($id);
        $values             = array();
        foreach ($productAttribute->values as $val){
            $values[$val->id] = $val->name;
        }

        return response()->json($values);
    }

    public function primaryGetSecondary(Request $request){
        $id                 = $request->id;
        $primarycat         = ProductPrimaryCategory::with('secondary')->find($id);
        $values             = array();
        foreach ($primarycat->secondary as $val){
            $values[$val->id] = $val->name;
        }

        return response()->json($values);
    }

    public function brandGetSeries(Request $request){
        $id                 = $request->id;
        $brand              = Brand::with('series')->find($id);
        $values             = array();
        foreach ($brand->series as $val){
            $values[$val->id] = $val->name;
        }

        return response()->json($values);
    }

    public function uploadGallery(Request $request,$id)
    {
        $product                 =  Product::find($id);
        if($product==null || $product=="null"){

            return Response::json([
                'message' => 'Product ID Not Found'
            ], 400);
        }

        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }


        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = $product->slug."_gallery_".date('YmdHis') . uniqid();
            $save_name = $name . '.' . $photo->getClientOriginalExtension();

            $resize_name = "Thumb_".$name . '.' . $photo->getClientOriginalExtension();

            Image::make($photo)->save($this->photos_path . '/' . $resize_name);
//                ->resize(270, 300)


            $photo->move($this->photos_path, $save_name);

            $upload = new ProductGallery();
            $upload->product_id = $product->id;
            $upload->upload_by = Auth::user()->id;
            $upload->filename = $save_name;
            $upload->resized_name = $resize_name;
            $upload->original_name = basename($photo->getClientOriginalName());
            $upload->save();
        }

        return response()->json(['success'=>$save_name]);

    }

    public function deleteGallery(Request $request)
    {
        $filename = $request->get('filename');
        $uploaded_image = ProductGallery::where('filename', $filename)->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->photos_path . '/' . $uploaded_image->filename;
        $resized_file = $this->photos_path . '/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            @unlink($file_path);
        }

        if (file_exists($resized_file)) {
            @unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['success' => $filename], 200);
    }

    public function getGallery(Request $request,$id)
    {
        $images = ProductGallery::where('product_id',$id)->get()->toArray();
        if (count($images) > 0){
            foreach($images as $image){
                $tableImages[] = $image['filename'];
            }
            $storeFolder = public_path('images/uploads/products/gallery/');
            $file_path = public_path('images/uploads/products/gallery/');
            $files = scandir($storeFolder);
            foreach ( $files as $file ) {
                if ($file !='.' && $file !='..' && in_array($file,$tableImages)) {
                    $obj['name'] = $file;
                    $file_path = public_path('images/uploads/products/gallery/').$file;
                    $obj['size'] = filesize($file_path);
                    $obj['path'] = url('/images/uploads/products/gallery/'.$file);
                    $data[] = $obj;
                }

            }
            return response()->json($data);
        }
    }
}
