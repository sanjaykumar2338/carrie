

<!-- Clients Logo -->
<div class="content-inner-3">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title text-primary m-b10">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        
        <div class="clients-carousel swiper swiper-container style-2 {{ $args['base'] }}">
            <div class="swiper-wrapper">
                @if(isset($args['grouped']))
                    @foreach($args['grouped'] as $key => $value)
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="clients-logo">
                                    <img class="logo-main" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$value['image_1']) }}" alt="{{ 'Slide_Logo_'.$key+1 }}">
                                    <img class="logo-hover" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$value['image_2']) }}" alt="{{ 'Slide_Logo_'.$key+1 }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif    
            </div>
        </div>
    </div>
</div>

@push('inline-swiper')
    <script>
        'use strict';
        var swiper_class = '{{ $args['base'] }}';
        var space_between = {{ isset($args['space_between']) ? $args['space_between'] : 30 }};
        var loop = {{ isset($args['loop']) ? $args['loop'] : 'false' }};
        var keyboard_control = {{ isset($args['keyboard_control']) ? $args['keyboard_control'] : 'false' }};
        var auto_play = {{ isset($args['auto_play']) ? $args['auto_play'] : 'false' }};
        var autoplay_delay = {{ isset($args['autoplay_delay']) ? $args['autoplay_delay'] : 1500 }};
        var slides_per_view = {{ isset($args['slides_per_view']) ? $args['slides_per_view'] : 2 }};
        var centered_slides = {{ isset($args['centered_slides']) ? $args['centered_slides'] : 'false' }};
        var free_mode = {{ isset($args['free_mode']) ? $args['free_mode'] : 'false' }};
        var slider_speed = {{ isset($args['speed']) ? $args['speed'] : 1000 }};
        var effect = '{{ isset($args['effect']) ? $args['effect'] : '' }}';
        var grabCursor = '{{ isset($args['grabCursor']) ? $args['grabCursor'] : 'false' }}';

        var autoplay_enable = ((typeof auto_play != "undefined") ? { delay: autoplay_delay } : false);
        var breakpoint1 = {{ isset($args['breakpoint1']) ? $args['breakpoint1'] : 3 }};
        var breakpoint2 = {{ isset($args['breakpoint2']) ? $args['breakpoint2'] : 4 }};
        var breakpoint3 = {{ isset($args['breakpoint3']) ? $args['breakpoint3'] : 5 }};
        var breakpoint4 = {{ isset($args['breakpoint4']) ? $args['breakpoint4'] : 6 }};
        var break_points = {};

        break_points[575] = {
            slidesPerView: breakpoint1,
        };
        break_points[768] = {
            slidesPerView: breakpoint2,
        };
        break_points[992] = {
            slidesPerView: breakpoint3,
        };
        break_points[1200] = {
            slidesPerView: breakpoint4,
        };

        var swiperMain = new Swiper('.'+swiper_class, {
            speed: slider_speed,
            effect: effect,
            centeredSlides: centered_slides,
            spaceBetween: space_between,
            slidesPerView: slides_per_view,
            loop:loop,
            grabCursor : grabCursor,
            keyboard: keyboard_control,
            autoplay: auto_play,
            freeMode: free_mode,
            breakpoints:break_points,
        });
    </script>
@endpush