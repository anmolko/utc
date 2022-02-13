@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('slider') 

@if(count($sliders) > 0)

    <!-- START SLIDER AREA -->
    <div class="slider-area  slider-2 section">
        <div class="bend niceties preview-2">
            <div id="nivoslider-2" class="slides">  
                @foreach(@$sliders as $slider)
                    <img src="/img/slider/slider-2/slider-1.jpg" alt="" title="#slider-direction-{{@$loop->iteration}}"  />
                @endforeach
                
            </div>

            @foreach(@$sliders as $slider)

                @if(@$loop->even)
                    <!-- ===== direction 1 ===== -->
                    <div id="slider-direction-{{@$loop->iteration}}" class="slider-direction">
                        <div class="slider-content-1">
                            <div class="title-container">
                                
                                <div class="wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                                    <h1 class="slider2-title-2">{{ucwords(@$slider->heading)}}</h1>
                                </div>
                                <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                                    <h2 class="slider2-title-3">{{ucwords(@$slider->subheading)}}</h2>
                                </div>
                                <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                                    <p class="slider2-title-4">{{ucwords(@$slider->description)}}</p>
                                </div>
                                <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                                    <a href="{{@$slider->button_link}}" class="button extra-small button-black">
                                        <span class="text-uppercase">View More</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- layer 1 -->
                        <div class="slider-content-1-image">

                            <div class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                <div class="layer-1-1">
                                    <img src="{{ asset('/images/uploads/sliders/'.$slider->image) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- ===== direction 2 ===== -->
                    <div id="slider-direction-{{@$loop->iteration}}" class="slider-direction">
                        <div class="slider-content-2">
                            <div class="title-container">

                                <div class="wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                                    <h1 class="slider2-title-2">{{ucwords(@$slider->heading)}}</h1>
                                </div>
                                <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                                    <h2 class="slider2-title-3">{{ucwords(@$slider->subheading)}}</h2>
                                </div>
                                <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                                    <p class="slider2-title-4">{{ucwords(@$slider->description)}}</p>
                                </div>
                                <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                                    <a href="{{@$slider->button_link}}" class="button extra-small button-black">
                                        <span class="text-uppercase">View More</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- layer 1 -->
                        <div class="wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="layer-1-1 layer-2-1">
                                <img src="{{ asset('/images/uploads/sliders/'.$slider->image) }}" alt="" />
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

         

            
        </div>
        
    </div>
    <!-- END SLIDER AREA -->
@endif

@endsection

