<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecondaryCreateRequest;
use App\Http\Requests\SecondaryUpdateRequest;
use App\Models\ProductSecondaryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductSeacondaryController extends Controller
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
    public function store(SecondaryCreateRequest $request)
    {
        $data=[
            'name'                       => $request->input('name'),
            'slug'                       => $request->input('slug'),
            'primary_category_id'        => $request->input('primary_category_id'),
            'created_by'                 => Auth::user()->id,
        ];

        $category = ProductSecondaryCategory::create($data);
        if($category){
            Session::flash('success','Product Secondary Category Created Successfully');
        }
        else{
            Session::flash('error','Product Secondary Category Creation Failed');
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
        $editcategory     = ProductSecondaryCategory::find($id);
        return response()->json($editcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SecondaryUpdateRequest $request, $id)
    {
        $category                           = ProductSecondaryCategory::find($id);
        $category->name                     = $request->input('name');
        $category->slug                     = $request->input('slug');
        $category->primary_category_id      = $request->input('primary_category_id');
        $category->updated_by               = Auth::user()->id;

        $status                              = $category->update();
        if($status){
            Session::flash('success','Product Secondary Category Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Secondary Category could not be Updated');
        }
        return redirect()->route('proprimarycat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletecategory  = ProductSecondaryCategory::find($id);
        $rid             = $deletecategory->id;
        $checkproduct    = $deletecategory->products()->get();
        if ($checkproduct->count() > 0) {
            return 0;
        }else{
        $deletecategory->delete();
        }
        return '#secondary_category'.$rid;
    }
}
