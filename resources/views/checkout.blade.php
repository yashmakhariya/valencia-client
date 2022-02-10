<!DOCTYPE html>
<html lang="en">
<head>
    
    @php $pageTitle = "Checkout" @endphp

    @include('layouts.app')
    
</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Checkout</h2>
                        <p><a href="{{url('')}}">Home</a> | Checkout</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form action="{{route('checkout')}}" method="POST">
        @csrf

    <div class="checkout-area">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="coupon-accordion res">
                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content tnm">
                            <div class="coupon-info pb-1">
                                <p class="checkout-coupon res d-flex">
                                    <input type="text" placeholder="Coupon code" name="coupon-code" id="coupon-input" />
                                    <button type="button" onclick="checkCoupon()" class="btn-theme small py-2 ml-2">Apply Coupon</button>
                                </p>
                                <p id="coupon-message"></p>
                            </div>
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
                                            if (result[2] != 0) {
                                                $('#coupon-code-flash').html('<p>Coupon code applied<span><span class="amount"> - ₹ '+result[2]+'</span></span></p><div class="ro-divide"></div>');
                                            }
                                        },
                                    })
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="text">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class=" ano complete">
                                <a class="active" href="#home" id="details-tab-btn"  aria-controls="home" role="tab" data-toggle="tab"></a>
                                <span>Address</span>
                            </li>
                            <li role="presentation" class="ano ">
                                <a href="#profile" id="payment-tab-btn" aria-controls="profile" role="tab" data-toggle="tab"></a>
                                <span>Payment</span>
                            </li>
                            <li role="presentation" class="ano la">
                                <a href="#message" id="complete-tab-btn"  aria-controls="message" role="tab" data-toggle="tab"></a>
                                <span>Complete</span>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <br>
                        <ul class="list-unstyled mb-n2">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                        <br>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="checkbox-form">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3 class="checkbox9">SHIPPING ADDRESS DETAILS</h3>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="di-na bs">
                                                    <label class="l-contact">First Name<em>*</em></label>
                                                    <input class="form-control" type="text" minlength="2" required name="first-name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="di-na bs">
                                                    <label class="l-contact">Last Name<em>*</em></label>
                                                    <input class="form-control" type="text" min="2" required name="last-name">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="di-na bs">
                                                    <label class="l-contact">Email address<em>*</em></label>
                                                    <input class="form-control" type="email" required name="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="di-na bs">
                                                    <label class="l-contact">Phone (Primary)<em>*</em></label>
                                                    <input class="form-control" type="tel" minlength="10" required name="phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="di-na bs">
                                                    <label class="l-contact">Phone (Alternate)</label>
                                                    <input class="form-control" type="tel" minlength="10" name="phone-alternate">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="country-select">
                                                    <label class="l-contact">State <em>*</em></label>
                                                    <select class="email s-email s-wid" name="state" required>
                                                        <option value="">Select State</option>
                                                        <option value="Andaman and Nicobar">Andaman and Nicobar</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Orissa">Orissa</option>
                                                        <option value="Pondicherry">Pondicherry</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttaranchal">Uttaranchal</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="l-contact">Street<em>*</em></label>
                                                <div class="di-na bs">
                                                    <input class="form-control" type="text" required name="street"  placeholder="Street address">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="l-contact">City<em>*</em></label>
                                                <div class="di-na bs">
                                                    <input class="form-control" type="text" required name="city"  placeholder="Town / City">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="l-contact">Pincode<em>*</em></label>
                                                <div class="di-na bs">
                                                    <input class="form-control" type="text" required name="pincode"  placeholder="Pincode">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">           
                                    <div class="col-md-12">
                                        <div class="di-na bs">
                                            <label class="l-contact">Order Notes</label>
                                            <textarea class="input-text " placeholder="Notes about your order, e.g. special notes for delivery." name="order-note"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <p class="checkout-coupon">
                                            <button type="button" class="btn-theme" onclick="$('#payment-tab-btn').click();">Next step</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="top-check-text">
                                            <div class="check-down">
                                                <h3 class="checkbox9">SELECT PAYMENT METHOD</h3>
                                            </div>
                                        </div>
                                        <div class="all-payment">
                                            <div class="all-paymet-border">
                                                <div class="payment-method">
                                                    <div class="pay-top sin-payment">
                                                        <input id="payment_method_1" class="input-radio" type="radio" value="Cash on Delivery" name="payment-method" required>
                                                        <label for="payment_method_1"> Cash On Delivery </label>
                                                        <div class="payment_box payment_method_bacs">You have to pay cash when you recive your order.</p>
                                                        </div>
                                                    </div>
                                                    <div class="pay-top sin-payment">
                                                        <input id="payment_method_2" class="input-radio" type="radio" value="Online Payment" name="payment-method" required>
                                                        <label for="payment_method_2"> Online Payment (Via Razorpay) </label>
                                                        <div class="payment_box payment_method_bacs">Pay online via Razorpay payment gateway safe and secure.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="checkout-coupon">
                                            <button type="button" class="btn-theme" onclick="$('#details-tab-btn').click();">Previous step</button>
                                            <button type="button" class="btn-theme" onclick="$('#complete-tab-btn').click();">Next step</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="message">
                                <div class="last-check">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h6>Click the button to place your order</h6>
                                            <p>Note : Make sure you are filled all the details in previous stpes</p>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <br>
                                            <p class="checkout-coupon">
                                                <button type="submit" class="btn-theme">Place Order</button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="ro-checkout-summary">
                        <div class="ro-title">
                            <h3 class="checkbox9 mb-0">ORDER SUMMARY</h3>
                        </div>
                        <div class="ro-body">
                            @php
                                $total = 0;
                                $shipping = DB::table('meta_data')->where('data','shipping')->first()->value;
                                $gst = DB::table('meta_data')->where('data','gst')->first()->value;
                            @endphp
                            @foreach (unserialize($cartItems) as $key => $value)
                                @foreach ($product->where('id',$value[0]) as $item)
                                <div class="ro-item">
                                    <div class="ro-image">
                                        <a href="{{url('product/'.$item->token_number)}}">
                                            <img src="{{url($item->product_image_thumbnail)}}" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <div class="tb-beg">
                                            <a href="{{url('product/'.$item->token_number)}}">{{$item->product_name}}</a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="ro-price">
                                            <span class="amount">₹ {{$value[2]}}</span>
                                        </div>
                                        <div class="ro-quantity">
                                            <strong class="product-quantity">× {{$value[1]}}</strong>
                                        </div>
                                        <div class="product-total">
                                            <span class="amount">₹ {{$total +=  $value[1] * $value[2]}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                        </div>
                        <div class="ro-footer">
                            <div>
                                <p>
                                    Subtotal
                                    <span>
                                        <span class="amount">₹ {{number_format($total,2)}}</span>
                                    </span>
                                </p>
                                <div class="ro-divide"></div>
                            </div>
                            <div>
                                <p>
                                    Shipping
                                    <span>
                                        @if ($shipping != "")
                                            @php
                                                $total = $total + $shipping;
                                            @endphp
                                            <span class="amount">₹ {{number_format($shipping,2)}}</span>
                                        @else
                                            <span class="amount">Free</span>
                                        @endif
                                    </span>
                                </p>
                                <div class="ro-divide"></div>
                            </div>
                            <div>
                                <p>
                                    GST
                                    <span>
                                        @if ($gst != "")
                                            @php
                                                $gstAmount = ( $total * $gst ) / 100;
                                                $total = $total + $gstAmount;
                                            @endphp
                                            <span class="amount">₹ {{number_format($gstAmount,2)}}</span>
                                        @else
                                            <span class="amount">Included</span>
                                        @endif
                                    </span>
                                </p>
                                <div class="ro-divide"></div>
                            </div>
                            <div id="coupon-code-flash">

                            </div>
                            <div class="order-total">
                                <p>
                                    Total
                                    <span>
                                        <strong>
                                            <span class="amount" id="total-amount">₹ {{number_format($total,2)}}</span>
                                            <input type="text" name="total-input" hidden value="{{$total}}" id="total-input">
                                        </strong>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>

    @include('layouts.footer')
    
</body>
</html>