

<!-- Video -->
<section class="content-inner-2 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-bx style-1 overlay-black-light">
                    <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" alt="{{ __('image') }}">
                    <div class="video-btn">
                        <a href="{{ isset($args['video_link']) ? $args['video_link'] : '' }}" class="popup-youtube"><i class="{{ isset($args['icon']) ? $args['icon'] : '' }}"></i></a>
                        <h2 class="title">{{ isset($args['title']) ? $args['title'] : ''}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>