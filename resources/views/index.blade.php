<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Repladeez - eCommerce Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Repladeez - eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/demo1.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
</head>

<body>
    <div class="page-wrapper">
        <div class="top-notice text-white bg-dark">
            <div class="container text-center">
                <h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles</h5>
                <a href="demo1-shop.html" class="category">MEN</a>
                <a href="demo1-shop.html" class="category">WOMEN</a>
                <small>* Limited time only.</small>
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            </div>
            <!-- End .container -->
        </div>
        <!-- End .top-notice -->

        @include('layouts.header')
        <!-- End .header -->

        <main class="main home">
            <div class="container mb-2">
                @if(session('error'))
                        <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="dismissError()">            
                            </button>
                        </div>
                    @endif            
                <div class="info-boxes-container row row-joined mb-2 font2">
                    <!--<div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>FREE SHIPPING &amp; RETURN</h4>
                            <p class="text-body">Free shipping on all orders over $99</p>
                        </div>
                    
                    </div>
                    

                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p class="text-body">100% money back guarantee</p>
                        </div>
                    
                    </div>
                    

                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p class="text-body">Lorem ipsum dolor sit amet.</p>
                        </div>
                        
                    </div>-->
                    <!-- End .info-box -->
                </div>

                <div class="row">
                    <div class="col-lg-9">                        
                        <!-- End .home-slider -->                       

                        <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Featured Products</h2>                                                        

                      <div id="product-list" class="row pb-4">
                            @foreach($products as $product)
                                @php
                                    $videoExtensions = ['mp4', 'mov', 'avi', 'webm'];
                                    $media = $product->images->sortBy('serial_no')->take(2);
                                    $firstMedia = $media->first();
                                    $secondMedia = $media->skip(1)->first();
                                @endphp
                                @if($firstMedia && !empty($firstMedia->file_path))
                                    <div class="col-12 col-sm-6 col-md-3 mb-4">  {{-- ✅ 3 per row on md+, 2 per row on sm --}}
                                        <div class="product-default">
                                            <figure>
                                                <a href="{{ url('product/' . $product->product_url) }}">
                                                    <div class="media-wrapper" style="position: relative; width: 100%; padding-top: 100%; overflow: hidden;">
                                                        {{-- First media --}}
                                                        @php $ext1 = strtolower(pathinfo($firstMedia->file_path, PATHINFO_EXTENSION)); @endphp
                                                        @if(in_array($ext1, $videoExtensions))
                                                            <video class="preview-video" muted autoplay loop playsinline
                                                                style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                                                <source src="{{ env('SOURCE_PANEL_IMAGE_URL') . $firstMedia->file_path }}" type="video/{{ $ext1 }}">
                                                            </video>
                                                        @else
                                                            <img class="preview-image" src="{{ env('SOURCE_PANEL_IMAGE_URL') . $firstMedia->file_path }}"
                                                                alt="{{ $product->product_name }}"
                                                                style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                                        @endif

                                                        {{-- Second media --}}
                                                        @if($secondMedia)
                                                            @php $ext2 = strtolower(pathinfo($secondMedia->file_path, PATHINFO_EXTENSION)); @endphp
                                                            @if(in_array($ext2, $videoExtensions))
                                                                <video class="hover-video" muted loop playsinline
                                                                    style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: none;">
                                                                    <source src="{{ env('SOURCE_PANEL_IMAGE_URL') . $secondMedia->file_path }}" type="video/{{ $ext2 }}">
                                                                </video>
                                                            @else
                                                                <img class="hover-image" src="{{ env('SOURCE_PANEL_IMAGE_URL') . $secondMedia->file_path }}"
                                                                    alt="{{ $product->product_name }}"
                                                                    style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: none;">
                                                            @endif
                                                        @endif
                                                    </div>
                                                </a>
                                            </figure>

                                            <div class="product-details text-center">
                                                <div class="category-list">
                                                    <a href="{{ url()->current() }}?category={{ $product->category_id }}" class="product-category">
                                                        {{ $product->category->category_name ?? 'Uncategorized' }}
                                                    </a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="{{ url('product/' . $product->product_url) }}">{{ $product->product_name }}</a>
                                                </h3>
                                                <p class="product-description">{{ $product->description ?? 'No description available.' }}</p>
                                                <div class="price-box">
                                                    <span class="product-price">${{ number_format($product->product_price ?? 0, 2) }}</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="javascript:;" class="btn btn-primary btn-lg rounded-pill mt-4 addToCartBtn"                                                    
                                                        data-product-id="{{ $product->product_id }}"
                                                        data-product-name="{{ $product->product_name }}"
                                                        data-product-price="{{ $product->product_price }}"
                                                        data-product-filepath="{{ optional($product->images->sortBy('serial_no')->first())->file_path }}"
                                                        style="color: white;">
                                                        <i class="icon-shopping-cart"></i>
                                                        Add to Cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div id="loading" style="text-align:center; display:none; padding: 10px;">
                            <strong>Loading more products...</strong>
                        </div>

                        <div style="text-align:center; margin-top: 10px;">
                            <button id="loadMoreBtn" class="btn btn-primary btn-lg rounded-pill mt-4">Load More</button>
                        </div>

                        <hr class="mt-1 mb-3 pb-2">

                       
                        <!-- End .feature-boxes-container -->
                    </div>
                    
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                    <aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
                        <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
                            <h2 class="side-menu-title bg-gray ls-n-25">Browse Categories</h2>

                            @php
                        function renderCategoriesFlat($categories, $prefix = '') {
                            foreach ($categories as $category) {
                                echo '<li>';
                                echo '<a href="' . url()->current() . '?category=' . $category->category_id . '">';
                                echo $prefix . e($category->category_name) . ' (' . ($category->products_count ?? 0) . ')';
                                echo '</a>';
                                echo '</li>';

                                if ($category->children && $category->children->isNotEmpty()) {
                                    // call recursively with indent
                                    renderCategoriesFlat($category->children, $prefix . '- ');
                                }
                            }
                        }
                    @endphp

                            <nav class="side-nav">
                                <ul class="menu menu-vertical">
                                    <li class="active"><a href="{{ route('home') }}"><i class="icon-home"></i>Home</a></li>
                                    @php renderCategoriesFlat($categories); @endphp
                                </ul>
                            </nav>

                        </div>
                        <!-- End .side-menu-container -->

                    </aside>
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </main>
        <!-- End .main -->

        @include('layouts.footer')
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    
    <!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo1.html">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="demo1-shop.html" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div>

    <!--<div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(assets/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="assets/images/logo.png" width="111" height="44" alt="Logo" class="logo-newsletter">
            <h2>Subscribe to newsletter</h2>

            <p>
                Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
            </p>

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>-->
        <!-- End .newsletter-popup-content -->

        <button title="Close (Esc)" type="button" class="mfp-close">
            ×
        </button>
    </div>
    <!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>

   <script>
const SOURCE_PANEL_IMAGE_URL = "{{ env('SOURCE_PANEL_IMAGE_URL') }}";

let offset = {{ count($products) }};
 let totalProducts = {{ $totalProducts }};
let isLoading = false;

if (offset >= totalProducts) {
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    if (loadMoreBtn) {
        loadMoreBtn.style.display = 'none';
    }
}

document.getElementById('loadMoreBtn').addEventListener('click', function () {
    if (isLoading) return;
    loadMoreProducts();
});

function getCategoryFromUrl() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('category');
}

