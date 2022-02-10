
        {!!__('<!--- Developed by Labhansh Satpute --->')!!}

        {{-- Run Initial Script --}}
        @guest
			@php
				if (!Cookie::has('mycart')) { 
					$cartItems = [];
				    $cookie = Cookie::queue(Cookie::make('mycart', serialize($cartItems)));
					$cookie = Cookie::forever('mycart', serialize($cartItems));
				}
                if (!Cookie::has('mywishlist')) { 
					$wishlistItems = [];
				    $cookie = Cookie::queue(Cookie::make('mywishlist', serialize($wishlistItems)));
					$cookie = Cookie::forever('mywishlist', serialize($wishlistItems));
				}
			@endphp
		@else
			@php
				if (Cookie::has('mycart')) {  
					$cartCookies = unserialize(Cookie::get('mycart'));
					$cartUser = unserialize(Auth::user()->cart);
					$newArr=  array_merge_recursive($cartCookies, $cartUser);
					$user = Auth::user();
					$user->cart = serialize($newArr);
					$user->update();
					if ($user->update()) {
						$cartItems = [];
						$cookie = Cookie::queue(Cookie::make('mycart', serialize($cartItems)));
						$cookie = Cookie::forever('mycart', serialize($cartItems));
					}
				}
                if (Cookie::has('mywishlist')) {  
					$wishlistCookies = unserialize(Cookie::get('mywishlist'));
					$wishlistUser = unserialize(Auth::user()->cart);
					$newArr = array_merge_recursive($wishlistCookies, $wishlistUser);
					$user = Auth::user();
					$user->cart = serialize($newArr);
					$user->update();
					if ($user->update()) {
						$wishlistItems = [];
                        $cookie = Cookie::queue(Cookie::make('mywishlist', serialize($wishlistItems)));
                        $cookie = Cookie::forever('mywishlist', serialize($wishlistItems));
					}
				}
			@endphp	
		@endguest

        {{-- Title --}}
        <title>{{$pageTitle." | ".env('APP_NAME')}}</title>

        {{-- Meta Tags --}}
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="theme-color" content="#fff">
        @if (isset($description))
        <meta name="description" content="{{$description}}">
        @else
        <meta name="description" content="Website description">
        @endif
        <meta name="keyword" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Open Graph Protocol --}}
        <meta property="og:url" content="{{url('/')}}">
        <meta property="og:site_name" content="{{env('APP_NAME')}}">
        <meta property="og:type" content="Website">
        <meta property="og:title" content="{{$pageTitle}}">
        @if (isset($description))
        <meta property="og:description" content="{{$description}}">
        @else
        <meta property="og:description" content="Website description">
        @endif
        @if (isset($image))
        <meta property="og:image" content="{{url($image)}}" />
        @else
        <meta property="og:image" content="{{url('assets/images/favicon.png')}}" />
        @endif

        {{-- Connical Tag --}}
        <link rel="canonical" href="{{url('/index.php')}}"/>
        <link rel="alternate" href="{{url('/')}}" hreflang="en-us" />

        {{-- Schema --}}
        <script type="application/ld+json">
            {
            "@context" : "http://schema.org",
            "name" : "{{env('APP_NAME')}}",
            "datePublished" : "",
            "url" : "{{url('/')}}",
            "image" : "{{url('assets/images/favicon.png')}}"
            }
        </script>

        {{-- Appl Touch and Favicon --}}
        <link rel="apple-touch-icon" href="{{url('images/favicon.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{url('images/favicon.png')}}">

        {{-- Google Fonts --}}
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,900,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

        {{-- Stylesheets --}}
        <link rel="stylesheet" href="{{url('css/animate.css')}}">
        <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{url('css/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{url('css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{url('css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{url('lib/css/nivo-slider.css')}}" type="text/css" />
		<link rel="stylesheet" href="{{url('lib/css/preview.css')}}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{url('css/style.css')}}">
        <link rel="stylesheet" href="{{url('css/responsive.css')}}">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- Sweet Alerts --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        {{-- Tostify js --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        {{-- Scripts --}}
        <script src="{{url('js/vendor/modernizr-2.8.3.min.js')}}"></script>
        