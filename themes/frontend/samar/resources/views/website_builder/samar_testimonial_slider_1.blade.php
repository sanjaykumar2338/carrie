<!-- Testimonials -->
<section class="content-inner-2" style="background-image: url({{ theme_asset('images/background/bg17.png') }}); background-size: contain; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title text-primary m-b15">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (isset($args['testimonials']) && !empty($args['testimonials']))
                @php
                    $blogs = HelpDesk::getCptPostsBySlug($args['testimonials']);
                @endphp
                <div class="testimonials-wraper-2">
                    <!-- Swiper -->
                    <div class="swiper-container testimonial-thumbs">
                        <div class="swiper-wrapper">
                            @foreach($blogs as $blog)                            
                            <div class="swiper-slide">
                                <div class="testimonial-pic">
                                    <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('image') }}">
                                    <div class="shape-bx"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-container testimonial-content {{ $args['base'] }}">
                        <div class="swiper-wrapper">
                            @foreach($blogs as $blog)
                            <div class="swiper-slide">
                                <div class="testimonial-4 quote-left">
                                    <div class="testimonial-text">
                                        <strong class="testimonial-name">{{ $blog->title }}</strong> 
                                        @php
                                            $blogMeta = HelpDesk::getPostMeta($blog->id, 'position');
                                        @endphp
                                        <span class="testimonial-position text-primary m-b20">{{ $blogMeta }}</span>
                                        <p>{{ $blog->content }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if(isset($args['navigation']) && $args['navigation'] == true)
                            <div class="num-pagination">
                                <div class="btn-prev {{ $args['base'] }}-btn-prev"><i class="fa fa-arrow-left"></i></div>
                                <div class="btn-next {{ $args['base'] }}-btn-next"><i class="fa fa-arrow-right"></i></div>
                            </div>
                        @endif

                        @if(isset($args['pagination']) && $args['pagination'] == true)
                            <div class="{{ $args['base'] }}-pagination swiper-pagination"></div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@push('inline-swiper')
    <script>
        'use strict';
        var swiper_class = '{{ $args['base'] }}';
        var space_between = {{ isset($args['space_between']) ? $args['space_between'] : 0 }};
        var loop = {{ isset($args['loop']) ? $args['loop'] : 'false' }};
        var keyboard_control = {{ isset($args['keyboard_control']) ? $args['keyboard_control'] : 'false' }};
        var auto_play = {{ isset($args['auto_play']) ? $args['auto_play'] : 'false' }};
        var autoplay_delay = {{ isset($args['autoplay_delay']) ? $args['autoplay_delay'] : 1500 }};
        var slides_per_view = '{{ isset($args['slides_per_view']) ? $args['slides_per_view'] : 1 }}';
        var centered_slides = {{ isset($args['centered_slides']) ? $args['centered_slides'] : 'false' }};
        var free_mode = {{ isset($args['free_mode']) ? $args['free_mode'] : 'false' }};
        var slider_speed = {{ isset($args['speed']) ? $args['speed'] : 1000 }};
        var effect = '{{ isset($args['effect']) ? $args['effect'] : '' }}';
        var dynamic_bullets = '{{ isset($args['dynamic_bullets']) ? $args['dynamic_bullets'] : '' }}'
        var grabCursor = '{{ isset($args['grabCursor']) ? $args['grabCursor'] : 'false' }}';

        var autoplay_enable = ((typeof auto_play != "undefined") ? { delay: autoplay_delay } : false);

        var testimonialThumbs = new Swiper('.testimonial-thumbs', {
            spaceBetween: 10,
            slidesPerView: 3,
            centeredSlides: true,
            freeMode: true,
            autoplay: true,
            loop: true,
            speed: 3000,
        });
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
            thumbs: {
                swiper: testimonialThumbs
            },
            pagination: {
                 el: "."+swiper_class+"-pagination",
                 dynamicBullets: dynamic_bullets,
                 clickable: true,
            },
            navigation:{
                prevEl: "."+swiper_class+"-btn-prev",
				nextEl: "."+swiper_class+"-btn-next",
			},
        });
    </script>
@endpush