

<!-- Slider -->
<div class="banner-two" style="background-image:url({{ theme_asset('images/main-slider/slider2/pic2.png') }}); background-repeat:no-repeat; background-position:top; background-size:100%;">
    <div class="container">
        <div class="banner-inner">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner-content">
                        <h6 class="wow fadeInUp sub-title text-primary" data-wow-delay="0.5s">{{ isset($args['subtitle']) ? $args['subtitle'] : ''}}</h6>
                        <h1 class="wow fadeInUp m-b20" data-wow-delay="1s">{{ isset($args['title']) ? $args['title'] : ''}}</h1>
                        <p 	class="wow fadeInUp m-b15" data-wow-delay="1.5s">{{ isset($args['description']) ? $args['description'] : ''}}</p>
                        <ul class="wow fadeInUp list-check-2 m-b20" data-wow-delay="2.0s">
                            <li>{{ isset($args['list_item_1']) ? $args['list_item_1'] : ''}}</li>
                            <li>{{ isset($args['list_item_2']) ? $args['list_item_2'] : ''}}</li>
                        </ul>
                        @if (isset($args['learn_more_button']) && $args['learn_more_button'] == 'true' )
                            <a href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}" class="btn btn-primary rounded-xl gradient">{{ __('Learn More') }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner-media">
                        <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" class="wow fadeInUp"  data-wow-delay="2s" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>