<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	
	<!-- Meta -->
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	{{-- Meta Tags --}}
    @include('elements.meta')
    {{-- Meta Tags --}}

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="canonical" href="{{ url()->current() }}" />

	<!-- Title -->
	<title>{{ !empty($seoMeta['title']) ? $seoMeta['title'] : config('Site.title') }}</title>

	<!-- FAVICONS ICON -->
	@if(Storage::exists('public/configuration-images/'.config('Site.favicon')))
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/configuration-images/'.config('Site.favicon')) }}">
    @else 
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
    @endif
    
	<!-- Stylesheet -->
	<link href="{{ theme_asset('vendor/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ theme_asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ theme_asset('vendor/lightgallery/css/lightgallery.min.css') }}" rel="stylesheet">
	<link href="{{ theme_asset('vendor/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet">
	<link href="{{ theme_asset('vendor/animate/animate.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ theme_asset('css/style.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default-element-min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('css/custom.min.css') }}">
	
	<!-- Custom Stylesheet -->
	<link class="skin" rel="stylesheet" href="{{ theme_asset('css/skin/skin-1.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ theme_asset('vendor/swiper/css/swiper.min.css') }}">
	
</head>
<body id="bg">
	<div class="page-wraper">
		<!-- Header -->
		@include('elements.header')
		<!-- Header End -->
		
		<div class="page-content bg-white">
			@yield('content')
		</div>
			
		<!-- Footer -->
		@include('elements.footer')
		<!-- Footer End -->
		<button class="scroltop icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
	</div>

	@stack('inline-scripts')
	<script> baseUrl = '{{ url('/') }}'; </script>
	<script>
		var dynamicDate = "{{ config('Site.comingsoon_date') }}";
	</script>
	
	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="{{ theme_asset('js/jquery.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/wow/wow.js') }}"></script>
	<script src="{{ theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ theme_asset('vendor/magnific-popup/magnific-popup.js') }}"></script>
	<script src="{{ theme_asset('vendor/counter/waypoints-min.js') }}"></script>
	<script src="{{ theme_asset('vendor/counter/counterup.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/masonry/masonry-4.2.2.js') }}"></script>
	<script src="{{ theme_asset('vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/imagesloaded/imagesloaded.js') }}"></script>
	<script src="{{ theme_asset('vendor/masonry/isotope.pkgd.min.js') }}"></script>
	<script src="{{ theme_asset('js/dz.carousel.js') }}"></script>
	<script src="{{ theme_asset('js/dz.ajax.js') }}"></script>
	<script src="{{ theme_asset('js/custom.min.js') }}"></script>
	<script src="{{ theme_asset('js/w3cms_frontend.min.js') }}"></script> <!-- W3cms_Frontend JS -->
	<script src="{{ theme_asset('vendor/swiper/js/swiper.min.js') }}"></script>

	@stack('inline-swiper')
</body>
</html>