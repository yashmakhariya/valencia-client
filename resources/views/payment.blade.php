<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Payments " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Payments </h2>
                        <p><a href="{{url('')}}">Home</a> | Payments </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container" align="center">
            
            <h5>Complete your order payment</h5>
            <br>
            @foreach ($order as $item)
            <form action="{{url('payment/'.$item->token_number)}}" method="POST" >
                @csrf
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ env('RAZORPAY_KEY') }}"
                data-amount="{{$item->total*100}}"
                data-currency="INR"
                data-buttontext="Make Payment ₹ {{number_format($item->total,2)}}"
                data-name="{{ env('APP_NAME') }}"
                data-description="Please Pay the Payment"
                data-image=""
                data-prefill.name="name"
                data-prefill.email="email"
                data-theme.color="#1d0c02"></script>
            </form>  
            @endforeach

            <br>

            <p>Note : Do not reload browser after payment complition</p>

        </div>
    </section>

    @include('layouts.footer')

    <script defer>
        $(document).ready(function(){
            $('.razorpay-payment-button').click();
        })
        document.querySelector('.razorpay-payment-button').classList.add('btn-theme');
    </script>
    
</body>
</html>