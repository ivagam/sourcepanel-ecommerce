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
									<li><a href="#">Help & FAQs</a></li>
									<li><a href="#">Order Tracking</a></li>
									<li><a href="#">Shipping & Delivery</a></li>
									<li><a href="#">Orders History</a></li>
									<li><a href="#">Advanced Search</a></li>
									<li><a href="dashboard.html">My Account</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="#">Corporate Sales</a></li>
									<li><a href="#">Privacy</a></li>
								</ul>
							</div><!-- End .widget -->
						</div><!-- End .col-lg-3 -->

						<div class="col-lg-3 col-sm-6">
							<div class="widget">
								<h4 class="widget-title">Popular Tags</h4>

								<div class="tagcloud">
									<a href="#">Bag</a>
									<a href="#">Black</a>
									<a href="#">Blue</a>
									<a href="#">Clothes</a>
									<a href="#">Fashion</a>
									<a href="#">Hub</a>
									<a href="#">Shirt</a>
									<a href="#">Shoes</a>
									<a href="#">Skirt</a>
									<a href="#">Sports</a>
									<a href="#">Sweater</a>
								</div>
							</div><!-- End .widget -->
						</div><!-- End .col-lg-3 -->

						<div class="col-lg-3 col-sm-6">
							<div class="widget widget-newsletter">
								<h4 class="widget-title">Subscribe newsletter</h4>
								<p>Get all the latest information on events, sales and offers. Sign up for newsletter:
								</p>
								<form action="#" class="mb-0">
									<input type="email" class="form-control m-b-3" placeholder="Email address" required>

									<input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
								</form>
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
		