<header class="site-header header mo-left {{ isset($page) && Str::contains($page->slug, 'home') && $page->visibility !== 'PP' ? 'header-transparent': ''}} text-black">
    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container clearfix">

                <!-- Website Logo -->
                <div class="logo-header logo-dark">
                    <a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogo() }}" alt="{{ __('Site Logo') }}" /></a>
                </div>

                <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header logo-dark">
                        <a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogo() }}"
                                alt="{{ __('Site Logo Full Image') }}" /></a>
                    </div>
                    {{ DzHelper::nav_menu([
                        'theme_location' => 'primary',
                        'menu_class' => 'nav navbar-nav',
                    ]) }}
                    <div class="dlab-social-icon">
                        <ul>
                            <li><a target="_blank" title="Facebook" href="{{ config('Social.facebook') }}"
                                    class="site-button-link"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" title="Twitter" href="{{ config('Social.twitter') }}"
                                    class="site-button-link"><i class="fab fa-twitter"></i></a></li>
                            <li><a target="_blank" title="Whatsapp" href="{{ config('Social.whatsapp') }}"
                                    class="site-button-link"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a target="_blank" title="Instagram" href="{{ config('Social.instagram') }}"
                                    class="site-button-link"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- Extra Nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <a href="{{ url('contact') }}" class="btn btn-primary gradient rounded-xl">{{ __('Get A Quote') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header End -->
</header>
