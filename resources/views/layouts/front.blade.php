<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title> VSQUARE CAP </title>
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('public/assets/front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Fontawesome CSS -->
	<link href="{{ asset('public/assets/front/css/all.css') }}" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="{{ asset('public/assets/front/css/owl.carousel.min.css') }}" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="{{ asset('public/assets/front/css/jquery.fancybox.min.css') }}" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="{{ asset('public/assets/front/css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="wrapper-main">
	<!-- Top Bar -->
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<div class="social-media">
						<ul>
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
							<li><a href="#"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-10">
					<div class="contact-details">
						<ul>
							<li><i class="fas fa-phone fa-rotate-90"></i> +91 99517 90017</li>
							<li><i class="fas fa-map-marker-alt"></i> Plot no-24/p, Beside Srujana Hospital, Ganesh Nagar, Quthbullapur Road, Hyderabad.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light top-nav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
				<img src="{{ asset('public/logo/1602317702.jpeg') }}" alt="logo" width="100px" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link {{ request()->is('/') ? 'active' : '' }} " href="{{ url('/') }}">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ request()->is('/about-us') ? 'active' : '' }} " href="{{ url('/about-us') }}">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ request()->is('/services') ? 'active' : '' }} " href="{{ url('/services') }}">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ request()->is('/contact-us') ? 'active' : '' }} " href="{{ url('/contact-us') }}">Contact Us</a>
					</li>
					@if (Route::has('login'))
                                @auth
                                <li class="btn btn-primary cst-khkr"><a href="{{ url('/home') }}">Dashboard</a></li>
                                @else
                                <li class="btn btn-primary cst-khkr"><a href="{{ route('login') }}">Member Login</a></li>
                                @endauth
                        @endif
				</ul>
            </div>
        </div>
    </nav>

@yield('content')

	<!-- Contact Us -->
	<div class="touch-line">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
                            <p>Feel Free to Contact V Square Capital</p>
				</div>
				<div class="col-md-6">
				   <a class="btn btn-lg btn-secondary btn-block" href="{{ url('/contact-us') }}"> Contact Us </a>
				</div>
			</div>
		</div>
	</div>


 <!--footer starts from here-->
 <footer class="footer">
        <div class="container bottom_border">
            <div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">About Us</h5>
					<!--headin5_amrc-->
					<p class="mb10">Our firm utilizes a macroeconomic financial model and process known as the LEAP (Lifetime Economic Acceleration Process) System.</p>
					<ul class="footer-social">
						<li><a class="facebook hb-xs-margin" href="#"><span class="hb hb-xs spin hb-facebook"><i class="fab fa-facebook-f"></i></span></a></li>
						<li><a class="twitter hb-xs-margin" href="#"><span class="hb hb-xs spin hb-twitter"><i class="fab fa-twitter"></i></span></a></li>
						<li><a class="instagram hb-xs-margin" href="#"><span class="hb hb-xs spin hb-instagram"><i class="fab fa-instagram"></i></span></a></li>
					</ul>
				</div>	
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
					<!--headin5_amrc-->
					<ul class="footer_ul_amrc">
						<li><a href="{{ url('/') }}"><i class="fas fa-long-arrow-alt-right"></i>Home</a></li>
						<li><a href="{{ url('/about-us') }}"><i class="fas fa-long-arrow-alt-right"></i>About Us</a></li>
						<li><a href="{{ url('/services') }}"><i class="fas fa-long-arrow-alt-right"></i>Our Services</a></li>
						<li><a href="{{ url('/contact-us') }}"><i class="fas fa-long-arrow-alt-right"></i>Get In Touch</a></li>
						
					</ul>
					<!--footer_ul_amrc ends here-->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
					<!--headin5_amrc ends here-->
					<ul class="footer_ul2_amrc">
						<!--<li>-->
						<!--	<a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>-->
						<!--	<p>Lorem Ipsum is simply dummy...<a href="#">https://www.lipsum.com/</a></p>-->
						<!--</li>-->
						
					</ul>
					<!--footer_ul2_amrc ends here-->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 ">
					<div class="news-box">
						<h5 class="headin5_amrc col_white_amrc pt2">Newsletter</h5>
						<form name="sentMessage" id="contactForm" novalidate>
						<div class="control-group form-group">
							<div class="controls">
								<input type="text" placeholder="Full Name" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
								<p class="help-block"></p>
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<input type="email" placeholder="Email Address" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
							</div>
						</div>
						
						<div id="success"></div>
						<!-- For success/fail messages -->
						<button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
					</form>
					</div>
				</div>
			</div>
		</div>
        <div class="container">
            <p class="copyright text-center">All Rights Reserved. &copy; 2020 <a href="#">VSQUARE</a> Design By : 
				<a href="#">KHKRIT</a>
            </p>
        </div>
    </footer>
</div>
<style>
    li.cst-khkr a {
    color: #fff;
}

.mouse-pointer {
    display: none !important;
}
</style>	  
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('public/assets/front/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/front/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('public/assets/front/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('public/assets/front/js/filter.js') }}"></script>
<script src="{{ asset('public/assets/front/js/jquery.appear.js') }}"></script>
<script src="{{ asset('public/assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/assets/front/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('public/assets/front/js/script.js') }}"></script>
</body>
</html>