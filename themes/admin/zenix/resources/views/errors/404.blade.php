@extends('admin.layout.fullwidth')

@section('content')
    <div class="col-md-7">
        <div class="form-input-content text-center error-page">
            <h1 class="error-text fw-bold">{{ __('404') }}</h1>
            <h4><i class="fa fa-exclamation-triangle text-warning"></i> {{ __('The page you were looking for is not found!') }}</h4>
            <p>{{ __('You may have mistyped the address or the page may have moved.') }}</p>
            <div>
                <a class="btn btn-primary" href="{{ url('/') }}">{{ __('Back to Home') }}</a>
            </div>
        </div>
    </div>
@endsection