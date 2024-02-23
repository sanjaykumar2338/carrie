@extends('layout.fullwidth')

@section('content')

    <div class="container">
    <div class="error-page text-center">
        <div class="cs-logo">
            <div class="logo">
                <img class="mb-3" src="{{ DzHelper::siteLogo() }}" alt="{{ __('Site Logo') }}">
            </div>
        </div>
        <h2 class="error-head text-lowercase text-white mb-0">{!! config('Site.comingsoon_message') !!}</h2>
        <div class="cs-title">{{ __('Coming Soon') }}</div>

        <div class="countdown text-center">
            <div class="date"><span class="time days"></span>
                <span>{{ __('Days') }}</span>
            </div>
            <div class="date"><span class="time hours"></span>
                <span>{{ __('Hours') }}</span>
            </div>
            <div class="date"><span class="time mins"></span>
                <span>{{ __('Minutess') }}</span>
            </div>
            <div class="date"><span class="time secs"></span>
                <span>{{ __('Second') }}</span>
            </div>
        </div>
    </div>
    
@endsection