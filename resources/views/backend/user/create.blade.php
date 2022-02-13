@extends('backend.layouts.master')
@section('title') Create User @endsection
@section('content')

<div class="col-xl-9 col-lg-8  col-md-12">

<div class="col-xl-12 col-lg-12 col-md-12">
    {!! Form::open(['route' => 'user.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

    <div class="row">
        <div class="col-md-6">
            <div class="card ctm-border-radius shadow-sm grow flex-fill">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        User Details
                    </h4>
                </div>

                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Full Name <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Please enter your fullname
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email <span class="text-muted text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        <div class="invalid-feedback">
                            Please enter your email.
                        </div>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                            <label>Phone Number <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control"
                                id="contact" name="contact"  required>
                            <div class="invalid-feedback">
                                    Please enter phone number.
                            </div>
                            @if($errors->has('contact'))
                            <div class="invalid-feedback">
                                {{$errors->first('contact')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Password <span class="text-muted text-danger">*</span></label>

                            <label for="password" class="text-heading"></label>
                            <input type="password" class="form-control"
                                id="password" name="password"  required>
                            <div class="invalid-feedback">
                                    Please enter password.
                            </div>
                            @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{$errors->first('password')}}
                            </div>
                            @endif
                        </div>


                        <div class="form-group mb-3">
                            <label>Gender <span class="text-muted text-danger">*</span></label>
                            <select class="form-control  shadow-none " name="gender" required>
                                <option value disabled selected> Select Gender</option>
                                <option value="male"> Male</option>
                                <option value="female"> Female</option>
                                <option value="others"> Others</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a gender.
                            </div>
                            @if($errors->has('gender'))
                            <div class="invalid-feedback">
                                {{$errors->first('gender')}}
                            </div>
                            @endif
                        </div>

              
                </div>


            </div>
        </div>
        <div class="col-md-6">
            <div class="card ctm-border-radius shadow-sm grow flex-fill">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        User Details <span class="text-muted text-danger">*</span>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-9 mb-4">
                            <div class="custom-file h-auto">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadFile(event)" name="image">
                                        <label for="imageUpload"></label>
                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                            Please select a image.
                                        </div>
                                        @if($errors->has('image'))
                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                            {{$errors->first('image')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <img id="current-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="profile_image" class="w-100 current-img">
                            </div>
                            <span class="ctm-text-sm">*use image minimum of 300 x 300px for profile</span>
                        </div>

                    </div>

                    <div class="form-group mb-3">
                        <label>User Type <span class="text-muted text-danger">*</span></label>
                        <select class="form-control" name="user_type" required>
                            <option value disabled selected> Select User Type</option>
                                <option value="general"> General</option>
                                <option value="admin"> Admin</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a user type.
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" value="submit">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
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

        @if($errors->has('image'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.error("{{ $errors->first('image') }}");
    @endif


    @if($errors->has('email'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.error("{{ $errors->first('email') }}");
    @endif

    </script>

@endsection
