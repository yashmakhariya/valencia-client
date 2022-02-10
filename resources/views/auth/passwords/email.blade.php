<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Reset password" @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Reset password</h2>
                        <p><a href="{{url('')}}">Home</a> | Reset password </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-white">{{ __('Reset Password') }}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-dark rounded-0">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    @include('layouts.footer')
    
</body>
</html>