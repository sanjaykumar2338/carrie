<!-- About us -->
<section class="content-inner about-wraper-1" style="background-image: url({{ theme_asset('images/background/bg15.png')}}); background-size: contain; background-position: center right; background-repeat: no-repeat;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="dz-media left">
                    <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" alt="{{ __('Side Image') }}">
                </div>
            </div>
            <div class="col-lg-6 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="section-head style-1">
                    <h6 class="sub-title text-primary m-b15">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
                    <h2 class="title m-b20">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                    <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
                </div>
                <ul class="list-check primary m-b30">
                    @if(isset($args['grouped']))
                        @foreach($args['grouped'] as $key => $value)
                            <li>{{ $value['list'] }}</li>
                        @endforeach
                    @endif
                </ul>
                @if (isset($args['learn_more_button']) && $args['learn_more_button'] == 'true' )
                    <a href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}" class="btn btn-primary rounded-xl gradient">{{ __('Learn More') }}</a>
                @endif
            </div>
        </div>
    </div>
</section>