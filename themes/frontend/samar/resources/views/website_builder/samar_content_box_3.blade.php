<!-- Services -->
<section class="content-inner-2" style="background-image: url({{ theme_asset('images/background/bg2.png') }}); background-size: contain; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="section-head style-1">
                    <h6 class="sub-title text-primary m-b15">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
                    <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                    <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
                </div>
                @if(isset($args['grouped']))
                    @php
                        $count = 1;
                    @endphp
                    @foreach($args['grouped'] as $key => $value)
                        @if($count = ($count/2 === 0))
                            @php
                                $class = 'm-l50';
                            @endphp
                        @else()
                            @php
                                $class = 'm-r50';
                            @endphp
                        @endif
                        <div class="icon-bx-wraper style-3 left box-hover {{ $class }} m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
                            <div class="icon-bx-sm radius"> 
                                <a href="javascript:void(0);" class="icon-cell">
                                    <i class="{{ isset($value['icon']) ? $value['icon'] : '' }}"></i>
                                </a> 
                            </div>
                            <div class="icon-content">
                                <h4 class="dlab-title m-b10">{{ isset($value['title']) ? $value['title'] : '' }}</h4>
                                <p>{{ isset($value['description']) ? $value['description'] : '' }}</p>
                            </div>
                        </div>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                @endif
            </div>
            <div class="col-lg-6">
                <div class="cf-r-img d-lg-block d-none">
                    <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" class="move-2" alt="{{ __('Image') }}">
                </div>
            </div>
        </div>
    </div>
</section>