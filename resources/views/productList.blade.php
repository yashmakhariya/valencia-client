<!DOCTYPE html>
<html lang="en">
<head>
    
    @php $pageTitle = $title @endphp

    @include('layouts.app')
    
</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">{{$title}}</h2>
                        <p><a href="{{url('')}}">Home</a> | {{$title}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(count($product) == 0)
    <section class="shop-area">
        <div class="container text-center">
            <br>
            <h1 style="    color: #474747;
            font-family: Oswald;
            font-size: 30px;
            font-style: normal;
            font-weight: normal;
            line-height: 36px;
            opacity: 1;
            transition: opacity 0.24s ease-in-out 0s;
            visibility: visible;">Result not found</h1>
            <br>
        </div>
    </section>
    @else
    <section class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3 col-md-12">
                    <div class="all-shop-sidebar">
                        <style>
                            .shop-one-header {
                                cursor: pointer;
                            }
                            .shop-one-header * {
                                user-select: none !important;
                            }
                            .shop-one > .shop-one-header > span {
                                /* margin-top: -7px; */
                                transition: 0.3s ease;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                margin-right: 10px;
                                color: #999;
                            }
                            .shop-one.active > .shop-one-header > span {
                                transform: rotate(180deg);
                                transition: 0.3s ease;
                            }
                        </style>
                        <div class="top-shop-sidebar">
                            <h3 class="wg-title">SHOP BY</h3>
                        </div>
                        <br>
                        <div class="shop-one">
                            <div class="shop-one-header d-flex justify-content-between align-items-center">
                                <h3 class="wg-title2">Categories</h3>
                                <span class="shop-one-toggler"><i class="fas fa-chevron-up fa-lg"></i></span>
                            </div>
                            <div class="shop-one-body">
                                <ul class="product-categories">
                                    @foreach (DB::table('parent_categories')->get() as $data)
                                        @if (request('parent') == $data->parent_category)
                                        <li class="cat-item current-cat">
                                            <a class="btn" href="{{url('products/'.$data->parent_category)}}">{{$data->parent_category}}</a>
                                        </li>    
                                        @else
                                        <li class="cat-item">
                                            <a href="{{url('products/'.$data->parent_category)}}">{{$data->parent_category}}</a>
                                        </li>     
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="shop-one">
                            <div class="shop-one-header d-flex justify-content-between align-items-center">
                                <h3 class="wg-title2">Sub Categories</h3>
                                <span class="shop-one-toggler"><i class="fas fa-chevron-up fa-lg"></i></span>
                            </div>
                            <div class="shop-one-body">
                                <ul class="product-categories">
                                    @foreach (DB::table('sub_categories')->where('parent_category',request('parent'))->get() as $data)
                                        @if (request('sub') == $data->sub_category)
                                        <li class="cat-item current-cat">
                                            <a href="{{url('product/'.request('parent').'/'.$data->sub_category)}}">{{$data->sub_category}}</a>
                                        </li>    
                                        @else
                                        <li class="cat-item">
                                            <a href="{{url('product/'.request('parent').'/'.$data->sub_category)}}">{{$data->sub_category}}</a>
                                        </li>     
                                        @endif
                                    @endforeach
                                    
                                    @if (Request::is('all/products'))
                                    @foreach (DB::table('sub_categories')->get() as $data)
                                    <li class="cat-item">
                                        <a href="{{url('products/sub/'.$data->sub_category)}}">{{$data->sub_category}}</a>
                                    </li>  
                                    @endforeach 
                                    @endif

                                    @if (Request::is('products/sub/*'))
                                    @foreach (DB::table('sub_categories')->get() as $data)
                                    @if (request('sub') == $data->sub_category)
                                    <li class="cat-item current-cat">
                                        <a href="{{url('products/sub/'.$data->sub_category)}}">{{$data->sub_category}}</a>
                                    </li> 
                                    @else
                                    <li class="cat-item">
                                        <a href="{{url('products/sub/'.$data->sub_category)}}">{{$data->sub_category}}</a>
                                    </li> 
                                    @endif
                                    @endforeach 
                                    @endif

                                    @if (Request::is('search'))
                                    @foreach (DB::table('sub_categories')->get() as $data)
                                    <li class="cat-item">
                                        <a href="{{url('products/sub/'.$data->sub_category)}}">{{$data->sub_category}}</a>
                                    </li> 
                                    @endforeach 
                                    @endif

                                </ul>
                            </div>
                        </div>
                        {{-- <div class="shop-one">
                            <h3 class="wg-title2">Choose Price</h3>
                            <div class="widget shop-filter">
                                <div class="info_widget">
                                    <input type="range" name="" id="">
                                </div>							
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9 col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="features-tab">
                              <!-- Nav tabs -->
                                <div class="shop-all-tab">
                                    <div class="two-part">
                                        <ul class="nav tabs" role="tablist">
                                            <li class="vali">View as:</li>
                                            <li role="presentation"><a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-align-justify"></i></a></li>
                                        </ul>
                                        {{-- <div class="sort-by">
                                            <div class="shop6">
                                                <label>Sort By :</label>
                                                <select>
                                                    <option value="">Default sorting</option>
                                                    <option value="">Sort by popularity</option>
                                                    <option value="">Sort by average rating</option>
                                                    <option value="">Sort by newness</option>
                                                    <option value="">Sort by price: low to high</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="shop5 float-right">
                                        <label>Show :</label>
                                        <select id="show-result-count" onclick="showResultCount()">
                                            @for ($i = 1; $i < 200; $i++)
                                            @if ($i % 5 == 0)
                                            @if ($i == 15 )
                                            <option selected value="{{$i}}">{{$i}}</option>   
                                            @else
                                            @endif
                                            <option value="{{$i}}">{{$i}}</option>  
                                            @endif
                                            @endfor
                                        </select>      
                                        <script defer>
                                            function showResultCount() {
                                                var count = $('.product-card').length;
                                                var value = $('#show-result-count').val();
                                                $('.product-card').hide();
                                                $('.product-list').find('.product-card:lt('+value+')').show();
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div>
                                    <div class="tag-btn-div">
                                        <label for="tags" class="mr-2">Search Tags : </label>
                                        @foreach (DB::table('tags')->get() as $data)
                                        <span class="tag-btn" onclick="handleTagClick(event)">{{$data->tag_name}}</span>
                                        @endforeach
                                        <script defer>
                                            var activeTag = [];
                                            const handleTagClick = (event) => {
                                                if (activeTag.includes(event.target.innerHTML)) {
                                                    event.target.classList.remove('active');
                                                    activeTag.splice(activeTag.indexOf(event.target.innerHTML), 1);
                                                }
                                                else {
                                                    activeTag.push(event.target.innerHTML);
                                                    event.target.classList.add('active');
                                                }
                                                $('.product-card').show();
                                                $('.product-card').each(function(){
                                                    activeTag.forEach(element => {
                                                        if ($(this).attr('data-product-tags').includes(element)) {
                                                            $(this).show();
                                                        } else { $(this).hide(); }
                                                    });
                                                });
                                            }
                                        </script>
                                    </div>
                                    <style>
                                        .tag-btn-div {
                                            display: inline-block !important;
                                        }
                                        .tag-btn {
                                            border: 1px solid #454545;
                                            color: #454545;
                                            padding: 5px 10px;
                                            border-radius: 15px;
                                            align-items: center;
                                            font-size: 0.7rem;
                                            cursor: pointer;
                                            line-height: normal;
                                            display: inline-block;
                                            margin-right: 5px;
                                            margin-top: 7px;
                                            user-select: none;
                                        }
                                        .tag-btn.active {
                                            border: 1px solid #454545;
                                            background-color: #454545;
                                            color: #fff;
                                        }
                                    </style>
                                </div>
                                <hr>
                              <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="shop-tab">
                                            <br>
                                            <div class="row product-list">

                                                @foreach ($product as $item)
                                                @php
                                                    $product_tag_items = "";
                                                    if (isset($item->product_tags)) {
                                                        if (!is_null($item->product_tags)) {
                                                            foreach (unserialize($item->product_tags) as $key => $data) {
                                                                $product_tag_items .= ((string)$data . ' , ');
                                                            }
                                                        }
                                                    }
                                                @endphp
                                                <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12 product-card" data-product-tags="{{$product_tag_items}}">
                                                    <div class="tb-product-item-inner tb2 pct-last">
                                                        @if ($item->product_offer_type != 'None')
                                                        <span class="onsale two">Sale!</span>    
                                                        @endif
                                                        <img alt="" src="{{url($item->product_image_1)}}">
                                                        <a class="la-icon"  href="{{url('product/'.$item->token_number)}}"><i class="fa fa-eye"></i></a>
                                                        <div class="tb-content">
                                                            <div class="tb-it">
                                                                <div class="tb-beg">
                                                                    <a href="{{url('product/'.$item->token_number)}}">{{$item->product_name}}</a>
                                                                </div>
                                                                <div class="tb-product-wrap-price-rating">
                                                                    <div class="tb-product-price font-noraure-3">
                                                                        <span class="amount2 ana" style="text-decoration: none !important;"> ₹ {{$item->product_price_discounted}}</span> 
                                                                        @if ($item->product_price_discounted != $item->product_price)
                                                                        <span class="amount ml-1">₹ {{$item->product_price}}</span>   
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="last-cart l-mrgn">
                                                                    <a class="las3" href="javascript:handleAddToWishlist({{$item->id}});"><i class="fa fa-heart"></i></a>
                                                                    <a class="las4 btn-active" href="javascript:handleAddToCart({{$item->id}},1,'');">Add To Cart</a>
                                                                    <a class="las3 las7" href="javascript:handleCopyLink('{{url('product/'.$item->token_number)}}');"><i class="fa fa-share"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   
                                                @php
                                                    $product_tag_items = '';
                                                @endphp 
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">

                                        <br>
                                        @foreach ($product as $item)
                                        <div class="li-item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="tb-product-item-inner tb2 pct-last">
                                                        @if ($item->product_offer_type != 'None')
                                                        <span class="onsale two">Sale!</span>    
                                                        @endif
                                                        <img alt="" src="{{url($item->product_image_1)}}">
                                                        <a class="la-icon"  href="{{url('product/'.$item->token_number)}}"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="f-fix">
                                                        <div class="tb-beg">
                                                            <a href="{{url('product/'.$item->token_number)}}">{{$item->product_name}}</a>
                                                        </div>
                                                        <div class="tb-product-wrap-price-rating">
                                                            <div class="tb-product-price font-noraure-3">
                                                                <span class="amount2 ana" style="text-decoration: none !important;"> ₹ {{$item->product_price_discounted}}</span> 
                                                                @if ($item->product_price_discounted != $item->product_price)
                                                                <span class="amount2 ana ml-1" style="text-decoration: line-through !important;">₹ {{$item->product_price}}</span>   
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <p class="desc">{{substr($item->product_description,0,300)}}</p>
                                                        <div class="last-cart l-mrgn ns">
                                                            <a class="las4 btn-active" href="javascript:handleAddToCart({{$item->id}},1,'');">Add To Cart</a>
                                                        </div>
                                                        <div class="tb-product-btn">
                                                            <a href="{{url('product/'.$item->token_number)}}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="javascript:handleAddToWishlist({{$item->id}});">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                            <a href="javascript:handleCopyLink('{{url('product/'.$item->token_number)}}');">
                                                                <i class="fa fa-share"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                        @endforeach
                                        
                                    </div>
                                </div>
                                {{-- <div class="shop-all-tab-nor">
                                    <div class="two-part">
                                        <ul class="nav tabs" role="tablist">
                                            <li role="presentation"><a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-align-justify"></i></a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @include('layouts.footer')

    <script defer>
        $('.shop-one-header').click(function(){
            $(this).parent().find('.shop-one-body').toggle(300);
            $(this).parent().toggleClass('active');
        });
        $('.shop-one-header').click();
    </script>
    
</body>
</html>