        <footer class="footer-area">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="first-footer rspn">
                                <h3 class="wg-title">Contact Us</h3>
                                <div class="textwidget">
                                    <ul>
                                        <li>
                                            <a>
                                                <i class="fa fa-map-marker-alt"></i>
                                                <span>The hostel yard, 12-13, royal street lane, Raipur khadar, sector -126, Noida - 201310</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:info@valenciavlothing.in"><i class="fa fa-envelope"></i><span>info@valenciaclothing.in</span>
                                            </a>
                                        </li>
                                        <br>
                                        <!--<li>-->
                                        <!--    <a href="tel:+919953089922">-->
                                        <!--        <i class="fa fa-phone-alt"></i>-->
                                        <!--        <span>-->
                                        <!--            (+91) 9953089922-->
                                                   
                                                    
                                        <!--        </span>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-3 col-12">
                            <div class="first-footer rspn">
                                <h3 class="wg-title">Information</h3>
                                <div class="textwidget">
                                    <ul class="f-none">
                                        <li><a href="{{url('')}}">Home</a></li>
                                        <li><a href="{{url('dashboard')}}">My account</a></li>
                                        <li><a href="{{url('wishlist')}}">Wish List</a></li>
                                        <li><a href="{{url('cart')}}">Cart</a></li>
                                        <li><a href="{{url('contact')}}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                            <div class="first-footer res-mrg-top-md rspn">
                                <h3 class="wg-title">Categories</h3>
                                <div class="textwidget">
                                    <ul class="f-none">
                                        @foreach (DB::table('parent_categories')->get() as $data)
                                        <li><a href="{{url('products/'.$data->parent_category)}}">{{$data->parent_category}}</a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-3 col-12">
                            <div class="first-footer rspn">
                                <h3 class="wg-title">Our Policy</h3>
                                <div class="textwidget">
                                    <ul class="f-none">
                                        <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                                        <li><a href="{{url('terms-conditions')}}">Terms & Conditions</a></li>
                                        <li><a href="{{url('cancellation-policy')}}">Cancellation Policy</a></li>
                                        <li><a href="{{url('shipping-policy')}}">Shipping Policy</a></li>
                                        <li><a href="{{url('about')}}">About</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="last-footer res-mrg-top-md">
                                <h3 class="wg-title">Get Newsletters</h3>
                                <div class="newsletter">
                                    <form action="{{route('newsletter')}}" method="POST">
                                        @csrf
                                        <p><input class="newsletter-email" type="email" placeholder="Email address" name="email" required></p>
                                        <p><input class="newsletter-submit" type="submit" value="Subscribe"></p>
                                    </form>
                                </div>
                                <div class="widget_text">
                                    <h3 class="wg-title">Connect Us</h3>
                                    <div class="textwid">
                                        <ul class="socials">
                                            <li><a href="https://www.instagram.com/valenciaclothing.in/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                            <li><a href="https://twitter.com/Valencia_cloth" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="footer-address">
                                <address>
                                    Copyright © <a class="text-light" href="{{url('')}}">Valencia</a> All Rights Reserved
                                </address>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="footer-address text-lg-right text-md-right">
                                <address>
                                    Build by <a class="text-light" target="blank" href="https://www.makkuenterprises.com/">Makku Enterprises Pvt. Ltd.</a>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div id="toTop">
            <i class="fa fa-chevron-up"></i>
        </div>

        <script src="{{url('js/vendor/jquery-1.12.0.min.js')}}"></script>
		<!-- Popper js -->
        <script src="{{url('js/popper.js')}}"></script>
		<!-- bootstrap js -->
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <!-- parallax js -->
        <script src="{{url('js/parallax.min.js')}}"></script>
        <!-- zoom js -->
        <script src="{{url('js/jquery.snipe.min.js')}}"></script>
        <!-- meanmenu JS -->
        <script src="{{url('js/jquery.meanmenu.js')}}"></script>
		<!-- owl.carousel js -->
        <script src="{{url('js/owl.carousel.min.js')}}"></script>
		<!-- meanmenu js -->
        <script src="{{url('js/jquery.meanmenu.js')}}"></script>
		<!-- jquery-ui js -->
        <script src="{{url('js/jquery-ui.min.js')}}"></script>
		<!-- wow js -->
        <script src="{{url('js/wow.min.js')}}"></script>
        <!-- Nivo slider js -->
		<script src="{{url('lib/js/jquery.nivo.slider.js')}}"></script>
		<script src="{{url('lib/home.js')}}"></script>
		<!-- plugins js -->
        <script src="{{url('js/plugins.js')}}"></script>
		<!-- main js -->
        <script src="{{url('js/main.js')}}"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        <script src="{{url('js/script.js')}}"></script>

        @if($message = Session::get('message'))
        <script defer>
            Toastify({
                text: '{{$message}}',
                style: { background: "#ce9634", }
            }).showToast();
        </script>
        @endif
        
        <script defer>
            $(document).ready(function(){
                $('#preloader-div').fadeOut(300);
            });
        </script>
