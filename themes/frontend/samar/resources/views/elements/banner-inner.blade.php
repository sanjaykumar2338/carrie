<div class="dlab-bnr-inr overlay-primary-dark" style="background-image: url({{ theme_asset('images/banner/bnr2.jpg') }});">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1>{{ $title }}</h1>
            <!-- Breadcrumb Row -->
            <nav aria-label="breadcrumb" class="breadcrumb-row">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ul>
            </nav>
            <!-- Breadcrumb Row End -->
        </div>
    </div>
</div>


