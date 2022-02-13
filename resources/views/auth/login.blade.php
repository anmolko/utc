<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else AM Group @endif">
    <meta name="author" content="AM Group">
    <link rel="canonical" href="https://www.amgroup.com.np/" />
    <title>Login - @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else AM Group @endif </title>


    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/lnr-icon.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
    <link rel="icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }else{ echo "images/favicon.ico"; }?>">


<!--[if lt IE 9]>
            <script src="{{asset('assets/backend/js/html5shiv.min.js')}}"></script>
            <script src="{{asset('assets/backend/js/respond.min.js')}}"></script>
            <![endif]-->
</head>
<body>

<div id="loader-wrapper">
    <div class="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>

<div class="inner-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox shadow-sm grow">
                <div class="login-left">
                    <img class="img-fluid" src="<?php if(@$setting_data->logo_white){?>{{asset('/images/uploads/settings/'.@$setting_data->logo_white)}}<?php }?>" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>{{ __('Login') }}</h1>
                        <p class="account-subtitle">Access to our dashboard</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <b class="alert-link">{{session('error')}}</b>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
                            </div>
                        </form>

                        {{--                        <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>--}}
                        {{--                        <div class="login-or">--}}
                        {{--                            <span class="or-line"></span>--}}
                        {{--                            <span class="span-or">or</span>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="social-login">--}}
                        {{--                            <span>Login with</span>--}}
                        {{--                            <a href="javascript:void(0)" class="facebook"><i class="fa fa-facebook"></i></a><a href="javascript:void(0)" class="google"><i class="fa fa-google"></i></a>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/backend/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('assets/backend/js/popper.min.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/backend/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/backend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

<script src="{{asset('assets/backend/js/script.js')}}"></script>
</body>

</html>
