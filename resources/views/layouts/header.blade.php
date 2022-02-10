        <style>
            /* Preloader */
            .preloader {
              position: fixed;
              top: 0;
              left: 0;
              z-index: 999999999;
              width: 100%;
              height: 100%;
              background-color: #fff;
              overflow: hidden;
            }
            .preloader-inner {
              position: absolute;
              top: 50%;
              left: 50%;
              -webkit-transform: translate(-50%,-50%);
              -moz-transform: translate(-50%,-50%);
              transform: translate(-50%,-50%);
            }
            .preloader-icon {
              width: 100px;
              height: 100px;
              display: inline-block;
              padding: 0px;
            }
            .preloader-icon span {
              position: absolute;
              display: inline-block;
              width: 100px;
              height: 100px;
              border-radius: 100%;
              background:var(--compliment);
              -webkit-animation: preloader-fx 1.6s linear infinite;
              animation: preloader-fx 1.6s linear infinite;
            }
            .preloader-icon span:last-child {
              animation-delay: -0.8s;
              -webkit-animation-delay: -0.8s;
            }
            @keyframes preloader-fx {
              0% {transform: scale(0, 0); opacity:0.5;}
              100% {transform: scale(1, 1); opacity:0;}
            }
            @-webkit-keyframes preloader-fx {
              0% {-webkit-transform: scale(0, 0); opacity:0.5;}
              100% {-webkit-transform: scale(1, 1); opacity:0;}
            }
            /* End Preloader */
        </style>
        
        <!-- Preloader -->
    	<div class="preloader" id="preloader-div">
    		<div class="preloader-inner">
    			<img src="{{url('images/preloader.gif')}}" class="header-logo" style="size: 100px; width:auto;" alt="logo">
    		</div>
    	</div>
    	<!-- End Preloader -->
	
        <header class="header-area">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="top-text text-center">
                                <div class="textwidget">SURPRISE, SURPRISE! FREE SHIPPING ON ALL PRODUCTS</div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 col-md-6 col-sm-7 col-12">
                            <div class="widget">
                                <ul>
                                    <li>
                                        <a href="{{url('dashboard')}}">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{url('wishlist')}}">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="{{url('checkout/'.rand(00000,99999))}}">Check Out</a>
                                    </li>
                                    @guest
                                    <li><a class="tb-login" href="{{url('login')}}">Login</a></li>   
                                    @else
                                    <li><a href="javascript:$('#logout-form').submit();">Logout</a><form id="logout-form" hidden action="{{ route('logout') }}" method="POST" class="float-right">@csrf</form> </li>
                                    @endguest
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="header-four">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="home4-logo">
                                <a href="{{url('')}}">
                                    <img src="{{url('images/valencia.png')}}" class="img-logo" alt="Valencia Clothing">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-menu home-3 hm-4">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="header-wrapper">
                                <div class="logo hm4 floatleft">
                                    <a href="{{url('')}}">
                                        <img src="{{url('images/logo-oldd.png')}}" class="img-logo" alt="Valencia Clothing">
                                    </a>
                                </div>
                                <div class="menu-cart floatright">
                                    <div class="mobile-menu">
                                        <nav id="dropdown">
                                            <ul class="main-menu">
                                                <li><a href="{{url('')}}">Home</a></li>
                                                <li><a href="{{url('all/products')}}">All Products</a></li>
                                                @foreach (DB::table('parent_categories')->get() as $data)
                                                <li><a href="{{url('products/'.$data->parent_category)}}">{{$data->parent_category}}</a>
                                                    <ul class="main-menu2">
                                                    @foreach (DB::table('sub_categories')->where('parent_category',$data->parent_category)->get() as $key)
                                                    <li><a href="{{url('product/'.$data->parent_category.'/'.$key->sub_category)}}">{{$key->sub_category}}</a></li> 
                                                    @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                                <li><a href="{{url('blogs')}}">Blogs</a></li>
                                                <li><a href="{{url('about')}}">About us</a></li>
                                                <li><a href="{{url('contact')}}">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="muti_menu floatleft">
                                        <nav>
                                            <ul>
                                                <li><a href="{{url('')}}">home</a></li>
                                                <li><a href="{{url('all/products')}}">All Products</a></li>
                                                @foreach (DB::table('parent_categories')->get() as $data)
                                                <li><a href="{{url('products/'.$data->parent_category)}}">{{$data->parent_category}}
                                                    @if (count(DB::table('sub_categories')->where('parent_category',$data->parent_category)->get()) != 0)
                                                        <i class="fa fa-angle-down"></i>
                                                    @endif</a>
                                                    <div class="rayed ru">
                                                        <div class="tas menu-last2">
                                                            @foreach (DB::table('sub_categories')->where('parent_category',$data->parent_category)->get() as $key)
                                                            <a href="{{url('product/'.$data->parent_category.'/'.$key->sub_category)}}">{{$key->sub_category}}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                <li><a href="{{url('blogs')}}">Blogs</a></li>
                                                <!--<li><a href="{{url('about')}}">About us</a></li>-->
                                                <!--<li><a href="{{url('contact')}}">Contact</a></li>-->
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="two-hom4">
                                        <div class="tb-menu-sidebar floatleft">
                                            <div class="search-item">
                                                <a class="card-link" href="{{url('wishlist')}}">
                                                    <i class="fas fa-heart fa-lg"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tb-menu-sidebar floatleft">
                                            <div class="search-item">
                                                <a class="icon_search" href="#">
                                                    <i class="fa fa-search search-icon"></i>
                                                </a>
                                                <div class="widget_searchform_content">
                                                    <form action="{{route('search')}}" method="GET">
                                                        @csrf
                                                        <input type="text" placeholder="Search products" required name="search">
                                                        <input type="submit" value="Search">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="top-cart-wrapper wrap floatleft">
                                            <div class="top-shop-contain">
                                                <div class="block-shop">
                                                    <div class="top-account-title">
                                                        <a class="card-link" href="#">
                                                            <i class="fa fa-user-circle fa-lg"></i>
                                                        </a>
                                                    </div>
                                                    <div class="account-popup margin">
                                                        <div class="wish-item" >
                                                            @guest
                                                            <div class="cat_bottom">
                                                                <p class="text-secondary h5 mb-4 mt-3">
                                                                    Login to your account
                                                                </p>
                                                                <p class="buttons">
                                                                    <a class="button wc-forward" href="{{url('login')}}">Login</a>
                                                                    <p class="buttons">
                                                                    <a class="button wc-forward" href="{{url('register')}}">Sign Up</a>
                                                                </p>
                                                            </div>
                                                            @else 
                                                            <div class="cat_bottom">
                                                                <br>
                                                                <p class="text-secondary text-capitalize h5">
                                                                    {{Auth::user()->name}}
                                                                </p>
                                                                <p class="text-lowercase text-secondary">
                                                                    {{Auth::user()->email}}
                                                                </p>
                                                                <p class="buttons">
                                                                    <a class="button wc-forward" href="{{url('dashboard')}}">My Dashboard</a>
                                                                </p>
                                                                <p class="buttons">
                                                                    <a class="button wc-forward" href="javascript:submitheaderlogout();">Logout</a>
                                                                </p>
                                                                <script defer>
                                                                    function submitheaderlogout() {
                                                                        $('.header-logout-form').submit();
                                                                        swal('Logged out','You logged out successfully','success');
                                                                    }
                                                                </script>
                                                                <form class="header-logout-form" hidden action="{{route('logout')}}" method="POST" class="float-right">@csrf</form>
                                                            </div>
                                                            @endguest
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="top-cart-wrapper wrap floatleft">
                                            <div class="top-shop-contain">
                                                <div class="block-shop">
                                                    <div class="top-shop-title">
                                                        <a href="{{url('cart')}}">
                                                            <i class="fa fa-shopping-cart fa-lg"></i>
                                                            <span class="count co1" id="header-cart-count"></span>
                                                        </a>
                                                    </div>
                                                    <div class="wish-cart margin">
                                                        <div class="wish-item" id="header-cart-list">
                                                            

                                                            
                                                        </div>
                                                        <div class="wish-item">
                                                            <div class="cat_bottom">
                                                                <p class="total">
                                                                    <strong>Subtotal:</strong>
                                                                    <span class="amount" id="header-cart-total"></span>
                                                                </p>
                                                                <p class="buttons">
                                                                    <a class="button wc-forward" href="{{url('cart')}}">View Cart</a>
                                                                    {{-- <a class="button checkout wc-forward" href="{{url('checkout/'.rand(00000,99999))}}">Checkout</a> --}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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