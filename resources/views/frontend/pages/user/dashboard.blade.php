@extends('frontend.layouts.master')
@section('title') User Dashboard @endsection
@section('styles')
<script src="{{asset('assets/frontend/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
<style>
    .select-gender{
        appearance: none;
        text-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
        color: #727272;
        position: relative;
        display: block;
        font-family: 'Open Sans';
        width: 100%;
        padding: 8px 15px 8px 30px;
        border: 2px solid #e5e5e5;
        height: 40px !important;
        border-radius: 30px;
        background-color: transparent;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .customer-image{
        position: relative;
        display: block;
        font-family: 'Open Sans';
        width: 100%;
        line-height: 24px;
        padding: 8px 15px 8px 30px;
        color: #222222;
        border: 2px solid #e5e5e5;
        height: 48px !important;
        border-radius: 30px;
        background-color: transparent;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
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
                            <a href="#" title="">User Dashboard</a>
                        </li>
                    </ul><!-- /.breacrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-breadcrumb -->
    <!-- BREADCRUMBS SETCTION END -->
@endsection

@section('content')

<section class="py-5 header flat-tab">

    <div class="container py-3">

        <div class="row">
            <div class="col-md-3">
                <div class="card customer-detail">
                    <div class="card-body text-center">
                    <img class="avatar rounded-circle" src="<?php if(@Auth::user()->image && str_contains(@Auth::user()->image, 'https')){?>
            {{@Auth::user()->image}}<?php }else{ if(@Auth::user()->image){?>{{asset('/images/uploads/profiles/'.@Auth::user()->image)}}<?php }else{?>{{asset('/img/dummy.jpg')}}<?php }}?>" alt="{{ @Auth::user()->name }}">
                    <h4 class="card-title">{{ ucwords(@Auth::user()->name) }}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{ @Auth::user()->email }}</h6>

                    </div>
                </div>
                <!-- Tabs nav -->
                <div class="nav flex-column nav-pills nav-pills-custom " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fas fa-user-circle mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Personal information</span></a>


                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">My Order</span></a>

                    <a class="nav-link mb-3 p-3 shadow" href="{{route('customer.destroy')}}" onclick="return confirm('Are you sure, you want to delete it?')" aria-selected="false">
                        <i class="fas fa-user-slash mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Delete Account</span></a>

                        
                        <form id="customer-logout-form" action="{{ route('logout') }}"  method="POST" class="d-none">
                                @csrf
                            </form>

                        <a class="nav-link mb-3 p-3 shadow"  href="#"   onclick="event.preventDefault();
                                                     document.getElementById('customer-logout-form').submit();" id="v-pills-settings-tab" aria-selected="false">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Logout</span></a>
                    </div>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong class="sent-success">{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong class="error-sent">{{ $message }} </strong>
                    </div>
                @endif
                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block">
                        <strong class="error-sent">{{ $message }} </strong>
                    </div>
                @endif
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h4 class="font-italic mb-4">Personal information</h4>
                        <div class="form-contact-content">
                            <form id="form-contact" action="{{ route('update_user', @Auth::user()->id) }}" id="form-contact" method="post" enctype="multipart/form-data">
                                <input name="_method" type="hidden" value="PATCH">
                                @csrf
                               
                                <div class="form-box one-half name-contact">
                                    <label for="fullname">Full Name*</label>
                                    <input type="text" placeholder="Joe Doey" name="name" value="{{ @Auth::user()->name }}" required oninvalid="this.setCustomValidity('Enter you full name')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-box one-half password-contact">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" value="{{ @Auth::user()->email }}" placeholder="joe@gmail.com"  required oninvalid="this.setCustomValidity('Enter your email')" oninput="this.setCustomValidity('')" readonly>
                                </div>

                                <div class="form-box one-half name-contact">
                                    <label for="subject">Gender*</label>
                                    <select name="gender" class="form-control select-gender">
                                        <option value="male" @if( @Auth::user()->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if( @Auth::user()->gender == 'female') selected @endif>Female</option>
                                        <option value="others" @if( @Auth::user()->gender == 'others') selected @endif>Other</option>
                                    </select>
                                </div>
                                <div class="form-box one-half password-contact">
                                    <label for="phone">Phone*</label>
                                    <input type="text"  name="contact" value="{{ @Auth::user()->contact }}" placeholder="Phone *"  required oninvalid="this.setCustomValidity('Enter a phone number')" oninput="this.setCustomValidity('')">
                                </div>

                                <div class="form-box password-contact">
                                    <label for="image">Photo</label>
                                    <input type="file"  name="image" class="form-control customer-image">
                                </div>
        
                                <div class="form-box">
                                    <button type="submit" class="contact">Update</button>
                                </div>
                            </form><!-- /#form-contact -->
                         
                        </div><!-- /.form-contact-content -->
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h4 class="font-italic mb-4">Bookings</h4>
                        <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