function loadMoreProducts() {
    isLoading = true;
    document.getElementById('loading').style.display = 'block';

    const category = getCategoryFromUrl();

    fetch("{{ route('products.load.more') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ offset: offset, category: category })
    })
    .then(response => response.json())
    .then(products => {
        if (products.length === 0) {
            document.getElementById('loading').innerText = 'No more products.';
            document.getElementById('loadMoreBtn').style.display = 'none';
            return;
        }

        products.forEach(product => {
            const media = (product.images || []).slice(0, 2);
            if (!media[0] || !media[0].file_path) {
                return; 
            }

            let imagesHtml = '';
            media.forEach(image => {
                imagesHtml += `
                    <img src="${SOURCE_PANEL_IMAGE_URL}${image.file_path}" style="object-fit:cover; width: 100%; height: 100%; position: absolute; top:0; left:0;" alt="${product.product_name}">
                `;
            });

            let filePath = media[0]?.file_path ?? '';
            let oldPriceHtml = product.old_price ? `<span class='old-price'>$${product.old_price}</span>` : '';

            let newItem = `
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="product-default">
                    <figure>
                        <a href="product/${product.product_url}">
                            <div class="media-wrapper" style="position: relative; width: 100%; padding-top: 100%; overflow: hidden;">
                                ${imagesHtml}
                            </div>
                        </a>
                    </figure>

                    <div class="product-details text-center">
                        <div class="category-list">
                            <a href="${window.location.pathname}?category=${product.category_id}" class="product-category">
                                ${product.category_name ?? 'Uncategorized'}
                            </a>
                        </div>
                        <h3 class="product-title">
                            <a href="product/${product.product_url}">${product.product_name}</a>
                        </h3>

                        <p class="product-description">${product.description ?? 'No description available.'}</p>
                        <div class="price-box">
                            ${oldPriceHtml}
                            <span class="product-price">${{ number_format($product->product_price ?? 0, 2) }}</span>
                        </div>                        
                        <div class="product-action">
                            <a href="javascript:;" class="btn btn-primary btn-lg rounded-pill mt-4 addToCartBtn"
                               data-product-id="${product.product_id}"
                               data-product-name="${product.product_name}"
                               data-product-price="${product.product_price}"
                               data-product-filepath="${filePath}" style="color: white;">
                                <i class="icon-shopping-cart"></i>
                                <span>ADD TO CART</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            `;

            document.getElementById('product-list').insertAdjacentHTML('beforeend', newItem);
        });

        offset += products.length;
        isLoading = false;
        document.getElementById('loading').style.display = 'none';
    })
    .catch(() => {
        isLoading = false;
        document.getElementById('loading').style.display = 'none';
    });
}

$(document).on('click', '.addToCartBtn', function (e) {
    e.preventDefault();

    let productId = $(this).data('product-id');
    let productName = $(this).data('product-name');
    let productPrice = $(this).data('product-price');
    let qty = '1';
    let filePath = $(this).data('product-filepath');

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
            alert("Failed to add to cart");
        }
    });
});


document.querySelectorAll('.media-wrapper').forEach(wrapper => {
    const previewMedia = wrapper.querySelector('.preview-video, .preview-image');
    const hoverMedia = wrapper.querySelector('.hover-video, .hover-image');

    if (previewMedia && hoverMedia) {
        wrapper.addEventListener('mouseenter', () => {
            // Hide preview media
            previewMedia.style.display = 'none';

            // Show hover media
            hoverMedia.style.display = 'block';

            // Play video if it's video
            if (hoverMedia.tagName.toLowerCase() === 'video') {
                hoverMedia.play();
            }
        });

        wrapper.addEventListener('mouseleave', () => {            
            if (hoverMedia.tagName.toLowerCase() === 'video') {
                hoverMedia.pause();
                hoverMedia.currentTime = 0;
            }
            hoverMedia.style.display = 'none';

            previewMedia.style.display = 'block';
        });
    }
});

</script>

</body>

</html>