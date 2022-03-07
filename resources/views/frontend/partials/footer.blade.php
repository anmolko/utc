        <footer class="style1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="widget-ft widget-about logo-details">
                            <div class="logo logo-ft">
                                <a href="/" title="">
                                    <img src="<?php if(@$setting_data->logo_white){?>{{asset('/images/uploads/settings/'.@$setting_data->logo_white)}}<?php }?>" alt="Universal Trading Concern">
                                </a>
                            </div>
                            <!-- /.lgo-ft -->
                            <div class="widget-content">
                                <div class="info">
                                    <p class="questions">Got Questions ? </p>
                                    <p class="phone">Call Us: @if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif</p>
                                    <p class="address">
                                    @if(!empty(@$setting_data->address)) {{@$setting_data->address}} @else Kathmandu, Nepal @endif
                                    </p>
                                </div>
                            </div>
                            <!-- /.widget-content -->

                            <!-- /.social-list -->
                        </div>
                        <div class="widget-about">
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
                        </div>
                        <!-- /.widget-about -->
                    </div>
                    <div class="col-lg-4 col-md-12">
                        @if(@$footer_nav_data1 !== null)
                            <div class="widget-ft widget-categories-ft">
                                <div class="widget-title">
                                    <h3>@if(@$footer_nav_title1 !== null) {{@$footer_nav_title1}} @endif</h3>
                                </div>
                                <!-- /.widget-title -->
                                <ul class="cat-list-ft">
                                    @if(!empty($footer_nav_data1))
                                        @foreach($footer_nav_data1 as $nav)
                                            @if(!empty($nav->children[0]))
                                            @else
                                                @if($nav->type == 'custom')
                                                <li>
                                                    <a href="/{{$nav->slug}}"  @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>  @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a>
                                                </li>
                                                @elseif($nav->type == 'post')
                                                <li>
                                                    <a href="{{url('blog')}}/{{$nav->slug}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a>
                                                </li>
                                                @elseif($nav->type == 'category')
                                                <li>
                                                    <a href="{{url('product')}}/{{$nav->slug}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a>
                                                </li>
                                                @else
                                                <li>
                                                    <a href="{{url('/')}}/{{$nav->slug}}"> @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a>
                                                </li>

                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                                <!-- /.cat-list-ft -->
                            </div>
                        @endif
                        <!-- /.widget-categries-ft -->
                    </div>
                    <div class="col-lg-4 col-md-12">
                        @if(@$footer_nav_data2 !== null)

                        <div class="widget-ft widget-menu">
                            <div class="widget-title">
                                <h3>@if(@$footer_nav_title2 !== null) {{@$footer_nav_title2}} @endif</h3>
                            </div>
                            <!-- /.widget-title -->
                            <ul>
                            @if(!empty($footer_nav_data2))
                                @foreach($footer_nav_data2 as $nav)
                                    @if(!empty($nav->children[0]))
                                    @else
                                        @if($nav->type == 'custom')
                                        <li>
                                            <a href="/{{$nav->slug}}"  @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>  @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a>
                                        </li>
                                        @elseif($nav->type == 'post')
                                        <li>
                                            <a href="{{url('blog')}}/{{$nav->slug}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a>
                                        </li>
                                        @elseif($nav->type == 'category')
                                        <li>
                                            <a href="{{url('product')}}/{{$nav->slug}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{url('/')}}/{{$nav->slug}}"> @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a>
                                        </li>

                                        @endif
                                    @endif
                                @endforeach
                            @endif

                            </ul>
                        </div>
                        @else

                        <div class="widget-ft widget-menu">
                            <div class="widget-title">
                                <h3>Useful Links</h3>
                            </div>
                            <!-- /.widget-title -->
                            <ul>
                                <li>
                                    <a href="{{url('/blog')}}"> Blog</a>
                                </li>
                                <li>
                                    <a href="{{url('/contact')}}"> Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        @endif

                        <!-- /.widget-menu -->
                    </div>

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
                                    <a href="viber://chat?number={{@$setting_data->viber}}" target="_blank" title="">
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
                        <p class="copyright">All Rights Reserved © Universal Trading Concern 2022 | Developed  by <a
										rel="noopener" target="_blank" href="https://www.canosoft.com.np/">Canosoft Techonology </a></p>
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
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <!-- Javascript -->
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/easing.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.zoom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/owl.carousel.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/frontend/js/jquery-ui.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.mCustomScrollbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/waves.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.countdown.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/main.js')}}"></script>
    <script src="{{asset('assets/backend/js/toastr.min.js')}}"></script>

    <!-- Messenger Chat Plugin Code -->


    <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "1994342144199742");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
        xfbml            : true,
        version          : 'v13.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $('#search_suggestion').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{ route('autocomplete.fetch') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
                $('form.form-search .box-search input').closest('.boxed').children('.overlay').css({
                    opacity: '1',
                    display: 'block'
                });
                $('form.form-search .box-search input').parent('.box-search').children('.search-suggestions').css({
                    opacity: '1',
                    visibility: 'visible',
                    top: '50px'
                });
                $('#search-suggestions').html(data);
            }
            });
            }
        });

        $(document).on('blur', 'form.form-search .box-search input', function(){
            $(this).closest('.boxed').children('.overlay').css({
                    opacity: '0',
                    display: 'none'
                });
                $(this).parent('.box-search').children('.search-suggestions').css({
                    opacity: '0',
                    visibility: 'hidden',
                    top: '100px'
                });
        });
    });

    @if($message = Session::get('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ $message }}");
    @endif

        @if($message = Session::get('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ $message }}");
        @endif
    </script>
	@yield('js')

    <div class="modal fade" id="popUpLogin" tabindex="-1" role="dialog" aria-labelledby="popUpLoginLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Sign in</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-contact-content">
                            <form id="form-contact" action="{{route('front-user.login')}}" id="form-contact" method="post">
                                @csrf
                                <ul class="app-list" style="display: flex;">
                                    <li class="app-store">
                                        <a href="{{route('google.redirect')}}" title="">
                                            <div class="img social-whatsapp">
                                                <i class="fab fa-google" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h4>Google</h4>
                                                <p> Login </p>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- /.app-store -->
                                    <li class="google-play">
                                        <a href="{{route('facebook.redirect')}}" title="">
                                            <div class="img social-whatsapp">
                                                <i class="fab fa-facebook" aria-hidden="true"></i>

                                            </div>
                                            <div class="text">
                                                <h4>Facebook</h4>
                                                <p> Login </p>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- /.google-play -->
                                </ul>

                            </form><!-- /#form-contact -->

                        </div><!-- /.form-contact-content -->
                    </div>
                </div>
            </div>
        </div>


</body>



</html>
