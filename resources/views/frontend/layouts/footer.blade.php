	<!-- Start Luxury Floating Rounded Footer -->
	<footer class="footer luxury-floating-footer">
		<div class="footer-card-container">
			<div class="container-fluid px-0">
				<div class="row">
					
					<!-- Column 1: Brand Info & About -->
					<div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
						<div class="single-footer about pr-lg-4">
							@php
								$settings = DB::table('settings')->get();
								$phone = (count($settings) > 0 && !empty($settings[0]->phone)) ? $settings[0]->phone : '+92 336 6888806';
								$rawWhatsapp = (count($settings) > 0 && !empty($settings[0]->whatsapp)) ? $settings[0]->whatsapp : $phone;
								$cleanWhatsapp = preg_replace('/[^0-9]/', '', $rawWhatsapp);
								if (substr($cleanWhatsapp, 0, 1) === '0') {
									$cleanWhatsapp = '92' . substr($cleanWhatsapp, 1);
								}
								if (empty($cleanWhatsapp)) {
									$cleanWhatsapp = '923366888806';
								}
								$email = (count($settings) > 0 && !empty($settings[0]->email)) ? $settings[0]->email : 'support@yntrading.com';
								$address = (count($settings) > 0 && !empty($settings[0]->address)) ? $settings[0]->address : 'Tariq Road, PECHS Block 2, Karachi, Pakistan';
							@endphp
							<div class="logo mb-3">
								<a href="{{route('home')}}" class="d-inline-block">
									@if(count($settings) > 0 && !empty($settings[0]->logo))
										<img src="{{$settings[0]->logo}}" alt="logo" style="max-height: 48px; filter: brightness(0) invert(1);">
									@else
										<span style="font-size: 20px; font-weight: 800; letter-spacing: 1.5px; color: #ffffff;">YN TRADING</span>
									@endif
								</a>
							</div>
							<p class="text">Pakistan's premier fashion house. We bring you handpicked luxury fabrics, exquisite designer unstitched collections, and contemporary ready-to-wear pret wear crafted with perfection.</p>
							
							<div class="footer-social-strip">
								<a href="#" class="footer-social-btn" title="Facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="footer-social-btn" title="Instagram"><i class="fa fa-instagram"></i></a>
								<a href="https://wa.me/{{$cleanWhatsapp}}" target="_blank" class="footer-social-btn" title="WhatsApp"><i class="fa fa-whatsapp"></i></a>
								<a href="#" class="footer-social-btn" title="TikTok"><i class="fa fa-music"></i></a>
							</div>
						</div>
					</div>

					<!-- Column 2: Quick Links -->
					<div class="col-lg-2 col-md-6 col-6 mb-4 mb-lg-0">
						<div class="single-footer links">
							<h4>Collections</h4>
							<ul>
								<li><a href="{{route('product-grids')}}">New Arrivals</a></li>
								<li><a href="{{route('product-grids')}}">Luxury Pret</a></li>
								<li><a href="{{route('product-grids')}}">Unstitched Lawn</a></li>
								<li><a href="{{route('product-grids')}}">Formal Wear</a></li>
								<li><a href="{{route('product-grids')}}">Festive Sale</a></li>
							</ul>
						</div>
					</div>

					<!-- Column 3: Customer Care -->
					<div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
						<div class="single-footer links">
							<h4>Customer Care</h4>
							<ul>
								<li><a href="{{route('order.track')}}">Track Your Order</a></li>
								<li><a href="{{route('about-us')}}">About Our Brand</a></li>
								<li><a href="#">Shipping & Delivery</a></li>
								<li><a href="#">7-Day Exchange Policy</a></li>
								<li><a href="{{route('contact')}}">Contact Support</a></li>
							</ul>
						</div>
					</div>

					<!-- Column 4: Store Location & Contact -->
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer contact">
							<h4>Get In Touch</h4>
							<div class="footer-contact-item">
								<i class="ti-location-pin"></i>
								<span>{{$address}}</span>
							</div>
							<div class="footer-contact-item">
								<i class="ti-headphone-alt"></i>
								<span>{{$phone}} (Mon-Sat 10am-8pm)</span>
							</div>
							<div class="footer-contact-item">
								<i class="ti-email"></i>
								<span>{{$email}}</span>
							</div>
							<div class="mt-3">
								<a href="https://wa.me/{{$cleanWhatsapp}}?text={{urlencode('Hi YN-Trading, I would like assistance with an order.')}}" target="_blank" class="btn" style="background: #25D366; color: #ffffff; font-size: 12px; font-weight: 700; border-radius: 4px; padding: 8px 16px; border: none; display: inline-flex; align-items: center; gap: 6px;">
									<i class="fa fa-whatsapp"></i> Chat on WhatsApp
								</a>
							</div>
						</div>
					</div>

				</div>
			</div>

			<!-- Base Copyright Area Inside Rounded Card -->
			<div class="footer-card-copyright">
				<div class="container-fluid px-0">
					<div class="row align-items-center">
						<div class="col-lg-6 col-12 text-center text-lg-left mb-2 mb-lg-0">
							<p style="margin: 0; font-size: 13px; color: #777777;">
								&copy; {{date('Y')}} <a href="{{route('home')}}" style="color: #ffffff; font-weight: 600;">YN Trading</a>. All Rights Reserved.
							</p>
						</div>
						<div class="col-lg-6 col-12 text-center text-lg-right">
							<div class="d-inline-flex align-items-center" style="gap: 14px; color: #888888; font-size: 12px;">
								<span><i class="fa fa-shield"></i> 100% Safe Checkout</span>
								<span>•</span>
								<span>Cash On Delivery</span>
								<span>•</span>
								<span>Debit / Credit Cards</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Luxury Floating Rounded Footer -->
 
	<!-- Jquery -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
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

	<!-- Preloader Safety Fallback -->
	<script>
		(function() {
			function removePreloader() {
				var p = document.querySelector('.preloader');
				if (p) {
					p.style.transition = 'opacity 0.3s ease';
					p.style.opacity = '0';
					p.style.pointerEvents = 'none';
					setTimeout(function() { p.style.display = 'none'; }, 300);
				}
				document.body.classList.remove('no-scroll');
			}
			if (document.readyState === 'complete') {
				setTimeout(removePreloader, 300);
			} else {
				window.addEventListener('load', function() { setTimeout(removePreloader, 300); });
				setTimeout(removePreloader, 1000);
			}
		})();
	</script>

	@stack('scripts')
	<script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
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