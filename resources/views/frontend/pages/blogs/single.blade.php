@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleBlog->title)}}  @endsection
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

    article.main-post.single .content-post .social-single{
        margin-bottom: 26px;
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
                            <li class="trail-item">
									<a href="{{url('/blog')}}" title="">Blog</a>
                                    <span><img src="{{asset('assets/frontend/images/icons/arrow-right.png')}}" alt=""></span>
								</li>
                            <li class="trail-end">
                                <a href="#" title="">{{ucwords(@$singleBlog->title)}}</a>
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
                            <article class="main-post single">
                                <div class="featured-post">
                                    <a href="" title="">
                                        <img src="{{ asset('/images/uploads/blog/'.@$singleBlog->image) }}" alt="">
                                    </a>
                                </div><!-- /.featured-post -->
                                <div class="divider25"></div>
                                <div class="content-post">
                                    <h3 class="title-post">
                                        <a href="#" title="">{{ucwords(@$singleBlog->title)}}</a>
                                    </h3>
                                    <ul class="meta-post">
                                        <li class="comment"><a href="{{route('blog.category',$singleBlog->category->slug)}}">{{ucwords($singleBlog->category->name)}}</a></li>

                                        <li class="date">
                                            <a href="#" title="">
                                                {{date('F j, Y',strtotime(@$singleBlog->created_at))}}
                                            </a>
                                        </li>
                                    </ul><!-- /.meta-post -->
                                    <div class="entry-post">
                                        {!! @$singleBlog->description !!}
                                    </div><!-- /.entry-post -->
                                    <div class="social-single">
                                        <span>SHARE</span>
                                        <ul class="social-list style2">
                                            <li>
                                                <a href="#" onclick='fbShare("{{route('blog.single',$singleBlog->slug)}}")' title="">
                                                    <i class="fab fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick='twitShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")' title="">
                                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#" onclick='whatsappShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")' title="">
                                                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                          
                                        </ul>
                                    </div><!-- /.social-single -->
                                </div><!-- /.content-post -->
                            </article><!-- /.main-post single -->
                        </div><!-- /.post-wrap -->
                        
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
@section('js')
<script>
function fbShare(url) {
  window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
}
function twitShare(url, title) {
    window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
}
function whatsappShare(url, title) {
    message = title + " " + url;
    window.open("https://api.whatsapp.com/send?text=" + message);
}

</script>
@endsection
