@extends('layout.fullwidth')

@section('content')

    <div class="container">
        <div class="error-page text-center">
            <img class="mb-3" src="{{ asset('storage/configuration-images/'.config('Site.logo_white')) }}" alt="{{ __('Site Logo') }}">
            <div class="dlab_error text-white">{{ __('503') }}</div>
            <h2 class="error-head text-capitalize text-white">{!! config('Site.maintenance_message') !!}</h2>
        </div>
    </div>
    
@endsection