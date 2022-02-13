@extends('frontend.layouts.master')
@section('title') 404 Page Not Found  @endsection
@section('breadcrumb') 

   <!-- BREADCRUMBS SETCTION START -->
   <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">404</h1>
                            
                            <ol class="breadcrumb">
                                <li><a href="/">Home</a></li>
                                <li class="active">Page Not Found</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SETCTION END -->
@endsection

@section('content') 

    <!-- Start page content -->
    <div id="page-content" class="page-wrapper section">

    <!-- ERROR SECTION START -->
    <div class="error-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-404 box-shadow">
                        <img src="/img/others/error.jpg" alt="">
                        <div class="go-to-btn btn-hover-2">
                            <a href="/">go to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ERROR SECTION END -->             

    </div>
    <!-- End page content -->
@endsection
