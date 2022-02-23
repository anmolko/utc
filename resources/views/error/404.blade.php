@extends('frontend.layouts.master')
@section('title') 404 Page Not Found  @endsection
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
                                <a href="#" title="">Page Not Found</a>
                            </li>
                        </ul><!-- /.breacrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-breadcrumb -->
        <!-- BREADCRUMBS SETCTION END -->
@endsection

@section('content') 

<section class="flat-error">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                </div><!-- /.col-md-2 -->
                <div class="col-md-8">
                    <div class="wrap-error center">
                        <div class="header-error">
                            <img src="/img/others/error.jpg" alt="">
                            <h1>Sorry but we couldn’t find the page you are looking for.</h1>
                            <p>Please check to make sure you’ve typed the URL correctly. </p>
                        </div><!-- /.header-error -->
                        
                    </div><!-- /.wrap-error -->
                </div><!-- /.col-md-8 -->
                <div class="col-md-2">
                </div><!-- /.col-md-2 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-error -->

@endsection
