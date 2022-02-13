<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeValueCreateRequest;
use App\Http\Requests\AttributeValueUpdateRequest;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AttributeValueController extends Controller
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
    public function store(AttributeValueCreateRequest $request)
    {
        $data=[
            'name'                       => $request->input('name'),
            'slug'                       => $request->input('slug'),
            'product_attribute_id'       => $request->input('product_attribute_id'),
            'created_by'                 => Auth::user()->id,
        ];
        $values = AttributeValue::create($data);
        if($values){
            Session::flash('success','Attribute Value Created Successfully');
        }
        else{
            Session::flash('error','Attribute Value Creation Failed');
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
        $edit     = AttributeValue::find($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeValueUpdateRequest $request, $id)
    {
        $value                           = AttributeValue::find($id);
        $value->name                     = $request->input('name');
        $value->slug                     = $request->input('slug');
        $value->product_attribute_id     = $request->input('product_attribute_id');
        $value->updated_by               = Auth::user()->id;

        $status                          = $value->update();
        if($status){
            Session::flash('success','Attribute Value Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Attribute Value could not be Updated');
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
        $delete        = AttributeValue::find($id);
        $rid           = $delete->id;
//        $checkproduct       = $delete->blogs()->get();
//        if ($checkproduct->count() > 0) {
//            return 0;
//        }else{
        $delete->delete();
//        }
        return '#attribute_value_'.$rid;
    }
}
