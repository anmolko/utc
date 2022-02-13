@extends('backend.layouts.master')
@section('title') Profile @endsection
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

          #current-img{
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
                    <li class="list-group-item text-center button-6">
                        <a class="in-active"
                           id="sensitive-info-tab" data-toggle="pill" data-number="" href="#sensitive-info" role="tab"
                           aria-controls="media" aria-selected="false">
                            Sensitive Information</a>
                    </li>
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

                                    <div class="row">
                                        {{--general information display fields--}}
                                        <div class="col-xl-6 col-lg-6 col-md-6 d-flex">
                                            <div class="card flex-fill ctm-border-radius shadow-sm grow">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">Basic Information</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <p class="card-text mb-3"><span class="text-primary">Name :</span><b> {{ucfirst($user->name)}}</b></p>
                                                    <p class="card-text mb-3"><span class="text-primary">Email :</span><b> {{$user->email}}</b></p>
                                                    <p class="card-text mb-3"><span class="text-primary">Contact :</span> {{$user->contact}}</p>
                                                    <p class="card-text mb-3"><span class="text-primary">Gender : </span> {{ucfirst($user->gender)}}</p>
                                                    <p class="card-text mb-3"><span class="text-primary">Status :</span> {{($user->status == 1) ? "Active":"De-active"}}</p>
                                                    <p class="card-text mb-3"><span class="text-primary">User Type:</span> {{ ucfirst($user->user_type)}}</p>
                                                    <p class="card-text mb-3"><span class="text-primary">Joined Date : </span> {{\Carbon\Carbon::parse($user->created_at)->isoFormat('MMMM Do, YYYY')}}</p>
                                                    <a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm" data-toggle="modal" data-target="#edit_basicInformation"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        {{--profile image field--}}
                                        <div class="col-xl-6 col-lg-6 col-md-6 d-flex">
                                            <div class="card ctm-border-radius shadow-sm company-logo flex-fill grow">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">{{ucfirst($user->name)}}'s Profile Image</h4>
                                                </div>
                                                <div class="card-body">
                                                    {!! Form::open(['method'=>'put','route'=>['user.imageupdate', $user->id],'enctype'=>'multipart/form-data','class'=>'needs-validation','novalidate'=>'']) !!}

                                                    <div class="row justify-content-center">
                                                            <div class="col-9 mb-4">
                                                                <div class="custom-file h-auto">
                                                                    <div class="avatar-upload">
                                                                            <div class="avatar-edit">
                                                                                <input type="file" class="custom-file-input" hidden id="imageUpload" onchange="loadFile(event)" name="image">
                                                                                <label for="imageUpload"></label>
                                                                            </div>
                                                                    </div>
                                                                    <img id="current-img" src="<?php if(!empty($user->image)){ echo '/images/uploads/profiles/'.$user->image; } else{  echo '/images/uploads/profiles/default-profile.png'; } ?>" alt="{{$user->name}}" class="w-100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-theme ctm-border-radius text-white button-1"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                        </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- End of Tab content --}}

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane tab-pane-parent fade px-0" id="sensitive-info" role="tabpanel"
                             aria-labelledby="sensitive-info-tab">
                            <div class="bg-transparent border-0">
                                <div id="sensitive-info-collapse" class="collapse show collapsible"
                                     aria-labelledby="heading-sensitive-info"
                                     data-parent="#collapse-tabs-accordion">
                                {{--  Tab content--}}

                                    <div class="row">
                                        <div class="col-lg-6 d-flex">
                                            <div class="card ctm-border-radius shadow-sm grow flex-fill">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">Change Password</h4>
                                                    <span class="ctm-text-sm">Your password needs to be at least 8 characters long.</span>
                                                </div>
                                                <div class="card-body">
                                                    {!! Form::open(['method'=>'put','route'=>['user.password'],'enctype'=>'multipart/form-data','class'=>'needs-validation','novalidate'=>'']) !!}

                                                    <div class="form-group">
                                                        <label>Current Password <span class="text-muted text-danger">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Current Password" name="current_password" required>
                                                        <div class="invalid-feedback">
                                                            Please enter your current password.
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password <span class="text-muted text-danger">*</span></label>
                                                        <input type="password" class="form-control" placeholder="New Password" id="password" name="password" required>
                                                        <div class="invalid-feedback">
                                                            Please enter your new password.
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Repeat Password <span class="text-muted text-danger">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Repeat Password" name="repeated_password" id="repeated_password" required>
                                                        <span class="ctm-text-sm" id="wrongpassword"></span>
                                                        <div class="invalid-feedback">
                                                            Please repeat your new password.
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" id="changepswBtn" class="btn btn-theme button-1 ctm-border-radius text-white text-center">Change My Password</button>
                                                    </div>
                                                    {!! Form::close() !!}

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{--  End Tab content--}}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</div>

<div class="modal fade" id="edit_basicInformation">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title mb-3">Edit General Information</h4>
                {!! Form::open(['method'=>'put','route'=>['user.update', $user->id],'enctype'=>'multipart/form-data','class'=>'needs-validation','novalidate'=>'']) !!}
                    <div class="form-group mb-3">
                        <label>Name <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                        <div class="invalid-feedback">
                            Please enter your name.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{$user->email}}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label>Contact</label>
                        <input type="text" class="form-control" name="contact" value="{{$user->contact}}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Gender</label>
                        <select class="form-control select" name="gender">
                            <option disabled>Select Gender</option>
                            <option value="male" {{($user->gender =="male") ? "selected":""}}>Male</option>
                            <option value="female" {{($user->gender =="female") ? "selected":""}}>Female</option>
                            <option value="others" {{($user->gender =="others") ? "selected":""}}>Others</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Update</button>
                {!! Form::close() !!}
            </div>
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

        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#repeated_password").val();
            if (password !== confirmPassword) {
                $("#wrongpassword").html("Passwords do not match!");
                $("#wrongpassword").addClass('text-danger');
                $("#wrongpassword").removeClass('text-success');
                $('#changepswBtn').prop('disabled',true);
            } else {
                $("#wrongpassword").removeClass('text-danger');
                $("#wrongpassword").addClass('text-success');
                $("#wrongpassword").html("Passwords match.");
                $('#changepswBtn').removeAttr('disabled');
            }
        }

        $(document).ready(function () {
            $("#repeated_password").keyup(checkPasswordMatch);
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

    </script>
@endsection
