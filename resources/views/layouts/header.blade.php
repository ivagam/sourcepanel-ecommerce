<style>
.live-results-box {
    position: absolute;
	top: 50px;
    z-index: 999;
    background: white;
    width: 100%;
	left: 0;
    right: auto;
    border: 1px solid #ccc;
    display: none;
    max-height: 300px;
    overflow-y: auto;
}
.live-results-box a {
    display: block;
    padding: 8px 12px;
    color: #333;
	text-align: left;
    text-decoration: none;
    cursor: pointer;
}
.live-results-box a:hover {
    background-color: #f0f0f0;
}
.logo {
    max-width: 150px;
}
</style>
<header class="header">			

			<div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
				<div class="container" style="margin-bottom:7px">
					<div class="header-left col-lg-2 w-auto pl-0">
						<button class="mobile-menu-toggler text-primary mr-2" type="button">
							<i class="fas fa-bars"></i>
						</button>
						<a href="{{ route('home') }}" class="logo">
							<img src="{{ asset('assets/images/logo.png') }}" width="211" height="84" alt="Repladeez Logo">
						</a>
					</div><!-- End .header-left -->

					<div class="header-right w-lg-max">
						<div
							class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
							<a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
							<form action="javascript:void(0);" method="get" autocomplete="off">
								<div class="header-search-wrapper">
									<input type="search" class="form-control" name="q" id="search-input" placeholder="Search..." autocomplete="off" required>
									<div id="live-search-results" class="live-results-box"></div>
									<div class="select-custom">
										@php
											$selectedCategory = request()->query('category');
											function renderCategoryOptions($categories, $prefix = '', $selectedCategory = null)
											{
												foreach ($categories as $category) {
													$selected = ($category->category_id == $selectedCategory) ? 'selected' : '';
													echo '<option value="' . $category->category_id . '" ' . $selected . '>' . $prefix . e($category->category_name) . '</option>';

													if ($category->children && $category->children->isNotEmpty()) {
														renderCategoryOptions($category->children, $prefix . '- ', $selectedCategory);
													}
												}
											}
										@endphp

										<select id="cat" name="cat" onchange="if(this.value) window.location.href='{{ url()->current() }}?category=' + this.value;">
											<option value="" {{ $selectedCategory ? '' : 'selected' }}>All Categories</option>
											@php renderCategoryOptions($categories, '', $selectedCategory); @endphp
										</select>
									</div>
								<!-- End .select-custom -->
									<button class="btn icon-magnifier p-0" type="submit"></button>
								</div><!-- End .header-search-wrapper -->
							</form>
						</div><!-- End .header-search -->

						<!--<div class="header-contact d-none d-lg-flex pl-4 pr-4">
							<img alt="phone" src="{{ asset('assets/images/phone.png') }}" width="30" height="30" class="pb-1">
							<h6><span>Call us now</span><a href="tel:#" class="text-dark font1">+123 4567 890</a></h6>
						</div>-->
						
						<!--<a href="{{ route('login') }}" class="header-icon" title="login"><i class="icon-user-2"></i></a>

						<a href="{{ route('wishlist.index') }}" class="header-icon" title="wishlist"><i class="icon-wishlist-2"></i></a>-->

						<div class="dropdown cart-dropdown">
							<a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
								<i class="minicart-icon"></i>
								<span class="cart-count badge-circle">{{ $globalCartCount }}</span>
							</a>


							<div class="cart-overlay"></div>

							<div class="dropdown-menu mobile-cart">
								<a href="#" title="Close (Esc)" class="btn-close">×</a>

								<div class="dropdownmenu-wrapper custom-scrollbar">
									<div class="dropdown-cart-header">Shopping Cart</div>
									<!-- End .dropdown-cart-header -->

									<div class="dropdown-cart-products">
									
									@foreach($globalCart as $item)
										<div class="product">
											<div class="product-details">
												<h4 class="product-title">
													<a href="{{ route('product.show', $item['id'] ?? '#') }}">{{ $item['name'] ?? 'Product' }}</a>
												</h4>
												<span class="cart-product-info">
													<span class="cart-product-qty">{{ $item['qty'] ?? 0 }}</span> × USD {{ number_format($item['price'])}}
												</span>
											</div>
											<figure class="product-image-container">
													<a href="{{ url('product/' . ($item['id'] ?? '')) }}" class="product-image">
														@php
															$filePath = $item['file_path'] ?? '';

															// If it's an array, take the first file
															if (is_array($filePath)) {
																$filePath = $filePath[0] ?? '';
															}

															$mediaUrl = env('SOURCE_PANEL_IMAGE_URL') . $filePath;
															$fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
														@endphp

														@if(in_array($fileExtension, ['mp4', 'webm', 'ogg']))
															<video width="80" height="80" autoplay muted loop style="object-fit: cover;">
																<source src="{{ $mediaUrl }}" type="video/{{ $fileExtension }}">
																Your browser does not support the video tag.
															</video>
														@elseif(!empty($filePath))
															<img src="{{ $mediaUrl }}" alt="product" width="80" height="80" style="object-fit: cover;">
														@else
															<img src="{{ asset('images/no-image.png') }}" alt="No Image" width="80" height="80" style="object-fit: cover;">
														@endif
													</a>

													<a href="javascript:;" class="btn-remove remove-from-cart" data-id="{{ $item['id'] ?? '' }}" title="Remove Product">
														<span>×</span>
													</a>
												</figure>

										</div>
									@endforeach

									<!-- End .product -->
									</div><!-- End .cart-product -->

									<div class="dropdown-cart-total">
										<span>SUBTOTAL:</span>

										<span class="cart-total-price float-right">USD {{ number_format($globalCartTotal) }}</span>

									</div><!-- End .dropdown-cart-total -->

									<div class="dropdown-cart-action">
										<a href="{{ route('cart.index') }}" class="btn btn-gray btn-block view-cart">View
											Cart</a>
										<a href="{{ route('checkout.index') }}" class="btn btn-dark btn-block">Checkout</a>
									</div><!-- End .dropdown-cart-total -->
								</div><!-- End .dropdownmenu-wrapper -->
							</div><!-- End .dropdown-menu -->
						</div><!-- End .dropdown -->
					</div><!-- End .header-right -->
					<div class="user-logout ml-3">
						@if(session('logged_in'))
						<form method="POST" action="{{ route('logout') }}" style="margin: 0;">
							@csrf
							<button type="submit" class="btn btn-sm btn-outline-primary">Logout</button>
						</form>
						@endif
				</div><!-- End .container -->
			</div><!-- End .header-middle -->

			<div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
				<div class="container">
					<nav class="main-nav w-100">
								@php
							function renderCategoryTree($categories)
							{
								foreach ($categories as $category) {
									echo '<li>';
									echo '<a href="' . url()->current() . '?category=' . $category->category_id . '">' . e($category->category_name) . '</a>';

									if ($category->children->isNotEmpty()) {
										echo '<ul class="submenu">';
										renderCategoryTree($category->children); // 👈 recursive
										echo '</ul>';
									}

									echo '</li>';
								}
							}
						@endphp

						<ul class="menu">
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
							@php renderCategoryTree($categories); @endphp
						</ul>
					</nav>
				</div><!-- End .container -->
			</div><!-- End .header-bottom -->
		</header>

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    location.reload(); // Refresh to update cart UI
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert("Failed to remove product from cart.");
                }
            });
        });
    });

	$(document).ready(function() {
    const input = $('#search-input');
    const resultBox = $('#live-search-results');

    input.on('keyup', function() {
        let query = $(this).val().trim();

        if (query.length > 1) {
            $.ajax({
                url: '{{ route("live.search") }}',
                type: 'GET',
                data: { q: query },
                success: function(data) {
                    resultBox.empty().show();

                    if (data.length === 0) {
                        resultBox.append('<div class="px-3 py-2 text-muted">No results found</div>');
                    } else {
                        data.forEach(item => {
                            resultBox.append(`<a href="${item.url}">${item.name} <small>(${item.type})</small></a>`);
                        });
                    }
                }
            });
        } else {
            resultBox.hide();
        }
    });

    // Hide results if clicking outside input or results
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#search-input, #live-search-results').length) {
            resultBox.hide();
        }
    });

    // Optional: Hide results after clicking a result
    resultBox.on('click', 'a', function() {
        resultBox.hide();
        input.val(''); // Optional: clear search input
    });
});
</script>