<div class="dlab-bnr-inr overlay-black-middle bnr-no-img m-b30" style="background-image:url({{ isset($args['image']) && Storage::exists('public/page-images/magic-editor/'.$args['image']) ? asset('storage/page-images/magic-editor/'.$args['image']) : theme_asset('images/banner/pic4.jpg') }})">
    <div class="container">
        <div class="dlab-bnr-inr-entry text-white p-0">                        
            <h1>{{ isset($args['title']) ? $args['title'] : '' }}</h1>
            <div class="sep"></div>
            <!-- Breadcrumb row -->
            <nav aria-label="breadcrumb" class="breadcrumb-row">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($args['title']) ? $args['title'] : '' }}</li>
                </ul>
            </nav>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>