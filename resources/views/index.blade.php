<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Repladeez - China factory direct supply for Watches HandBags Shoes Clothes Sunglasses Jewellery</title>

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

    <!-- Google tag (gtag.js) -->
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
             
                <div class="row">
                    <div class="col-lg-9">                        
                        <!-- End .home-slider -->                       
                       
                      <div id="product-list" class="row pb-4">
                            @foreach($products as $product)
                                @php
                                    $videoExtensions = ['mp4', 'mov', 'avi', 'webm'];
                                    $media = $product->images->sortBy('serial_no')->take(2);
                                    $firstMedia = $media->first();
                                    $secondMedia = $media->skip(1)->first();
                                @endphp
                                
                                    <div class="col-12 col-sm-6 col-md-3">  {{-- ✅ 3 per row on md+, 2 per row on sm --}}
                                        <div class="product-default">
                                            <figure>
                                                <a href="{{ url('product/' . $product->product_url) }}">
                                                    @php
                                                    $defaultImage = env('SOURCE_PANEL_IMAGE_URL') . 'NPIA.png';

                                                    $file1 = $firstMedia && !empty($firstMedia->file_path) ? $firstMedia->file_path : 'NPIA.png';
                                                    $ext1 = strtolower(pathinfo($file1, PATHINFO_EXTENSION));
                                                @endphp

                                                <div class="media-wrapper" style="position: relative; width: 100%; padding-top: 100%; overflow: hidden;">

                                                    {{-- First media --}}
                                                    @if(in_array($ext1, $videoExtensions) && $file1 !== 'NPIA.png')
                                                        <video class="preview-video" muted autoplay loop playsinline controls
                                                            style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                                            <source src="{{ env('SOURCE_PANEL_IMAGE_URL') . $file1 }}" type="video/{{ $ext1 }}">
                                                        </video>
                                                    @else
                                                        <img class="preview-image"
                                                            src="{{ env('SOURCE_PANEL_IMAGE_URL') . $file1 }}"
                                                            alt="{{ $product->product_name ?? '' }}"
                                                            style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                                    @endif

                                                    {{-- Second media --}}
                                                    @php
                                                        $file2 = $secondMedia && !empty($secondMedia->file_path) ? $secondMedia->file_path : null;
                                                        $ext2 = $file2 ? strtolower(pathinfo($file2, PATHINFO_EXTENSION)) : null;
                                                    @endphp

                                                    @if($file2)
                                                        @if(in_array($ext2, $videoExtensions))
                                                            <video class="hover-video" muted loop playsinline
                                                                style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: none;">
                                                                <source src="{{ env('SOURCE_PANEL_IMAGE_URL') . $file2 }}" type="video/{{ $ext2 }}">
                                                            </video>
                                                        @else
                                                            <img class="hover-image"
                                                                src="{{ env('SOURCE_PANEL_IMAGE_URL') . $file2 }}"
                                                                alt="{{ $product->product_name ?? 'Hover Image' }}"
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
                                                    <a href="{{ url('product/' . $product->product_url) }}">{{ \Illuminate\Support\Str::title($product->product_name) }}</a>
                                                </h3>
                                                @if(!empty($product->size))
                                                    <p class="product-description">Size: {{ $product->size }}</p>
                                                @endif
                                                @if(!empty($product->product_price))
                                                <div class="price-box">
                                                    <span class="product-price">USD{{ number_format($product->product_price ?? 0) }}</span><br>                                                    
                                                </div>
                                                @endif
                                                <div>
                                                    <span style="color: red; font-size: 12px;">+ shipping fees</span>
                                                </div>
                                                @if(session('frontend'))
                                                    <a target="_blank" href="{{ env('SOURCE_PANEL_URL') }}/product/editProduct/{{ $product->product_id }}">
                                                        Edit
                                                    </a>
                                                @endif


                                                <!--<div class="product-action">
                                                    <a href="javascript:;" class="btn btn-primary btn-lg rounded-pill mt-4 addToCartBtn"                                                    
                                                        data-product-id="{{ $product->product_id }}"
                                                        data-product-name="{{ $product->product_name }}"
                                                        data-product-price="{{ $product->product_price }}"
                                                        data-product-filepath="{{ optional($product->images->sortBy('serial_no')->first())->file_path }}"
                                                        style="color: white;">
                                                        <i class="icon-shopping-cart"></i>
                                                        Add to Cart
                                                    </a>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                
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
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=1">Watches</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Handbags">Handbags</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Shoes">Shoes</a></li>
                                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Clothings">Clothings</a></li>									
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Belts">Belts</a></li>
                                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Sunglasses">Sunglasses</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Jewelery">Jewelery</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Accessories">Accessories</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=113">Others</a></li>
									<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Tableware">Tableware</a></li>
                                    @php renderCategoriesFlat($categories); @endphp
                                </ul>
                            </nav>

                        </div>
                        <!-- End .side-menu-container -->

                    </aside>
                    <div class="sidebar-overlay"></div>                    
                    
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
    const SOURCE_PANEL_URL = "{{ env('SOURCE_PANEL_URL') }}";
    const SOURCE_PANEL_IMAGE_URL = "{{ env('SOURCE_PANEL_IMAGE_URL') }}";
    const isLoggedIn = {{ session('logged_in', false) ? 'true' : 'false' }};

    let offset = {{ count($products) }};
    const totalProducts = {{ $totalProducts }};
    let isLoading = false;
    let currentSearch = ''; // Track current search term

    // Hide load more button if all products are loaded
    if (offset >= totalProducts) {
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        if (loadMoreBtn) {
            loadMoreBtn.style.display = 'none';
        }
    }

    // Setup load more button click
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function () {
            if (isLoading) return;
            loadMoreProducts();
        });
    }

    // Get category from URL query string
    function getCategoryFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('category');
    }

    const videoExtensions = ['mp4', 'mov', 'avi', 'webm'];

    function isVideo(filePath) {
        const ext = filePath.split('.').pop().toLowerCase();
        return videoExtensions.includes(ext);
    }

   
    function getParamsFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        return {
            search: urlParams.get('search') || '',
            category: urlParams.get('category') || ''
        };
    }

    function loadMoreProducts() {
        if (isLoading) return;
        isLoading = true;
        document.getElementById('loading').style.display = 'block';

        const params = getParamsFromUrl(); // get both search and category
        const defaultImagePath = `${SOURCE_PANEL_IMAGE_URL}NPIA.png`;

        let payload = {
            offset: offset,
            category: params.category
        };

        if (params.search) {
            payload.search = params.search; // include search if present
        }

        fetch("{{ route('products.load.more') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(payload)
        })
        .then(response => response.json())
        .then(products => {
            if (products.length === 0) {
                document.getElementById('loading').innerText = 'No more products.';
                document.getElementById('loadMoreBtn').style.display = 'none';
                isLoading = false;
                return;
            }

            products.forEach(product => {
                const images = product.images || [];
                if (images.length === 0) return;

                images.sort((a, b) => (a.serial_no || 0) - (b.serial_no || 0));
                const media = images.slice(0, 2);

                const file1 = media[0]?.file_path ? `${SOURCE_PANEL_IMAGE_URL}${media[0].file_path}` : defaultImagePath;
                const file2 = media[1]?.file_path ? `${SOURCE_PANEL_IMAGE_URL}${media[1].file_path}` : null;

                let imagesHtml = '';

                if (file1 && isVideo(file1)) {
                    imagesHtml += `
                        <video class="preview-video" muted autoplay loop playsinline controls
                            style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; display:block;">
                            <source src="${file1}" type="video/${file1.split('.').pop().toLowerCase()}">
                        </video>
                    `;
                } else {
                    imagesHtml += `
                        <img class="preview-image"
                            src="${file1}"
                            alt="${product.product_name}"
                            style="object-fit:cover; width: 100%; height: 100%; position: absolute; top:0; left:0; display:block;">
                    `;
                }

                if (file2) {
                    if (isVideo(file2)) {
                        imagesHtml += `
                            <video class="hover-video" muted loop playsinline
                                style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: none;">
                                <source src="${file2}" type="video/${file2.split('.').pop().toLowerCase()}">
                            </video>
                        `;
                    } else {
                        imagesHtml += `
                            <img class="hover-image"
                                src="${file2}"
                                alt="${product.product_name}"
                                style="object-fit:cover; width: 100%; height: 100%; position: absolute; top:0; left:0; display: none;">
                        `;
                    }
                }

                let oldPriceHtml = product.old_price
                    ? `<span class='old-price'>$${parseFloat(product.old_price).toFixed(2)}</span>`
                    : '';

                const newItem = `
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
                                    <a href="product/${product.product_url}">
                                        ${product.product_name.toLowerCase().replace(/\b\w/g, char => char.toUpperCase())}
                                    </a>
                                </h3>
                                ${product.product_price && product.product_price > 0 ? `
                                    <div class="price-box">
                                        ${oldPriceHtml}
                                        <span class="product-price">USD${parseFloat(product.product_price).toFixed(2)}</span>
                                    </div>
                                ` : ''}
                                <div>
                                    <span style="color: red; font-size: 15px;">+ shipping fees</span>
                                </div>
                                ${isLoggedIn ? `
                                    <a href="${SOURCE_PANEL_URL}/product/editProduct/${product.product_id}"
                                        class="btn rounded-pill mt-4"
                                        style="background-color: #5bc0de; color: #fff; padding: 10px 20px; text-align: center; font-weight: 500;">
                                        Edit
                                    </a>
                                ` : ''}
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

    // Add to cart functionality
    $(document).on('click', '.addToCartBtn', function (e) {
        e.preventDefault();
        const productId = $(this).data('product-id');
        const productName = $(this).data('product-name');
        const productPrice = $(this).data('product-price');
        const qty = '1';
        const filePath = $(this).data('product-filepath');

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
            error: function () {
                alert("Failed to add to cart");
            }
        });
    });

    // Hover effect for images/videos
    function setupHoverEffects() {
        document.querySelectorAll('.media-wrapper').forEach(wrapper => {
            const preview = wrapper.querySelector('.preview-image, .preview-video');
            const hover = wrapper.querySelector('.hover-image, .hover-video');
            if (preview && hover) {
                wrapper.addEventListener('mouseenter', () => {
                    preview.style.display = 'none';
                    hover.style.display = 'block';
                    if (hover.tagName === 'VIDEO') hover.play();
                });
                wrapper.addEventListener('mouseleave', () => {
                    preview.style.display = 'block';
                    hover.style.display = 'none';
                    if (hover.tagName === 'VIDEO') hover.pause();
                });
            }
        });
    }

    // Reapply hover effects after loading more products
    new MutationObserver(() => setupHoverEffects())
        .observe(document.getElementById('product-list'), { childList: true });

    // Initialize hover effects on page load
    document.addEventListener('DOMContentLoaded', () => {
        setupHoverEffects();
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