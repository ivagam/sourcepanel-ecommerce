<footer class="footer bg-dark">
			<div class="footer-middle">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="widget">
								<h4 class="widget-title">Contact Info</h4>
								<div class="contact-image mt-3">
        							<img src="{{ rtrim(env('SOURCE_PANEL_IMAGE_URL'), '/') . '/../Qrcode.jpeg' }}" alt="QR Code" class="img-fluid rounded">
    							</div>

								<div class="mt-1">
									<a href="https://wa.me/qr/ZHOUTXW464FSB1" target="_blank" class="btn-success btn-sm">
										Add me as a contact on WhatsApp
									</a>
								</div>
								
							</div><!-- End .widget -->
						</div><!-- End .col-lg-3 -->

						<div class="col-lg-3 col-sm-6">
							<div class="widget">
								<h4 class="widget-title">Customer Service</h4>

								<ul class="links">
									<li><a href="{{ route('home') }}">Home</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=1">Watches</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Handbags">Handbags</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Clothings">Clothings</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Shoes">Shoes</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Belts">Belts</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Jewelery">Jewelery</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Glassware">Glassware</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=113">Others</a></li>
									<li><a href="{{ route('about-us') }}">About Us</a></li>
									<li><a href="{{ route('contact-us') }}">Contact Us</a></li>
								</ul>
							</div><!-- End .widget -->
						</div><!-- End .col-lg-3 -->

					
					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End .footer-middle -->

			<div class="container">
				<div class="footer-bottom">
					<div class="container d-sm-flex align-items-center">
						<div class="footer-left">
							<span class="footer-copyright">© Porto eCommerce. 2021. All Rights Reserved</span>
						</div>

						<div class="footer-right ml-auto mt-1 mt-sm-0">
							<div class="payment-icons">
								<span class="payment-icon visa" style="background-image: url('{{ asset('assets/images/payments/payment-visa.svg') }}')"></span>
								<span class="payment-icon paypal" style="background-image: url('{{ asset('assets/images/payments/payment-paypal.svg') }}')"></span>
								<span class="payment-icon stripe" style="background-image: url('{{ asset('assets/images/payments/payment-stripe.png') }}')"></span>
								<span class="payment-icon verisign" style="background-image: url('{{ asset('assets/images/payments/payment-verisign.svg') }}')"></span>

							</div>
						</div>
					</div>
				</div><!-- End .footer-bottom -->
			</div><!-- End .container -->
		</footer><!-- End .footer -->
		