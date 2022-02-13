        <!-- START FOOTER AREA -->
        <footer id="footer" class="footer-area section">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="footer-top-inner gray-bg">
                            <div class="row">
                                <div class="col-xl-4 col-lg-5 col-md-5">
                                    <div class="single-footer footer-about">
                                        <div class="footer-logo">
                                            <img src="<?php if(@$setting_data->logo_white){?>{{asset('/images/uploads/settings/'.@$setting_data->logo_white)}}<?php }?>" alt="">
                                        </div>
                                        <div class="footer-brief">
                                            <p>@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else Webor Electronics @endif</p>
                                        </div>
                                        <ul class="footer-social">
                                            <li>
                                                <a class="facebook" href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif" rel="noopener" target="_blank" title="Facebook"><i
                                                        class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="instagram" href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif" rel="noopener" target="_blank" title="Instagram"><i
                                                        class="zmdi zmdi-instagram"></i></a>
                                            </li>
                                            
                                            <li>
                                                <a class="linkedin" href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif" rel="noopener" target="_blank" title="Linkedin"><i class="zmdi zmdi-linkedin-box"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-block d-xl-block d-lg-none d-md-none">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Useful Links</h4>
                                        <ul class="footer-menu">
                                            
											@if(!empty($footer_nav_data))
                                                @foreach($footer_nav_data as $nav)
                                                    @if(!empty($nav->children[0]))
                                                    @else
                                                        @if($nav->type == 'custom')
                                                        <li class="{{request()->is(@$nav->slug) ? 'active' : ''}}">
                                                            <a href="/{{$nav->slug}}"  @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif> <i class="zmdi zmdi-circle"></i><span> @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</span></a></li>
                                                        @elseif($nav->type == 'post')
                                                        <li class="{{request()->is('blog/'.@$nav->slug) ? 'active' : ''}}">
                                                            <a href="{{url('blog')}}/{{$nav->slug}}"><i class="zmdi zmdi-circle"></i><span>@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</span></a></li>
                                                        @elseif($nav->type == 'category')
                                                        <li class="{{request()->is('product/'.@$nav->slug) ? 'active' : ''}}">
                                                            <a href="{{url('product')}}/{{$nav->slug}}"><i class="zmdi zmdi-circle"></i><span>@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</span></a></li>
                                                        @else
                                                        <li class="{{request()->is(@$nav->slug) ? 'active' : ''}}">
                                                            <a href="{{url('/')}}/{{$nav->slug}}"><i class="zmdi zmdi-circle"></i><span> @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</span></a></li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Category</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="my-account.html"><i class="zmdi zmdi-circle"></i><span>My
                                                        Account</span></a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html"><i class="zmdi zmdi-circle"></i><span>My
                                                        Wishlist</span></a>
                                            </li>
                                            <li>
                                                <a href="cart.html"><i class="zmdi zmdi-circle"></i><span>My Cart</span></a>
                                            </li>
                                            <li>
                                                <a href="login.html"><i class="zmdi zmdi-circle"></i><span>Sign In</span></a>
                                            </li>
                                         
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Global Branch</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="my-account.html"><i class="zmdi zmdi-circle"></i><span>My
                                                        Account</span></a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html"><i class="zmdi zmdi-circle"></i><span>My
                                                        Wishlist</span></a>
                                            </li>
                                            <li>
                                                <a href="cart.html"><i class="zmdi zmdi-circle"></i><span>My Cart</span></a>
                                            </li>
                                            <li>
                                                <a href="login.html"><i class="zmdi zmdi-circle"></i><span>Sign In</span></a>
                                            </li>
                                         
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom black-bg">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="copyright">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright-text text-center">
                                        <p class="copy-text"> © Copyright 2021 <strong class="webor">Webor</strong> Developed By
                                        <a class="company-name" href="https://www.canosoft.com.np/" target="_blank">
                                        <strong> Canosoft Technology</strong></a></p>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER AREA -->


      
        <!-- START QUICKVIEW PRODUCT -->
        <div id="quickview-wrapper ">
            <!-- Modal -->
            <div class="modal fade " id="productModal " tabindex="-1 " role="dialog ">
                <div class="modal-dialog " role="document ">
                    <div class="modal-content ">
                        <div class="modal-header ">
                            <button type="button " class="close " data-bs-dismiss="modal " aria-label="Close "><span aria-hidden="true ">&times;</span></button>
                        </div>
                        <div class="modal-body ">
                            <div class="modal-product clearfix ">
                                <div class="product-images ">
                                    <div class="main-image images ">
                                        <img alt=" " src="/img/product/quickview.jpg ">
                                    </div>
                                </div>
                                <!-- .product-images -->

                                <div class="product-info ">
                                    <h1>Aenean eu tristique</h1>
                                    <div class="price-box-3 ">
                                        <div class="s-price-box ">
                                            <span class="new-price ">£160.00</span>
                                            <span class="old-price ">£190.00</span>
                                        </div>
                                    </div>
                                    <a href=" " class="see-all ">See all features</a>
                                    <div class="quick-add-to-cart ">
                                        <form method="post " class="cart ">
                                            <div class="numbers-row ">
                                                <input type="number " id="french-hens " value="3 ">
                                            </div>
                                            <button class="single_add_to_cart_button " type="submit ">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="quick-desc ">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                    </div>
                                    <div class="social-sharing ">
                                        <div class="widget widget_socialsharing_widget ">
                                            <h3 class="widget-title-modal ">Share this product</h3>
                                            <ul class="social-icons clearfix ">
                                                <li>
                                                    <a class="facebook " href="# " target="_blank " title="Facebook ">
                                                        <i class="zmdi zmdi-facebook "></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="google-plus " href="# " target="_blank " title="Google + ">
                                                        <i class="zmdi zmdi-google-plus "></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="twitter " href="# " target="_blank " title="Twitter ">
                                                        <i class="zmdi zmdi-twitter "></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="pinterest " href="# " target="_blank " title="Pinterest ">
                                                        <i class="zmdi zmdi-pinterest "></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="rss " href="# " target="_blank " title="RSS ">
                                                        <i class="zmdi zmdi-rss "></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- .product-info -->
                            </div>
                            <!-- .modal-product -->
                        </div>
                        <!-- .modal-body -->
                    </div>
                    <!-- .modal-content -->
                </div>
                <!-- .modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>
        <!-- END QUICKVIEW PRODUCT -->

       

    </div>
    <!-- Body main wrapper end -->



    <!-- jquery latest version -->

    <script src="{{asset('assets/frontend/js/vendor/jquery-3.6.0.min.js')}} "></script>
    <script src="{{asset('assets/frontend/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <!-- jquery.nivo.slider js -->
    <script src="{{asset('assets/frontend/lib/js/jquery.nivo.slider.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('assets/frontend/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>
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