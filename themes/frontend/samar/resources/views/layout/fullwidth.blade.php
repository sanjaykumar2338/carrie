<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
	
	<!-- PAGE TITLE HERE -->
	<title>{{ config('Site.title') ? config('Site.title') : __('W3CMS Laravel') }}</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="{{ theme_asset('css/style.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ theme_asset('css/skin/skin-2.css') }}">


	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body id="bg">
	<div class="page-wraper">

		<div class="page-content bg-white">
			<div class="content-block">
				<div class="section-full bg-white coming-soon overlay-black-dark" style="background-image: url({{ theme_asset('images/background/bg2.jpg') }});  background-size:cover;">
		
					@yield('content')
		
				</div>
			</div>
		</div>
		

		<button class="scroltop fas fa-chevron-up" ></button>

	</div>

	<script>
		// Assuming $dynamicDate is the dynamic value from the database
		var dynamicDate = "{{ config('Site.comingsoon_date') }}";
	</script>
	
	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="{{ theme_asset('js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
	<script src="{{ theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="{{ theme_asset('vendor/owl-carousel/owl.carousel.js') }}"></script><!-- OWL-CAROUSEL JS -->
	<script src="{{ theme_asset('vendor/magnific-popup/magnific-popup.js') }}"></script><!-- MAGNIFIC-POPUP JS -->
	<script src="{{ theme_asset('vendor/countdown/jquery.countdown.js') }}"></script><!-- COUNTDOWN FUCTIONS  -->
	<script src="{{ theme_asset('js/custom.min.js') }}"></script><!-- CUSTOM JS -->
	<script src="{{ theme_asset('js/w3cms_frontend.min.js') }}"></script><!-- W3cms_Frontend JS -->
</body>
</html>