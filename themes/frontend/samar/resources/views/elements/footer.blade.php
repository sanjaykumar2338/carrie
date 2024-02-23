<footer class="site-footer style-2" id="footer" style="background-image: url({{ theme_asset('images/background/bg4.png') }});">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-12 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
					<div class="widget widget_about">
						<div class="footer-logo logo-white">
							<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogoLight() }}" alt="{{ __('Footer Logo') }}"></a>
						</div>
						<p>{!! config('Site.biography') !!}</p>
						<div class="dlab-social-icon">
							<ul>
								<li><a target="_blank" class="fab fa-facebook-f" href="{{ config('Social.facebook') }}"></a></li>
								<li><a target="_blank" class="fab fa-twitter" href="{{ config('Social.twitter') }}"></a></li>
								<li><a target="_blank" class="fab fa-linkedin-in" href="{{ config('Social.linkedin') }}"></a></li>
								<li><a target="_blank" class="fab fa-instagram" href="{{ config('Social.instagram') }}"></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
					<div class="widget widget_services">
						<h5 class="footer-title">{{ __('Our links')}}</h5>
						{{ DzHelper::nav_menu([
							'theme_location' => 'footer',
							'menu_class' => ' ',
						]) }}
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
					{{ DzHelper::recentBlogs( array('limit'=>2, 'order'=>'asc', 'orderby'=>'created_at') ) }}
				</div>
				<div class="col-xl-3 col-lg-4 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
					<div class="widget widget_about">
						<h5 class="footer-title">{{ __('Contact Us')}}</h5>
						<div class="widget widget_getintuch">
							<ul>
								<li>
									<i class="fa fa-phone gradient"></i>
									<span>{{ config('Site.contact') }}</span> 
								</li>
								<li>
									<i class="fa fa-envelope gradient"></i> 
									<span>{{ config('Site.email') }}</span>
								</li>
								<li>
									<i class="fas fa-map-marker-alt gradient"></i>
									<span>{{ config('Site.location') }}</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer bottom part -->
	<div class="footer-bottom">
		<div class="container">
			<div class="text-center">
				<span class="copyright-text">{!! config('Site.copyright') !!}</span> 
			</div>
		</div>
	</div>
</footer>