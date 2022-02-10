<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Cancellation Policy " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Return & Cancellation Policy </h2>
                        <p><a href="{{url('')}}">Home</a> | Return & Cancellation Policy </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">

            <h4>Return</h4>

            <h6>No return policy available on any kind of accessories until it is damaged from our end.</h6>

            <h4>Order Cancellation</h4><br>
            <h5>1. What is our Cancellation Policy?</h5>

            <p>You can cancel your order with in 24 hours by mailing us at <a href="mailto:info@valenciaclothing.in">info@valenciaclothing.in</a></p>
            <h6>Any amount paid will be credited into your source of payment within 7 working days.</h6>


            <p><strong>Note*</strong> Order will not be cancelled once it is processed in our warehouse and dispatched. Please check returns / refund policy.</p>

            <h5>2. Item purchased on sale will not we cancelled or refunded.</h5><br>

            <h5>3. Can I modify the shipping address of my order after it has been placed?</h5>

            <p>Yes, You can modify the shipping address of your order before we have processed (shipped) it, by mailing our customer support team at <a href="mailto:info@valenciaclothing.in">info@valenciaclothing.in</a></p>

            <h6>if we have shipped the order then reshipping charges of 250 INR will have to be paid.</h6><br>


            <h4 style="color: black">Exchanges</h4>

            <p>4. If you require a replacement of size, color or alternative item/s, you are required to initiate a return process of the same.<br>

                5. Purchase made during SALE are not eligible for any kind of Return / exchange <br>

                6. Exchange can be done within 7 days of delivery <br>

                7. Only products which are unused, unworn, unwashed, undamaged, with all its labels and tags completely intact, in original packaging and eligible for exchange.<br>

                8. Please mention your name, address, number, email and order id on the parcel along with the size needed.<br></p>

        </div>
    </section>

    @include('layouts.footer')

</body>
</html>
