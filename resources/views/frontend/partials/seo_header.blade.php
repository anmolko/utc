<!doctype html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Webor Electronics">
    <link rel="canonical" href="https://weborelectronics.com/" />
    @yield('seo')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }?>">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/lib/css/nivo-slider.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom.css')}}">

    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style-customizer.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('assets/frontend/js/vendor/modernizr-3.11.2.min.js')}}"></script>
       <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', '{{@$setting_data->google_analytics}}');
    

    </script>

    @yield('styles')

</head>

<body>
  

    <!-- Body main wrapper start -->
    <div class="wrapper">

        <!-- START HEADER AREA -->
        <header class="header-area header-wrapper @if (\Request::is('/')) header-2 @else custom-header @endif ">
             <!-- header-top-bar -->
             <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 d-none d-md-block">
                            <div class="call-us">
                                <p class="mb-0 roboto"> <span class="address">@if(!empty(@$setting_data->address)) {{ucwords(@$setting_data->address)}} @else Tinkune,Kathmandu -32, Nepal @endif  </span><span class="contact"> @if(!empty(@$setting_data->phone)) {{ucwords(@$setting_data->phone)}}  @endif</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top-link clearfix">
                                <ul class="link f-right">
                                    <li>
                                        <a href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif" rel="noopener" target="_blank">
                                            <i class="zmdi zmdi-facebook"></i> Facebook
                                        </a>
                                    </li>
                                    <li>
                                        <a href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif" rel="noopener" target="_blank">
                                            <i class="zmdi zmdi-instagram"></i> Instagram
                                        </a>
                                    </li>
                                    <li>
                                        <a href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif" rel="noopener" target="_blank">
                                            <i class="zmdi zmdi-linkedin-box"></i> Linkedin
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-middle-area -->
            <div id="sticky-header" class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-lg-2 col-md-4">
                                <div class="logo">
                                    <a href="/">
                                        <img src="<?php if(@$setting_data->logo_white){?>{{asset('/images/uploads/settings/'.@$setting_data->logo_white)}}<?php }?>" alt="main logo">
                                    </a>
                                </div>
                            </div>
                            <!-- primary-menu -->
                            <div class="col-lg-8 d-none d-lg-block">
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        <li><a href="/" class="{{request()->is('/') ? 'active' : ''}}">Home</a>
                                        </li>
                                   
                                        @if(!empty($top_nav_data))
                                            @foreach($top_nav_data as $nav)
                                            @if(!empty($nav->children[0]))

                                            <li> 
                                            @if($nav->type == 'custom') 
                                                <a href="/{{$nav->slug}}" class="{{request()->is(@$nav->slug)  ? 'active' : ''}}">@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif </a>
                                            @elseif($nav->type == 'post') 
                                                <a href="{{url('blog')}}/{{$nav->slug}}" class="{{request()->is(@$nav->slug)  ? 'active' : ''}}">@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif </a>
                                            @else 
                                                <a href="{{url('/')}}/{{$nav->slug}}" class="{{request()->is(@$nav->slug)  ? 'active' : ''}}">@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif </a>
                                            @endif 
                                                <ul class="dropdwn">

                                                    @foreach($nav->children[0] as $childNav)
                                                    @if($childNav->type == 'custom')
                                                        <li >
                                                            <a href="/{{@$childNav->slug}}"class="{{request()->is(@$childNav->slug) ? 'active' : ''}}" @if(@$childNav->target !== NULL) target="_blank" @endif >@if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                        </li>
                                                    @elseif($childNav->type == 'post')
                                                        <li>
                                                            <a href="{{url('blog')}}/{{@$childNav->slug}}" class="{{request()->is('blog/'.@$childNav->slug) ? 'active' : ''}}" >@if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{url('/')}}/{{@$childNav->slug}}"class="{{request()->is(@$childNav->slug) ? 'active' : ''}}">@if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                        </li>
                                                    @endif
                                                    @endforeach

                                                </ul>
                                            </li>

                                            @else
                                                @if($nav->type == 'custom')
                                                <li>
                                                    <a href="/{{$nav->slug}}" class="{{request()->is(@$nav->slug.'*') ? 'active' : ''}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @elseif($nav->type == 'post')
                                                <li >
                                                    <a href="{{url('blog')}}/{{$nav->slug}}" class="{{request()->is('blog/'.@$nav->slug.'*') ? 'active' : ''}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @else
                                                <li>
                                                    <a href="{{url('/')}}/{{$nav->slug}}" class="{{request()->is(@$nav->slug.'*') ? 'active' : ''}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @endif
                                            @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <!-- header-search & total-cart -->
                            <div class="col-lg-2 col-md-8">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <div class="header-search header-search-2 f-left">
                                        <div class="header-search-inner">
                                           <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                           </button>
                                                <div class="top-search-box">
                                                    <form action="{{route('searchProduct')}}" method="get">
                                                    <input type="text" placeholder="Search here your product..." name="searchby"   
            oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
                                                    <button type="submit" class="search-product-top">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER AREA -->

         <!-- START MOBILE MENU AREA -->
         <div class="mobile-menu-area d-block d-lg-none section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="/">Home</a>
                                      
                                    </li>
                                   
                                    @if(!empty($top_nav_data))
                                        @foreach($top_nav_data as $nav)
                                        @if(!empty($nav->children[0]))

                                        <li> 
                                            
                                            @if($nav->type == 'custom') 
                                                <a href="/{{$nav->slug}}" class="{{request()->is(@$nav->slug)  ? 'active' : ''}}">@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif </a>
                                            @elseif($nav->type == 'post') 
                                                <a href="{{url('blog')}}/{{$nav->slug}}" class="{{request()->is(@$nav->slug)  ? 'active' : ''}}">@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif </a>
                                            @else 
                                                <a href="{{url('/')}}/{{$nav->slug}}" class="{{request()->is(@$nav->slug)  ? 'active' : ''}}">@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif </a>
                                            @endif 
                                            
                                            <ul class="dropdwn">

                                                @foreach($nav->children[0] as $childNav)
                                                @if($childNav->type == 'custom')
                                                    <li >
                                                        <a href="/{{@$childNav->slug}}"class="{{request()->is(@$childNav->slug) ? 'active' : ''}}" @if(@$childNav->target !== NULL) target="_blank" @endif >@if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                    </li>
                                                @elseif($childNav->type == 'post')
                                                    <li>
                                                        <a href="{{url('blog')}}/{{@$childNav->slug}}" class="{{request()->is('blog/'.@$childNav->slug) ? 'active' : ''}}" >@if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="{{url('/')}}/{{@$childNav->slug}}"class="{{request()->is(@$childNav->slug) ? 'active' : ''}}">@if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                    </li>
                                                @endif
                                                @endforeach

                                            </ul>
                                        </li>

                                        @else
                                            @if($nav->type == 'custom')
                                            <li>
                                                <a href="/{{$nav->slug}}" class="{{request()->is(@$nav->slug.'*') ? 'active' : ''}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                            @elseif($nav->type == 'post')
                                            <li >
                                                <a href="{{url('blog')}}/{{$nav->slug}}" class="{{request()->is('blog/'.@$nav->slug.'*') ? 'active' : ''}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                            @else
                                            <li>
                                                <a href="{{url('/')}}/{{$nav->slug}}" class="{{request()->is(@$nav->slug.'*') ? 'active' : ''}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                            @endif
                                        @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MOBILE MENU AREA -->

        @yield('slider')
        @yield('breadcrumb')
