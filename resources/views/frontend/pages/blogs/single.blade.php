@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleBlog->title)}}  @endsection
@section('breadcrumb')

   <!-- BREADCRUMBS SETCTION START -->
   <div class="breadcrumbs-section plr-200 mb-80 section">
            <div class="{{($blog_banner == null) ? 'breadcrumbs':''}} overlay-bg" @if($blog_banner !== null) style="background: #f6f6f6 url('{{asset('/images/uploads/banners/'.@$blog_banner->image)}}') no-repeat scroll center center;" @endif>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">{{ucwords(@$singleBlog->title)}}</h1>

                                <ol class="breadcrumb">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{url('/blog')}}">Blog</a></li>
                                    <li class="active">{{ucwords(@$singleBlog->title)}}</li>
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
        <section id="page-content" class="page-wrapper section">

            <!-- BLOG SECTION START -->
            <div class="blog-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 left-container">
                            <div class="blog-details-area">
                                <!-- blog-details-photo -->
                                <div class="blog-details-photo bg-img-1 p-20 mb-30">
                                    <img src="{{ asset('/images/uploads/blog/'.@$singleBlog->image) }}" alt="">
                                    <div class="today-date bg-img-1">
                                        <span class="meta-date">{{date('j',strtotime(@$singleBlog->created_at))}}</span>
                                        <span class="meta-month">{{date('M',strtotime(@$singleBlog->created_at))}}</span>
                                    </div>
                                </div>

                                <!-- blog-details-title -->
                                <h3 class="blog-details-title mb-30">{{ucwords(@$singleBlog->title)}}</h3>
                                <!-- blog-description -->
                                <div class="blog-description mb-60">
                                {!! @$singleBlog->description !!}

                                </div>
                                <!-- blog-share-tags -->
                                <div class="blog-share-tags box-shadow clearfix mb-60">
                                    <div class="blog-share f-left">
                                        <p class="share-tags-title f-left">share</p>
                                        <ul class="footer-social f-left">
                                            <li>
                                                <a class="facebook" href="#" onclick='fbShare("{{route('blog.single',$singleBlog->slug)}}")' title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="whatsapp" href="#" onclick='whatsappShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")' title="Whats App"><i class="zmdi zmdi-whatsapp"></i></a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="#" onclick='twitShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")' title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="blog-tags f-right">
                                        <p class="share-tags-title f-left">Category</p>
                                        <ul class="blog-tags-list f-left">
                                            <li><a href="{{route('blog.category',$singleBlog->category->slug)}}">{{ucwords($singleBlog->category->name)}}</a></li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
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

        </section>
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
