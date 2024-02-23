<!-- Counters -->
<section class="content-inner-3 bg-light" style="background-image: url({{ theme_asset('images/background/bg14.png')}}); background-position: center; background-repeat: no-repeat;"> 
    <div class="container">
        <div class="row">
            @if(isset($args['grouped']))
                @foreach($args['grouped'] as $key => $value)
                    <div class="col-lg-3 col-sm-6 m-b30 col-6">
                        <div class="dlab-content-bx style-3 text-center">
                            <div class="icon-bx-sm radius"> 
                                <span class="icon-cell">
                                    <i class="{{ isset($value['icon']) ? $value['icon'] : '' }}"></i>
                                </span> 
                            </div>
                            <div class="icon-content">
                                <h2 class="m-b0 text-primary"><span class="counter m-r5">{{ isset($value['progress']) ? $value['progress'] : '' }}</span></h2>
                                <span class="title">{{ isset($value['title']) ? $value['title'] : '' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>