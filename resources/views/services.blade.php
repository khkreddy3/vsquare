@extends('layouts.front')
@section('content')
    
    <!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3">Services</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Services</li>
				</ol>
			</div>
		</div>
	</div>
	
    <!-- Page Content -->
    <div class="container" style="text-align:center">
	 <button class="cst-jj-khkr"><a href="{{ asset('public/assets/V-SQUARE-CAPITAL.pdf') }}">Click Here To View V Square Capital</a></button>
	</div>
<style>
    .cst-jj-khkr {
    padding: 15px 30px 15px 30px;
    background: #0208b1;
}
.cst-jj-khkr a{color:#fff;}

</style>

	
	
@endsection