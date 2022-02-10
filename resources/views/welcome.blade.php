<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Home"; @endphp
    
    @include('layouts.app')

</head>
<body>
    
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
                        <div class="layer-1">
                            <h2 class="title5">new collection</h2>
                        </div>
                        <div class="layer-2">
                            <h2 class="title6">Women’s Fashion</h2>
                        </div>
                        <div class="layer-2">
                            <p class="title0">Save Up To 40% Off</p>
                        </div>
                        <div class="layer-3">
                            <a class="min1" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-2" class="t-cn slider-direction Builder">
                    <div class="slide-all2">
                        <div class="layer-1">
                            <h2 class="title5">new collection</h2>
                        </div>
                        <div class="layer-2">
                            <h2 class="title6">Men’s Fashion</h2>
                        </div>
                        <div class="layer-2">
                            <p class="title0">Save Up To 40% Off</p>
                        </div>
                        <div class="layer-3">
                            <a class="min1" href="#">Shop Now</a>
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
                                <img alt="" src="{{url('images/banner/img-1.webp')}}">
                            </div>
                            <div class="tb-content">
                                <h5>NEW DESIGN</h5>
                                <h3>SEND HER YOUR LOVE</h3>
                                <h6><a href="#">GET IT NOW</a></h6>
                            </div>
                        </div>
                        <div class="tb-info-box bt-no">
                            <div class="tb-content">
                                <h5>NEW DESIGN</h5>
                                <h3>SEND HER YOUR LOVE</h3>
                                <h6><a href="#">GET IT NOW</a></h6>
                            </div>
                            <div class="tb-image tb-right">
                                <img alt="" src="{{url('images/banner/img-2.webp')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="ro-info-box-wrap tpl3 fs">
                            <div class="tb-image">
                                <img alt="" src="{{url('images/banner/img-3.webp')}}">
                            </div>
                            <div class="tb-content">
                                <div class="tb-content-inner">
                                    <h5>MEN’S FASHION</h5>
                                    <h3>MID SEASON SALE</h3>
                                    <h6>
                                    <a href="#">VIEW COLLECTION</a>
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
                                        <img alt="" src="{{url($product->product_image_thumbnail)}}">
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
                                                        <span class="amount2 ana"> ₹ {{$product->product_price}}</span>    
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="last-cart l-mrgn">
                                                    <a class="las3" href="javascript:handleAddToWishlist({{$product->id}});"><i class="fa fa-heart"></i></a>
                                                    <a class="las4" href="javascript:handleAddToCart({{$product->id}},1,'');">Add To Cart</a>
                                                    <a class="las3 las7" href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');"><i class="fa fa-share"></i></a>
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
                                        <img alt="" src="{{url($product->product_image_thumbnail)}}">
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
                                                        <span class="amount2 ana"> ₹ {{$product->product_price}}</span>    
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="last-cart l-mrgn">
                                                    <a class="las3" href="javascript:handleAddToWishlist({{$product->id}});"><i class="fa fa-heart"></i></a>
                                                    <a class="las4" href="javascript:handleAddToCart({{$product->id}},1,'');">Add To Cart</a>
                                                    <a class="las3 las7" href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');"><i class="fa fa-share"></i></a>
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
                                        <img alt="" src="{{url($product->product_image_thumbnail)}}">
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
                                                        <span class="amount2 ana"> ₹ {{$product->product_price}}</span>    
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="last-cart l-mrgn">
                                                    <a class="las3" href="javascript:handleAddToWishlist({{$product->id}});"><i class="fa fa-heart"></i></a>
                                                    <a class="las4" href="javascript:handleAddToCart({{$product->id}},1,'');">Add To Cart</a>
                                                    <a class="las3 las7" href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');"><i class="fa fa-share"></i></a>
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

    {{-- Third Section (Start) --}}
    <section class="client-area home-2 stripe-parallax-bg" data-parallax-speed="0.5">
        <div class="client-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <div class="client">
                            <div class="pro-text">
                                <h3>What's Client Say?</h3>
                            </div>
                            <div class="client-all owl-carousel">
                                <div class="client-slider">
                                    <div class="sppb-testimonial-message">
                                        <p>““This theme is totally customizable, clean with all the options you could want. Don’t want full screen layout? With one word added to the code the entire site becomes a boxed version…. The customer support is absolutely unsurpassed. Every question is answered with more help than anyone could expect for the price. Can not recommend […]</p>
                                    </div>
                                    <div class="client-img">
                                        <a href="#">
                                            <div class="ro-title">John Doe</div>
                                        </a>
                                        <span class="ro-company">Technical Support - Olker</span>
                                    </div>
                                </div>
                                <div class="client-slider">
                                    <div class="sppb-testimonial-message">
                                        <p>““This theme is totally customizable, clean with all the options you could want. Don’t want full screen layout? With one word added to the code the entire site becomes a boxed version…. The customer support is absolutely unsurpassed. Every question is answered with more help than anyone could expect for the price. Can not recommend […]</p>
                                    </div>
                                    <div class="client-img">
                                        <a href="#">
                                        <div class="ro-title">Elizabeth Smith</div>
                                        </a>
                                        <span class="ro-company">Agency - Olker</span>
                                    </div>
                                </div>
                                <div class="client-slider">
                                    <div class="sppb-testimonial-message">
                                        <p>““This theme is totally customizable, clean with all the options you could want. Don’t want full screen layout? With one word added to the code the entire site becomes a boxed version…. The customer support is absolutely unsurpassed. Every question is answered with more help than anyone could expect for the price. Can not recommend […]</p>
                                    </div>
                                    <div class="client-img">
                                        <a href="#">
                                        <div class="ro-title">John Doe</div>
                                        </a>
                                        <span class="ro-company">Technical Support - Olker</span>
                                    </div>
                                </div>
                                <div class="client-slider">
                                    <div class="sppb-testimonial-message">
                                        <p>““This theme is totally customizable, clean with all the options you could want. Don’t want full screen layout? With one word added to the code the entire site becomes a boxed version…. The customer support is absolutely unsurpassed. Every question is answered with more help than anyone could expect for the price. Can not recommend […]</p>
                                    </div>
                                    <div class="client-img">
                                        <a href="#">
                                        <div class="ro-title">Diana John</div>
                                        </a>
                                        <span class="ro-company">Director Business - Olker</span>
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
                                        <img alt="" src="{{url($product->product_image_thumbnail)}}">
                                        <a class="la-icon"  href="{{url('product/'.$product->token_number)}}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="tb-content">
                                        <div class="tb-beg">
                                            <a href="{{url('product/'.$product->token_number)}}">{{$product->product_name}}</a>
                                        </div>
                                        <div class="tb-product-price font-noraure-3">
                                            <span class="amount">₹ {{$product->product_price_discounted}}</span>
                                            @if ($product->product_price_discounted != $product->product_price)
                                            <span class="amount2 ana"> ₹ {{$product->product_price}}</span>    
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
                                        <img alt="" src="{{url($product->product_image_thumbnail)}}">
                                        <a class="la-icon"  href="{{url('product/'.$product->token_number)}}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="tb-content">
                                        <div class="tb-beg">
                                            <a href="{{url('product/'.$product->token_number)}}">{{$product->product_name}}</a>
                                        </div>
                                        <div class="tb-product-price font-noraure-3">
                                            <span class="amount">₹ {{$product->product_price_discounted}}</span>
                                            @if ($product->product_price_discounted != $product->product_price)
                                            <span class="amount2 ana"> ₹ {{$product->product_price}}</span>    
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
                                        <img alt="" src="{{url($product->product_image_thumbnail)}}">
                                        <a class="la-icon"  href="{{url('product/'.$product->token_number)}}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="tb-content">
                                        <div class="tb-beg">
                                            <a href="{{url('product/'.$product->token_number)}}">{{$product->product_name}}</a>
                                        </div>
                                        <div class="tb-product-price font-noraure-3">
                                            <span class="amount">₹ {{$product->product_price_discounted}}</span>
                                            @if ($product->product_price_discounted != $product->product_price)
                                            <span class="amount2 ana"> ₹ {{$product->product_price}}</span>    
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
    
    {{-- Fifth Section (Start) --}}
    <section class="lastest-area">
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