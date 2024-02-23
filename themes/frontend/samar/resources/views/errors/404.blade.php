@extends('layout.default')

@section('content')
    @php
        $title = __('404');
    @endphp
    @include('elements.banner-inner', compact('title'))

    <div class="section-full" style="background-image: url({{ theme_asset('images/background/bg1.png') }});">
        <div class="container">
            <div class="error-page text-center">
                <div class="dlab_error">{{ $title }}</div>
                <h2 class="error-head">{{ __('We are sorry. But the page you are looking for cannot be found.') }}</h2>
                <a href="{{ url('/') }}" class="btn btn-primary radius-no">
                    <span class="p-lr15">{{ __('Back to Home') }}</span>
                </a>
            </div>
        </div>
    </div>
@endsection
