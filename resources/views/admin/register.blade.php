@include('layouts.header')

{{-- Register (Start) --}}
<div class="login">
    <div class="container">
        <h2>Admin Register</h2>
        <br>
        <p>Fill details to register new account</p>
    
        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <form method="POST" action="/register/admin">
                @csrf

                @error('name')<span class="invalid-feedback text-danger" role="alert">{{ $message }}</span>@enderror
                <input id="name" type="text" name="name" placeholder="Your name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('email')<span class="invalid-feedback text-danger" role="alert">{{ $message }}</span>@enderror
                <input id="email" type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('password')<span class="invalid-feedback text-danger" role="alert">{{ $message }}</span>@enderror
                <input id="password" type="password" placeholder="Password" name="password" required autocomplete="new-password">

                <input id="password-confirm" type="password" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">

                <input type="submit" value="Register">
            </form>
        </div>
        <br>
        <p>Already have an account ? <a href="{{url('login')}}"> Login Now</a></p>
    </div>
</div>
{{-- Register (End) --}}

@include('layouts.footer')
