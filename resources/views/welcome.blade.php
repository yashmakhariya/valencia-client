<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Home"; @endphp
    
    @include('layouts.app')

</head>
<body>
    <script type="text/javascript">
      window.loading_screen = window.pleaseWait({
        logo: "/images/logo.svg",
        backgroundColor: '#ffffff',
        loadingHtml: 'Welcome to Valencia'
      });
    </script>
    
    @include('layouts.header')

    {{-- First Section (Start) --}}
    <section class="slider-main-area home-3">
        <div class="main-slider an-si">
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider-2" class="slides">
                   
                    <img src="{{url(DB::table('meta_data')->where('data','carousel_img_1')->get()->implode('value'))}}" alt="" title="#slider-direction-1"  />

                    @if (DB::table('meta_data')->where('data','carousel_img_2')->get()->implode('value') != "")
                    <img src="{{url(DB::table('meta_data')->where('data','carousel_img_2')->get()->implode('value'))}}" alt="" title="#slider-direction-2"  />
                    @endif

                    @if (DB::table('meta_data')->where('data','carousel_img_3')->get()->implode('value') != "")
                    <img src="{{url(DB::table('meta_data')->where('data','carousel_img_3')->get()->implode('value'))}}" alt="" title="#slider-direction-3"  />  
                    @endif

                    @if (DB::table('meta_data')->where('data','carousel_img_4')->get()->implode('value') != "")
                    <img src="{{url(DB::table('meta_data')->where('data','carousel_img_4')->get()->implode('value'))}}" alt="" title="#slider-direction-4"  />  
                    @endif
                    
                    @if (DB::table('meta_data')->where('data','carousel_img_5')->get()->implode('value') != "")
                    <img src="{{url(DB::table('meta_data')->where('data','carousel_img_5')->get()->implode('value'))}}" alt="" title="#slider-direction-5"  />  
                    @endif

                </div>
                <div id="slider-direction-1" class="t-cn slider-direction Builder">
                    <div class="slide-all slide2">
                        <!--<div class="layer-1">-->
                        <!--    <h2 class="title5">new collection</h2>-->
                        <!--</div>-->
                        <div class="layer-2">
                            <h2 class="title6">Women’s Fashion</h2>
                        </div>
                        <div class="layer-2">
                            <p class="title0">Save Up To 40% Off</p>
                        </div>
                        <div class="layer-3">
                            <a class="min1" href="/products/Women">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-2" class="t-cn slider-direction Builder">
                    <div class="slide-all2">
                        <!--<div class="layer-1">-->
                        <!--    <h2 class="title5">new collection</h2>-->
                        <!--</div>-->
                        <div class="layer-2">
                            <h2 class="title6">Men’s Fashion</h2>
                        </div>
                        <div class="layer-2">
                            <p class="title0">Save Up To 40% Off</p>
                        </div>
                        <div class="layer-3">
                            <a class="min1" href="/products/Men">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-3" class="t-cn slider-direction Builder">
                    <div class="slide-all2">
                        <div class="layer-1">
                            <h2 class="title5"></h2>
                        </div>
                        <div class="layer-2">
                            <h2 class="title6"></h2>
                        </div>
                        <div class="layer-2">
                            <p class="title0"></p>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-4" class="t-cn slider-direction Builder">
                    <div class="slide-all2">
                        <div class="layer-1">
                            <h2 class="title5"></h2>
                        </div>
                        <div class="layer-2">
                            <h2 class="title6"></h2>
                        </div>
                        <div class="layer-2">
                            <p class="title0"></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- First Section (End) --}}

    {{-- Second Section (Start) --}}
    <section class="design-area home-4">
        <div class="container">

            <div class="bottom-design res">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="tb-info-box">
                            <div class="tb-image">
                                <img alt="Valencia-img" src="{{url('images/banner/img-4.jpg')}}">
                            </div>
                            <div class="tb-content">
                                <h5>HIGHLIGHT</h5>
                                <h3>YOUR WARDROBE</h3>
                                <h6><a href="/product/Men/Hoodies">GET IT NOW</a></h6>
                            </div>
                        </div>
                        <div class="tb-info-box bt-no">
                            <div class="tb-content">
                                 <h5>GRAB</h5>
                                <h3>YOUR STYLE NOW</h3>
                                <h6><a href="/product/Women/Hoodie">GET IT NOW</a></h6>
                            </div>
                            <div class="tb-image tb-right">
                                <img alt="Valencia-img" src="{{url('images/banner/img-5.jpg')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="ro-info-box-wrap tpl3 fs">
                            <div class="tb-image">
                                <img alt="Valencia-img" src="{{url('images/banner/img-6.jpeg')}}">
                            </div>
                            <div class="tb-content">
                                <div class="tb-content-inner">
                                    <h5>TREND</h5>
                                    <h3>SETTERS</h3>
                                    <h6>
                                    <a href="/product/Men/T-shirts">VIEW COLLECTION</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="features-tab indicator-style2">
                        
                        {{-- Tabs --}}
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="vc_tta-tab"><a href="#sale-products" aria-controls="home" role="tab" data-toggle="tab">SALE</a></li>
                            <li class="vc_tta-tab " role="presentation"><a class="active" href="#bestseller-products" aria-controls="profile" role="tab" data-toggle="tab">BESTSELLER</a></li>
                            <li class="vc_tta-tab" role="presentation"><a href="#latest-products" aria-controls="messages" role="tab" data-toggle="tab">LATEST</a></li>
                        </ul>

                        <br>
                        
                        {{-- Tab Panels --}}
                        <div class="tab-content jump">

                            <div role="tabpanel" class="tab-pane" id="sale-products">
                                <div class="features-curosel2 indicator-style2 owl-carousel">

                                    @foreach ($saleProduct as $product)
                                    <div class="tb-product-item-inner tb2 pct-last">
                                        @if ($product->product_offer_type != 'None')
                                        <span class="onsale two">{{$product->product_offer_type}}!</span>    
                                        @endif
                                        <img alt="" src="{{url($product->product_image_1)}}">
                                        <a class="la-icon"  href="{{url('product/'.$product->token_number)}}"><i class="fa fa-eye"></i></a>
                                        <div class="tb-content">
                                            <div class="tb-it">
                                                <div class="tb-beg">
                                                    <a href="{{url('product/'.$product->token_number)}}">{{$product->product_name}}</a>
                                                </div>
                                                <div class="tb-product-wrap-price-rating">
                                                    <div class="tb-product-price font-noraure-3">
                                                        <span class="amount">₹ {{$product->product_price_discounted}}</span>
                                                        @if ($product->product_price_discounted != $product->product_price)
                                                        <span class="amount2 ana" style="text-decoration: line-through; color:red !important;"> ₹ {{$product->product_price}}</span>    
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="last-cart l-mrgn">
                                                    <a class="las3 btn-active" href="javascript:handleAddToWishlist({{$product->id}});"><i class="fa fa-heart"></i></a>
                                                    <a class="las4 btn-active" href="javascript:handleAddToCart({{$product->id}},1,'');">Add To Cart</a>
                                                    <a class="las3 btn-active las7" href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    @endforeach
                                    
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane active" id="bestseller-products">
                                <div class="features-curosel2 indicator-style2 owl-carousel">

                                    @foreach ($bestsellerProduct as $product)
                                    <div class="tb-product-item-inner tb2 pct-last">
                                        @if ($product->product_offer_type != 'None')
                                        <span class="onsale two">{{$product->product_offer_type}}!</span>    
                                        @endif
                                        <img alt="" src="{{url($product->product_image_1)}}">
                                        <a class="la-icon"  href="{{url('product/'.$product->token_number)}}"><i class="fa fa-eye"></i></a>
                                        <div class="tb-content">
                                            <div class="tb-it">
                                                <div class="tb-beg">
                                                    <a href="{{url('product/'.$product->token_number)}}">{{$product->product_name}}</a>
                                                </div>
                                                <div class="tb-product-wrap-price-rating">
                                                    <div class="tb-product-price font-noraure-3">
                                                        <span class="amount">₹ {{$product->product_price_discounted}}</span>
                                                        @if ($product->product_price_discounted != $product->product_price)
                                                        <span class="amount2 ana" style="text-decoration: line-through; color:red !important;"> ₹ {{$product->product_price}}</span>    
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="last-cart l-mrgn">
                                                    <a class="las3 btn-active" href="javascript:handleAddToWishlist({{$product->id}});"><i class="fa fa-heart"></i></a>
                                                    <a class="las4 btn-active" href="javascript:handleAddToCart({{$product->id}},1,'');">Add To Cart</a>
                                                    <a class="las3 btn-active las7" href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    @endforeach
                                    
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="latest-products">
                                <div class="features-curosel2 indicator-style2 owl-carousel">

                                    @foreach ($latestProduct as $product)
                                    <div class="tb-product-item-inner tb2 pct-last">
                                        @if ($product->product_offer_type != 'None')
                                        <span class="onsale two">{{$product->product_offer_type}}!</span>    
                                        @endif
                                        <img alt="" src="{{url($product->product_image_1)}}">
                                        <a class="la-icon"  href="{{url('product/'.$product->token_number)}}"><i class="fa fa-eye"></i></a>
                                        <div class="tb-content">
                                            <div class="tb-it">
                                                <div class="tb-beg">
                                                    <a href="{{url('product/'.$product->token_number)}}">{{$product->product_name}}</a>
                                                </div>
                                                <div class="tb-product-wrap-price-rating">
                                                    <div class="tb-product-price font-noraure-3">
                                                        <span class="amount">₹ {{$product->product_price_discounted}}</span>
                                                        @if ($product->product_price_discounted != $product->product_price)
                                                        <span class="amount2 ana" style="text-decoration: line-through; color:red !important;"> ₹ {{$product->product_price}}</span>    
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="last-cart l-mrgn">
                                                    <a class="las3 btn-active" href="javascript:handleAddToWishlist({{$product->id}});"><i class="fa fa-heart"></i></a>
                                                    <a class="las4 btn-active" href="javascript:handleAddToCart({{$product->id}},1,'');">Add To Cart</a>
                                                    <a class="las3 btn-active las7" href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    @endforeach

                                </div>	
                            </div>

                        </div>
                    </div>				
                </div>
            </div>
        </div>
    </section>
    {{-- Second Section (End) --}}
    
 <script>
        window.loading_screen.finish();
    </script>

    {{-- Third Section (Start) --}}
    <section class="client-area home-2 stripe-parallax-bg" data-parallax-speed="0.5">
        <div class="client-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <div class="client">
                            <div class="pro-text">
                                <h3>What Customer's Say?</h3>
                            </div>
                            <div class="client-all owl-carousel">
                                <div class="client-slider">
                                    <div class="sppb-testimonial-message">
                                        <p>“My first purchase from the brand, felt kinda skeptic. But once I got the packaging, cleared my mind. The fabric felt premium and the designs are fresh. Overall, one of best brand in my opinion. </p>
                                    </div>
                                    <div class="client-img">
                                        <a href="#">
                                            <div class="ro-title">- Ishan Kaim, Noida</div>
                                        </a>
                                        <!--<span class="ro-company">Technical Support - Olker</span>-->
                                    </div>
                                </div>
                                <div class="client-slider">
                                    <div class="sppb-testimonial-message">
                                        <p>“On par with the big brands, and thats saying a lot. I don’t usually write product reviews, but once I got the sweatshirt, felts like this needed to be recognized.</p>
                                    </div>
                                    <div class="client-img">
                                        <a href="#">
                                        <div class="ro-title">- Rahul singh, Madhya Pradesh</div>
                                        </a>
                                        <!--<span class="ro-company">Agency - Olker</span>-->
                                    </div>
                                </div>
                                <div class="client-slider">
                                    <div class="sppb-testimonial-message">
                                        <p>“I feel comfortable in it , or if I say about colour and combination  that's  attractive and the quality of cloth is awesome.</p>
                                    </div>
                                    <div class="client-img">
                                        <a href="#">
                                        <div class="ro-title">-Vishal Tyagi, Muzaffarnagar, UP</div>
                                        </a>
                                        <!--<span class="ro-company">Technical Support - Olker</span>-->
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Third Section (End) --}}

    {{-- Fourth Section (Start) --}}
    <section class="specail-area home-3 hm-4">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="specail-top">
                        <h3>Special</h3>
                        <div class="row">

                            @foreach ($specialProduct as $product)
                            <div class="col-lg-12  col-md-6">
                                <div class="tb-product-item">
                                    <div class="tb-image">
                                        @if ($product->product_offer_type != 'None')
                                        <span class="new">{{$product->product_offer_type}}!</span>    
                                        @endif
                                        <img alt="" src="{{url($product->product_image_1)}}">
                                        <a class="la-icon"  href="{{url('product/'.$product->token_number)}}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="tb-content">
                                        <div class="tb-beg">
                                            <a href="{{url('product/'.$product->token_number)}}">{{$product->product_name}}</a>
                                        </div>
                                        <div class="tb-product-price font-noraure-3">
                                            <span class="amount">₹ {{$product->product_price_discounted}}</span>
                                            @if ($product->product_price_discounted != $product->product_price)
                                            <span class="amount2 ana" style="text-decoration: line-through; color:red !important;"> ₹ {{$product->product_price}}</span>    
                                            @endif
                                        </div>
                                        <div class="tb-product-btn">
                                            <a href="javascript:handleAddToCart({{$product->id}},1,'');">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a href="javascript:handleAddToWishlist({{$product->id}});">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');">
                                                <i class="fa fa-share"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            @endforeach
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="specail-top">
                        <h3>Most View </h3>
                        <div class="row">

                            @foreach ($mostviewProduct as $product)
                            <div class="col-lg-12  col-md-6">
                                <div class="tb-product-item">
                                    <div class="tb-image">
                                        @if ($product->product_offer_type != 'None')
                                        <span class="new">{{$product->product_offer_type}}!</span>    
                                        @endif
                                        <img alt="" src="{{url($product->product_image_1)}}">
                                        <a class="la-icon"  href="{{url('product/'.$product->token_number)}}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="tb-content">
                                        <div class="tb-beg">
                                            <a href="{{url('product/'.$product->token_number)}}">{{$product->product_name}}</a>
                                        </div>
                                        <div class="tb-product-price font-noraure-3">
                                            <span class="amount">₹ {{$product->product_price_discounted}}</span>
                                            @if ($product->product_price_discounted != $product->product_price)
                                            <span class="amount2 ana" style="text-decoration: line-through; color:red !important;"> ₹ {{$product->product_price}}</span>    
                                            @endif
                                        </div>
                                        <div class="tb-product-btn">
                                            <a href="javascript:handleAddToCart({{$product->id}},1,'');">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a href="javascript:handleAddToWishlist({{$product->id}});">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');">
                                                <i class="fa fa-share"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="specail-top">
                        <h3>Top Products </h3>
                        <div class="row">

                            @foreach ($topProduct as $product)
                            <div class="col-lg-12  col-md-6">
                                <div class="tb-product-item">
                                    <div class="tb-image">
                                        @if ($product->product_offer_type != 'None')
                                        <span class="new">{{$product->product_offer_type}}!</span>    
                                        @endif
                                        <img alt="" src="{{url($product->product_image_1)}}">
                                        <a class="la-icon"  href="{{url('product/'.$product->token_number)}}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="tb-content">
                                        <div class="tb-beg">
                                            <a href="{{url('product/'.$product->token_number)}}">{{$product->product_name}}</a>
                                        </div>
                                        <div class="tb-product-price font-noraure-3">
                                            <span class="amount">₹ {{$product->product_price_discounted}}</span>
                                            @if ($product->product_price_discounted != $product->product_price)
                                            <span class="amount2 ana" style="text-decoration: line-through; color:red !important;"> ₹ {{$product->product_price}}</span>    
                                            @endif
                                        </div>
                                        <div class="tb-product-btn">
                                            <a href="javascript:handleAddToCart({{$product->id}},1,'');">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a href="javascript:handleAddToWishlist({{$product->id}});">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');">
                                                <i class="fa fa-share"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            @endforeach
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Fourth Section (End) --}}
    
    <!--Fifth Section (Start)-->
    
    <!-- Offer section -->

