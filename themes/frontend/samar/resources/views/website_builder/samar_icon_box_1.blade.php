<!-- About -->
<section class="content-inner-2">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title text-primary">{{ isset($args['subtitle']) ? $args['subtitle'] : ''}}</h6>
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : ''}}</h2>
            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        <div class="row about-wraper-3 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
            @if(isset($args['grouped']))
                @foreach($args['grouped'] as $key => $value)
                    <div class="col-md-4">
                        <div class="icon-bx-wraper style-6 text-center m-b30 icon-up">
                            <div class="icon-bx-lg radius bg-white"> 
                                <a href="javascript:void(0);" class="icon-cell text-primary">
                                    <i class="{{ isset($value['icon']) ? $value['icon'] : '' }}"></i>
                                </a> 
                            </div>
                            <div class="icon-content">
                                <h4 class="dlab-title m-b15">{{ isset($value['section_title']) ? $value['section_title'] : '' }}</h4>
                                <p>{{ isset($value['description']) ? $value['description'] : '' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>