@section('content')
 <!-- START PAGE CONTENT -->
 <section id="page-content" class="page-wrapper section">

    <!-- BANNER-SECTION START -->
    <div class="banner-section ptb-60">
        <div class="container">
            <div class="row">
                <!-- banner-item start -->
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item banner-2">
                        <div class="banner-img">
                            <a href="#"><img src="img/banner/2.jpg" alt=""></a>
                        </div>
                        <h3 class="banner-title-2"><a href="#">sony smartphone</a></h3>
                        <h3 class="pro-price">$ 869.00</h3>
                        <div class="banner-button">
                            <a href="#">Shop now <i class="zmdi zmdi-long-arrow-right"></i></a> 
                        </div>
                    </div>
                </div>
                <!-- banner-item end -->
                <!-- banner-item start -->
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item banner-3">
                        <div class="banner-img">
                            <a href="#"><img src="img/banner/3.jpg" alt=""></a>
                        </div>
                        <div class="banner-info">
                            <h3 class="banner-title-2"><a href="#">Product Name</a></h3>
                            <ul class="banner-featured-list">
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>amet, consectetur</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>adipisicing elitest,</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>eiusmod tempor</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>labore et dolore.</span>
                                </li>
                            </ul>
                            <div class="banner-button">
                                <a href="#">Discover <i class="zmdi zmdi-long-arrow-right"></i></a> 
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- banner-item end -->
                <!-- banner-item start -->
                <div class="col-lg-4 col-md-6 d-block d-md-none d-lg-block">
                    <div class="banner-item banner-4">
                        <div class="banner-img">
                            <a href="#"><img src="img/banner/4.jpg" alt=""></a>
                        </div>
                        <h3 class="banner-title-2"><a href="#">phone name</a></h3>
                        <div class="banner-button">
                            <a href="#">Shop now <i class="zmdi zmdi-long-arrow-right"></i></a> 
                        </div>
                    </div>
                </div>
                <!-- banner-item end -->
            </div>
        </div>
    </div> 
    <!-- BANNER-SECTION END --> 
    
    @if(count(@$product_primary_categories) > 0)
    <!-- BY Category SECTION START-->
    <div class="by-brand-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">By Category</h2>
                        <h6>There are many variations of passages of brands available,</h6>
                    </div>
                    <div class="by-brand-product">
                        <div class="active-by-brand slick-arrow-2">
                            @foreach(@$product_primary_categories as $categories)
                                <div class="brand-item">
                                    <div class="single-brand-product">
                                        <a href="{{route('product.category',@$categories->slug)}}"><img src="{{ asset('/images/uploads/product_primary/'.$categories->image) }}" alt="{{@$categories->slug}}"></a>
                                        <h4 class="brand-title text-gray">
                                            <a href="{{route('product.category',@$categories->slug)}}">{{ucwords(@$categories->name)}}</a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BY Category SECTION END -->
    @endif

    @if(count(@$latestProducts) > 0)
    <!-- FEATURED PRODUCT SECTION START -->
    <div class="featured-product-section section-bg-tb pt-80 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-left mb-20">
                        <h2 class="uppercase">new products</h2>
                        <h6>There are many variations of passages of brands available,</h6>
                    </div>
                    <div class="featured-product">
                        <div class="active-featured-product slick-arrow-2">
                            @foreach(@$latestProducts as $product)

                            <div class="product-item product-item-2">
                                <div class="product-img">
                                    <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">
                                        <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}" />
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">{{ucwords(@$product->name)}}</a>
                                    </h6>

                                    <h6 class="pro-price">{{ucwords(@$product->primaryCategory->name)}}</h6>
                                </div>
                               
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED PRODUCT SECTION END -->
    @endif

    <!-- UP COMMING PRODUCT SECTION START -->
    <div class="up-comming-product-section ptb-60">
        <div class="container">
            <div class="row">
                <!-- up-comming-pro -->
                <div class="col-lg-8">
                    <div class="up-comming-pro gray-bg up-comming-pro-2 clearfix">
                        <div class="up-comming-pro-img f-left">
                            <a href="#">
                                <img src="img/up-comming/2.jpg" alt="">
                            </a>
                        </div>
                        <div class="up-comming-pro-info f-left">
                            <h3><a href="#">Dummy Product Name</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitest, sed do eiusmod tempor incididunt ut labore et dolores top magna aliqua. Ut enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. laborum. </p>
                            <div class="up-comming-time-2 clearfix">
                                <div data-countdown="2019/01/15"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-block d-md-none d-lg-block">
                    <div class="banner-item banner-1">
                        <div class="ribbon-price">
                            <span>$ 896.00</span>
                        </div>
                        <div class="banner-img">
                            <a href="#"><img src="img/banner/1.jpg" alt=""></a>
                        </div>
                        <div class="banner-info">
                            <h3><a href="#">Product Name</a></h3>
                            <ul class="banner-featured-list">
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>amet, consectetur</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>adipisicing elitest,</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>eiusmod tempor</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>labore et dolore.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- UP COMMING PRODUCT SECTION END -->

    <!-- PRODUCT TAB SECTION START -->
    <div class="product-tab-section section-bg-tb pt-80 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">product list</h2>
                        <h6>There are many variations of passages of brands available,</h6>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-tab pro-tab-menu text-right">
                        <!-- Nav tabs -->
                        <ul class="nav">
                            @if(count(@$primary_categories_tab) > 0)
                                @foreach(@$primary_categories_tab as $primary_category)
                                <li><a @if($loop->first) class="active" @endif href="#{{@$primary_category->slug}}" data-bs-toggle="tab">{{ucwords(@$primary_category->name)}} </a></li>
                                @endforeach
                            @endif

                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- popular-product start -->
                        @if(count(@$primary_categories_tab) > 0)
                            @foreach(@$primary_categories_tab as $primary_category)
                                <div id="{{@$primary_category->slug}}" class="tab-pane @if($loop->first) active show @endif" @if($loop->first) @else role="tabpanel" @endif>
                                    <div class="row">
                                        <!-- product-item start -->
                                        @foreach(@$primary_category->products as $product)
                                            <div class="col-lg-3 col-md-4">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">
                                                            <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}" />
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">{{ucwords(@$product->name)}}</a>
                                                        </h6>
                                                        
                                                        <h6 class="pro-price">{{ucwords(@$product->primaryCategory->name)}}</h6>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <!-- product-item end -->
                                    
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- popular-product end -->
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB SECTION END -->

    
    @if(count(@$latestPosts) > 0)

    <!-- BLOG SECTION START -->
    <div class="blog-section-2 pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">Latest blog</h2>
                        <h6>There are many variations of passages of brands available,</h6>
                    </div>
                    <div class="blog">
                        <div class="row active-blog-2">
                            <!-- blog-item start -->
                            @foreach(@$latestPosts as $latest)
                            <div class="col-lg-12">
                                <div class="blog-item-2">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="blog-image">
                                                <a href="{{route('blog.single',@$latest->slug)}}"><img src="<?php if(@$latest->thumb_image){?>{{asset('/images/uploads/blog/thumb/'.@$latest->thumb_image)}}<?php }?>" alt="{{@$latest->slug}}"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="blog-desc">
                                                <h5 class="blog-title-2"><a href="{{route('blog.single',@$latest->slug)}}">{{ucwords(@$latest->title)}}</a></h5>
                                                <p>{{ucwords(Str::limit(@$latest->excerpt,100,' ...'))}}</p>
                                                <div class="read-more">
                                                    <a href="{{route('blog.single',@$latest->slug)}}">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BLOG SECTION END -->
    @endif
</section>
<!-- END PAGE CONTENT -->
@endsection
