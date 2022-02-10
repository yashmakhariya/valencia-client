<!DOCTYPE html>
<html lang="en">
<head>
    @php $pageTitle = "Register " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Register</h2>
                        <p><a href="{{url('')}}">Home</a> | Register</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tb-login-form ">
                        <h5 class="tb-title">Register</h5>
                        <p>Hello, Fill the details to register a new account</p>
                        <div class="tb-social-login">
                            <a class="tb-google-login" href="{{url('auth/google')}}">
                                <i class="fab fa-google"></i>
                                Continue With Google
                            </a>
                        </div>
                        <ul class="list-unstyled mb-n2">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                        <br>
                        <form action="{{route('register') }}" method="POST">
                            @csrf
                            <p class="checkout-coupon top log a-an">
                                <label class="l-contact">Your name<em>*</em></label>
                                <input type="text" minlength="5" name="name" required>
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label class="l-contact">Email Address<em>*</em></label>
                                <input type="email" name="email" required>
                            </p>
                            <p class="checkout-coupon top-down log a-an">
                                <label class="l-contact">Password<em>*</em></label>
                                <input type="password" id="password" minlength="6" name="password" required>
                            </p>
                            <p class="checkout-coupon top-down log a-an">
                                <label class="l-contact">Confirm Password<em>*</em></label>
                                <input type="password" minlength="6" id="password-confirm" name="password_confirmation" required>
                            </p>
                            <div class="forgot-password1">
                                <label class="inline2"><input type="checkbox" name="remember" required>I accept the <a class="forgot-password ml-1" href="#">terms & conditions.</a><em></em></label>
                            </div>
                            <p class="login-submit5">
                                <input class="button-primary" type="submit" value="Register">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tb-login-form res">
                        <h5 class="tb-title">Already have an account ?</h5>
                        <form action="{{url('login')}}" method="GET">
                            <p class="login-submit5">
                                <input value="Login" class="button-primary" type="submit">
                            </p>
                        </form>
                        <div class="tb-info-login ">
                            <h5 class="tb-title4">SignUp today and you'll be able to:</h5>
                            <ul>
                                <li>Speed your way through the checkout.</li>
                                <li>Track your orders easily.</li>
                                <li>Keep a record of all your purchases.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    
</body>
</html>