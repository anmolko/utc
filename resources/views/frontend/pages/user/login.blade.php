@extends('frontend.layouts.master')
@section('title') User Login Page @endsection
@section('styles')
    <style>
        #flat-map .gm-map .map iframe {
            width: 100%;
            height: 333px;
            border-radius: 12px;
        }

        #form-contact .form-box textarea {
            height: 140px;
        }

        #form-contact .form-box {
            margin-bottom: 15px;
        }

        #flat-map {
            width: 100%;
            height: 333px;
        }

        .align-middle{
            margin: auto;
            width: 50%;
        }
    </style>
@endsection

@section('breadcrumb')

    <!-- BREADCRUMBS SETCTION START -->
    <section class="flat-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs">
                        <li class="trail-item">
                            <a href="/" title="">Home</a>
                            <span><img src="{{asset('assets/frontend/images/icons/arrow-right.png')}}" alt=""></span>
                        </li>

                        <li class="trail-end">
                            <a href="#" title="">User Login</a>
                        </li>
                    </ul><!-- /.breacrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-breadcrumb -->
    <!-- BREADCRUMBS SETCTION END -->
@endsection


@section('content')

    <section class="flat-contact style2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-middle">
                    <div class="form-contact left">
                        <div class="form-contact-header">
                            <h3>Choose your Login</h3>

                        </div><!-- /.form-contact-header -->

                        <div class="form-contact-content">
                            <form id="form-contact" action="{{route('front-user.login')}}" id="form-contact" method="post">
                                @csrf
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <strong class="sent-success">{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <strong class="error-sent">{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('warning'))
                                    <div class="alert alert-danger alert-block">
                                        <strong class="error-sent">{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('email'))
                                    <div class="alert alert-success alert-block">
                                        <strong class="sent-success">{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('password'))
                                    <div class="alert alert-danger alert-block">
                                        <strong class="error-sent">{{ $message }}</strong>
                                    </div>
                                @endif
                                <ul class="app-list">
                                    <li class="app-store">
                                        <a href="{{route('google.redirect')}}" title="">
                                            <div class="img social-whatsapp">
                                                <i class="fab fa-google" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h4>Google</h4>
                                                <p> Login </p>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- /.app-store -->
                                    <li class="google-play">
                                        <a href="{{route('facebook.redirect')}}" title="">
                                            <div class="img social-whatsapp">
                                                <i class="fab fa-facebook" aria-hidden="true"></i>

                                            </div>
                                            <div class="text">
                                                <h4>Facebook</h4>
                                                <p> Login </p>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- /.google-play -->
                                </ul>

                            </form><!-- /#form-contact -->

                        </div><!-- /.form-contact-content -->
                    </div><!-- /.form-contact left -->
                </div><!-- /.col-md-7 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-contact style2 -->

    <!-- End page content -->

@endsection
