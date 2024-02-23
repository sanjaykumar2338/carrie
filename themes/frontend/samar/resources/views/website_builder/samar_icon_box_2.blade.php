<div class="content-inner-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="icon-bx-wraper style-9 m-md-b60 center">
                    <div class="icon-bx-sm radius gradient"> 
                        <a href="javascript:void(0);" class="icon-cell text-white">
                            <i class="las la-phone-volume"></i>
                        </a> 
                    </div>
                    <div class="icon-content">
                        <h4 class="dlab-title">{{ isset($args['title_1']) ? $args['title_1'] : '' }}</h4>
                        <p>{{ isset($args['phone_1']) ? $args['phone_1'] : '' }}</p>
                        <p>{{ isset($args['phone_2']) ? $args['phone_2'] : '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="icon-bx-wraper style-9 m-md-b60 center">
                    <div class="icon-bx-sm radius gradient"> 
                        <a href="javascript:void(0);" class="icon-cell  text-white">
                            <i class="las la-map-marker"></i>
                        </a> 
                    </div>
                    <div class="icon-content">
                        <h4 class="dlab-title">{{ isset($args['title_2']) ? $args['title_2'] : '' }}</h4>
                        <p>{{ isset($args['location']) ? $args['location'] : '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="icon-bx-wraper style-9 center">
                    <div class="icon-bx-sm radius gradient"> 
                        <a href="javascript:void(0);" class="icon-cell text-white">
                            <i class="las la-envelope-open"></i>
                        </a> 
                    </div>
                    <div class="icon-content">
                        <h4 class="dlab-title">{{ isset($args['title_3']) ? $args['title_3'] : '' }}</h4>
                        <p>{{ isset($args['email_1']) ? $args['email_1'] : '' }}</p>
                        <p>{{ isset($args['email_2']) ? $args['email_2'] : '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>