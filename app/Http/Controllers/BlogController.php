<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
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
    public function store(BlogCreateRequest $request)
    {
        $data=[
            'title'             => $request->input('title'),
            'slug'              => $request->input('slug'),
            'excerpt'           => $request->input('excerpt'),
            'description'       => $request->input('description'),
            'status'            => $request->input('status'),
            'blog_category_id'  => $request->input('blog_category_id'),
            'created_by'        => Auth::user()->id,
        ];

        if(!empty($request->file('image'))){
            $image          = $request->file('image');
            $name           = uniqid().'_'.$image->getClientOriginalName();
            $path           = base_path().'/public/images/uploads/blog/';
            $moved          = Image::make($image->getRealPath())->resize(850 , 345, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            })->orientate()->save($path.$name);
            if ($moved){
                $data['image']=$name;
            }
        }

        if(!empty($request->file('thumb_image'))){
            $image        = $request->file('thumb_image');
            $name         = uniqid().'_'.$image->getClientOriginalName();
            $path         = base_path().'/public/images/uploads/blog/thumb/';
            $moved        = Image::make($image->getRealPath())->resize(258, 230, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            })->orientate()->save($path.$name);
            if ($moved){
                $data['thumb_image']= $name;
            }
        }

        $blog = Blog::create($data);
        if($blog){
            Session::flash('success','Your Post was Created Successfully');
        }
        else{
            Session::flash('error','Your Post Creation Failed');
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
        $edit   = Blog::find($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, $id)
    {
        $blog                      =  Blog::find($id);
        $blog->title               =  $request->input('title');
        $blog->slug                =  $request->input('slug');
        $blog->excerpt             =  $request->input('excerpt');
        $blog->description         =  $request->input('description');
        $blog->status              =  $request->input('status');
        $blog->blog_category_id    =  $request->input('blog_category_id');
        $blog->updated_by          = Auth::user()->id;

        $oldimage                  = $blog->image;
        $thumbimage                = $blog->thumb_image;

        if (!empty($request->file('image'))){
            $image       = $request->file('image');
            $name1       = uniqid().'_'.$image->getClientOriginalName();
            $path        = base_path().'/public/images/uploads/blog/';
            $moved       = Image::make($image->getRealPath())->resize(850 , 345, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            })->orientate()->save($path.$name1);

            if ($moved){
                $blog->image= $name1;
                if (!empty($oldimage) && file_exists(public_path().'/images/uploads/blog/'.$oldimage)){
                    @unlink(public_path().'/images/uploads/blog/'.$oldimage);
                }
            }
        }

        if (!empty($request->file('thumb_image'))){
            $image       = $request->file('thumb_image');
            $name1       = uniqid().'_'.$image->getClientOriginalName();
            $thumb_path  = base_path().'/public/images/uploads/blog/thumb/';
            $thumb       = Image::make($image->getRealPath())->resize(258, 230, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            })->orientate()->save($thumb_path.$name1);

            if ($thumb){
                $blog->thumb_image= $name1;
                if (!empty($thumbimage) && file_exists(public_path().'/images/uploads/blog/thumb/'.$thumbimage)){
                    @unlink(public_path().'/images/uploads/blog/thumb/'.$thumbimage);
                }
            }
        }

        $status = $blog->update();
        if($status){
            Session::flash('success','Your Post was updated successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Your Post could not be Updated');
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
        $deleteblog      = Blog::find($id);
        $rid             = $deleteblog->id;
        $thumbimage      = $deleteblog->thumb_image;

        if (!empty($deleteblog->image) && file_exists(public_path().'/images/uploads/blog/'.$deleteblog->image)){
            @unlink(public_path().'/images/uploads/blog/'.$deleteblog->image);
        }
        if (!empty($thumbimage) && file_exists(public_path().'/images/uploads/blog/thumb/'.$thumbimage)){
            @unlink(public_path().'/images/uploads/blog/thumb/'.$thumbimage);
        }
        $deleteblog->delete();
        return '#blog'.$rid;
    }

    public function updateStatus(Request $request, $id){
        $blog          = Blog::find($id);
        $blog->status  = $request->status;
        $status        = $blog->update();
        if($status){
            $confirmed = "yes";
        }
        else{
            $confirmed = "no";
        }
        return response()->json($confirmed);
    }
}
