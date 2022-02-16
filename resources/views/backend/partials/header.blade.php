<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else AM Group @endif">
    <meta name="author" content="Webor dashboard">
    <link rel="canonical" href="#" />
    <title>@yield('title') - @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Webor @endif </title>
    <link rel="icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }else{ echo "images/favicon.ico"; }?>">


    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/lnr-icon.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/plugins/select2/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/toastr.min.css')}}">

    <link href="{{asset('assets/backend/css/sweetalert.css')}}" rel="stylesheet">

<!--[if lt IE 9]>
{{--    <script src="{{asset('assets/backend/js/html5shiv.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/backend/js/respond.min.js')}}"></script>--}}
    <![endif]-->

    @yield('css')
    @stack('styles')
</head>
<body>

<div class="inner-wrapper">

    <div id="loader-wrapper">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <header class="header">

        <div class="top-header-section">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="my-3 my-sm-0">
                            <a href="{{route('dashboard')}}">
                                <img src="<?php if(@$setting_data->logo_white){?>{{asset('/images/uploads/settings/'.@$setting_data->logo_white)}}<?php }?>" alt="logo image" class="img-fluid" width="100">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                        <div class="user-block d-none d-lg-block">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-12 col-sm-12">
{{--                                    <div class="user-notification-block align-right d-inline-block">--}}
{{--                                            <ul class="list-inline m-0">--}}
{{--                                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Create Form">--}}
{{--                                                    <a href="#" class="font-23 menu-style text-white align-middle">--}}
{{--                                                        <span class="lnr lnr-briefcase position-relative"></span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}

                                    <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" class=" menu-style dropdown-toggle">
                                            <div class="user-avatar d-inline-block">
                                                <img src="{{(!empty(Auth::user()->image)) ? '/images/uploads/profiles/'.Auth::user()->image : '/images/uploads/profiles/default-profile.png'}}" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                            </div>
                                        </a>

                                        <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                            <a class="dropdown-item p-2" href="{{route('profile')}}">
                                                <span class="media align-items-center">
                                                <span class="lnr lnr-user mr-3"></span>
                                                <span class="media-body text-truncate">
                                                <span class="text-truncate">Profile</span>
                                                </span>
                                                </span>
                                            </a>
                                            <a class="dropdown-item p-2" href="{{route('setting.index')}}">
                                                <span class="media align-items-center">
                                                <span class="lnr lnr-cog mr-3"></span>
                                                <span class="media-body text-truncate">
                                                <span class="text-truncate">Settings</span>
                                                </span>
                                                </span>
                                            </a>
                                            <a class="dropdown-item p-2" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <span class="media align-items-center">
                                                <span class="lnr lnr-power-switch mr-3"></span>
                                                <span class="media-body text-truncate">
                                                <span class="text-truncate">Logout</span>
                                                </span>
                                                </span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="d-block d-lg-none">
                            <a href="javascript:void(0)">
                                <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                            </a>

                            <div class="offcanvas-menu" id="offcanvas_menu">
                                <span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>
                                <div class="user-info align-center bg-theme text-center">
                                    <a href="javascript:void(0)" class="d-block menu-style text-white">
                                        <div class="user-avatar d-inline-block mr-3">
                                            <img src="{{(!empty(Auth::user()->image)) ? '/images/uploads/profiles/'.Auth::user()->image : '/images/uploads/profiles/default-profile.png'}}" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                        </div>
                                    </a>
                                </div>

                                <div class="user-menu-items px-3 m-0">
                                    <a class="px-0 pb-2 pt-0" href="{{route('dashboard')}}">
                                        <span class="media align-items-center">
                                        <span class="lnr lnr-home mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                        <span class="text-truncate text-left">Dashboard</span>
                                        </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="{{route('user.index')}}">
                                        <span class="media align-items-center">
                                        <span class="lnr lnr-users mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                        <span class="text-truncate text-left">Users</span>
                                        </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="{{route('teams.index')}}">
                                        <span class="media align-items-center">
                                        <span class="lnr lnr-license mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                        <span class="text-truncate text-left">Teams</span>
                                        </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="{{route('sliders.index')}}">
                                        <span class="media align-items-center">
                                        <span class="lnr lnr-picture mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                        <span class="text-truncate text-left">Sliders</span>
                                        </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="{{route('blogcategory.index')}}">
                                        <span class="media align-items-center">
                                        <span class="lnr lnr-book mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                        <span class="text-truncate text-left">Blog</span>
                                        </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="{{route('setting.index')}}">
                                        <span class="media align-items-center">
                                        <span class="lnr lnr-cog mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                        <span class="text-truncate text-left">Settings</span>
                                        </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="{{route('profile')}}">
                                        <span class="media align-items-center">
                                        <span class="lnr lnr-user mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                        <span class="text-truncate text-left">Profile</span>
                                        </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="media align-items-center">
                                        <span class="lnr lnr-power-switch mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                        <span class="text-truncate text-left">Logout</span>
                                        </span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
