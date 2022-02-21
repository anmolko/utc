@extends('frontend.layouts.master')
@section('title') Contact Us  @endsection
@section('styles')
<style>
    #flat-map .gm-map .map iframe {
        width: 100%;
        height: 333px;
        border-radius: 12px;
    }

    #form-contact .form-box textarea {
        height: 140px;
    }

    #form-contact .form-box {
        margin-bottom: 15px;
    }

    #flat-map {
        width: 100%;
        height: 333px;
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
                                <a href="#" title="">Contact Us</a>
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

    <section class="flat-map">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="flat-map" class="pdmap">
                        <div class="gm-map">                
                            <div class="map">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="{{@$setting_data->google_map}}"
                                                                                    title="%3$s" aria-label="%3$s">
                                            </iframe>
                            </div>                        
                        </div>
                    </div><!-- /#flat-map -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /#flat-map -->

    <section class="flat-contact style2">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-contact left">
                        <div class="form-contact-header">
                            <h3>Leave us a Message</h3>
                            
                        </div><!-- /.form-contact-header -->
                       
                        <div class="form-contact-content">
                            <form id="form-contact" action="{{route('contact.store')}}" id="form-contact" method="post">
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
                                <div class="form-box one-half name-contact">
                                    <label for="fullname">Full Name*</label>
                                    <input type="text" placeholder="Joe Doey" name="fullname" required oninvalid="this.setCustomValidity('Enter you full name')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-box one-half password-contact">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" placeholder="joe@gmail.com"  required oninvalid="this.setCustomValidity('Enter your email')" oninput="this.setCustomValidity('')">
                                </div>

                                <div class="form-box one-half name-contact">
                                    <label for="subject">Subject*</label>
                                    <input type="text" name="subject" placeholder="Your Subject"  required oninvalid="this.setCustomValidity('Enter a subject')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-box one-half password-contact">
                                    <label for="phone">Phone*</label>
                                    <input type="text"  name="phone" placeholder="Phone *"  required oninvalid="this.setCustomValidity('Enter a phone number')" oninput="this.setCustomValidity('')">
                                </div>

                                
                                <div class="form-box">
                                    <label for="message">Comment*</label>
                                    <textarea name="message"  class="custom-textarea" placeholder="Your message *" required oninvalid="this.setCustomValidity('Type a message')" oninput="this.setCustomValidity('')"></textarea>
                                </div>
                                <div class="form-box">
                                    <button type="submit" class="contact">Send</button>
                                </div>
                            </form><!-- /#form-contact -->
                         
                        </div><!-- /.form-contact-content -->
                    </div><!-- /.form-contact left -->
                </div><!-- /.col-md-7 -->
                <div class="col-md-5">
                    <div class="box-contact">
                        <ul>
                            <li class="address">
                                <h3>Address</h3>
                                <p>
                                @if(!empty(@$setting_data->address)) {{@$setting_data->address}} @else Kathmandu, Nepal @endif
                                </p>
                            </li>
                            <li class="phone">
                                <h3>Phone</h3>
                                <p>
                                @if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif
                                </p>
                                <p>
                                @if(!empty(@$setting_data->mobile)) {{@$setting_data->mobile}} @endif
                                </p>
                            </li>
                            <li class="email">
                                <h3>Email</h3>
                                <p>
                                @if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif
                                </p>
                            </li>
                        
                            <li>
                                <h3>Follow Us</h3>
                                <ul class="social-list style2">
                                    <li>
                                        <a href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif" target="_blank" title="">
                                            <i class="fab fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif" title="" target="_blank">
                                            <i class="fab fa-youtube" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif" title="" target="_blank">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                 
                                </ul><!-- /.social-list style2 -->
                            </li>
                        </ul>
                    </div><!-- /.box-contact -->
                </div><!-- /.col-md-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-contact style2 -->

    <!-- End page content -->

@endsection
