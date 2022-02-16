@extends('backend.layouts.master')
@section('title') Settings @endsection
@section('css')

    <style>
        /*for tab*/
        li.button-5 a{
            color: #FFFFFF;
        }

        li.button-6 a{
            color: #000000;
        }

        .fade{
            display: none;
        }
        /*end for tab*/

        /*for image*/
        .avatar-upload{
            max-width: 505px!important;
        }

        .default-image{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }



        /*end for image*/


    </style>
@endsection
@section('content')



    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="collapse-tabs">
            <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
                <ul class="list-group list-group-horizontal-lg" role="tablist">
                    <li class="list-group-item text-center active button-5">
                        <a class="active"
                           id="general-info-tab" data-toggle="pill" href="#general-info"
                           role="tab" aria-controls="description" aria-selected="true">
                            General Information</a>
                    </li>
                    @if(!empty($settings))

                    <li class="list-group-item text-center button-6">
                        <a class="in-active"
                           id="sensitive-info-tab" data-toggle="pill" data-number="" href="#sensitive-info" role="tab"
                           aria-controls="media" aria-selected="false">
                            Images Information</a>
                    </li>

{{--                    <li class="list-group-item text-center button-6">--}}
{{--                            <a class="in-active"--}}
{{--                               id="callaction1-info-tab" data-toggle="pill" data-number="" href="#callaction1-info" role="tab"--}}
{{--                               aria-controls="media" aria-selected="false">--}}
{{--                                Call to action 1</a>--}}
{{--                    </li>--}}

