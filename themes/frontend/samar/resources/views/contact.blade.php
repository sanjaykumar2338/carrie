@extends('layout.default')

@section('content')
    <!-- Content -->

    @php
        $title = __('Get A Quote');
    @endphp
    @include('elements.banner-inner', compact('title'))

    <!-- Contact Us Page -->
    <div class="section-full bg-white content-inner-1 contact-form">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 m-b60">
                    <div class="map-2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14448.884443175983!2d75.81853095!3d25.128214449999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1sen!2sin!4v1615281171136!5m2!1sen!2sin" height="570" style="border:0; width:100%; vertical-align: middle;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="text-center section-head">
                        <h1 class="contact-title">{{ __('Contact Me') }}</h1>
                    </div>
                    <div class="row">
                        <form method="POST" action="{{ route('front.contact') }}">
                            @csrf
                            <div class="row form-set">
                                @if ($errors->any())
                                    <div class="col-12 m-b30">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ implode(', ', $errors->all(':message')) }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                @endif
                                @if (Session::get('success'))
                                    <div class="col-12 m-b30">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ Session::get('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xl-6 mb-3 mb-md-4">
                                    <input name="first_name" required type="text" class="form-control"
                                        placeholder="{{ __('First Name') }}">
                                </div>
                                <div class="col-xl-6 mb-3 mb-md-4">
                                    <input name="last_name" type="text" class="form-control"
                                        placeholder="{{ __('Last Name') }}">
                                </div>
                                <div class="col-xl-6 mb-3 mb-md-4">
                                    <input name="email" required type="text" class="form-control"
                                        placeholder="{{ __('Email Address') }}">
                                </div>
                                <div class="col-xl-6 mb-3 mb-md-4">
                                    <input name="phone_number" required type="text" class="form-control"
                                        placeholder="{{ __('Phone No.') }}">
                                </div>
                                <div class="col-xl-12 mb-3 mb-md-4">
                                    <textarea rows="4" name="message" required class="form-control" placeholder="{{ __('Message') }}"></textarea>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button name="submit" type="submit" value="Submit"
                                        class="btn btn-primary gradient border-0 rounded-xl btn-block">{{ __('Send Message') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="content-inner-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="icon-bx-wraper style-9 m-md-b60 center">
                                    <div class="icon-bx-sm radius gradient"> 
                                        <a href="javascript:void(0);" class="icon-cell text-white">
                                            <i class="las la-phone-volume"></i>
                                        </a> 
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dlab-title">{{ __('Call Now') }}</h4>
                                        <p>{{ config('Site.contact') }}</p>
                                        <p>{{ config('Site.contact') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="icon-bx-wraper style-9 m-md-b60 center">
                                    <div class="icon-bx-sm radius gradient"> 
                                        <a href="javascript:void(0);" class="icon-cell  text-white">
                                            <i class="las la-map-marker"></i>
                                        </a> 
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dlab-title">{{ __('Location') }}</h4>
                                        <p>{{ config('Site.location') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="icon-bx-wraper style-9 center">
                                    <div class="icon-bx-sm radius gradient"> 
                                        <a href="javascript:void(0);" class="icon-cell text-white">
                                            <i class="las la-envelope-open"></i>
                                        </a> 
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dlab-title">{{ __('Email Now') }}</h4>
                                        <p>{{ config('Site.email') }}</p>
                                        <p>{{ config('Site.email') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Clients Logo -->
                <div class="content-inner-3">
                    <div class="container">
                        <div class="clients-carousel owl-none owl-carousel style-2">
                            <div class="item">
                                <div class="clients-logo">
                                    <img class="logo-main" src="{{ theme_asset('images/logo/logo-pink1.png') }}" alt="{{ __('logo') }}">
                                    <img class="logo-hover" src="{{ theme_asset('images/logo/logo-light1.png') }}" alt="{{ __('logo') }}">
                                </div>
                            </div>
                            <div class="item">
                                <div class="clients-logo">
                                    <img class="logo-main" src="{{ theme_asset('images/logo/logo-pink2.png') }}" alt="{{ __('logo') }}">
                                    <img class="logo-hover" src="{{ theme_asset('images/logo/logo-light2.png') }}" alt="{{ __('logo') }}">
                                </div>
                            </div>
                            <div class="item">
                                <div class="clients-logo">
                                    <img class="logo-main" src="{{ theme_asset('images/logo/logo-pink3.png') }}" alt="{{ __('logo') }}">
                                    <img class="logo-hover" src="{{ theme_asset('images/logo/logo-light3.png') }}" alt="{{ __('logo') }}">
                                </div>
                            </div>
                            <div class="item">
                                <div class="clients-logo">
                                    <img class="logo-main" src="{{ theme_asset('images/logo/logo-pink4.png') }}" alt="{{ __('logo') }}">
                                    <img class="logo-hover" src="{{ theme_asset('images/logo/logo-light4.png') }}" alt="{{ __('logo') }}">
                                </div>
                            </div>
                            <div class="item">
                                <div class="clients-logo">
                                    <img class="logo-main" src="{{ theme_asset('images/logo/logo-pink5.png') }}" alt="{{ __('logo') }}">
                                    <img class="logo-hover" src="{{ theme_asset('images/logo/logo-light5.png') }}" alt="{{ __('logo') }}">
                                </div>
                            </div>
                            <div class="item">
                                <div class="clients-logo">
                                    <img class="logo-main" src="{{ theme_asset('images/logo/logo-pink6.png') }}" alt="{{ __('logo') }}">
                                    <img class="logo-hover" src="{{ theme_asset('images/logo/logo-light6.png') }}" alt="{{ __('logo') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Page End -->


    <!-- Content end -->
@endsection
