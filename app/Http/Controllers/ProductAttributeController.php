<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeCreateRequest;
use App\Http\Requests\AttributeUpdateRequest;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductAttributeController extends Controller
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
        $attributes   = ProductAttribute::all();
        $values       = AttributeValue::all();
        return view('backend.products.attributes.index',compact('attributes','values'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeCreateRequest $request)
    {
        $data=[
            'name'        => $request->input('name'),
            'slug'        => $request->input('slug'),
            'created_by'  => Auth::user()->id,
        ];

        $attribute        = ProductAttribute::create($data);
        if($attribute){
            Session::flash('success','Product Attribute Created Successfully');
        }
        else{
            Session::flash('error','Product Attribute Creation Failed');
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
        $editcategory     = ProductAttribute::find($id);
        return response()->json($editcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeUpdateRequest $request, $id)
    {
        $attribute               = ProductAttribute::find($id);
        $attribute->name         = $request->input('name');
        $attribute->slug         = $request->input('slug');
        $attribute->updated_by   = Auth::user()->id;

        $status                  = $attribute->update();
        if($status){
            Session::flash('success','Product Attribute Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Product Attribute could not be Updated');
        }
        return redirect()->route('productattribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete            = ProductAttribute::find($id);
        $rid               = $delete->id;
        $check_relation    = $delete->values()->get();
        if ($check_relation->count() > 0) {
            return 0;
        }else{
        $delete->delete();
        }
        return '#attribute_'.$rid;
    }
}
