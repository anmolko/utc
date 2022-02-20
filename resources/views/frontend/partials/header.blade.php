<!doctype html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="Universal Trading Concern">
    <meta name="description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else Universal Trading Concern @endif ">
    <link rel="canonical" href="https://universaltrading.com.np/" />
    <title>@yield('title') - @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Universal Trading Concern @endif </title>
    <meta property="og:title" content="Home" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="https://universaltrading.com.np/" />
	<meta property="og:site_name" content="Universal Trading Concern" />
	<meta property="og:description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else Universal Trading Concern @endif " />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }?>">


    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/style.css')}}">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/responsive.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/custom.css')}}">

       <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', '{{@$setting_data->google_analytics}}');
    

    </script>
    <style>
        .img.social-whatsapp i {
            font-size: xxx-large;
        }

        .header-middle #logo a img {
            max-height: 90px;
        }
        .widget-about .logo-ft a img {
            height: 90px;
        }

        .widget-ft.widget-about.logo-details {
            display: flex;
        }
    </style>

    @yield('styles')

</head>


<body class="header_sticky">
    <div class="boxed style1">

        <div class="overlay"></div>

        <!-- Preloader -->
        <div class="preloader">
            <div class="clear-loading loading-effect-2">
                <span></span>
            </div>
        </div><!-- /.preloader -->
        
        <section id="header" class="header">
        
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="logo" class="logo style1">
                                <a href="/" title="Universal Trading Concern">
                                    <img src="<?php if(@$setting_data->logo_white){?>{{asset('/images/uploads/settings/'.@$setting_data->logo_white)}}<?php }?>" alt="Universal Trading Concern">
                                </a>
                            </div><!-- /#logo -->
                            <div class="nav-wrap">
                                <div id="mainnav" class="mainnav style1">
                                    <ul class="menu">
                                        <li class="column-1">
                                            <a href="#" title="">Home</a>
                                           
                                        </li>
                                       
                                        <li class="has-mega-menu">
                                            <a href="#" title="">Electronic</a>
                                            <div class="submenu">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h3 class="cat-title">Accessories</h3>
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="">Electronics</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Furniture</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Accessories</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Divided</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Everyday Fashion</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Modern Classic</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Party</a>
                                                            </li>
                                                        </ul>
                                                        <div class="show">
                                                            <a href="#" title="">Shop All</a>
                                                        </div>
                                                    </div><!-- /.col-md-3 -->
                                                    <div class="col-md-3">
                                                        <h3 class="cat-title">Laptop And Computer</h3>
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="">Networking & Internet Devices</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Laptops, Desktops & Monitors</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Hard Drives & Memory Cards</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Printers & Ink</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Networking & Internet Devices</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Computer Accessories</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Software</a>
                                                            </li>
                                                        </ul>
                                                        <div class="show">
                                                            <a href="#" title="">Shop All</a>
                                                        </div>
                                                    </div><!-- /.col-md-3 -->
                                                    <div class="col-md-4">
                                                        <h3 class="cat-title">Audio & Video</h3>
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="">Headphones & Speakers</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Home Entertainment Systems</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">MP3 & Media Players</a>
                                                            </li>
                                                        </ul>
                                                        <div class="show">
                                                            <a href="#" title="">Shop All</a>
                                                        </div>
                                                    </div><!-- /.col-md-4 -->
                                                    <div class="col-md-2">
                                                        <h3 class="cat-title">Home Audio</h3>
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="">Home Theater Systems</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Receivers & Amplifiers</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Speakers</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">CD Players & Turntables</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">High-Resolution Audio</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">4K Ultra HD TVs</a>
                                                            </li>
                                                        </ul>
                                                        <div class="show">
                                                            <a href="#" title="">Shop All</a>
                                                        </div>
                                                    </div><!-- /.col-md-2 -->
                                                </div><!-- /.row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="banner-box">
                                                            <div class="inner-box">
                                                                <a href="#" title="">
                                                                    <img src="images/banner_boxes/submenu-01.png" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.col-md-6 -->
                                                    <div class="col-md-6">
                                                        <div class="banner-box">
                                                            <div class="inner-box">
                                                                <a href="#" title="">
                                                                    <img src="images/banner_boxes/submenu-02.png" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.col-md-6 -->
                                                </div><!-- /.row -->
                                            </div><!-- /.submenu -->
                                        </li>
                                        <li class="column-1">
                                            <a href="blog.html" title="">Blog</a>
                                        </li>
                                        <li class="column-1">
                                            <a href="contact.html" title="">Contact</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="contact.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Contact 01</a>
                                                </li>
                                                <li>
                                                    <a href="contact-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Contact 02</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul><!-- /.menu -->
                                </div><!-- /.mainnav -->
                            </div><!-- /.nav-wrap -->
                            <div class="btn-menu style1">
                                <span></span>
                            </div><!-- //mobile menu button -->
                            <ul class="flat-infomation style1">
                                <li class="phone">
                                    <img src="{{asset('assets/frontend/images/icons/call-3.png')}}" alt="">
                                    Call Us: <a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif" title="">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif</a>
                                </li>
                            </ul><!-- /.flat-infomation -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-middle -->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-2">
                            <div id="mega-menu">
                                <div class="btn-mega"><span></span>ALL CATEGORIES</div>
                                @if(count($product_brand_data) > 0)
                                <ul class="menu">
                                    @foreach(@$product_brand_data as $product_brand)
                                        <li>
                                            <a href="{{route('product.brand',@$product_brand->slug)}}" title="" class="dropdown">
                                                <span class="menu-title">
                                                    {{ucwords(@$product_brand->name)}}
                                                </span>
                                            </a>
                                            @if(count($product_brand->series) > 0)
                                                <div class="drop-menu">
                                                    <div class="one-third">
                                                        <div class="cat-title">
                                                        {{ucwords(@$product_brand->name)}}
                                                        </div>
                                                        <ul>
                                                        @foreach(@$product_brand->series as $product_series)

                                                            <li>
                                                                <a href="{{route('product.brandseries',[@$product_brand->slug,@$product_series->slug])}}" title="">{{ucwords(@$product_series->name)}}</a>
                                                            </li>
                                                        @endforeach
                                                          
                                                        </ul>
                                                        <div class="show">
                                                            <a href="{{route('product.brand',@$product_brand->slug)}}" title="">Shop All</a>
                                                        </div>
                                                    </div>
                                                   
                                                </div><!-- /.drop-menu -->
                                            @endif
                                        </li>
                                    
                                       
                                    @endforeach
                                </ul><!-- /.menu -->
                                @endif
                            </div>
                        </div><!-- /.col-md-3 col-2 -->
                        <div class="col-md-9 col-10">
                            <div class="top-search style1">
                                <form action="#" method="get" class="form-search" accept-charset="utf-8">
                                    <div class="cat-wrap cat-wrap-v1">
                                        <select name="category">
                                        <option hidden value="">All Category</option>
                                    </select>
                                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                        <div class="all-categories">
                                            <div class="cat-list-search">
                                            @if(count($product_brand_data) > 0)
                                                <div class="title">
                                                    Laptops
                                                </div>
                                                <ul>
                                                @foreach(@$product_brand_data as $product_brand)
                                                    <li>{{ucwords($product_brand->name)}}</li>
                                                @endforeach
                                                </ul>
                                            @endif
                                            </div><!-- /.cat-list-search -->
                                            <div class="cat-list-search">
                                            @if(count($product_primary_data) > 0)
                                                <div class="title">
                                                    Electronics
                                                </div>
                                                <ul>
                                                @foreach(@$product_primary_data as $product_primary)
                                                    <li>{{ucwords($product_primary->name)}}</li>
                                                @endforeach
                                                </ul>
                                            @endif
                                            </div><!-- /.cat-list-search -->
                                        
                                        </div><!-- /.all-categories -->
                                    </div><!-- /.cat-wrap -->
                                    <div class="box-search">
                                        <input type="text" name="search" placeholder="Search what you looking for ?">
                                        <span class="btn-search">
                                            <button type="submit" class="waves-effect"><img src="{{asset('assets/frontend/images/icons/search-2.png')}}" alt=""></button>
                                        </span>
                                        <div class="search-suggestions">
                                            <div class="box-suggestions">
                                                <div class="title">
                                                    Search Suggestions
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/s05.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Razer RZ02-01071500-R3M1</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $50.00
                                                                </span>
                                                                <span class="regular">
                                                                    $2,999.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/s06.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Notebook Black Spire V Nitro VN7-591G</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $24.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/14.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Apple iPad Mini G2356</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $90.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/02.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Razer RZ02-01071500-R3M1</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $50.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/l01.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Apple iPad Mini G2356</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $24.00
                                                                </span>
                                                                <span class="regular">
                                                                    $2,999.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/s08.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Beats Snarkitecture Headphones</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $90.00
                                                                </span>
                                                                <span class="regular">
                                                                    $2,999.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div><!-- /.box-suggestions -->
                                            <div class="box-cat">
                                                <div class="cat-list-search">
                                                    <div class="title">
                                                        Categories
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Networking & Internet Devices</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Laptops, Desktops & Monitors</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Hard Drives & Memory Cards</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Printers & Ink</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Networking & Internet Devices</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Computer Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Software</a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.cat-list-search -->
                                            </div><!-- /.box-cat -->
                                        </div><!-- /.search-suggestions -->
                                    </div><!-- /.box-search -->
                                </form><!-- /.form-search -->
                            </div><!-- /.top-search -->
                            <span class="show-search">
                                <button></button>
                            </span><!-- /.show-search -->
                            <div class="box-cart style1">
                                <div class="inner-box">
                                    <ul class="menu-compare-wishlist">
                                        <li class="compare">
                                            <a href="#" title="">
                                                <img src="{{asset('assets/frontend/images/icons/compare-2.png')}}" alt="">
                                            </a>
                                        </li>
                                        <li class="wishlist">
                                            <a href="#" title="">
                                                <img src="{{asset('assets/frontend/images/icons/wishlist-2.png')}}" alt="">
                                            </a>
                                        </li>
                                    </ul><!-- /.menu-compare-wishlist -->
                                </div><!-- /.inner-box -->
                                <div class="inner-box">
                                    <a href="#" title="">
                                        <div class="icon-cart">
                                            <img src="{{asset('assets/frontend/images/icons/add-cart.png')}}" alt="">
                                            <span>4</span>
                                        </div>
                                        <div class="price">
                                            $0.00
                                        </div>
                                    </a>
                                    <div class="dropdown-box">
                                        <ul>
                                            <li>
                                                <div class="img-product">
                                                    <img src="images/product/other/img-cart-1.jpg" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        Samsung - Galaxy S6 4G LTE <br />with 32GB Memory Cell Phone
                                                    </div>
                                                    <div class="price">
                                                        <span>1 x</span>
                                                        <span>$250.00</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <span class="delete">x</span>
                                            </li>
                                        </ul>
                                        <div class="total">
                                            <span>Subtotal:</span>
                                            <span class="price">$1,999.00</span>
                                        </div>
                                        <div class="btn-cart">
                                            <a href="shop-cart.html" class="view-cart" title="">View Cart</a>
                                            <a href="shop-checkout.html" class="check-out" title="">Checkout</a>
                                        </div>
                                    </div><!-- /.dropdown-box -->
                                </div><!-- /.inner-box -->
                            </div><!-- /.box-cart -->
                        </div><!-- /.col-md-9 col-10 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-bottom -->
        </section><!-- /#header -->

        @yield('slider')
        @yield('breadcrumb')
