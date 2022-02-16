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



    <div class="col-xl-9 col-lg-8 col-md-12">

        <div class="card shadow-sm ctm-border-radius">
            <div class="card-body align-center">
                <ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item mr-2">
                        <a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">General Information</a>
                    </li>
                    @if(!empty($settings))
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> Images Information </a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>


        <div class="tab-content" id="pills-tabContent">
            {{--general tab--}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                @if(!empty($settings))
                    {!! Form::open(['url'=>route('setting.update', @$settings->id),'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                @else

                    <form action="{{ route('setting.store') }}" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card ctm-border-radius shadow-sm flex-fill">
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
                                <div class="card ctm-border-radius shadow-sm flex-fill">
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

                        <div class="card ctm-border-radius shadow-sm">
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

            @if(!empty($settings))

                {{--Image tab--}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    {!! Form::open(['url'=>route('setting.imageupdate', @$settings->id),'method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                    <div class="row">
                        {{-- main logo --}}

{{--                        <div class="col-lg-6 d-flex">--}}
{{--                            <div class="card ctm-border-radius shadow-sm company-logo flex-fill">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h4 class="card-title mb-0"> Backend Logo</h4>--}}
{{--                                    <span class="ctm-text-sm">*Please use 849 x 151px of image for main logo</span>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row justify-content-center">--}}
{{--                                        <div class="col-12 mb-4">--}}
{{--                                            <div class="custom-file h-auto">--}}
{{--                                                <div class="avatar-upload">--}}
{{--                                                    <div class="avatar-edit">--}}
{{--                                                        <input type="file" class="custom-file-input" hidden id="logoUpload" onchange="loadbasicFile('logoUpload','current-logo-img',event)" name="logo">--}}
{{--                                                        <label for="logoUpload"></label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <img id="current-logo-img" src="<?php if(!empty($settings->logo)){ echo '/images/uploads/settings/'.$settings->logo; } else{  echo '/images/uploads/default-placeholder.png'; } ?>"  alt="{{@$settings->website_name}}" class="default-image w-100">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--    --}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        {{-- white logo and favicon    --}}
                        <div class="col-lg-6 d-flex">
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-md-6 d-flex">
                                    <div class="card ctm-border-radius shadow-sm flex-fill">
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
                            <div class="card ctm-border-radius shadow-sm flex-fill">
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
                </div>

            @endif

        </div>
    </div>

@endsection

@section('js')

    <script type="text/javascript">

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
