<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use App\Models\BrandSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
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
        $brands         = Brand::all();
        $brand_series   = BrandSeries::all();
        return view('backend.brand.index',compact('brands','brand_series'));
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
    public function store(BrandCreateRequest $request)
    {
        $data=[
            'name'        => $request->input('name'),
            'slug'        => $request->input('slug'),
            'created_by'  => Auth::user()->id,
        ];

        if(!empty($request->file('image'))){
            $image          = $request->file('image');
            $name           = uniqid().'brands_'.$image->getClientOriginalName();
            $path           = base_path().'/public/images/uploads/brands/';
            $moved          = Image::make($image->getRealPath())->orientate()->save($path.$name);
            if ($moved){
                $data['image']=$name;
            }
        }

        $brand = Brand::create($data);
        if($brand){
            Session::flash('success','Brand Created Successfully');
        }
        else{
            Session::flash('error','Something went wrong ! Brand Creation Failed');
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
        $edit     = Brand::find($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, $id)
    {
        $brand               = Brand::find($id);
        $brand->name         = $request->input('name');
        $brand->slug         = $request->input('slug');
        $brand->updated_by   = Auth::user()->id;
        $oldimage            = $brand->image;

        if (!empty($request->file('image'))){
            $image       = $request->file('image');
            $name1       = uniqid().'brands_'.$image->getClientOriginalName();
            $path        = base_path().'/public/images/uploads/brands/';
            $moved       = Image::make($image->getRealPath())->orientate()->save($path.$name1);

            if ($moved){
                $brand->image= $name1;
                if (!empty($oldimage) && file_exists(public_path().'/images/uploads/brands/'.$oldimage)){
                    @unlink(public_path().'/images/uploads/brands/'.$oldimage);
                }
            }
        }

        $status                 = $brand->update();
        if($status){
            Session::flash('success','Brand Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong ! Brand could not be Updated');
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
        $delete          = Brand::find($id);
        $oldimage        = $delete->image;
        $rid             = $delete->id;
        $check_relation  = $delete->series()->get();
        if ($check_relation->count() > 0) {
            return 0;
        }else{
            if (!empty($oldimage) && file_exists(public_path().'/images/uploads/brands/'.$oldimage)){
                @unlink(public_path().'/images/uploads/brands/'.$oldimage);
            }
            $delete->delete();
        }
        return '#brand_'.$rid;
    }
}
