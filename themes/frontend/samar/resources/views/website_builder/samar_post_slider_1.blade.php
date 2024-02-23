@php
    $blogs = HelpDesk::elementPostsByArgs($args);
@endphp

<!-- Blog -->
<section class="content-inner-2"
    style="background-image: url({{ theme_asset('images/background/bg16.png') }}); background-size: cover; background-position: top center; background-repeat: no-repeat;">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title text-primary m-b15">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        <div class="swiper swiper-container {{ $args['base'] }}">
            <div class="swiper-wrapper">
                @forelse($blogs as $blog)
                    <div class="swiper-slide">
                        <div class="item">
                            <div class="dlab-blog style-2 m-b10">
                                <div class="dlab-media rounded-md">
                                    <a href="{{ DzHelper::laraBlogLink($blog->id) }}">
                                        <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}">
                                    </a>
                                </div>
                                <div class="dlab-info">
                                    <h4 class="dlab-title"><a
                                            href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 40, ' ...') }}</a>
                                    </h4>
                                    <p class="m-b20">{{ Str::limit($blog->excerpt, 100, ' ...') }}</p>
                                    <div class="dlab-meta mb-0">
                                        <ul>
                                            <li class="post-date">
                                                {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}
                                            </li>
                                            <li class="post-author"><i class="las la-user-circle"></i> {{ __('By') }} <a
                                                    href="javascript:void(0);">{{ optional($blog->user)->name }}</a></li>
                                            <li class="post-comment"><i class="las la-comment"></i> <a
                                                    href="javascript:void(0);">{{ __('Comments') }}<span>{{ optional($blog->comments)->count() }}</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>

@push('inline-swiper')
    <script>
        'use strict';
        var swiper_class = '{{ $args['base'] }}';
        var space_between = {{ isset($args['space_between']) ? $args['space_between'] : 30 }};
        var loop = {{ isset($args['loop']) ? $args['loop'] : 'false' }};
        var keyboard_control = {{ isset($args['keyboard_control']) ? $args['keyboard_control'] : 'false' }};
        var auto_play = {{ isset($args['auto_play']) ? $args['auto_play'] : 'false' }};
        var autoplay_delay = {{ isset($args['autoplay_delay']) ? $args['autoplay_delay'] : 1500 }};
        var slides_per_view = {{ isset($args['slides_per_view']) ? $args['slides_per_view'] : 1 }};
        var centered_slides = {{ isset($args['centered_slides']) ? $args['centered_slides'] : 'false' }};
        var free_mode = {{ isset($args['free_mode']) ? $args['free_mode'] : 'false' }};
        var slider_speed = {{ isset($args['speed']) ? $args['speed'] : 1000 }};
        var effect = '{{ isset($args['effect']) ? $args['effect'] : '' }}';
        var grabCursor = '{{ isset($args['grabCursor']) ? $args['grabCursor'] : 'false' }}';

        var autoplay_enable = ((typeof auto_play != "undefined") ? { delay: autoplay_delay } : false);
        var breakpoint1 = {{ isset($args['breakpoint1']) ? $args['breakpoint1'] : 1 }};
        var breakpoint2 = {{ isset($args['breakpoint2']) ? $args['breakpoint2'] : 1 }};
        var breakpoint3 = {{ isset($args['breakpoint3']) ? $args['breakpoint3'] : 2 }};
        var breakpoint4 = {{ isset($args['breakpoint4']) ? $args['breakpoint4'] : 3 }};
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
            grabCursor : grabCursor,
            loop:loop,
            keyboard: keyboard_control,
            autoplay: auto_play,
            freeMode: free_mode,
            breakpoints:break_points,
        });
    </script>
@endpush