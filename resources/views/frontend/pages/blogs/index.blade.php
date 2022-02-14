@extends('frontend.layouts.master')
@section('title') Blog  @endsection
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
                                <a href="#" title="">Blog</a>
                            </li>
                        </ul><!-- /.breacrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-breadcrumb -->
    <!-- BREADCRUMBS SETCTION END -->
@endsection

@section('content')

    <!-- Start page content -->
    <section class="main-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="post-wrap">
                        @if(count($allPosts) > 0)
                            @foreach($allPosts as $post)

                                <article class="main-post style1">
                                    <div class="featured-post">
                                        <a href="{{route('blog.single',@$post->slug)}}" title="">
                                            <img src="<?php if(@$post->thumb_image){?>{{asset('/images/uploads/blog/thumb/'.@$post->thumb_image)}}<?php }?>" alt="{{@$post->slug}}">
                                        </a>
                                    </div><!-- /.featured-post -->
                                    <div class="content-post">
                                        <h3 class="title-post">
                                            <a href="{{route('blog.single',@$post->slug)}}" title="">{{ucwords(@$post->title)}}</a>
                                        </h3>
                                        <ul class="meta-post">
                                            <li class="date">
                                                <a href="#" title="">
                                                    {{date('M j, Y',strtotime(@$post->created_at))}}
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="entry-post">
                                            <p>{{ucwords(Str::limit(@$post->excerpt,100,' ...'))}}</p>
                                            <div class="more-link">
                                                <a href="{{route('blog.single',$post->slug)}}" title="">Read More
                                                    <span>
                                                        <img src="{{asset('assets/frontend/images/icons/right-2.png')}}" alt="">
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article><!-- /.main-post style1 -->
                            @endforeach
                        @endif
                    </div><!-- /.post-wrap -->
                    <div class="blog-pagination style2">
                        {{ $allPosts->links('vendor.pagination.default') }}

                        <ul class="flat-pagination">
                            <li class="prev">
                                <a href="#" title="">
                                    <img src="images/icons/left-1.png" alt="">Prev Page
                                </a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect" title="">01</a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect" title="">02</a>
                            </li>
                            <li class="active">
                                <a href="#" class="waves-effect" title="">03</a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect" title="">04</a>
                            </li>
                            <li class="next">
                                <a href="#" title="">
                                    Next Page<img src="images/icons/right-1.png" alt="">
                                </a>
                            </li>
                        </ul><!-- /.flat-pagination -->
                    </div><!-- /.blog-pagination style2 -->
                </div><!-- /.col-md-8 col-lg-9 -->
                <div class="col-md-4 col-lg-3">
                    <div class="sidebar left">
                        @include('frontend.pages.blogs.sidebar')
                      
                    </div><!-- /.sidebar left -->
                </div><!-- /.col-md-4 col-lg-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.main-blog -->

    <!-- End page content -->

@endsection
