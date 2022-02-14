@extends('frontend.layouts.master')
@section('title') Blog  @endsection
@section('styles')
<style>
    ul.product-list > li {
        display: inline-block;
    }
    ul.product-list li .img-product {
        width: 100px;
        height: 60px;
    }
    ul.product-list li .img-product img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    ul.product-list li .info-product .price .regular{
        text-decoration: none;
    }

    ul.product-list li .info-product .name {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        font-size: 14px;
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
