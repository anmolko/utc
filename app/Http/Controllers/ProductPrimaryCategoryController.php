<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrimaryCreateRequest;
use App\Http\Requests\PrimaryUpdateRequest;
use App\Models\ProductPrimaryCategory;
use App\Models\ProductSecondaryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ProductPrimaryCategoryController extends Controller
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
        $primary_categories   = ProductPrimaryCategory::all();
        $secondary_categories = ProductSecondaryCategory::all();
        return view('backend.products.primary_category.index',compact('primary_categories','secondary_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrimaryCreateRequest $request)
    {
        $data=[
            'name'        => $request->input('name'),
            'slug'        => $request->input('slug'),
            'created_by'  => Auth::user()->id,
        ];

        $category = ProductPrimaryCategory::create($data);
        if($category){
            Session::flash('success','Product Primary Category Created Successfully');
        }
        else{
            Session::flash('error','Product Primary Category Creation Failed');
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
        $editcategory     = ProductPrimaryCategory::find($id);
        return response()->json($editcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrimaryUpdateRequest $request, $id)
    {
        $category               = ProductPrimaryCategory::find($id);
        $category->name         = $request->input('name');
        $category->slug         = $request->input('slug');
        $category->updated_by   = Auth::user()->id;
        $status                 = $category->update();
        if($status){
            Session::flash('success','Product Primary Category Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Category could not be Updated');
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
        $deletecategory  = ProductPrimaryCategory::find($id);
        $rid             = $deletecategory->id;
        $check_relation  = $deletecategory->secondary()->get();
        if ($check_relation->count() > 0) {
            return 0;
        }else{
            $deletecategory->delete();
        }
        return '#primary_category'.$rid;
    }
}
