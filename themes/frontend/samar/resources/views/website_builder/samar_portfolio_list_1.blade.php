@if (isset($args['portfolios']) && !empty($args['portfolios']))
@php
    $box = 1;
    $blogs = HelpDesk::getCptPostsBySlug($args['portfolios']);
@endphp

<!-- Projects -->
<section class="content-inner-2" style="background-image: url({{ theme_asset('images/background/bg17.png') }}); background-size: cover; background-position: top center; background-repeat: no-repeat;">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title text-primary m-b15">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6> 
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        <div class="clearfix">
            <div class="row lightgallery">
                <?php $count = 1; $box = 'box_'; ?>
                @forelse($blogs as $blog)
                    <?php
                        $classes = 'col-lg-7 col-md-7 col-sm-12';
                        
                        if($count == 2 ){
                            $classes = 'col-lg-5 col-md-5 col-sm-12';
                        }elseif($count == 3){
                            echo "<div class='col-lg-7 col-md-12 col-sm-12'>";
                            echo "<div class='row'>";
                            $classes = 'col-lg-6 col-md-6 col-sm-12';
                        }elseif($count == 4){
                            $classes = 'col-lg-6 col-md-6 col-sm-12';
                        }elseif($count == 5){
                            $classes = 'col-lg-12 col-md-12 col-sm-12';
                        }elseif($count == 6){
                            $classes = 'col-lg-5 col-md-12 col-sm-12';
                        }
                        $count = ($count === 7) ? 1 : $count;
                    ?>

                    <div class="card-container {{ $classes }} web_design wow fadeInUp">
                        <div class="dlab-box dlab-overlay-box style-2 {{$box}}{{$count}} m-b30 overlay-shine">
                            <div class="dlab-media dlab-img-overlay1">
                                @if(optional($blog->feature_img)->value && Storage::exists('public/blog-images/'.$blog->feature_img->value))
                                    <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('image') }}">
                                    <span data-exthumbimage="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" data-src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" class="lightimg" title="Design">		
                                        <i class="la la-plus"></i> 
                                    </span>
                                @else
                                    <img src="{{ asset('images/noimage.jpg') }}" alt="{{ __('image') }}">
                                    <span data-exthumbimage="{{ asset('images/noimage.jpg') }}" data-src="{{ asset('images/noimage.jpg') }}" class="lightimg" title="Design">		
                                        <i class="la la-plus"></i> 
                                    </span>
                                @endif
                            </div>
                            <div class="dlab-info">
                                <h5 class="title"><a href="{{ __('javascript:void(0);') }}">{{ $blog->title }}</a></h5>
                                <p class="post-author">{{ __('By ') }}<a href="{{ __('javascript:void(0);') }}">{{ $blog->user->fullname }}</a></p>
                            </div>
                        </div>
                    </div>

                    <?php 
                        if($count == 5 ){
                            echo  "</div>";
                            echo  "</div>";
                        } 
                    $count++;
                    ?>
                @empty
                @endforelse 
            </div>
        </div>
    </div>
</section>
@endif