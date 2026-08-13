
<style>
	footer.footer {
		background: #ffffff !important;
		border-top: none !important;
		box-shadow: none !important;
		color: #222222 !important;
	}
	footer.footer .footer-top {
		background: #ffffff !important;
		padding: 60px 0 45px !important;
		border-top: none !important;
	}
	footer.footer h4 {
		color: #111111 !important;
		font-weight: 700 !important;
		font-size: 14px !important;
		letter-spacing: 1.2px !important;
		text-transform: uppercase !important;
		margin-bottom: 22px !important;
	}
	footer.footer p.text {
		color: #555555 !important;
		font-size: 14px !important;
		line-height: 1.7 !important;
		margin-top: 15px !important;
		max-width: 380px;
	}
	footer.footer .call {
		color: #111111 !important;
		font-size: 12px !important;
		font-weight: 600 !important;
		margin-top: 20px !important;
		text-transform: uppercase;
		letter-spacing: 0.8px;
	}
	footer.footer .call span a {
		color: #111111 !important;
		font-weight: 700 !important;
		font-size: 16px !important;
		margin-top: 4px !important;
		display: block !important;
		text-decoration: none !important;
	}
	footer.footer ul li {
		margin-bottom: 10px !important;
	}
	footer.footer ul li a {
		color: #555555 !important;
		font-size: 14px !important;
		text-decoration: none !important;
		transition: all 0.25s ease-in-out !important;
	}
	footer.footer ul li a:hover {
		color: #000000 !important;
		padding-left: 4px !important;
	}
	footer.footer .contact ul li {
		color: #555555 !important;
		font-size: 14px !important;
		line-height: 1.6 !important;
		margin-bottom: 12px !important;
	}
	.shop-services {
		display: none !important;
	}
</style>

	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							@php
								$settings=DB::table('settings')->get();
							@endphp
							<div class="logo">
								<a href="{{route('home')}}">
									<img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo" style="max-height: 50px;">
								</a>
							</div>
							<p class="text">Welcome to YN Trading, Pakistan's premier online fashion store. Discover the finest collection of designer unstitched suits, pret wear, luxury lawn, and traditional Pakistani apparel.</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:+923001234567">+92 300 1234567</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="{{route('about-us')}}">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="{{route('contact')}}">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Touch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>Tariq Road, PECHS Block 2, Karachi, Pakistan</li>
									<li>info@YNTrading.com</li>
									<li>+92 300 1234567</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<div class="sharethis-inline-follow-buttons"></div>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{asset('frontend/js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('frontend/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
	{{-- Isotope --}}
	<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('frontend/js/easing.js')}}"></script>

	<!-- Active JS -->
	<script src="{{asset('frontend/js/active.js')}}"></script>

	
	@stack('scripts')
	<script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
		// ------------------------------------------------------- //
		// Multi Level dropdowns
		// ------------------------------------------------------ //
			$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
				event.preventDefault();
				event.stopPropagation();

				$(this).siblings().toggleClass("show");


				if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
				}
				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
				});

			});
		});
	  </script>