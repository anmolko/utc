@extends('frontend.layouts.master')
@section('title') Contact Us  @endsection
@section('breadcrumb') 

   <!-- BREADCRUMBS SETCTION START -->
   <div class="breadcrumbs-section plr-200 mb-80 section">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Contact Us</h1>
                               
                                <ol class="breadcrumb">
                                    <li><a href="/">Home</a></li>
                                    <li class="active">Contact</li>
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

        <!-- ADDRESS SECTION START -->
        <div class="address-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-pin"></i>
                            <h6>@if(!empty(@$setting_data->address)) {{@$setting_data->address}} @else Kathmandu, Nepal @endif</h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-phone"></i>
                            <h6><a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif</a></h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-email"></i>
                            <h6><a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif"> @if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ADDRESS SECTION END -->

        <!-- GOOGLE MAP SECTION START -->
        <div class="google-map-section">
            <div class="container-fluid">
                <div class="google-map plr-185">
                    <div><iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="{{@$setting_data->google_map}}"
                                                                                    title="%3$s" aria-label="%3$s">
                                            </iframe>
                                                                                </div>
                </div>
            </div>
        </div>
        <!-- GOOGLE MAP SECTION END -->

        <!-- MESSAGE BOX SECTION START -->
        <div class="message-box-section mt--50 mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="message-box box-shadow white-bg">
                            <form id="contact-form" action="{{route('contact.store')}}" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="blog-section-title border-left mb-30">get in touch</h4>
                                    </div>
                                    @csrf
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <strong class="sent-success">{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block">
                                            <strong class="error-sent">{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Full Name *" name="fullname" required oninvalid="this.setCustomValidity('Enter you full name')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" name="email" placeholder="Email *"  required oninvalid="this.setCustomValidity('Enter your email')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="subject" placeholder="Subject *"  required oninvalid="this.setCustomValidity('Enter a subject')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text"  name="phone" placeholder="Phone No. *"  required oninvalid="this.setCustomValidity('Enter a phone number')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="message"  class="custom-textarea" placeholder="Your message *" required oninvalid="this.setCustomValidity('Type a message')" oninput="this.setCustomValidity('')"></textarea>
                                        <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">submit
                                            message</button>
                                    </div>
                                </div>
                                <p class="form-message"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MESSAGE BOX SECTION END -->
    </section>
    <!-- End page content -->

@endsection
