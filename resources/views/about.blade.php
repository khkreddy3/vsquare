@extends('layouts.front')
@section('content')


	<!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> About Us</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active"> About Us </li>
				</ol>
			</div>
		</div>
	</div>

    <div class="container">
		<!-- About Content -->
		<div class="about-main">
			<div class="row">
				<div class="col-lg-6">
					<img class="img-fluid rounded mb-4" src="{{ asset('public/assets/front/imagess/slider/invv.jpg') }}" alt="" />
				</div>
				<div class="col-lg-6">
					<h2>About V-Square Capital</h2>
                        <p>Our firm utilizes a macroeconomic financial model and process known as the LEAP (Lifetime Economic Acceleration Process) System. It allows us to stay in tune with the constant change the world presents while assisting in making numerous and challenging financial decisions in the most efficient manner possible. The task can be complex as well as time consuming with too much information leading to financial paralysis.</p>
				</div>
			</div>
			<!-- /.row -->
		</div>
	</div>
	<div class="about-inner">
		<div class="container">
			<div class="row mb-4">
				<div class="col-lg-4">
					<div class="left-ab">
						<p>It is imperative to have an advocate who can help you by using the most accurate and beneficial strategies available. Through the use of the WIM Software, we provide analyses and solutions utilizing macro and micro economic verification for all types of assets and strategies. These include but are not limited to:</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="right-ab">
						<ul style="list-style:circle;">
                    <li>Risk Management</li>
                    <li>Insurance</li>
                    <li>Savings</li>
                    <li>Investments</li>
                    <li>Business and Succession Planning</li>
                    <li>Estate &amp; Trust Evaluation</li>
                    <li>Wealth Management</li>
                    <li>Real Estate</li>
                  </ul>
					</div>
				</div>
				<div class="col-lg-4">
				    <p>We have professional alliances with many providers and can recommend them to you as needed. We will also work with your current providers to assure that all of your planning is coordinated properly for your maximum benefit. Compensation to our firm is earned as fee‐based or commission-based.</p>
				</div>
			</div>
		
		</div>
	</div>
	
	
	<!--<div class="customers-box"> -->
	<!--	<div class="container">-->
	<!--		<h2>Our Customers</h2>-->
	<!--		<div class="row">-->
	<!--			<div class="col-lg-12">-->
	<!--				<div id="customers-slider" class="owl-carousel">-->
	<!--					<div class="mb-4">-->
	<!--						<img class="img-fluid" src="{{ asset('public/assets/front/images/logo_01.png') }}" alt="" />-->
	<!--					</div>-->
	<!--					<div class="mb-4">-->
	<!--						<img class="img-fluid" src="{{ asset('public/assets/front/images/logo_02.png') }}" alt="" />-->
	<!--					</div>-->
	<!--					<div class="mb-4">-->
	<!--						<img class="img-fluid" src="{{ asset('public/assets/front/images/logo_03.png') }}" alt="" />-->
	<!--					</div>-->
	<!--					<div class="mb-4">-->
	<!--						<img class="img-fluid" src="{{ asset('public/assets/front/images/logo_04.png') }}" alt="" />-->
	<!--					</div>-->
	<!--					<div class="mb-4">-->
	<!--						<img class="img-fluid" src="{{ asset('public/assets/front/images/logo_05.png') }}" alt="" />-->
	<!--					</div>-->
	<!--					<div class="mb-4">-->
	<!--						<img class="img-fluid" src="{{ asset('public/assets/front/images/logo_06.png') }}" alt="" />-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->

@endsection