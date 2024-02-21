@extends('frontend.layouts.homepage')
	@section('content')
		<body>
			<!--header-top start -->
			<header id="header-top" class="header-top">
				<ul>
					<li>
						<div class="header-top-left">
							<ul>
								<li class="select-opt">
									
								</li>
								<li class="select-opt">
									
								</li>
								<li class="select-opt">
									
								</li>
							</ul>
						</div>
					</li>
					<li class="head-responsive-right pull-right">
						<div class="header-top-right">
							<ul>
								<li class="header-top-contact">
									<a href="#">sign inddd</a>
								</li>
								<li class="header-top-contact">
									<a href="#">register</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
						
			</header><!--/.header-top-->
			<!--header-top end -->

			<!-- top-area Start -->
			<section class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <div class="container">

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="index.html">Track<span>Rak</span></a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" scroll active"><a href="#home">home</a></li>
				                    <li class="scroll"><a href="#works">Faq</a></li>
				                    <li class="scroll"><a href="#contact">contact</a></li>
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</section><!-- /.top-area-->
			<!-- top-area End -->
			<!--welcome-hero start -->
			<section id="home" class="welcome-hero">
				<div class="container">
					<div class="welcome-hero-txt">
						<h2>The TrackRak.com website will perform a daily scan of all websites that Rakuten <br> participates with and will allow users to set alerts for certain thresholds,</h2>
						<p>
							For example, they want an email and text when Nike.com is at or above 10%.
						</p>
					</div>
				</div>
			</section><!--/.welcome-hero-->
			<!--welcome-hero end -->

			<br><br><br>
			
			<!--works start -->
			<section id="works" class="works">
				<div class="container">
					<div class="section-header">
						<h2>Faq</h2>
						<p>Learn More about how our website works</p>
					</div><!--/.section-header-->
					<div class="works-content">
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<div class="single-how-works">
									<div class="single-how-works-icon">
										<i class="flaticon-lightbulb-idea"></i>
									</div>
									<h2><a href="#">choose <span> what to</span> do</a></h2>
									<p>
										Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
									</p>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="single-how-works">
									<div class="single-how-works-icon">
										<i class="flaticon-networking"></i>
									</div>
									<h2><a href="#">find <span> what you want</span></a></h2>
									<p>
										Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
									</p>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="single-how-works">
									<div class="single-how-works-icon">
										<i class="flaticon-location-on-road"></i>
									</div>
									<h2><a href="#">explore <span> amazing</span> place</a></h2>
									<p>
										Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
									</p>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.container-->
			
			</section><!--/.works-->
			<!--works end -->

			<!--blog start -->
			<!--subscription strat -->
			<section id="contact"  class="subscription">
				<div class="container">
					<div class="subscribe-title text-center">
						<h2>
							do you want to add your business listing with us?
						</h2>
						<p>
							Listrace offer you to list your business with us and we very much able to promote your Business.
						</p>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<form action="#">
									<input type="email" class="subscription-input-form" placeholder="Enter your email here">
									<button class="appsLand-btn subscribe-btn" onclick="window.location.href='#'">
										creat account
									</button>
								</form>
							</div>
						</div>	
					</div>
				</div>
			</section>
	    </body>
@endsection