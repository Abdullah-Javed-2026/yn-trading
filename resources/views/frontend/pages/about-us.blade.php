@extends('frontend.layouts.master')

@section('title','YN Trading || About Us')

@section('main-content')

	<!-- About Us -->
	<section class="about-us section" style="padding-top: 30px !important;">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="about-content">
							@php
								$setting=DB::table('settings')->first();
								$photos = ($setting && !empty($setting->photo)) ? explode(',', $setting->photo) : [];
								$aboutPhoto = (count($photos) > 0 && !empty($photos[0])) ? trim($photos[0]) : asset('frontend/img/modal1.png');
							@endphp
							<h3 style="color: #000000 !important; font-weight: 700;">Welcome To <span style="color: #000000 !important;">YN Trading</span></h3>
							<p style="color: #555555; line-height: 1.8;">{!! html_entity_decode($setting->description ?? '') !!}</p>
							<div class="button mt-4">
								<a href="{{route('product-grids')}}" class="btn" style="background: #000000 !important; color: #ffffff !important; border: none !important;">Shop Now</a>
								<a href="{{route('contact')}}" class="btn primary" style="background: #111111 !important; color: #ffffff !important; border: none !important;">Contact Us</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="about-img overlay">
							<img src="{{$aboutPhoto}}" alt="About YN Trading">
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- End About Us -->


	<!-- Start Shop Services Area -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free Shipping</h4>
						<p>Orders over Rs. 5,000</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 7 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Secure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Price</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->

	@include('frontend.layouts.newsletter')
@endsection
