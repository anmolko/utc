<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class ProductSeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
         $product           =  Product::find($id);
        return view('backend.products.seo.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title'          =>$request->input('title'),
            'description'    =>$request->input('description'),
            'product_id'    =>$request->input('product_id'),
            'keywords'       =>$request->input('keywords'),
            'created_by'     =>Auth::user()->id,
        ];
        $status = ProductSeo::create($data);

        if($status){
            Session::flash('success','Product SEO Created Successfully');
        }
        else{
            Session::flash('error','Product SEO Creation Failed');
        }
        return redirect()->back();
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
        $product_id = $id;
        $product           =  Product::find($id);
        $product_seo = ProductSeo::where('product_id',$product_id)->first();
        if($product_seo){
            return view('backend.products.seo.edit',compact('product_id','product_seo','product'));
        }else{

            return view('backend.products.seo.create',compact('product_id','product'));
        }
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
        $seo                 = ProductSeo::find($id);
        $seo->title          = $request->input('title');
        $seo->description    = $request->input('description');
        $seo->product_id    = $request->input('product_id');
        $seo->keywords       = $request->input('keywords');
        $seo->updated_by     = Auth::user()->id;

        $status              = $seo->update();
        if($status){
            Session::flash('success','Product SEO Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Product SEO could not be Updated');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
