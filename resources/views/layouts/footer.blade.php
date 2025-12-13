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
									<a href="https://api.whatsapp.com/send?phone=8618202031361&text={{ urlencode(url()->current()) }}" target="_blank" class="btn-success btn-sm">
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
									<li><a href="{{ url('watches') }}">Watches</a></li>
									<li><a href="{{ url('handbags') }}">Handbags</a></li>
									<li><a href="{{ url('shoes') }}">Shoes</a></li>
									<li><a href="{{ url('clothings') }}">Clothings</a></li>                    
									<li><a href="{{ url('belts') }}">Belts</a></li>
									<li><a href="{{ url('glassware') }}">Glassware</a></li>
									<li><a href="{{ url('sunglasses') }}">Sunglass</a></li>
									<li><a href="{{ url('jewelery') }}">Jewelery</a></li>                    
									<li><a href="{{ url('accessories') }}">Accessories</a></li>
									<li><a href="{{ url('others') }}">Others</a></li>
									<li><a href="{{ url('tableware') }}">Tableware</a></li>
									<li><a href="{{ route('about-us') }}">About Us</a></li>
									<li><a href="{{ route('contact-us') }}">Contact Us</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery">Product Gallery</a></li>
								</ul>
							</div><!-- End .widget -->
						</div><!-- End .col-lg-3 -->

						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<div class="widget">
									<h4 class="widget-title">Brands</h4>
									<ul class="links">
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Acne Studios') }}">Acne Studios</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Addidas') }}">Addidas</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Alexander Wang') }}">Alexander Wang</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Alenander Mcqueen') }}">Alenander Mcqueen</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Alaia Paris') }}">Alaia Paris</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Ami Paris') }}">Ami Paris</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Amina Muaddi') }}">Amina Muaddi</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Amiri') }}">Amiri</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Arcteryx') }}">Arcteryx</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Armani') }}">Armani</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Bally') }}">Bally</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Balenciaga') }}">Balenciaga</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Balmain') }}">Balmain</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Berluti') }}">Berluti</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Brunello Cucinelli') }}">Brunello Cucinelli</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Bottega Veneta') }}">Bottega Veneta</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Burberry') }}">Burberry</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="widget">
									<ul class="links">
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Cartier') }}">Cartier</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Casablanca') }}">Casablanca</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Chanel') }}">Chanel</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Chloe') }}">Chloe</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Coach') }}">Coach</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Dolce Gabbana') }}">DG (Dolce & Gabbana)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Dita') }}">Dita</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Dsquared2') }}">Dsquared2</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Dsquare') }}">Dsquare</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Dior') }}">Dior (Christian Dior)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Emporio Armani') }}">Emporio Armani</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Ferragamo') }}">Ferragamo</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Fendi') }}">Fendi</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Givenchy') }}">Givenchy</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Golden Goose') }}">Golden Goose</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Gucci') }}">Gucci (GG)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Hermes') }}">Hermes</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Jimmy Choo') }}">Jimmy Choo</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="widget">
									<ul class="links">
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Kaws') }}">Kaws</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Kenzo') }}">Kenzo</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Kiton') }}">Kiton</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Lanvin') }}">Lanvin</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Loewe') }}">Loewe</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Loro Piana') }}">Loro Piana</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('LV') }}">LV</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Maison Margiela') }}">Maison Margiela</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Marc Jacobs') }}">Marc Jacobs</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('MontBlanc') }}">MontBlanc</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Moncler') }}">Moncler</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Nike') }}">Nike</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Off White') }}">Off White</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Palm Angels') }}">Palm Angels</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Philipp Plein') }}">Philipp Plein</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Polene') }}">Polene</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Prada') }}">Prada</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Ralph Lauren') }}">Ralph Lauren</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Rimova') }}">Rimova</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Stone Island') }}">Stone Island</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="widget">
									<ul class="links">
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Supreme') }}">Supreme</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('The North Face') }}">The North Face</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('The Row') }}">The Row</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Thom Browne') }}">Thom Browne</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Timberland') }}">Timberland</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Tod') }}">Tod's</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Tom Ford') }}">Tom Ford</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Tommy') }}">Tommy</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Tory Burch') }}">Tory Burch</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('UGG') }}">UGG</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Valentino') }}">Valentino</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Van Cleef & Arpels') }}">Van Cleef & Arpels</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Vetements') }}">Vetements</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Versace') }}">Versace</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Y-3') }}">Y-3</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Saint Laurent') }}">YSL (Saint Laurent)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Yeezy') }}">Yeezy</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/{{ \Illuminate\Support\Str::slug('Zimmermann') }}">Zimmermann</a></li>
									</ul>
								</div>
							</div>
						</div>



					
					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End .footer-middle -->

			<div class="container">
				<div class="footer-bottom">
					<div class="container d-sm-flex align-items-center">
						<div class="footer-left">
							<span class="footer-copyright">© repladeez. 2025. All Rights Reserved</span>
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
		