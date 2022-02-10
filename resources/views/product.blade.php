<!DOCTYPE html>
<html lang="en">
<head>
    
    @php 
        $pageTitle = $product->implode('product_name');
        $description = $product->implode('product_description');
        $image = $product->implode('product_image_1');
    @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    @foreach ($product as $item)

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">{{$item->product_parent_category}}</h2>
                        <p><a href="{{url('')}}">Home</a> | {{$item->product_parent_category}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="single-product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-xl-9 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="tab-zoom">
                              <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="image1" class="tab-pane fade show active">
                                        <div class="s_big">
                                            <a href="{{url($item->product_image_1)}}" class="demo4"><img src="{{url($item->product_image_1)}}" alt=""></a>
                                        </div>
                                    </div>
                                    @if (!is_null($item->product_image_2))
                                    <div id="image2" class="tab-pane fade">
                                        <div class="s_big">
                                            <a href="{{url($item->product_image_2)}}" class="demo4"><img src="{{url($item->product_image_2)}}" alt=""></a>
                                        </div>
                                    </div>    
                                    @endif
                                    @if (!is_null($item->product_image_3))
                                    <div id="image3" class="tab-pane fade">
                                        <div class="s_big">
                                            <a href="{{url($item->product_image_3)}}" class="demo4"><img src="{{url($item->product_image_3)}}" alt=""></a>
                                        </div>
                                    </div>    
                                    @endif
                                    @if (!is_null($item->product_image_4))
                                    <div id="image4" class="tab-pane fade">
                                        <div class="s_big">
                                            <a href="{{url($item->product_image_4)}}" class="demo4"><img src="{{url($item->product_image_4)}}" alt=""></a>
                                        </div>
                                    </div>    
                                    @endif
                                    @if (!is_null($item->product_image_5))
                                    <div id="image5" class="tab-pane fade">
                                        <div class="s_big">
                                            <a href="{{url($item->product_image_5)}}" class="demo4"><img src="{{url($item->product_image_5)}}" alt=""></a>
                                        </div>
                                    </div>    
                                    @endif
                                    @if (!is_null($item->product_image_6))
                                    <div id="image6" class="tab-pane fade">
                                        <div class="s_big">
                                            <a href="{{url($item->product_image_6)}}" class="demo4"><img src="{{url($item->product_image_6)}}" alt=""></a>
                                        </div>
                                    </div>    
                                    @endif
                                </div>
                                <div class="thumnail-image fix">
                                    <ul class="tab-menu nav">
                                        <li><a class="active" data-toggle="tab" href="#image1"><img alt="" src="{{url($item->product_image_1)}}"></a></li>
                                        @if (!is_null($item->product_image_2))
                                        <li><a data-toggle="tab" href="#image2"><img alt="" src="{{url($item->product_image_2)}}" ></a></li>
                                        @endif
                                        @if (!is_null($item->product_image_3))
                                        <li><a data-toggle="tab" href="#image3"><img alt="" src="{{url($item->product_image_3)}}" ></a></li>
                                        @endif
                                        @if (!is_null($item->product_image_4))
                                        <li><a data-toggle="tab" href="#image4"><img alt="" src="{{url($item->product_image_4)}}" ></a></li>
                                        @endif
                                        @if (!is_null($item->product_image_5))
                                        <li><a data-toggle="tab" href="#image5"><img alt="" src="{{url($item->product_image_5)}}" ></a></li>
                                        @endif
                                        @if (!is_null($item->product_image_6))
                                        <li><a data-toggle="tab" href="#image6"><img alt="" src="{{url($item->product_image_6)}}" ></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="entry-summary">
                                <div class="entry-title">{{$item->product_name}}</div>
                                <div class="tb-product-wrap-price-rating">
                                    <div class="tb-product-price font-noraure-3 nurore">
                                        <span class="amount2 ana">₹ {{$item->product_price_discounted}} </span>
                                        @if ($item->product_price_discounted != $item->product_price)
                                        <span class="amount2 ana ml-2" style="text-decoration: line-through; color:red !important;">₹ {{$item->product_price}} </span>    
                                        @endif
                                    </div>
                                    <div class="stock">
                                        Category : <span><a href="{{url('product/'.$item->product_parent_category.'/'.$item->product_sub_category)}}" class="text-warning">{{$item->product_parent_category}} \ {{$item->product_sub_category}} </a></span>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <ul class="pl-3" style="list-style: circle;">
                                        @foreach (unserialize($item->product_attributes) as $data => $attribute)
                                            <li>{{$attribute[0]}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <hr>
                                @if (!is_null($item->product_variant))
                                @if (count(unserialize($item->product_variant)) != 0)
                                <div>
                                    <h6>Variants</h6>
                                    <div class="mt-2">
                                    @foreach (unserialize($item->product_variant) as $data => $key)
                                    <a href="{{isset($key[1]) ? url('product/'.$key[1]) : '#'}}" style="color: #fff; border-radius: 3px; padding: 3px 15px; border: 2px double #999999; font-size: 0.8rem; background-color: {{isset($key[2]) ? $key[2] : '#000'}}" class="btn text-capitalize tab-btn mr-2">{{$key[0]}}</a>
                                    @endforeach
                                    </div>
                                </div>
                                @endif
                                <hr>    
                                @endif
                                 <form method="POST" action="#" id="product-page-form" onsubmit="(e) => e.preventDefault();">
                                <input type="number" value="{{$item->id}}" hidden name="id" id="product-page-id">
                                <!-- <div class="woocommerce-shipping-calculator">
                                    @if (!is_null($item->product_size))
                                    <p class="form-row form-row-wide">
                                        <label>
                                            Size 
                                            <span class="required">*</span>
                                        </label>
                                        <select class="email s-email s-wid" id="product-page-size" name="size" required>
                                            <option selected disabled value="">Select size</option>
                                            @foreach (unserialize($item->product_size) as $data => $sizes)
                                                <option value="{{$sizes[0]}}">{{$sizes[0]}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                    @endif
                                </div> -->
                                @if (!is_null($item->product_size))
                                <div class="woocommerce-shipping-calculator">
                                    <div class="d-inline-block">
                                        @foreach (unserialize($item->product_size) as $data => $sizes)
                                        <div class="size-btn-div">
                                            <span class="size-btn" onclick="SetSize(event)">{{$sizes[0]}}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                    <input type="text" readonly name="size" id="product-page-size" required hidden>
                                    <script defer>
                                        const SetSize = (event) => {
                                            document.getElementById('product-page-size').value = event.target.innerHTML;
                                            let tags = document.querySelectorAll(".size-btn-div .size-btn");
                                            tags.forEach( tag => {
                                                tag.classList.remove('active');
                                            });
                                            event.target.classList.add('active');
                                        };
                                        document.querySelector('.size-btn').click();
                                    </script>
                                </div>
                                <hr>
                                <style>
                                    .size-btn-div {
                                        display: inline-block !important;
                                    }
                                    .size-btn {
                                        border: 1px solid #454545;
                                        color: #454545;
                                        height: 37px;
                                        min-width: 37px;
                                        padding: 10px 20px;
                                        border-radius: 25px;
                                        width: fit-content;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        font-size: 0.9rem;
                                        cursor: pointer;
                                        line-height: normal;
                                    }
                                    .size-btn.active {
                                        border: 1px solid #454545;
                                        background-color: #454545;
                                        color: #fff;
                                    }
                                </style>
                                @endif
                                <div class="single-price">
                                    <div class="ro-quantity clearfix">
                                        <label>
                                                Qty:
                                                <span class="s-color"> *</span>
                                        </label>
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                              <input type="number" readonly min="1" id="product-page-quantity" minlength="1" value="1" name="quantity" class="cart-plus-minus-box" required>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="add-two-single">
                                        <div class="last-cart l-mrgn ns">
                                            <a class="las4 btn-active" href="javascript:$('#product-form-submit').click()" onclick="">Add To Cart</a>
                                        </div>
                                        <div class="tb-product-btn shp">
                                            <a href="javascript:handleAddToWishlist({{$item->id}});">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="javascript:handleCopyLink('{{url('product/'.$item->token_number)}}');">
                                                <i class="fa fa-share"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="capture-pn">
                                        <img src="{{url('images/icon-images/capture.png')}}" alt="">
                                    </div>
                                </div>
                                <input type="submit" value="submit" hidden id="product-form-submit"></button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="text-sin">
                        <!-- Nav tabs -->
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" href="#home" data-toggle="tab">Description</a>
                            </li>
                            <li>
                                <a href="#profile" data-toggle="tab">Additional Information</a>
                            </li>
                            <li>
                                <a href="#messages" data-toggle="tab">Reviews ({{count(DB::table('reviews')->where('product_id',$item->id)->get())}})</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active sin-ha" id="home">
                                <h2>Product Description</h2>
                                <hr>
                                <pre>{{$item->product_description}}</pre>
                            </div>
                            <div class="tab-pane sin-ha" id="profile">
                                <h2>Additional Information</h2>
                                <hr>
                                @foreach (unserialize($item->product_attributes) as $data => $attribute)
                                <p class="mb-1">{{$attribute[0]}}</p>     
                                @endforeach
                            </div>
                            <div class="tab-pane sin-ha" id="messages">
                                <h2>Reviews</h2>
                                <hr>
                                @foreach (DB::table('reviews')->where('product_id',$item->id)->get() as $review)
                                
                                    @if (DB::table('users')->where('id',$review->user_id )->exists())
                                    <div class="mb-3">
                                    @foreach (DB::table('users')->where('id',$review->user_id )->get() as $user)
                                        <h6 class="mb-1">{{$user->name}}</h6>
                                        <p class="woocommerce-nore mb-1">{{$user->email}}</p>
                                        <h5>{{$review->review}}</h5>
                                        <div>
                                            @for ($i = 1; $i <= $review->ratings; $i++)
                                                <i class="fas fa-star text-warning"></i>
                                            @endfor
                                            @for ($i = 1; $i <= (5 - $review->ratings); $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                    @endforeach  
                                    </div>    
                                    <hr>  
                                    @endif
                                
                                @endforeach
                                
                                @guest

                                @else
                                <!--<div class="cat_bottom">-->
                                <!--    <p class="text-secondary h5 mb-4 mt-3">-->
                                <!--        Login to your account to give rating.</p>-->
                                <!--    <p class="buttons">-->
                                <!--        <a class="button wc-forward" href="{{url('login')}}">Login</a>-->
                                <!--    </p>-->
                                                                  
                                <!-- </div>-->
                                <form action="{{route('review')}}" method="POST">
                                    @csrf
                                    <div class="sin-form2">
                                        <p class="woocommerce-nore2">Your Rating</p>
                                        <span id="review-star-div">
                                            <a href="javascript:setRating(1);"><i class="fas fa-star review-star "></i></a>
                                            <a href="javascript:setRating(2);"><i class="fas fa-star review-star "></i></a>
                                            <a href="javascript:setRating(3);"><i class="fas fa-star review-star "></i></a>
                                            <a href="javascript:setRating(4);"><i class="fas fa-star review-star "></i></a>
                                            <a href="javascript:setRating(5);"><i class="fas fa-star review-star "></i></a>
                                        </span>
                                        <script defer>
                                            function setRating(value) {
                                                document.getElementById('ratings-input').value = value;
                                                for (let index = 1; index <= value; index++) {
                                                    $('.review-star').removeClass('text-warning');
                                                    $('#review-star-div').find('.review-star:lt('+index+')').addClass('text-warning');
                                                }
                                            }
                                        </script>
                                        <input type="number" min="0" value="0" hidden readonly max="5" id="ratings-input" name="ratings" required >
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="product-id" value="{{$item->id}}" required readonly hidden>
                                            <label class="l-contact"> Your Review <em>*</em></label>
                                            <textarea class="form-control" name="review" required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="last-cart-con s-icon2">
                                                <input class="wpcf7" type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endguest
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-12">
                    <div class="top-shop-sidebar an-shop">
                        <h3 class="wg-title">Featured Products</h3>
                        <ul>
                            @foreach (DB::table('products')->where('id','!=',$item->id)->where('product_group_type','Featured')->paginate(5) as $product)
                                <li class="b-none">
                                    <div class="tb-recent-thumbb">
                                        <a href="{{url('product/'.$product->token_number)}}">
                                            <img class="attachment" src="{{url($product->product_image_1)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="tb-recentb">
                                        <div class="tb-beg">
                                            <a href="{{url('product/'.$product->token_number)}}">{{substr($product->product_name,0,30)}}</a>
                                        </div>
                                        <div class="tb-product-price font-noraure-3">
                                            <span class="amount2">₹ {{$product->product_price_discounted}}</span>
                                            @if ($product->product_price_discounted != $product->product_price)
                                            <span class="amount ana" style="text-decoration: line-through; color:red !important;"> ₹ {{$product->product_price}}</span>    
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                       </ul>
                    </div>
                </div>
            </div>   
        </div>
    </section>
    @endforeach

    <section class="single-pro-area7">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="last-line">
                        <h3 class="wg-title">Related Products</h3>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="non7">
                <div class="row">

                    @foreach ($similarProduct as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="tb-product-item-inner tb2 pct-last">
                        @if ($product->product_offer_type != 'None')
                        <span class="onsale two">Sale!</span>    
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
                                    <a class="las3" href="javascript:handleAddToWishlist({{$product->id}});"><i class="fa fa-heart"></i></a>
                                    <a class="las4" href="javascript:handleAddToCart({{$product->id}},1,'');">Add To Cart</a>
                                    <a class="las3 las7" href="javascript:handleCopyLink('{{url('product/'.$product->token_number)}}');"><i class="fa fa-share"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> 
                    </div>   
                    @endforeach

                    	
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
    
</body>
</html>