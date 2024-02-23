<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	
	<!-- PAGE TITLE HERE -->
	<title>{{ !empty($seoMeta['title']) ? $seoMeta['title'] : config('Site.title') }}</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Meta Tags --}}
    @include('elements.meta')
    {{-- Meta Tags --}}
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="canonical" href="{{ url()->current() }}" />
	
	<!-- FAVICONS ICON -->
	@if(Storage::exists('public/configuration-images/'.config('Site.favicon')))
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/configuration-images/'.config('Site.favicon')) }}">
    @else 
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
    @endif
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" href="{{ theme_asset('plugins/swiper/swiper-bundle.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ theme_asset('css/plugins-min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ theme_asset('css/style.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ theme_asset('css/templete.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default-element-min.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ theme_asset('css/skin/skin-1-min.css') }}">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body id="bg">
	<div class="page-wraper">

		<!-- Header Start-->
		@if (isset($page) && Str::contains($page->slug, 'home'))
            @include('elements.header')
        @else
            @include('elements.header2')
        @endif
		<!-- Header End -->
		
		<!-- Page Content -->
		<div class="page-content bg-white">

			@yield('content')

		</div>
		<!-- Page Content -->

		<!-- Footer Start-->
		@include('elements.footer')
		<!-- Footer End-->

		<button class="scroltop fas fa-chevron-up" ></button>

	</div>
	
	@stack('inline-scripts')
	<script> baseUrl = '{{ url('/') }}'; </script>

	<!-- JAVASCRIPT FILES -->
	<script src="{{ theme_asset('js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
	<script src="{{ theme_asset('plugins/bootstrap/js/popper.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="{{ theme_asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="{{ theme_asset('plugins/magnific-popup/magnific-popup.js') }}"></script><!-- MAGNIFIC POPUP JS -->
	<script src="{{ theme_asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script><!-- FORM JS -->
	<script src="{{ theme_asset('plugins/swiper/swiper-bundle.min.js') }}"></script><!-- SWIPER SLIDER -->
	<script src="{{ theme_asset('js/custom.min.js') }}"></script><!-- CUSTOM FUCTIONS  -->
	<script src="{{ theme_asset('js/w3cms_frontend_min.js') }}"></script><!-- W3cms_Frontend JS -->

  	@stack('inline-swiper')
</body>
</html>