<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecificationCreateRequest;
use App\Http\Requests\SpecificationUpdateRequest;
use App\Models\Specification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SpecificationController extends Controller
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
        $specifications        = Specification::all();
        return view('backend.specification.index',compact('specifications'));
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
    public function store(SpecificationCreateRequest $request)
    {
        $data=[
            'name'        => $request->input('name'),
            'slug'        => $request->input('slug'),
            'created_by'  => Auth::user()->id,
        ];

        $status = Specification::create($data);
        if($status){
            Session::flash('success','Specification Created Successfully');
        }
        else{
            Session::flash('error','Something went wrong ! Specification Creation Failed');
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
        $edit     = Specification::find($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecificationUpdateRequest $request, $id)
    {
        $spec               = Specification::find($id);
        $spec->name         = $request->input('name');
        $spec->slug         = $request->input('slug');
        $spec->updated_by   = Auth::user()->id;

        $status             = $spec->update();
        if($status){
            Session::flash('success','Specification Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong ! Specification could not be Updated');
        }
        return redirect()->route('specification.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete          = Specification::find($id);
        $rid             = $delete->id;
//        $check_relation  = $delete->series()->get();
//        if ($check_relation->count() > 0) {
//            return 0;
//        }else{
            $delete->delete();
//        }
        return '#specification_'.$rid;
    }
}
