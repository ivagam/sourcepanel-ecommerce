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
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Acne+Studios">Acne Studios</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Addidas">Addidas</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Alexander+Wang">Alexander Wang</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Alenander+Mcqueen">Alenander Mcqueen</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Alaia+Paris">Alaia Paris</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Ami+Paris">Ami Paris</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Amina+Muaddi">Amina Muaddi</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Amiri">Amiri</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Arcteryx">Arcteryx</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Armani">Armani</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Bally">Bally</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Balenciaga">Balenciaga</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Balmain">Balmain</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Berluti">Berluti</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Brunello+cucinelli">Brunello cucinelli</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Bottega+Veneta">Bottega Veneta</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Burberry">Burberry</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="widget">
									<ul class="links">
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Cartier">Cartier</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Casablanca">Casablanca</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Chanel">Chanel</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Chloe">Chloe</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Coach">Coach</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=DG+%28Dolce+%26+Gabbana%29">DG (Dolce & Gabbana)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dita">Dita</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dsquared2">Dsquared2</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dsquare">Dsquare</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dior+%28Christian+Dior%29">Dior (Christian Dior)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Emporio+Armani">Emporio Armani</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Ferragamo">Ferragamo</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Fendi">Fendi</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Givenchy">Givenchy</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Golden+Goose">Golden Goose</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Gucci+%28GG%29">Gucci (GG)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Hermes">Hermes</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Jimmy+Choo">Jimmy Choo</a></li>               
										
									</ul>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="widget">
									<ul class="links">
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Kaws">Kaws</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Kenzo">Kenzo</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Kiton">Kiton</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Lanvin">Lanvin</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Loewe">Loewe</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Loro+Piana">Loro Piana</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Lv">LV</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Maison+Margiela">Maison Margiela</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Marc+Jacobs">Marc Jacobs</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=MontBlanc">MontBlanc</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Moncler">Moncler</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Nike">Nike</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Off+White">Off White</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Palm+Angels">Palm Angels</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Philipp+Plein">Philipp Plein</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Polene">Polene</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Prada">Prada</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Ralph+Lauren">Ralph Lauren</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Rimova">Rimova</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Stone+island">Stone island</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="widget">
									<ul class="links">										
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Supreme">Supreme</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=The+North+Face">The North Face</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=The+Row">The Row</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Thom+Browne">Thom Browne</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Timberland">Timberland</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tod's">Tod's</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tom+Ford">Tom Ford</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tommy">Tommy</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tory+Burch">Tory Burch</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=UGG">UGG</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Valentino">Valentino</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Van+Cleef+%26+Arpels">Van Cleef & Arpels</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Vetements">Vetements</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Versace">Versace</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Y-3">Y-3</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Saint+Laurent">YSL (Saint Laurent)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Yeezy">Yeezy</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Zimmermann">Zimmermann</a></li>
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
		