{{--                    <li class="list-group-item text-center button-6">--}}
{{--                            <a class="in-active"--}}
{{--                               id="callaction2-info-tab" data-toggle="pill" data-number="" href="#callaction2-info" role="tab"--}}
{{--                               aria-controls="media" aria-selected="false">--}}
{{--                                Call to action 2</a>--}}
{{--                    </li>--}}
                    @endif
                </ul>
            </div>


            <div class="tab-content shadow-none p-0">

            <div id="collapse-tabs-accordion">
                    <div class="tab-pane tab-pane-parent show active px-0" id="general-info"
                         role="tabpanel" aria-labelledby="general-info-tab">
                        <div class="bg-transparent border-0">
                            <div id="general-info-collapse" class="collapse show collapsible"
                                 aria-labelledby="heading-general-info"
                                 data-parent="#collapse-tabs-accordion">
                                {{-- Tab content --}}

                                @if(!empty($settings))
                                    {!! Form::open(['url'=>route('setting.update', @$settings->id),'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                                @else

                                    <form action="{{ route('setting.store') }}" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                @endif

                                    <div class="row">
                                        <div class="col-md-6 d-flex">
                                            <div class="card ctm-border-radius shadow-sm flex-fill grow">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">
                                                        Website Description
                                                    </h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Title <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="website_name" name="website_name" value="{{@$settings->website_name}}" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a website title.
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" rows="6" name="website_description" id="description" required>{{@$settings->website_description}}</textarea>
                                                        <div class="invalid-feedback">
                                                            Please enter a website description.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex">
                                            <div class="card ctm-border-radius shadow-sm flex-fill grow">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">
                                                        Contact Information
                                                    </h4>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label>Email <span class="text-muted text-danger">*</span></label>
                                                        <input type="email" class="form-control" id="email" name="email" value="{{@$settings->email}}" required>
                                                        <div class="invalid-feedback">
                                                            Please enter an email.
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="address" id="address" value="{{@$settings->address}}" required>
                                                        <div class="invalid-feedback">
                                                            Please enter an address.
                                                        </div>
                                                    </div>


                                                   <div class="form-row mx-n4">
                                                        <div class="form-group col-md-6 px-4">
                                                            <label for="phone" class="text-heading">Phone <span class="text-muted text-danger">*</span></label>
                                                            <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="{{@$settings->phone}}" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a phone number.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 px-4">
                                                            <label for="mobile" class="text-heading">Mobile <span class="text-muted text-danger">*</span></label>
                                                            <input type="text" class="form-control form-control-lg" id="mobile" name="mobile" value="{{@$settings->mobile}}"  required>
                                                            <div class="invalid-feedback">
                                                                Please enter a mobile number.
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                   </div>

                                    {{-- other details section--}}

                                    <div class="card ctm-border-radius shadow-sm grow">
                                        <div class="card-header">
                                            <h4 class="card-title doc d-inline-block mb-0">Other Details</h4>
                                        </div>
                                        <div class="card-body doc-boby">
                                            <div class="card shadow-none">
                                                <div class="card-header">
                                                    <h5 class="card-title text-primary mb-0">Social Media Links</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="facebook" class="text-heading">Facebook Url</label>
                                                                        <input type="url" class="form-control form-control-lg"
                                                                               id="facebook" name="facebook" value="{{@$settings->facebook}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 leave-col">
                                                                    <div class="form-group">
                                                                        <label for="instagram" class="text-heading">Instagram Url</label>
                                                                        <input type="url" class="form-control form-control-lg"
                                                                               id="instagram" name="instagram" value="{{@$settings->instagram}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="youtube" class="text-heading">Linkedin Url</label>
                                                                        <input type="url" class="form-control form-control-lg"
                                                                               id="youtube" name="youtube" value="{{@$settings->youtube}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 leave-col">
                                                                    <div class="form-group">
                                                                        <label for="whatsapp" class="text-heading">Whatsapp Number</label>
                                                                        <input type="text" class="form-control form-control-lg"
                                                                               id="whatsapp" name="whatsapp" value="{{@$settings->whatsapp}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="viber" class="text-heading">Viber Number</label>
                                                                        <input type="text" class="form-control form-control-lg"
                                                                               id="viber" name="viber" value="{{@$settings->viber}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow-none">
                                                <div class="card-header">
                                                    <h5 class="card-title text-primary mb-0">Google Analytics</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group mb-0">
                                                                <label>Analytics code</label>
                                                                <textarea class="form-control" rows=4 name="google_analytics" id="google_analytics">{{@$settings->google_analytics}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card shadow-none">
                                                <div class="card-header">
                                                    <h5 class="card-title text-primary mb-0">Google Map</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group mb-0">
                                                                <label>Map Code</label>
                                                                <textarea class="form-control" rows=4 name="google_map" id="google_map">{{@$settings->google_map}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="add-doc text-center">
                                                <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white text-center">{{(empty($settings)) ? "Save Settings":"Update Settings"}}</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- End of Tab content --}}

                                 </form>
                            </div>
                        </div>
                    </div>

                    @if(!empty($settings))

                        <div class="tab-pane tab-pane-parent fade px-0" id="sensitive-info" role="tabpanel"
                         aria-labelledby="sensitive-info-tab">
                        <div class="bg-transparent border-0">
                            <div id="sensitive-info-collapse" class="collapse show collapsible"
                                 aria-labelledby="heading-sensitive-info"
                                 data-parent="#collapse-tabs-accordion">
                                {{--  Tab content--}}
                                {!! Form::open(['url'=>route('setting.imageupdate', @$settings->id),'method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                                <div class="row">
                                    {{-- main logo --}}

{{--                                    <div class="col-lg-6 d-flex">--}}
{{--                                        <div class="card ctm-border-radius shadow-sm company-logo flex-fill grow">--}}
{{--                                            <div class="card-header">--}}
{{--                                                <h4 class="card-title mb-0"> Backend Logo</h4>--}}
{{--                                                <span class="ctm-text-sm">*Please use 849 x 151px of image for main logo</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row justify-content-center">--}}
{{--                                                    <div class="col-12 mb-4">--}}
{{--                                                        <div class="custom-file h-auto">--}}
{{--                                                            <div class="avatar-upload">--}}
{{--                                                                <div class="avatar-edit">--}}
{{--                                                                    <input type="file" class="custom-file-input" hidden id="imageUpload" onchange="loadbasicFile('imageUpload','current-imgupload-img',event)" name="logo">--}}
{{--                                                                    <label for="imageUpload"></label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <img id="current-imgupload-img" src="<?php if(!empty($settings->logo)){ echo '/images/uploads/settings/'.$settings->logo; } else{  echo '/images/uploads/default-placeholder.png'; } ?>"  alt="{{@$settings->website_name}}" class="default-image w-100">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    {{-- white logo and favicon    --}}
                                    <div class="col-lg-6 d-flex">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-6 col-md-6 d-flex">
                                                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">Frontend Logo</h4>

                                                    </div>
                                                    <div class="card-body text-center">

                                                        <div class="row justify-content-center">
                                                            <div class="col-6 mb-4">
                                                                <div class="custom-file h-auto">
                                                                    <div class="avatar-upload">
                                                                        <div class="avatar-edit">
                                                                            <input type="file" class="custom-file-input" hidden="" id="logo_white" onchange="loadbasicFile('logo_white','currentwhite-img',event)" name="logo_white">
                                                                            <label for="logo_white"></label>
                                                                        </div>
                                                                    </div>
                                                                    <img id="currentwhite-img" src="<?php if(!empty($settings->logo_white)){ echo '/images/uploads/settings/'.$settings->logo_white; } else{  echo '/images/uploads/default-placeholder.png'; } ?>" alt="{{@$settings->website_name}}" class="default-image w-100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="ctm-text-sm">*Please use 114 x 32px of image for frontend logo</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 d-flex">
                                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title d-inline-block mb-0">Favicon</h4>
                                            </div>
                                            <div class="card-body">

                                                <div class="row justify-content-center">
                                                    <div class="col-6 mb-4">
                                                        <div class="custom-file h-auto">
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type="file" class="custom-file-input" hidden="" id="favicon" onchange="loadbasicFile('favicon','currentfav-img',event)" name="favicon">
                                                                    <label for="favicon"></label>
                                                                </div>
                                                            </div>
                                                            <img id="currentfav-img" src="<?php if(!empty($settings->favicon)){ echo '/images/uploads/settings/'.$settings->favicon; } else{  echo '/images/uploads/default-placeholder.png'; } ?>" alt="{{@$settings->website_name}}" class="default-image w-100">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-theme ctm-border-radius text-white button-1">Update Images</button>
                                </div>
                                {!! Form::close() !!}



                                {{--  End Tab content--}}
                            </div>
                        </div>
                    </div>

{{--                    <div class="tab-pane tab-pane-parent fade px-0" id="callaction1-info" role="tabpanel"--}}
{{--                     aria-labelledby="callaction1-info-tab">--}}
{{--                    <div class="bg-transparent border-0">--}}
{{--                        <div id="callaction1-info-collapse" class="collapse show collapsible"--}}
{{--                             aria-labelledby="callaction1-sensitive-info"--}}
{{--                             data-parent="#collapse-tabs-accordion">--}}
{{--                            --}}{{--  Tab content--}}

{{--                            {!! Form::open(['url'=>route('callaction.update', @$settings->id),'method'=>'PUT','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="card ctm-border-radius shadow-sm grow flex-fill">--}}
{{--                                        <div class="card-header">--}}
{{--                                            <h4 class="card-title mb-0">--}}
{{--                                                Call to action 1--}}
{{--                                            </h4>--}}
{{--                                        </div>--}}

{{--                                        <div class="card-body">--}}
{{--                                            <div class="form-group mb-3">--}}
{{--                                                <label>Heading <span class="text-muted text-danger">*</span></label>--}}
{{--                                                <input type="text" class="form-control" maxlength="85" name="callaction1_heading" value="{{@$settings->callaction1_heading}}" required>--}}
{{--                                                <input type="hidden" class="form-control" name="call_type" value="call_to_action_1"/>--}}
{{--                                                <input type="hidden" class="form-control" name="action_type" value="{{ (!empty($settings->callaction1_heading)) ? "updated":"added"}}"/>--}}
{{--                                                <div class="invalid-feedback">--}}
{{--                                                    Please enter the call to action 1 heading.--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="form-group mb-3">--}}
{{--                                                <label>Button Text <span class="text-muted text-danger">*</span></label>--}}
{{--                                                <input type="text" class="form-control" maxlength="25" name="callaction1_button" value="{{@$settings->callaction1_button}}" required>--}}
{{--                                                <div class="invalid-feedback">--}}
{{--                                                    Please enter the call to action 1 button text.--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="form-group mb-3">--}}
{{--                                                <label>Button Link <span class="text-muted text-danger">*</span></label>--}}
{{--                                                <input type="text" class="form-control" name="callaction1_button_link" value="{{@$settings->callaction1_button_link}}" required>--}}
{{--                                                <div class="invalid-feedback">--}}
{{--                                                    Please enter the call to action 2 button link.--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="card ctm-border-radius shadow-sm grow flex-fill">--}}
{{--                                        <div class="card-header">--}}
{{--                                            <h4 class="card-title mb-0">--}}
{{--                                                Call to action 1 Image <span class="text-muted text-danger">*</span>--}}
{{--                                            </h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body">--}}

{{--                                            <div class="row justify-content-center">--}}
{{--                                                <div class="col-9 mb-4">--}}
{{--                                                    <div class="custom-file h-auto">--}}
{{--                                                        <div class="avatar-upload">--}}
{{--                                                            <div class="avatar-edit">--}}
{{--                                                                <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="callaction1image" onchange="loadbasicFile('callaction1image','current-callaction1-img',event)" name="callaction1_image" {{ (!empty($settings->callaction1_heading)) ? "":"required"}}>--}}
{{--                                                                <label for="callaction1image"></label>--}}
{{--                                                                <div class="invalid-feedback" style="position: absolute; width: 45px;">--}}
{{--                                                                    Please select a image.--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <img id="current-callaction1-img" src="<?php if(!empty($settings->callaction1_image)){ echo '/images/uploads/settings/'.$settings->callaction1_image; } else{  echo '/images/uploads/default-placeholder.png'; } ?>" alt="call 1 image" class="w-100 current-img">--}}
{{--                                                    </div>--}}
{{--                                                    <span class="ctm-text-sm">*use image minimum of 1920 x 950px for call to action 1 section</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="text-center">--}}
{{--                                                <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" >{{ (!empty($settings->callaction1_heading)) ? "Update Call to action 1 Details":"Add Call to action 1 Details"}}</button>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            {!! Form::close() !!}--}}

{{--                            --}}{{--  End Tab content--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                    <div class="tab-pane tab-pane-parent fade px-0" id="callaction2-info" role="tabpanel"--}}
{{--                         aria-labelledby="callaction2-info-tab">--}}
{{--                        <div class="bg-transparent border-0">--}}
{{--                            <div id="callaction1-info-collapse" class="collapse show collapsible"--}}
{{--                                 aria-labelledby="callaction1-sensitive-info"--}}
{{--                                 data-parent="#collapse-tabs-accordion">--}}
{{--                                --}}{{--  Tab content--}}

{{--                                {!! Form::open(['url'=>route('callaction.update', @$settings->id),'method'=>'PUT','class'=>'needs-validation','novalidate'=>'']) !!}--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="card ctm-border-radius shadow-sm grow flex-fill">--}}
{{--                                            <div class="card-header">--}}
{{--                                                <h4 class="card-title mb-0">--}}
{{--                                                    Call to action 2--}}
{{--                                                </h4>--}}
{{--                                            </div>--}}

{{--                                            <div class="card-body">--}}
{{--                                                <div class="form-group mb-3">--}}
{{--                                                    <label>Heading <span class="text-muted text-danger">*</span></label>--}}
{{--                                                    <input type="text" class="form-control" maxlength="85" name="callaction2_heading" value="{{@$settings->callaction2_heading}}" required>--}}
{{--                                                    <input type="hidden" class="form-control" name="call_type" value="call_to_action_2"/>--}}
{{--                                                    <input type="hidden" class="form-control" name="action_type" value="{{ (!empty($settings->callaction2_heading)) ? "updated":"added"}}"/>--}}
{{--                                                    <div class="invalid-feedback">--}}
{{--                                                        Please enter the call to action 2 heading.--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group mb-3">--}}
{{--                                                    <label>Sub Heading <span class="text-muted text-danger">*</span></label>--}}
{{--                                                    <input type="text" class="form-control" maxlength="66" name="callaction2_subheading" value="{{@$settings->callaction2_subheading}}" required>--}}
{{--                                                    <div class="invalid-feedback">--}}
{{--                                                        Please enter the call to action 2 sub heading.--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group mb-3">--}}
{{--                                                    <label>Button Text <span class="text-muted text-danger">*</span></label>--}}
{{--                                                    <input type="text" class="form-control" maxlength="25" name="callaction2_button" value="{{@$settings->callaction2_button}}" required>--}}
{{--                                                    <div class="invalid-feedback">--}}
{{--                                                        Please enter the call to action 2 button text.--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group mb-3">--}}
{{--                                                    <label>Button Link <span class="text-muted text-danger">*</span></label>--}}
{{--                                                    <input type="text" class="form-control" name="callaction2_button_link" value="{{@$settings->callaction2_button_link}}" required>--}}
{{--                                                    <div class="invalid-feedback">--}}
{{--                                                        Please enter the call to action 2 button link.--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="text-center">--}}
{{--                                                    <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" >{{ (!empty($settings->callaction2_heading)) ? "Update Call to action 2 Details":"Add Call to action 2 Details"}}</button>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}



{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                {!! Form::close() !!}--}}

{{--                                --}}{{--  End Tab content--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    @endif

            </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-sm" id="editAwards">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateawards','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Update Slider</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Title </label>
                                <input type="text" class="form-control" name="name" id="award_name">
                                <div class="invalid-feedback">
                                    Please enter the title.
                                </div>
                            </div>

                            <div class="row justify-content-center">
                        <div class="col-9 mb-4">
                            <div class="custom-file h-auto">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" class="custom-file-input" hidden id="award-edit-image" onchange="loadawardeditFile(event)" name="image" required>
                                        <label for="award-edit-image"></label>
                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                            Please select a image.
                                        </div>
                                    </div>
                                </div>
                                <img id="edit-award-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="award_image_placeholder" class="w-100 current-img">
                            </div>
                            <span class="ctm-text-sm">*use image minimum of 200 x 200px for award</span>
                        </div>

                    </div>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Update</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>


@endsection

@section('js')

    <script type="text/javascript">

        var loadFile = function(event) {
            var image = document.getElementById('image');
            var replacement = document.getElementById('current-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        var loadWhite = function(event) {
            var image = document.getElementById('logo_white');
            var replacement = document.getElementById('currentwhite-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        var loadFav = function(event) {
            var image = document.getElementById('favicon');
            var replacement = document.getElementById('currentfav-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        var loadawardFile = function(event) {
                var image = document.getElementById('award-image');
                var replacement = document.getElementById('current-award-img');
                replacement.src = URL.createObjectURL(event.target.files[0]);
            };

        var loadawardeditFile = function(event) {
            var image = document.getElementById('award-edit-image');
            var replacement = document.getElementById('edit-award-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadwelcomeFile = function(event) {
            var image = document.getElementById('introimage');
            var replacement = document.getElementById('current-intro-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).ready(function () {
            $('#awards-index').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });
        });

        //necessary for switching tabs
        $(document).on('click','li.list-group-item a', function (e) {
            var t = $(this);
            t.parents('.list-group').find('li').removeClass('active');
            t.parents('.list-group').find('li').removeClass('button-5');
            t.parents('.list-group').find('li').addClass('button-6');
            t.parentsUntil('.list-group', 'li').addClass('active');
            t.parentsUntil('.list-group', 'li').addClass('button-5');
            t.parentsUntil('.list-group', 'li').removeClass('button-6');

            //retrieve the href value of the active tab link
            var id = $(this).attr('href');
            //remove the class show from tabs which is not active and add class fade
            $(".tab-pane:not(.active)").addClass('fade')
            $(".tab-pane:not(.active)").removeClass('show')
            if($(id).hasClass('active')){
                //if the tab has active class, remove the class fade
                $(id).removeClass('fade');
            }
        });

        $(document).on('click','.action-award-edit', function (e) {
            e.preventDefault();
            var url =  $(this).attr('hrm-edit-action');
            // console.log(action)
            var id=$(this).attr('id');
            var action = $(this).attr('hrm-update-action');

            $.ajax({
                url: $(this).attr('hrm-edit-action'),
                type: "GET",
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    // $('#id').val(data.id);
                    $("#editAwards").modal("toggle");
                    if(dataResult.name !== null){
                        $('#award_name').attr('value',dataResult.name);
                    }
                    $('#edit-award-img').attr("src",'/images/uploads/awards/'+dataResult.image);
                    $('.updateawards').attr('action',action);

                },
                error: function(error){
                    console.log(error)
                }
            });
        });

        $(document).on('click','.action-award-delete', function (e) {
            e.preventDefault();
            var form = $('#deleted-form');
            var action = $(this).attr('hrm-delete-per-action');
            form.attr('action',$(this).attr('hrm-delete-per-action'));
            $url = form.attr('action');
            var form_data = form.serialize();
            // $('.deleterole').attr('action',action);
            swal({
                title: "Are You Sure?",
                text: "You will not be able to recover this",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(){
                $.post( $url, form_data)
                    .done(function(response) {
                        swal("Deleted!", "Award detaol deleted successfully", "success");
                        $(response).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);


                    })
                    .fail(function(response){
                        console.log(response)

                    });
            });

        });

    </script>
@endsection
