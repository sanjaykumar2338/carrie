<!-- Our Pricing -->
<section class="content-inner-2" style="background-image: url({{ theme_asset('images/background/bg16.png') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <div class="section-head style-1 text-center mb-3">
            <h6 class="sub-title m-b15 text-primary">{{ $args['subtitle'] ?? ''}}</h6>
            <h2 class="title">{{ $args['title'] ?? ''}}</h2>
            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        <div class="toggle-tabs">
            <span class="monthly">{{ __('Monthly') }}</span>
            <span class="yearly">{{ __('Yearly') }}</span>
        </div>				
        <div class="pricingtable-row">
            <div class="row justify-content-center">
                @if(isset($args['grouped']) && !empty($args['grouped']))
                    @foreach($args['grouped'] as $key => $value)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="pricingtable-wrapper style-2 m-md-b30">
                                <div class="pricingtable-inner">
                                    <div class="pricingtable-title">
                                        <h3>{{ $value['pricing_title'] ?? ''}}</h3>
                                    </div>
                                    <div class="pricingtable-media m-b15">
                                        <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$value['image']) }}" width="125" alt="{{ __('Pricing Table Image') }}">
                                    </div>
                                    <div class="pricingtable-price month"> 
                                        <h2 class="pricingtable-bx">{{ $value['pricing_per_month'] ?? ''}}<small class="pricingtable-type">/Month</small></h2>
                                    </div>
                                    <div class="pricingtable-price year"> 
                                        <h2 class="pricingtable-bx">{{ $value['pricing_per_year'] ?? ''}}<small class="pricingtable-type">/Year</small></h2>
                                    </div>
                                    <ul class="pricingtable-features">
                                        <li>{{ $value['pricing_list_item_1'] ?? ''}}</li>
                                        <li>{{ $value['pricing_list_item_2'] ?? ''}}</li>
                                        <li>{{ $value['pricing_list_item_3'] ?? ''}}</li>
                                        <li>{{ $value['pricing_list_item_4'] ?? ''}}</li>
                                        <li>{{ $value['pricing_list_item_5'] ?? ''}}</li>
                                        <li>{{ $value['pricing_list_item_6'] ?? ''}}</li>
                                    </ul>
                                    @if (isset($args['learn_more_button']) && $args['learn_more_button'] == 'true' )
                                        <a href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}" class="btn btn-primary rounded-xl gradient">{{ __('Learn More') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>