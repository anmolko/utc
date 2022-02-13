<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandSeriesCreateRequest;
use App\Http\Requests\BrandSeriesUpdateRequest;
use App\Models\Brand;
use App\Models\BrandSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BrandSeriesController extends Controller
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
    public function store(BrandSeriesCreateRequest $request)
    {
        $data=[
            'name'                       => $request->input('name'),
            'slug'                       => $request->input('slug'),
            'brand_id'                   => $request->input('brand_id'),
            'created_by'                 => Auth::user()->id,
        ];

        $category = BrandSeries::create($data);
        if($category){
            Session::flash('success','Brand Series Created Successfully');
        }
        else{
            Session::flash('error','Something went wrong ! Brand Series Creation Failed');
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
        $edit     = BrandSeries::find($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandSeriesUpdateRequest $request, $id)
    {
        $series                           = BrandSeries::find($id);
        $series->name                     = $request->input('name');
        $series->slug                     = $request->input('slug');
        $series->brand_id                 = $request->input('brand_id');
        $series->updated_by               = Auth::user()->id;

        $status                          = $series->update();
        if($status){
            Session::flash('success','Brand Series was updated successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Brand Series could not be updated');
        }
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $delete  =  BrandSeries::find($id);
            $rid     = $delete->id;
//        $checkproduct    = $delete->products()->get();
//        if ($checkproduct->count() > 0) {
//            return 0;
//        }else{
            $delete->delete();
//        }
        return '#series_'.$rid;
    }
}
