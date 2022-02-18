<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\SiteBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SiteBannerController extends Controller
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
        $this->photos_path   = public_path('/images/uploads/products/banner_gallery');
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
    public function store(Request $request)
    {
        $data=[
            'name'        => $request->input('name'),
            'created_by'  => Auth::user()->id,
        ];

        if(!empty($request->file('image'))){
            $image          = $request->file('image');
            $name           = uniqid().'_'.$image->getClientOriginalName();
            $path           = base_path().'/public/images/uploads/banners/';
            $moved          = Image::make($image->getRealPath())->resize(1479, 311)->orientate()->save($path.$name);
            if ($moved){
                $data['image']=$name;
            }
        }

        $category = SiteBanner::create($data);
        if($category){
            Session::flash('success','Product list page banner Created Successfully');
        }
        else{
            Session::flash('error','Product list page banner Creation Failed');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SiteBanner $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteBanner $id)
    {
        //
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

        $banner                   = SiteBanner::find($id);
        $banner->name             = $request->input('name');
        $banner->updated_by       = Auth::user()->id;
        $oldimage                 = $banner->image;

        if (!empty($request->file('image'))){
            $image       = $request->file('image');
            $name1       = uniqid().'_'.$image->getClientOriginalName();
            $path        = base_path().'/public/images/uploads/banners/';
            $moved       = Image::make($image->getRealPath())->resize(1479, 311)->orientate()->save($path.$name1);

            if ($moved){
                $banner->image= $name1;
                if (!empty($oldimage) && file_exists(public_path().'/images/uploads/banners/'.$oldimage)){
                    @unlink(public_path().'/images/uploads/banners/'.$oldimage);
                }
            }
        }

        $status = $banner->update();
        if($status){
            Session::flash('success',ucfirst($request->input('name')).' list page banner Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. '.ucfirst($request->input('name')).' list page banner could not be Updated');
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

    public function uploadGallery(Request $request)
    {

        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }


        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = "banner_gallery_".date('YmdHis') . uniqid();
            $save_name = $name . '.' . $photo->getClientOriginalExtension();

            $photo->move($this->photos_path, $save_name);

            $upload = new SiteBanner();
            $upload->created_by = Auth::user()->id;
            $upload->name = $save_name;
            $upload->image = $save_name;
            $upload->save();
        }

        return response()->json(['success'=>$save_name]);

    }

    public function deleteGallery(Request $request)
    {
        $filename = $request->get('filename');
        $uploaded_image = SiteBanner::where('name', $filename)->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->photos_path . '/' . $uploaded_image->name;

        if (file_exists($file_path)) {
            @unlink($file_path);
        }


        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['success' => $filename], 200);
    }

    public function getGallery(Request $request)
    {
        $images = SiteBanner::get()->toArray();
        if (count($images) > 0){
            foreach($images as $image){
                $tableImages[] = $image['name'];
            }
            $storeFolder = public_path('images/uploads/products/banner_gallery/');
            $file_path = public_path('images/uploads/products/banner_gallery/');
            $files = scandir($storeFolder);
            foreach ( $files as $file ) {
                if ($file !='.' && $file !='..' && in_array($file,$tableImages)) {
                    $obj['name'] = $file;
                    $file_path = public_path('images/uploads/products/banner_gallery/').$file;
                    $obj['size'] = filesize($file_path);
                    $obj['path'] = url('/images/uploads/products/banner_gallery/'.$file);
                    $data[] = $obj;
                }

            }
            return response()->json($data);
        }
    }


}
