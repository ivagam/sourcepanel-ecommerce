<div class="product-single-container product-single-default product-quick-view mb-0 custom-scrollbar">
	<div class="row">
		<div class="col-md-6 product-single-gallery mb-md-0">
			<div class="product-slider-container">
				<div class="label-group">
					<div class="product-label label-hot">HOT</div>
					<!---->
					<div class="product-label label-sale">
						-16%
					</div>
				</div>

				<div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
						@foreach($product->images->sortBy('serial_no') as $image)
						<div class="product-item">
							<img class="product-single-image"
								src="{{ env('SOURCE_PANEL_URL') . '/public/' . $image->file_path }}"								
								data-zoom-image="{{ env('SOURCE_PANEL_URL') . '/public/' . $image->file_path }}"
								alt="{{ $product->product_name }}"
								style="width:400px; height:400px; object-fit:cover; display:block;"
							>
						</div>
					@endforeach
				</div>
				<!-- End .product-single-carousel -->
			</div>
			<div class="prod-thumbnail owl-dots">
				@foreach($product->images->sortBy('serial_no') as $image)
					<div class="owl-dot">
						<img src="{{ env('SOURCE_PANEL_URL') . '/public/' . $image->file_path }}" alt="Thumbnail">
					</div>
				@endforeach
			</div>

		</div><!-- End .product-single-gallery -->

		<div class="col-md-6">
			<div class="product-single-details mb-0 ml-md-4">
				<h1 class="product-title">{{ $product->product_name }}</h1>

				<div class="ratings-container">
					<div class="product-ratings">
						<span class="ratings" style="width:60%"></span><!-- End .ratings -->
					</div><!-- End .product-ratings -->

					<a href="#" class="rating-link">( 6 Reviews )</a>
				</div><!-- End .ratings-container -->

				<hr class="short-divider">

				<div class="price-box">
					<span class="product-price">${{ number_format($product->product_price, 2) }}</span>
				</div>
				<!-- End .price-box -->

				<div class="product-desc">
					<p>
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
						pariatur. Excepteur sint occaecat cupidatat non.
					</p>
				</div><!-- End .product-desc -->

				<ul class="single-info-list">
					<!---->
					<li>
						SKU:
						<strong>654613612</strong>
					</li>

					<li>
						CATEGORY:
						<strong>
							<a href="#" class="product-category">SHOES</a>
						</strong>
					</li>
				</ul>

				<div class="product-filters-container">
					<div class="product-single-filter">
						<label>Size:</label>
						<ul class="config-size-list">
							<li><a href="javascript:;" class="d-flex align-items-center justify-content-center">XL</a>
							</li>
							<li class=""><a href="javascript:;"
									class="d-flex align-items-center justify-content-center">L</a></li>
							<li class=""><a href="javascript:;"
									class="d-flex align-items-center justify-content-center">M</a></li>
							<li class=""><a href="javascript:;"
									class="d-flex align-items-center justify-content-center">S</a></li>
						</ul>
					</div>

					<div class="product-single-filter">
						<label></label>
						<a class="font1 text-uppercase clear-btn" href="#">Clear</a>
					</div>
					<!---->
				</div>

				<div class="product-action">
					<div class="price-box product-filtered-price">
						<del class="old-price"><span>${{ number_format($product->old_price ?? 0, 2) }}</span></del>
						<span class="product-price">${{ number_format($product->product_price, 2) }}</span>
					</div>

					 <div class="product-single-qty">
						<input class="horizontal-quantity form-control" type="number" min="1" value="1" id="qty">
					</div><!-- End .product-single-qty -->

					<a href="javascript:;"
						class="btn btn-dark mr-2 addToCartBtn"
						data-product-id="{{ $product->product_id }}"
						data-product-name="{{ $product->product_name }}"
						data-product-price="{{ $product->product_price }}"
						data-product-filepath="{{ $image->file_path }}">
						Add to Cart
					</a>

					<a href="cart.html" class="btn view-cart d-none">View cart</a>
				</div><!-- End .product-action -->

				<hr class="divider mb-0 mt-0">

				<div class="product-single-share mb-0">
					<label class="sr-only">Share:</label>

					<div class="social-icons mr-2">
						<a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
							title="Facebook"></a>
						<a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
						<a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
							title="Linkedin"></a>
						<a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
							title="Google +"></a>
						<a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
					</div><!-- End .social-icons -->

					<!--<a href="wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
							class="icon-wishlist-2"></i><span>Add to
							Wishlist</span></a>-->
				</div><!-- End .product single-share -->
			</div>
		</div><!-- End .product-single-details -->

		<button title="Close (Esc)" type="button" class="mfp-close">
			×
		</button>
	</div><!-- End .row -->
</div><!-- End .product-single-container -->


<script>
    $(document).ready(function () {
        $('.addToCartBtn').click(function (e) {
            e.preventDefault();

            console.log('Add to Cart button clicked');

            let productId = $(this).data('product-id');
            let productName = $(this).data('product-name');
            let productPrice = $(this).data('product-price');
            let qty = $('#qty').val(); // Make sure this qty input is unique per product or handled properly
            let filePath = $(this).data('product-filepath');

            console.log('Sending AJAX request with:', {
                productId,
                productName,
                productPrice,
                quantity: qty,
                file_path: filePath
            });

            $.ajax({
                url: "{{ route('add.to.cart') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    product_name: productName,
                    product_price: productPrice,
                    quantity: qty,
                    file_path: filePath
                },
                success: function(response) {
                    alert(response.success);
                    location.reload();
                },
                error: function (xhr) {
                    console.error('AJAX error response:', xhr.responseText);
                    alert("Failed to add to cart");
                }
            });
        });
    });
</script>