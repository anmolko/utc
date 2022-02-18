        <footer class="style1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-ft widget-about">
                            <div class="logo logo-ft">
                                <a href="/" title="">
                                    <img src="images/logos/logo-ft.png" alt="">
                                </a>
                            </div>
                            <!-- /.lgo-ft -->
                            <div class="widget-content">
                                <div class="icon">
                                    <img src="{{asset('assets/frontend/images/icons/call.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <p class="questions">Got Questions ? Call us 24/7!</p>
                                    <p class="phone">Call Us: @if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif</p>
                                    <p class="address">
                                    @if(!empty(@$setting_data->address)) {{@$setting_data->address}} @else Kathmandu, Nepal @endif 
                                    </p>
                                </div>
                            </div>
                            <!-- /.widget-content -->
                            <ul class="social-list">
                                @if(!empty(@$setting_data->facebook))
                                    <li>
                                        <a href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif" title="">
                                            <i class="fab fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty(@$setting_data->instagram))
                                    <li>
                                        <a href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif" title="">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(!empty(@$setting_data->linkedin))
                                    <li>
                                        <a href="@if(!empty(@$setting_data->linkedin)) {{@$setting_data->linkedin}} @endif" title="">
                                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(!empty(@$setting_data->youtube))
                                    <li>
                                        <a href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif" title="">
                                            <i class="fab fa-youtube" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                            <!-- /.social-list -->
                        </div>
                        <!-- /.widget-about -->
                    </div>
                    <!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-ft widget-categories-ft">
                            <div class="widget-title">
                                <h3>Find By Categories</h3>
                            </div>
                            <!-- /.widget-title -->
                            <ul class="cat-list-ft">
                                <li>
                                    <a href="#" title="">Desktops</a>
                                </li>
                              
                            </ul>
                            <!-- /.cat-list-ft -->
                        </div>
                        <!-- /.widget-categries-ft -->
                    </div>
                    <!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-2 col-md-6">
                        <div class="widget-ft widget-menu">
                            <div class="widget-title">
                                <h3>Customer Care</h3>
                            </div>
                            <!-- /.widget-title -->
                            <ul>
                                <li>
                                    <a href="#" title="">
											Contact us
										</a>
                                </li>
                            
                            </ul>
                        </div>
                        <!-- /.widget-menu -->
                    </div>
                    <!-- /.col-lg-2 col-md-6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-ft widget-newsletter">
                            <div class="widget-title">
                                <h3>Sign Up To New Letter</h3>
                            </div>
                            <!-- /.widget-title -->
                            <p>Make sure that you never miss our interesting <br /> news by joining our newsletter program
                            </p>
                            <form action="#" class="subscribe-form" method="get" accept-charset="utf-8">
                                <div class="subscribe-content">
                                    <input type="text" name="email" class="subscribe-email" placeholder="Your E-Mail">
                                    <button type="submit"><img src="{{asset('assets/frontend/images/icons/right-2.png')}}" alt=""></button>
                                </div>
                            </form>
                            <!-- /.subscribe-form -->
                            <ul class="pay-list">
                                <li>
                                    <a href="#" title="">
                                        <img src="images/logos/ft-01.png" alt="">
                                    </a>
                                </li>
                               
                            </ul>
                            <!-- /.pay-list -->
                        </div>
                        <!-- /.widget-newletter -->
                    </div>
                    <!-- /.col-lg-4 col-md-6 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget widget-apps">
                            <div class="widget-title">
                                <h3>Need help? We are available at</h3>
                            </div>
                            <!-- /.widget-title -->
                            <ul class="app-list">
                                <li class="app-store">
                                    <a href="https://wa.me/{{@$setting_data->whatsapp}}" target="_blank" title="">
                                        <div class="img social-whatsapp">
                                          <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h4>WhatsApp</h4>
                                            <p>@if(!empty(@$setting_data->whatsapp)) {{@$setting_data->whatsapp}} @endif</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- /.app-store -->
                                <li class="google-play">
                                    <a href="viber://chat?number={{@$sensitive_data->viber}}" target="_blank" title="">
                                        <div class="img social-whatsapp">
                                          <i class="fab fa-viber" aria-hidden="true"></i>

                                        </div>
                                        <div class="text">
                                            <h4>Viber</h4>
                                            <p>@if(!empty(@$setting_data->viber)) {{@$setting_data->viber}} @endif</p>
                                        </div>
                                    </a>
                                </li>
                                <!-- /.google-play -->
                            </ul>
                            <!-- /.app-list -->
                        </div>
                        <!-- /.widget-apps -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </footer>
        <!-- /footer -->

        <section class="footer-bottom style1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="copyright">All Rights Reserved © Universal Trading Concern 2022</p>
                        <p class="btn-scroll">
                            <a href="#" title="">
                                <img src="{{asset('assets/frontend/images/icons/top.png')}}" alt="">
                            </a>
                        </p>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.footer-bottom -->
    </div>
    <!-- /.boxed -->

    <!-- Javascript -->
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/easing.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.zoom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.mCustomScrollbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/waves.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.countdown.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/main.js')}}"></script>

    <script>
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    });
    </script>
	@yield('js')

</body>



</html>