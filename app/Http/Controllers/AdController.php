<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdController extends Controller
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
        $allads      = Ads::all();
        $checkfirst      = Ads::where('position','first')->first();
        $checksecond      = Ads::where('position','second')->first();
        $checkthird      = Ads::where('position','third')->first();
        $checkfour      = Ads::where('position','four')->first();
        
        return view('backend.ads.index',compact('allads','checkfirst','checksecond','checkthird','checkfour'));
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
    public function store(Request $request)
    {
        $data=[
            'type'             => $request->input('type'),
            'position'         => $request->input('position'),
            'first_url'        => $request->input('first_url'),
            'second_url'       => $request->input('second_url'),
            'created_by'       => Auth::user()->id,
        ];

        if(!empty($request->file('first_image'))){
            $first_image          = $request->file('first_image');
            $name           = uniqid().'_'.$first_image->getClientOriginalName();
            $path           = base_path().'/public/images/uploads/ad/';
            if($request->input('type')=='single'){
                $moved          = Image::make($first_image->getRealPath())->resize(1140 , 200, function ($constraint) {
                    $constraint->aspectRatio(); //maintain image ratio
                })->orientate()->save($path.$name);
            }else{
                $moved          = Image::make($first_image->getRealPath())->resize(620 , 200, function ($constraint) {
                    $constraint->aspectRatio(); //maintain image ratio
                })->orientate()->save($path.$name);
            }
            
            if ($moved){
                $data['first_image']=$name;
            }
        }

        if(!empty($request->file('second_image'))){
            $image        = $request->file('second_image');
            $name         = uniqid().'_'.$image->getClientOriginalName();
            $path         = base_path().'/public/images/uploads/ad/';
            $moved        = Image::make($image->getRealPath())->resize(620, 200, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            })->orientate()->save($path.$name);
            if ($moved){
                $data['second_image']= $name;
            }
        }

        $ad = Ads::create($data);
        if($ad){
            Session::flash('success','Your Ads was Created Successfully');
        }
        else{
            Session::flash('error','Your Ads Creation Failed');
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
        $edit            = Ads::find($id);
        
        return view('backend.ads.edit',compact('edit'));

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
        $ad                      =  Ads::find($id);
        $ad->type                =  $request->input('type');
        $ad->position            =  $request->input('position');
        $ad->first_url           =  $request->input('first_url');
        $ad->second_url          =  $request->input('second_url');
        $ad->updated_by          = Auth::user()->id;

        $oldfirstimage                  = $ad->first_image;
        $oldsecondimage                = $ad->second_image;

        if($request->input('type')=='single'){
            if (!empty($oldsecondimage) && file_exists(public_path().'/images/uploads/ad/'.$oldsecondimage)){
                @unlink(public_path().'/images/uploads/ad/'.$oldsecondimage);
            }
            $ad->second_image                = null;
        }
        
        if (!empty($request->file('first_image'))){
            $image       = $request->file('first_image');
            $name1       = uniqid().'_'.$image->getClientOriginalName();
            $path        = base_path().'/public/images/uploads/ad/';

            if($request->input('type')=='single'){
                $moved          = Image::make($image->getRealPath())->resize(1140 , 200, function ($constraint) {
                    $constraint->aspectRatio(); //maintain image ratio
                })->orientate()->save($path.$name1);
            }else{
                $moved          = Image::make($image->getRealPath())->resize(620 , 200, function ($constraint) {
                    $constraint->aspectRatio(); //maintain image ratio
                })->orientate()->save($path.$name1);

            }


            if ($moved){
                $ad->first_image= $name1;
                if (!empty($oldfirstimage) && file_exists(public_path().'/images/uploads/ad/'.$oldfirstimage)){
                    @unlink(public_path().'/images/uploads/ad/'.$oldfirstimage);
                }
            }
        }

        if (!empty($request->file('second_image'))){
            $image       = $request->file('second_image');
            $name1       = uniqid().'_'.$image->getClientOriginalName();
            $thumb_path  = base_path().'/public/images/uploads/ad/';
            $thumb       = Image::make($image->getRealPath())->resize(620 , 200, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            })->orientate()->save($thumb_path.$name1);

            if ($thumb){
                $ad->second_image= $name1;
                if (!empty($oldsecondimage) && file_exists(public_path().'/images/uploads/ad/'.$oldsecondimage)){
                    @unlink(public_path().'/images/uploads/ad/'.$oldsecondimage);
                }
            }
        }

        $status = $ad->update();
        if($status){
            Session::flash('success','Your Ads was updated successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Your Ads could not be Updated');
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
        $deletead      = Ads::find($id);
        $rid             = $deletead->id;

        if (!empty($deletead->first_image) && file_exists(public_path().'/images/uploads/ad/'.$deletead->first_image)){
            @unlink(public_path().'/images/uploads/ad/'.$deletead->first_image);
        }
        if (!empty($deletead->second_image) && file_exists(public_path().'/images/uploads/ad/'.$deletead->second_image)){
            @unlink(public_path().'/images/uploads/ad/'.$deletead->second_image);
        }
        $deletead->delete();
        return '#blog'.$rid;
    }
}
