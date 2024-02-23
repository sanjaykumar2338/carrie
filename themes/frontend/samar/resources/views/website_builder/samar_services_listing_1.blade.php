<!-- Blog -->
<section class="content-inner-2" style="background-image: url({{ theme_asset('images/background/bg2.png') }}); background-size: cover; background-position: top center; background-repeat: no-repeat;">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title text-primary m-b10">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        <div class="row">
            @if(isset($args['grouped'])&&!empty($args['grouped']))
                @foreach($args['grouped'] as $key => $value)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="icon-bx-wraper style-7 text-center m-lg-b30">
                            <div class="icon-media"> 
                                <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$value['image']) }}" alt="{{ __('Box Wrapper Image') }}" width="215">
                            </div>
                            <div class="icon-content">
                                <h4 class="dlab-title">{{ $value['section_title'] ?? ''  }}</h4>
                                <p>{{ $value['description'] ?? ''  }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>