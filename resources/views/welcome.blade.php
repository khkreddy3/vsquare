@extends('layouts.front')
@section('content')


    <header class="slider-main">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <!-- Slide One - Set the background image for this slide in the line below -->
               <div class="carousel-item active" style='background-image: url("{{ asset('public/assets/front/images/slider/home-slider1.jpg') }}")'>
                  <div class="carousel-caption d-none d-md-block">
                     <h3>Welcome to<br>VSQUARE Capital</h3>
                     <p>Only the Solution for all your Financial Problems</p>
                  </div>
               </div>
               <!-- Slide Two - Set the background image for this slide in the line below -->
               <div class="carousel-item" style='background-image: url("{{ asset('public/assets/front/images/slider/vaa.jpg') }}")'>
                  <div class="carousel-caption d-none d-md-block">
                     <h3>Best Consulting Services.</h3>
                     <p>Payment Network <br>and a New Kind of Money</p>
                  </div>
               </div>
               <!-- Slide Three - Set the background image for this slide in the line below -->
               <div class="carousel-item" style='background-image: url("{{ asset('public/assets/front/images/slider/cccc.jpg') }}")'>
                  <div class="carousel-caption d-none d-md-block">
                     <h3>Business Growth With Farmer Products</h3>
                     <p>Investing in New Energy Markets</p>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
            </a>
        </div>
    </header>
	
    <!-- Page Content -->
    <div class="container">        
        <!-- About Section -->
        <div class="about-main">
            <div class="row">
               <div class="col-lg-6">
                  <h2>Welcome to VSQUARE</h2>
                  <p>Our firm utilizes a macroeconomic financial model and process known as the LEAP (Lifetime Economic Acceleration Process) System. It allows us to stay in tune with the constant change the world presents while assisting in making numerous and challenging financial decisions in the most efficient manner possible. The task can be complex as well as time consuming with too much information leading to financial paralysis.</p>
				  <h5>Our smart approach</h5>
                  <ul>
                     <li>Use of 100% of the potential of the global digital currency market.</li>
                     <li>Official business, weekly reports, and the registered charter capital of the company.</li>
                     <li>Research, integration and application of the latest technologies on the world market from IT robotics and artificial intelligence.</li>                     
                  </ul>
               </div>
               <div class="col-lg-6">
                  <img class="img-fluid rounded"  src="{{ asset('public/assets/front/images/slider/investment-clipart.png') }}" alt="" />
               </div>
            </div>
            <!-- /.row -->
        </div>
	</div>	
	<div class="invest-home">
	    <div class="container">
	        <div class="invest-home-inn">
    	          <div class="row">
                	    <div class="col-lg-6 vc_column-inner vc_column-inner_content">
                	       <div class="title-h1">
                	            <div class="title-xlarge custom-number" style="color: #e5e3ff;">01</div>
                	            <p><span style="color: #013150;">Sign up</span></p>
                	       </div>
                	       <div class="sub-titt">
                	           Register on V Square Cap & share your interests.
                	       </div>
                	    </div>
                	    <div class="col-lg-6 vc_column-inner">
                	         <img class="img-fluid rounded home-home-inner"  src="{{ asset('public/assets/front/images/signup.webp') }}" alt="" />
                	    </div>
            	  </div>
            	  <div class="row">
            	      <div class="col-lg-6 vc_column-inner">
                	         <img class="img-fluid rounded home-home-inner"  src="{{ asset('public/assets/front/images/product.webp') }}" alt="" />
                	    </div>
                	    <div class="col-lg-6 vc_column-inner vc_column-inner_content">
                	       <div class="title-h1">
                	            <div class="title-xlarge custom-number" style="color: #e5e3ff;">02</div>
                	            <p><span style="color: #013150;">Invest</span></p>
                	       </div>
                	       <div class="sub-titt">
                	           Invest and Earn Weekly with Your dreams.
                	       </div>
                	    </div>
                	    
            	  </div>
            	  <div class="row">
                	    <div class="col-lg-6 vc_column-inner vc_column-inner_content">
                	       <div class="title-h1">
                	            <div class="title-xlarge custom-number" style="color:#e5e3ff;">03</div>
                	            <p><span style="color: #013150;">Interest</span></p>
                	       </div>
                	       <div class="sub-titt">
                	           Weekly Inerest to full fill Your Awesome Dreams and Refer & Earn Weekly Bonus.
                	       </div>
                	    </div>
                	    <div class="col-lg-6 vc_column-inner">
                	         <img class="img-fluid rounded home-home-inner" src="{{ asset('public/assets/front/images/invest.webp') }}" alt="" />
                	    </div>
            	  </div>
        	</div>
	   </div>
	</div>
	<div class="welcome-khkrit-third">
	    <div class="">
	        <div class="container">
    	        <div class="khkr_third_main text-center">
    	            <h2>Our Tokens</h2>
    	            <p>What is VSquare?</p>
    	        </div>
    	        
    	        <div class="welcome-khkrit-third-inner welcome-khkrit-third-inner-main">
    	           <div class="single_image">
        	            <img class="img-fluid rounded"  src="{{ asset('public/assets/front/images/6.png') }}" alt="" />
        	       </div>
        	       <div class="wpb_left-to-right left-to-right custom-text-1 khkr_start_animation animated">
        	           <div class="styled-subtitle text-right">Instant<br> operations</div>
        	       </div>
        	       <div class="wpb_right-to-left right-to-left custom-text-2 khkr_start_animation animated">
        	           <div class="styled-subtitle text-left">Without blockchain<br> fluctuations</div>
        	       </div>
        	       <div class="wpb_left-to-right left-to-right custom-text-3 khkr_start_animation animated">
        	           <div class="styled-subtitle  text-right" >Protects<br> the identity</div>
        	       </div>
        	       <div class="wpb_right-to-left right-to-left custom-text-4 khkr_start_animation animated">
        	           <div class="styled-subtitle text-left">No transaction<br> fees</div>
        	       </div>
        	       <div class="wpb_top-to-bottom top-to-bottom custom-text-5 khkr_start_animation animated">
        	           <div class="styled-subtitle  text-center">Global System<br> and Secure</div>
        	       </div>
    	        </div>
    	        <div class="welcome-khkrit-third-inner welcome-khkrit-third-inner-mobile">
    	           <div class="single_image">
        	            <img class="img-fluid rounded"  src="{{ asset('public/assets/front/images/6.png') }}" alt="" />
        	       </div>
        	       <div class="wpb_left-to-right left-to-right custom-text-1 khkr_start_animation animated">
        	           <div class="styled-subtitle text-right">Instant operations</div>
        	       </div>
        	       <div class="wpb_right-to-left right-to-left custom-text-2 khkr_start_animation animated">
        	           <div class="styled-subtitle text-left">Without blockchain fluctuations</div>
        	       </div>
        	       <div class="wpb_left-to-right left-to-right custom-text-3 khkr_start_animation animated">
        	           <div class="styled-subtitle  text-right" >Protects the identity</div>
        	       </div>
        	       <div class="wpb_right-to-left right-to-left custom-text-4 khkr_start_animation animated">
        	           <div class="styled-subtitle text-left">No transaction fees</div>
        	       </div>
        	       <div class="wpb_top-to-bottom top-to-bottom custom-text-5 khkr_start_animation animated">
        	           <div class="styled-subtitle  text-center">Global System and Secure</div>
        	       </div>
    	        </div>
    	    </div>
	    </div>
	</div>

@endsection