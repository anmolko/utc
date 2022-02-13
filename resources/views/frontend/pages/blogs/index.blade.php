@extends('frontend.layouts.master')
@section('title') Blog  @endsection
@section('breadcrumb')

   <!-- BREADCRUMBS SETCTION START -->
   <div class="breadcrumbs-section plr-200 mb-80 section">
            <div class="{{($blog_banner == null) ? 'breadcrumbs':''}} overlay-bg" @if($blog_banner !== null) style="background: #f6f6f6 url('{{asset('/images/uploads/banners/'.@$blog_banner->image)}}') no-repeat scroll center center;" @endif>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Latest Posts</h1>

                                <ol class="breadcrumb">
                                    <li><a href="/">Home</a></li>
                                    <li class="active">Blog</li>
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

        <!-- BLOG SECTION START -->
        <div class="blog-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 left-container">

                        <div class="row">
                            <!-- blog-item start -->
                            @if(count($allPosts) > 0)
                                @foreach($allPosts as $post)

                                    <div class="col-md-6">
                                        <div class="blog-item-2">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="blog-image">
                                                        <a href="{{route('blog.single',@$post->slug)}}"><img src="<?php if(@$post->thumb_image){?>{{asset('/images/uploads/blog/thumb/'.@$post->thumb_image)}}<?php }?>" alt="{{@$post->slug}}"></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="blog-desc">
                                                        <h5 class="blog-title-2"><a href="{{route('blog.single',@$post->slug)}}">{{ucwords(@$post->title)}}</a></h5>
                                                        <p>{{ucwords(Str::limit(@$post->excerpt,100,' ...'))}}</p>
                                                        <div class="read-more">
                                                            <a href="{{route('blog.single',$post->slug)}}">Read more</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <!-- blog-item end -->
                        </div>

                        <div class="mb-80">
                            <div class="row">
                                <div class="col-lg-12">
                                {{ $allPosts->links('vendor.pagination.default') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar -->
                    <div class="col-lg-3 right-container">
                        <div id="sticky-anchor"></div>
                        <div class="sidebar">
                            @include('frontend.pages.blogs.sidebar')

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BLOG SECTION END -->

    </div>
    <!-- End page content -->

@endsection
