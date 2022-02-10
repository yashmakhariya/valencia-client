<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Shipping Policy " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Shipping Policy </h2>
                        <p><a href="{{url('')}}">Home</a> | Shipping Policy </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">

            <div>
                <h4>Shipping</h4>
                <p>1. Ships To: Valencia ships all over the India.</p>
                <p>2. Delivery Time: 6-7 Days within India Orders.</p>
                <h6>Please note that customs fee and any taxes associated with your purchase is the responsibility of the customer.</h6><br>

                <h4>Shipping Charges</h4>
                <p>Shipping charges is free for all orders.</p>
            </div>

            <div>
                <h4>Additional Information</h4>
                <p>If you experience any difficulties while e your shipping address during checkout or while you are creating an account, please email us at <a href="mailto:info@valenciaclothing.in">info@valenciaclothing.in</a> with your full shipping address and contact number before you place your order so that an account can be set up for you.</p>
                <h6>If an incorrect shipping address is provided during checkout, reserves the right to charge a reshipment fee of Rs 200.</h6>
            </div>


        </div>
    </section>

    @include('layouts.footer')

</body>
</html>
