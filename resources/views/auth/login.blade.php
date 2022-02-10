<!DOCTYPE html>
<html lang="en">
<head>
    @php $pageTitle = "Login " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Login</h2>
                        <p><a href="{{url('')}}">Home</a> | Login</p>
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
                        <h5 class="tb-title">Login</h5>
                        <p>Hello, Welcome your to account</p>
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
                        <form action="{{route('login') }}" method="POST">
                            @csrf
                            <p class="checkout-coupon top log a-an">
                                <label class="l-contact">Email Address<em>*</em></label>
                                <input type="email" name="email" required>
                            </p>
                            <p class="checkout-coupon top-down log a-an">
                                <label class="l-contact">Password<em>*</em></label>
                                <input type="password" minlength="6" name="password" required>
                            </p>
                            <div class="forgot-password1">
                                <label class="inline2"><input type="checkbox" name="remember">Remember me!<em>*</em></label>
                                <a class="forgot-password" href="{{ route('password.request') }}">Forgot Your password?</a>
                            </div>
                            <p class="login-submit5">
                                <input class="button-primary" type="submit" value="login">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tb-login-form res">
                        <h5 class="tb-title">Create a new account</h5>
                        <form action="{{url('register')}}">
                            <p class="login-submit5">
                                <input value="SignUp" class="button-primary" type="submit">
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