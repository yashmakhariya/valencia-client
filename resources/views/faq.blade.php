<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Privacy Policy " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">FAQ </h2>
                        <p><a href="{{url('')}}">Home</a> | FAQ </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">

            <h5>Some of The Popular FAQs</h5>
            <p>You will find all the solutions to the basic problems faced by customers.</p>
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Can I track the status of my order?
                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Yes, You can track your order status, for this login in your account there you will find a option of order Details, here you can track the status of your order.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Delivery: What should I do if my order hasn't been delivered yet?
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        In very rare cases your order will be delayed, please check your email & messages for updates. A new delivery time frame will be shared with you and you can also track its status by visiting the Order Details option.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Order Issues: I missed the delivery of my order, What to do?
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        If you miss the delivery then the courier service will try to deliver your parcel next business day. You will receive a call or message for same, or you can call to the courier service partner.
                    </div>
                  </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What do I do if I receive a faulty item in my order?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        If you have received a wrong or faulty item, please provide images of the product you have received within 24hrs of receiving your delivery and submit your inquiry at <a href="mailto:info@valenciaclothing.in">info@valenciaclothing.in</a> or Whatsapp us : <a href="tel:+919953089922">+91 9953089922</a> If you fail to notify us within 24hrs of receiving your order, we cannot guarantee a full Refund/Exchange for your order.
                      </div>
                    </div>
                  </div>
              </div>

        </div>
    </section>

    @include('layouts.footer')

</body>
</html>
