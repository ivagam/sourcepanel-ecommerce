<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Repladeez - China factory direct supply for Watches HandBags Shoes Clothes Sunglasses Jewellery</title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Repladeez - eCommerce Template">
	<meta name="author" content="repladeez">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">


	<script>
		WebFontConfig = {
			google: { families: [ 'Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700', 'Shadows+Into+Light:400' ] }
		};
		( function ( d ) {
			var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
			wf.src = 'assets/js/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore( wf, s );
		} )( document );
	</script>

	<!-- Plugins CSS File -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Main CSS File -->
	<link rel="stylesheet" href="assets/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">

	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q2JZF5MT1B"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-Q2JZF5MT1B');
    </script>

</head>

<body>
	<div class="page-wrapper">
		<div class="top-notice bg-primary text-white">
			<div class="container text-center">
				<h5 class="d-inline-block">Get Up to <b>40% OFF</b> New-Season Styles</h5>
				<a href="category.html" class="category">MEN</a>
				<a href="category.html" class="category ml-2 mr-3">WOMEN</a>
				<small>* Limited time only.</small>
				<button title="Close (Esc)" type="button" class="mfp-close">×</button>
			</div><!-- End .container -->
		</div><!-- End .top-notice -->

        @include('layouts.header')
		<!-- End .header -->

		<main class="main">
			<div class="container">
				<ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
					<li class="active">
						<a href="">Shopping Cart</a>
					</li>
					<li>
						<a href="{{route('checkout.index')}}">Checkout</a>
					</li>
					<li class="disabled">
						<a href="#">Order Complete</a>
					</li>
				</ul>

				<div class="row">
					<div class="col-lg-8">
						<div class="cart-table-container">
							<table class="table table-cart">
								<thead>
									<tr>
										<th class="thumbnail-col"></th>
										<th class="product-col">Product</th>
										<th class="price-col">Price</th>
										<th class="qty-col">Quantity</th>
										<th class="text-right">Subtotal</th>
									</tr>
								</thead>
								<tbody>
									@foreach($globalCart as $item)
									<tr class="product-row">
										@php
											$filePath = $item['file_path'];
											$fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
											$mediaUrl = env('SOURCE_PANEL_IMAGE_URL') . $filePath;
										@endphp

										<td>
											<figure class="product-image-container">
												<a href="{{ route('product.show', $item['id']) }}" class="product-image">
													@if(in_array(strtolower($fileExtension), ['mp4', 'webm', 'ogg']))
														<video class="preview-video" width="100" height="100" muted autoplay loop playsinline
                                                            style="object-fit: cover; position: absolute; top: 0; left: 0; display: block;">
															<source src="{{ $mediaUrl }}" type="video/{{ $fileExtension }}">
															Your browser does not support the video tag.
														</video>
													@else
														<img src="{{ $mediaUrl }}" alt="product" width="100" height="100">
													@endif
												</a>

												<a href="javascript:;" class="btn-remove icon-cancel remove-from-cart" data-id="{{ $item['id'] }}" title="Remove Product"></a>
											</figure>
										</td>

										<td class="product-col">
											<h5 class="product-title">
												<a href="{{ route('product.show', $item['id']) }}">{{ $item['name'] }}</a>
											</h5>
										</td>
										<td>USD{{ number_format($item['price']) }}</td>
										
										<td class="text-center">
											<form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-inline-flex align-items-center" style="gap: 4px; margin-bottom: 10px;">

												@csrf

												<button type="submit" name="action" value="decrease" class="btn btn-outline-dark btn-sm px-2 py-1">
													<i class="fas fa-minus"></i>
												</button>

												<input type="text" class="form-control text-center" value="{{ $item['qty'] }}" readonly
													style="width: 45px; height: 32px; padding: 0; font-size: 14px;">

												<button type="submit" name="action" value="increase" class="btn btn-outline-dark btn-sm px-2 py-1">
													<i class="fas fa-plus"></i>
												</button>
											</form>
										</td>
										<td class="text-right">
											<span class="subtotal-price">USD{{ number_format($item['qty'] * number_format($item['price'])) }}</span>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>


								<tfoot>
									<tr>
										<td colspan="5" class="clearfix">

											<div class="float-right">
												<button type="submit" class="btn btn-shop btn-update-cart">
													Update Cart
												</button>
											</div><!-- End .float-right -->
										</td>
									</tr>
								</tfoot>
							</table>
						</div><!-- End .cart-table-container -->
					</div><!-- End .col-lg-8 -->

					<div class="col-lg-4">
						<div class="cart-summary">
							<h3>CART TOTALS</h3>

							<table class="table table-totals">
								<tbody>
									<tr>
										<td>Subtotal</td>
										<td>USD{{ number_format($globalCartTotal) }}</td>
									</tr>

								</tbody>

								<tfoot>
									<tr>
										<td>Total</td>
										<td>USD{{ number_format($globalCartTotal) }}</td>
									</tr>
								</tfoot>
							</table>

							<div class="checkout-methods">
								<a href="{{ route('checkout.index') }}" class="btn btn-block btn-dark">Proceed to Checkout
									<i class="fa fa-arrow-right"></i></a>
							</div>
						</div><!-- End .cart-summary -->
					</div><!-- End .col-lg-4 -->
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->

        @include('layouts.footer')
		<!-- End .footer -->
	</div><!-- End .page-wrapper -->

	<div class="loading-overlay">
		<div class="bounce-loader">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div>

	<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

	<div class="mobile-menu-container">
		<div class="mobile-menu-wrapper">
			<span class="mobile-menu-close"><i class="fa fa-times"></i></span>
			<nav class="mobile-nav">
				<ul class="mobile-menu">
					<li><a href="demo4.html">Home</a></li>
					<li>
						<a href="category.html">Categories</a>
						<ul>
							<li><a href="category.html">Full Width Banner</a></li>
							<li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
							<li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
							<li><a href="category-sidebar-left.html">Left Sidebar</a></li>
							<li><a href="category-sidebar-right.html">Right Sidebar</a></li>
							<li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
							<li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
							<li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
							<li><a href="#">List Types</a></li>
							<li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span
										class="tip tip-new">New</span></a></li>
							<li><a href="category.html">3 Columns Products</a></li>
							<li><a href="category-4col.html">4 Columns Products</a></li>
							<li><a href="category-5col.html">5 Columns Products</a></li>
							<li><a href="category-6col.html">6 Columns Products</a></li>
							<li><a href="category-7col.html">7 Columns Products</a></li>
							<li><a href="category-8col.html">8 Columns Products</a></li>
						</ul>
					</li>
					<li>
						<a href="product.html">Products</a>
						<ul>
							<li>
								<a href="#" class="nolink">PRODUCT PAGES</a>
								<ul>
									<li><a href="product.html">SIMPLE PRODUCT</a></li>
									<li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
									<li><a href="product.html">SALE PRODUCT</a></li>
									<li><a href="product.html">FEATURED & ON SALE</a></li>
									<li><a href="product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
									<li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
									<li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
									<li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="nolink">PRODUCT LAYOUTS</a>
								<ul>
									<li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
									<li><a href="product-grid-layout.html">GRID IMAGE</a></li>
									<li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
									<li><a href="product-sticky-info.html">STICKY INFO</a></li>
									<li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
									<li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a></li>
									<li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
									<li><a href="#">BUILD YOUR OWN</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
						<ul>
							<li>
								<a href="#">Wishlist</a>
							</li>
							<li>
								<a href="">Shopping Cart</a>
							</li>
							<li>
								<a href="{{route('checkout.index')}}">Checkout</a>
							</li>
							<li>
								<a href="dashboard.html">Dashboard</a>
							</li>
							<li>
								<a href="#">Login</a>
							</li>
							<li>
								<a href="forgot-password.html">Forgot Password</a>
							</li>
						</ul>
					</li>
					                                <li><a href="blog.html">Blog</a></li>                                
                                <li><a href="#">Elements</a>
                        <ul class="custom-scrollbar">
                            <li><a href="element-accordions.html">Accordion</a></li>
                            <li><a href="element-alerts.html">Alerts</a></li>
                            <li><a href="element-animations.html">Animations</a></li>
                            <li><a href="element-banners.html">Banners</a></li>
                            <li><a href="element-buttons.html">Buttons</a></li>
                            <li><a href="element-call-to-action.html">Call to Action</a></li>
                            <li><a href="element-countdown.html">Count Down</a></li>
                            <li><a href="element-counters.html">Counters</a></li>
                            <li><a href="element-headings.html">Headings</a></li>
                            <li><a href="element-icons.html">Icons</a></li>
                            <li><a href="element-info-box.html">Info box</a></li>
                            <li><a href="element-posts.html">Posts</a></li>
                            <li><a href="element-products.html">Products</a></li>
                            <li><a href="element-product-categories.html">Product Categories</a></li>
                            <li><a href="element-tabs.html">Tabs</a></li>
                            <li><a href="element-testimonial.html">Testimonials</a></li>
                        </ul>
					</li>
				</ul>

				<ul class="mobile-menu mt-2 mb-2">
					<li class="border-0">
						<a href="#">
							Special Offer!
						</a>
					</li>
					<li class="border-0">
						<a href="#" target="_blank">
							Buy Porto!
							<span class="tip tip-hot">Hot</span>
						</a>
					</li>
				</ul>

				<ul class="mobile-menu">
					<li><a href="#">My Account</a></li>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="#">My Wishlist</a></li>
					<li><a href="#">Cart</a></li>
					<li><a href="#" class="login-link">Log In</a></li>
				</ul>
			</nav><!-- End .mobile-nav -->

			<form class="search-wrapper mb-2" action="#">
				<input type="text" class="form-control mb-0" placeholder="Search..." required />
				<button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
			</form>

			<div class="social-icons">
				<a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
				</a>
				<a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
				</a>
				<a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
				</a>
			</div>
		</div><!-- End .mobile-menu-wrapper -->
	</div><!-- End .mobile-menu-container -->

	<div class="sticky-navbar">
		<div class="sticky-info">
			<a href="demo4.html">
				<i class="icon-home"></i>Home
			</a>
		</div>
		<div class="sticky-info">
			<a href="category.html" class="">
				<i class="icon-bars"></i>Categories
			</a>
		</div>
		<div class="sticky-info">
			<a href="#" class="">
				<i class="icon-wishlist-2"></i>Wishlist
			</a>
		</div>
		<div class="sticky-info">
			<a href="#" class="">
				<i class="icon-user-2"></i>Account
			</a>
		</div>
		<div class="sticky-info">
			<a href="#" class="">
				<i class="icon-shopping-cart position-relative">
					<span class="cart-count badge-circle">3</span>
				</i>Cart
			</a>
		</div>
	</div>



	<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

	<!-- Plugins JS File -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/plugins.min.js"></script>

	<!-- Main JS File -->
	<script src="assets/js/main.min.js"></script>

	<script>
    $(document).ready(function () {
        $(document).on('click', '.remove-from-cart', function (e) {
            e.preventDefault();
            let productId = $(this).data('id');

            $.ajax({
                url: "{{ route('remove.from.cart') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    alert(response.success);
                    location.reload();
                },
                error: function(xhr) {
                    alert("Failed to remove item");
                }
            });
        });
    });
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e565d3e298c395d1ce9e507/1j3igdrg8';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>