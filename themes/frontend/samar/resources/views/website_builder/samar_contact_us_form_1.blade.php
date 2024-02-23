<!-- Get A Quote -->
<div class="content-inner-2" style="background-image: url({{ theme_asset('images/background/bg2.png') }}); background-repeat: no-repeat; background-size:100%;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 m-b60">
                <div class="map-2">
                    <iframe src="{{  !empty($args['iframe']) ? $args['iframe'] : '' }}" height="570" style="border:0; width:100%; vertical-align: middle;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-lg-6 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="section-head style-1 text-center">
                    <h6 class="sub-title text-primary m-b15">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
                    <h1 class="contact-title">{{ isset($args['title']) ? $args['title'] : '' }}</h1>
                    <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
                </div>
                <div class="row">
                    <form method="POST" action="{{ route('front.contact') }}">
                        @csrf
                        <div class="row form-set">
                            @if ($errors->any())
                                <div class="col-12 m-b30">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ implode(', ', $errors->all(':message')) }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('success'))
                                <div class="col-12 m-b30">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <div class="col-xl-6 mb-3 mb-md-4">
                                <input name="first_name" required type="text" class="form-control"
                                    placeholder="{{ __('First Name') }}">
                            </div>
                            <div class="col-xl-6 mb-3 mb-md-4">
                                <input name="last_name" type="text" class="form-control"
                                    placeholder="{{ __('Last Name') }}">
                            </div>
                            <div class="col-xl-6 mb-3 mb-md-4">
                                <input name="email" required type="text" class="form-control"
                                    placeholder="{{ __('Email Address') }}">
                            </div>
                            <div class="col-xl-6 mb-3 mb-md-4">
                                <input name="phone_number" required type="text" class="form-control"
                                    placeholder="{{ __('Phone No.') }}">
                            </div>
                            <div class="col-xl-12 mb-3 mb-md-4">
                                <textarea rows="4" name="message" required class="form-control" placeholder="{{ __('Message') }}"></textarea>
                            </div>
                            <div class="col-md-12 col-sm-12 text-center">
                                <button name="submit" type="submit" value="Submit"
                                    class="btn btn-primary gradient border-0 rounded-xl btn-block">{{ __('Send Message') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>