<section class="offer">
  <div class="row">
    <div class="col-md-6 text-center">
      <img src="https://i.ibb.co/xCpyBm6/t-shirt-mockup-of-a-cool-man-walking-by-a-fountain-2190-el1-min.png" alt="Valencia Exclusive" />
    </div>
    <div class="col-md-6">
      <div class="subscribe">
        <h4>Valencia Exclusive</h4>
        <p> Valencia is a shopping website that focuses on the newest fashion trends and innovative apparel concepts.</p>
        <p>
         At Valencia, our mission is to enable women and men to get a unique fashionable look. We believe that if you look good, you feel good. Valencia offers you a diverse selection of fashionable clothes and activity based t-shirts, all at affordable prices to make them accessible to you.
        </p>
        <a href="{{url('products/Basics')}}" rel="noopener noreferrer">SHOP NOW</a>
      </div>
    </div>
  </div>
</section>
    
        <!--Fifth Section (Start)-->
    
    {{-- Sixth Section (Start) --}}
    <section class="lastest-area"><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="lastest-from res">
                        <h3>Lastest From Blogs</h3>
                    </div>
                </div>
            </div>
            <div class="slider-active-two indicator-style2 owl-carousel">

                @foreach ($blogs as $blog)
                <div class="tb-post-item">
                    <a href="{{url('blog/'.$blog->token_number)}}">
                        <div class="tb-thumb">
                            <img src="{{url($blog->blog_image)}}" alt="">
                            <span class="tb-publish font-noraure-3">{{date('d / m / Y', strtotime($blog->created_at))}}</span>
                        </div>
                    </a>
                    <div class="tb-content7">
                        <a href="{{url('blog/'.$blog->token_number)}}"><h4 class="tb-titlel">{{$blog->blog_title}}</h4></a>
                        <div class="tb-excerpt">{{substr($blog->blog_description,0,50)}}...</div>
                    </div>
                </div>    
                @endforeach

            </div>
        </div>
    </section>
    {{-- Fifth Section (End) --}}

    @include('layouts.footer')

</body>
</html>