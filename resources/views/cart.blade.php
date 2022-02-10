<!DOCTYPE html>
<html lang="en">
<head>
    
    @php $pageTitle = "Cart" @endphp
    
    @include('layouts.app')

    <style>
        .cart-hidden-element {
            display: none;
        }
        .continue-shopping-btn {
            display: none;
        }
    </style>

</head>
<body>

    @include('layouts.header')

    <!-- mobile-menu-area end --> 
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">shopping Cart</h2>
                        <p><a href="{{url('')}}">Home</a> | shopping Cart</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="shopping-cart-area s-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <form action="{{url('checkout/'.rand(00000,99999))}}" method="GET">
                    <div class="s-cart-all">
                        <div class="page-title cart-title mb-5">
                            <h1 id="cart-title"></h1>
                            <a href="{{url('all/products')}}" class="btn btn-theme continue-shopping-btn">Continue shopping</a>
                        </div>   
                        <div class="cart-form table-responsive cart-hidden-element">
                            <table id="shopping-cart-table" class="data-table cart-table">
                                <tr>
                                    <th class="low1">Product</th>
                                    <th class="low7">Size</th>
                                    <th class="low1">Quantity</th>
                                    <th class="low1">Price</th>
                                    <th class="low1">Remove</th>
                                </tr>
                                <tbody id="cart-items-list">

                                </tbody>
                            </table>
                        </div>
                        <div class="last-check1 cart-hidden-element">
                            <div class="yith-wcwl-share yit">
                                <p class="checkout-coupon an-cop">
                                    <input type="submit" id="card-form-submit" hidden>
                                    <input type="button" class="btn btn-theme" onclick="syncCartPage()" value="Update Cart">
                                </p>
                            </div>
                        </div>
                    </div>    
                    </form>
                </div>
            </div>
            <div class="second-all-class cart-hidden-element">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-12">
                        <div class="tb-tab-container2">
                            <ul class="nav etabs" role="tablist">
                                <li role="presentation" class="vc_tta-tab"><a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab">Check Delivery</a></li>
                                <li class="vc_tta-tab " role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Use Coupon Code</a></li>
                            </ul>
                            <div class="tab-content another-cen">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="top-shopping4">
                                        <p class="shop9">Check delivery status</p>
                                        <p class="down-shop">Enter your pincode to check delivery in your area</p>
                                    </div>
                                    <form action="#" onsubmit="return false;" class="woocommerce-shipping-calculator">
                                        <p class="form-row form-row-wide">
                                            <label>Pincode <span class="required">*</span></label>
                                            <input class="form-control" id="pincode-input" type="text" name="name" required="" placeholder="Pincode">
                                        </p>
                                        <p class="checkout-coupon two">
                                            <input type="submit" value="Check" onclick="checkDelivery()">
                                        </p>
                                    </form>
                                    <h6 id="delivery-message"></h6>
                                    <script defer>
                                        function checkDelivery() {
                                            $.ajax({
                                                type: 'GET',
                                                url: '/check/delivery',
                                                data : {
                                                    pincode: $('#pincode-input').val(),
                                                },
                                                success: function(data) { 
                                                    if (data['status'] == "404") {
                                                        $('#delivery-message').html(data['message']);
                                                    }
                                                    else {
                                                        $('#delivery-message').html("Expected delivery in " +data['data']['available_courier_companies'][0]['estimated_delivery_days'] + " days");
                                                    }
                                                }
                                            })
                                        }
                                    </script>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="2nd-copun-code">
                                        <form action="#" onsubmit="return false;">
                                            <p class="form-row form-row-wide">
                                                <label>Coupon: <span class="required">*</span></label>
                                                <input class="form-control again" type="text" name="name" required="" placeholder="Coupon code" id="coupon-input">
                                                <input type="text" id="total-input" hidden required>
                                            </p>
                                            <p class="checkout-coupon full">
                                                <input type="submit" onclick="checkCoupon()" value="Apply Coupon">
                                            </p>
                                        </form>
                                        <p id="coupon-message"></p>
                                        <script defer>
                                            function checkCoupon() {
                                                $.ajax({
                                                    type: 'GET',
                                                    url: '/checkcoupon',
                                                    data : {
                                                        coupon: $('#coupon-input').val(),
                                                        total: $('#total-input').val(),
                                                    },
                                                    success : function(result) {
                                                        console.log(result);
                                                        $('#total-amount').html('₹ ' + result[0]);
                                                        $('#coupon-message').html(result[1]);
                                                    },
                                                })
                                            }
                                        </script>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="sub-total">
                            <table>
                                <tbody id="checkout-list">
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="wc-proceed-to-checkout">
                            <p class="return-to-shop">
                                <a class="button wc-backward" href="{{url('/')}}">Continue Shopping</a>
                            </p>
                            <a class="wc-forward" href="javascript:redirectCheckout();">Proceed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script defer>
        function syncCartPage() {
            $.ajax({
                type: 'GET',
                url: '/synccartpage',
                success: function(data) {
                    $('#cart-items-list').html(data[0]);
                    $('#checkout-list').html(data[1]);
                    $('#total-input').val(data[3]);
                    if (data[2] == 0) {
                        $('.cart-hidden-element').hide();
                        $('.cart-title').addClass('text-center');
                        $('.continue-shopping-btn').show();
                        $('#cart-title').html('Your cart is empty');
                    }
                    else if ( data[2] == 1) {
                        $('.cart-hidden-element').show();
                        $('.cart-title').removeClass('text-center');
                        $('.continue-shopping-btn').hide();
                        $('#cart-title').html(data[2] + ' Item in your cart');
                    }
                    else {
                        $('.cart-hidden-element').show();
                        $('.cart-title').removeClass('text-center');
                        $('.continue-shopping-btn').hide();
                        $('#cart-title').html(data[2] + ' Items in your cart');
                    }
                }
            });
        }

        function removeItemFromCart(id) {
            $.ajax({
                type: "GET",
                url: '/removefromcart',
                data: { 'id' : id },
                success: function() {
                    syncCart(),
                    syncCartPage()
                }
            });
        }

        function redirectCheckout() {
            syncCartPage();
            $('#card-form-submit').click();
        }

        function changeSize(id,size) {
            $.ajax({
                type: "POST",
                url: '/changesize',
                data: { 
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'id' : id,
                    'size' : size
                },
                success: function() {
                    syncCartPage();
                },
            });
        }

        function changeQuantity(id,quantity) {
            $.ajax({
                type: "POST",
                url: '/changequantity',
                data: { 
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'id' : id,
                    'quantity' : quantity
                },
                success: function() {
                    syncCartPage();
                },
            });
        }
        syncCartPage();
    </script>

</body>
</html>