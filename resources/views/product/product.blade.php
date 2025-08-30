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
    <link rel="icon" type="image/x-icon" href="../assets/images/icons/favicon.png">

    <script>
        WebFontConfig = {
            google: { families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '../assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="../assets/css/demo1.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/fontawesome-free/css/all.min.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q2JZF5MT1B"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-Q2JZF5MT1B');
    </script>

</head>
<style>
    .product-media-list {
    display: flex;
    flex-direction: column;
    gap: 20px; /* space between items */
}

</style>
<body>
    <div class="page-wrapper">
     @include('layouts.header')   
    <!-- End .header -->

        <main class="main">
            <div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo1.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                    </ol>
                </nav>
                <div class="product-single-container product-single-default">
                    <div class="cart-message d-none">
                        <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                        <span>has been added to your cart.</span>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 col-md-6 product-single-gallery">
                            
                            <div class="product-slider-container">
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <!---->
                                    <div class="product-label label-sale">
                                        -16%
                                    </div>
                                </div>

                                
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>

                            

                           <div class="product-single-carousel owl-carousel owl-theme show-nav-hover product-main-preview">
                                @php
                                    $mainImage = optional($product->images->sortBy('serial_no')->first())->file_path;
                                    $mainExt = strtolower(pathinfo($mainImage, PATHINFO_EXTENSION));
                                    $mediaUrl = env('SOURCE_PANEL_IMAGE_URL') . $mainImage;
                                    $videoExtensions = ['mp4', 'mov', 'avi', 'webm'];
                                @endphp
                                
                                <div class="product-item">
                                    @if(in_array($mainExt, $videoExtensions))
                                        <video id="mainProductMedia" width="100%" autoplay muted loop playsinline controls
                                            style="object-fit: cover; border-radius: 6px;">
                                            <source src="{{ $mediaUrl }}" type="video/{{ $mainExt }}">
                                        </video>
                                    @else
                                        <img id="mainProductMedia" src="{{ $mediaUrl }}" alt="{{ $product->product_name }}"
                                            style="width: 100%; object-fit: cover; border-radius: 6px;" />
                                    @endif
                                </div>
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>

                            <div class="prod-thumbnail owl-dots">
                                @foreach ($product->images->sortBy('serial_no') as $image)
                                    @php
                                        $ext = strtolower(pathinfo($image->file_path, PATHINFO_EXTENSION));
                                        $isVideo = in_array($ext, $videoExtensions);
                                        $mediaUrl = env('SOURCE_PANEL_IMAGE_URL') . $image->file_path;
                                    @endphp

                                    <div class="owl-dot"
                                        data-src="{{ $mediaUrl }}"
                                        data-type="{{ $isVideo ? 'video' : 'image' }}"
                                        data-ext="{{ $ext }}"
                                        style="cursor:pointer;">

                                        @if($isVideo)
                                            <video width="110" height="110" muted autoplay loop playsinline preload="metadata" controls
                                                style="object-fit: cover; border-radius: 4px;">
                                                <source src="{{ $mediaUrl }}" type="video/{{ $ext }}">
                                            </video>
                                        @else
                                            <img src="{{ $mediaUrl }}" width="110" height="110" alt="product-thumbnail"
                                                style="object-fit: cover; border-radius: 4px;" />
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- End .product-single-gallery -->

            
                        <div class="col-lg-7 col-md-6 product-single-details">
                            <h1 class="product-title">{{ \Illuminate\Support\Str::title($product->product_name) }}</h1>                           

                            @if(session('frontend'))
                                <a target="_blank" href="{{ env('SOURCE_PANEL_URL') }}/product/editProduct/{{ $product->product_id }}">
                                    Edit
                                </a>
                            @endif

                            <div class="product-nav">
                                @if($prevProduct)
                                    <div class="product-prev">
                                        <a href="{{ url('product/' . $prevProduct->product_url) }}">
                                            <span class="product-link"></span>
                                            <span class="product-popup">
                                                <span class="box-content">
                                                    <img alt="product" width="150" height="150"
                                                        src="{{ $prevProduct->images->first()?->file_path 
                                                                ? env('SOURCE_PANEL_IMAGE_URL') . '/' . $prevProduct->images->first()->file_path 
                                                                : env('SOURCE_PANEL_IMAGE_URL') . '/NPIA.png' }}"
                                                                style="padding-top: 0px;">                                                        

                                                    <span>{{ $prevProduct->title }}</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                @endif

                                @if($nextProduct)
                                    <div class="product-next">
                                        <a href="{{ url('product/' . $nextProduct->product_url) }}">
                                            <span class="product-link"></span>
                                            <span class="product-popup">
                                                <span class="box-content">
                                                   <img alt="product" width="150" height="150"
                                                        src="{{ $nextProduct->images->first()?->file_path 
                                                            ? env('SOURCE_PANEL_IMAGE_URL') . '/' . $nextProduct->images->first()->file_path 
                                                            : env('SOURCE_PANEL_IMAGE_URL') . '/NPIA.png' }}"

                                                        style="padding-top: 0px;">
                                                    <span>{{ $nextProduct->title }}</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                                                      
                            @php
                                $firstVariant = $variants->first();
                            @endphp
                            <div class="price-box">
                                <span id="variant-price" class="product-price">${{ number_format($firstVariant->product_price, 2) }}</span>
                            </div>
                            
                            <div class="product-meta" style="margin: 10px 0;">
                                <p>{{ $product->sku }} / {{ $product->purchase_code }}</p>
                            </div>

                            <div class="product-desc">
                                {!! $product->description !!}
                            </div>

                            @php
                                use App\Models\Category;

                                $categoryIds = explode(',', $product->category_ids);
                            @endphp

                            @if (!empty($categoryIds) && $categoryIds[0] == '1')
                                @php
                                    $otherCategoryIds = array_slice($categoryIds, 1); // skip the first one (1)
                                    $categories = Category::whereIn('category_id', $otherCategoryIds)->pluck('category_name', 'category_id');
                                @endphp

                                @foreach ($otherCategoryIds as $catId)
                                    @if (isset($categories[$catId]))
                                        <p>{{ $categories[$catId] }}</p>
                                    @endif
                                @endforeach
                            @endif

                            <div class="product-action">
                               

                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control" type="number" min="1" value="1" id="qty">
                                </div>

                                @php
                                    $firstVariant = $variants->first();
                                    $firstImage = optional($firstVariant->images->sortBy('serial_no')->first())->file_path;                                    
                                @endphp

                                <a href="javascript:;"
                                    class="btn btn-dark mr-2 addToCartBtn"
                                    data-product-id="{{ $firstVariant->product_id }}"
                                    data-product-name="{{ $product->product_name }}"
                                    data-product-price="{{ $firstVariant->product_price }}"
                                    data-product-filepath="{{ $firstImage }}">
                                    Add to Cart
                                </a>                                

                                <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                            </div><!-- End .product-action -->
                        <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                            aria-labelledby="product-tab-desc">
                            
                           <!-- End .tab-pane -->
                        
                        
                    </div><!-- End .tab-content -->
                            <hr class="divider mb-0 mt-0">

                            <div class="product-single-share mb-2">
                                <label class="sr-only">Share:</label>

                                <div class="social-icons mr-2">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                        title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                        title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                        title="Linkedin"></a>
                                    <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                                        title="Google +"></a>
                                    <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                                        title="Mail"></a>
                                </div><!-- End .social-icons -->
                            </div><!-- End .product single-share -->

                      <div class="container mt-4">
                        <div class="d-flex align-items-center flex-wrap mb-3">
                            @if (!empty($product->color))
                                <div class="d-flex align-items-center me-3">
                                    <label class="me-2" style="min-width: 60px;">Colors:</label>
                                    <div class="d-flex flex-wrap">
                                        @foreach($variants as $variant)
                                            @php
                                                $firstImage = optional($variant->images->sortBy('serial_no')->first())->file_path;
                                                $variantExt = strtolower(pathinfo($firstImage, PATHINFO_EXTENSION));

                                                $imagesJson = $variant->images->sortBy('serial_no')->map(function($img) {
                                                    $ext = strtolower(pathinfo($img->file_path, PATHINFO_EXTENSION));
                                                    return [
                                                        'url' => env('SOURCE_PANEL_IMAGE_URL') . $img->file_path,
                                                        'ext' => $ext,
                                                        'type' => in_array($ext, ['mp4', 'mov', 'avi', 'webm']) ? 'video' : 'image'
                                                    ];
                                                });
                                            @endphp

                                            <div class="color-swatch"
                                                data-media="{{ env('SOURCE_PANEL_IMAGE_URL') . $firstImage }}"
                                                data-ext="{{ $variantExt }}"
                                                data-product-id="{{ $variant->product_id }}"
                                                data-size="{{ $variant->size }}"
                                                data-price="{{ $variant->product_price }}"
                                                data-images='@json($imagesJson)'
                                                style="width: 20px; height: 20px; background-color: {{ $variant->color }}; border-radius: 50%; margin-right: 8px; border: 2px solid #ccc; cursor: pointer;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>             
                        </div>
                        @endif  
                        @if (!empty($product->size))
                            <strong class="product-size me-3">Size: <span id="variant-size">{{ $product->size }}</span></strong>
                        @endif
                    </div>

                        <div class="row">
                            @foreach($skuProducts as $p)
                                @foreach($p->images->sortBy('serial_no') as $image)
                                    @php
                                        $ext = strtolower(pathinfo($image->file_path, PATHINFO_EXTENSION));
                                        $isVideo = in_array($ext, ['mp4', 'mov', 'avi', 'webm']);
                                        $mediaUrl = rtrim(env('SOURCE_PANEL_IMAGE_URL'), '/') . '/' . $image->file_path;
                                    @endphp

                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <a href="{{ url('product/' . $p->product_url) }}" style="text-decoration: none; color: inherit;">
                                            <div class="border p-2 text-center d-flex flex-column justify-content-between" style="height: 180px;">
                                                <div style="height: 80%; display: flex; align-items: center; justify-content: center;">
                                                    @if($isVideo)
                                                        <video muted autoplay loop playsinline style="max-height: 100%; max-width: 100%; object-fit: cover; border-radius: 4px;">
                                                            <source src="{{ $mediaUrl }}" type="video/{{ $ext }}">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    @else
                                                        <img src="{{ $mediaUrl }}" alt="Image" style="max-height: 100%; max-width: 100%; object-fit: cover; border-radius: 4px;">
                                                    @endif
                                                </div>                                                    
                                                <div style="height: 20%; margin-top: 8px; font-size: 18px;">
                                                    <strong>{{ $p->product_price ? '$' . number_format($p->product_price, 2) : '$0.00' }}</strong>
                                                </div>
                                                
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>




                        </div><!-- End .product-single-details -->
                    </div><!-- End .row -->                    
                </div><!-- End .product-single-container -->

                <div class="product-media-list">
                @foreach ($product->images->sortBy('serial_no') as $image)
                    @php
                        $ext = strtolower(pathinfo($image->file_path, PATHINFO_EXTENSION));
                        $isVideo = in_array($ext, $videoExtensions);
                        $mediaUrl = env('SOURCE_PANEL_IMAGE_URL') . $image->file_path;
                    @endphp

                    <div class="media-item" style="margin-bottom: 20px;">
                        @if($isVideo)
                            <video muted autoplay loop playsinline controls
                                style="width: 100%; height: auto; object-fit: cover; border-radius: 6px;">
                                <source src="{{ $mediaUrl }}" type="video/{{ $ext }}">
                            </video>
                        @else
                            <img src="{{ $mediaUrl }}" alt="product-media"
                                style="width: 100%; height: auto; object-fit: cover; border-radius: 6px;">
                        @endif
                    </div>
                @endforeach
            </div>
            
                <div class="product-single-tabs">
                   
                </div><!-- End .product-single-tabs -->
            @if($relatedProducts->isNotEmpty())
                <div class="products-section pt-0">
                    <h2 class="section-title">Related Products</h2>
                        <div class="products-slider 5col owl-carousel owl-theme dots-top dots-small">
                            @foreach($relatedProducts as $related)
                                @php
                                    $firstImage = optional($related->images->sortBy('serial_no')->first())->file_path;
                                @endphp
                                <div class="product-default inner-quickview inner-icon">
                                    <figure class="img-effect">
                                        <a href="{{ url('product/' . $related->product_url) }}">
                                            <img src="{{ env('SOURCE_PANEL_IMAGE_URL') . $firstImage }}" width="205" height="205" alt="{{ $related->product_name }}">
                                        </a>
                                                                                
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="{{ url('/') }}?category={{ $related->category_id }}" class="product-category">
                                                    {{ $related->category->category_name ?? 'Category' }}
                                                </a>
                                            </div>                                            
                                        </div>
                                        <h3 class="product-title">
                                            <a href="{{ url('product/' . $related->product_url) }}">{{ $related->product_name }}</a>
                                        </h3>                                        
                                        <div class="price-box">
                                            <span class="product-price">${{ number_format($related->product_price ?? 0, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                   
                </div><!-- End .products-section -->
            @endif
                <hr class="mt-0 m-b-5" />

             
            </div><!-- End .container -->
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
                <ul class="mobile-menu menu-with-icon">
                    <li><a href="demo1.html"><i class="icon-home"></i>Home</a></li>
                    <li>
                        <a href="demo1-shop.html" class="sf-with-ul"><i class="sicon-badge"></i>Categories</a>
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
                        <a href="demo1-product.html" class="sf-with-ul"><i class="sicon-basket"></i>Products</a>
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
                        <a href="#" class="sf-with-ul"><i class="sicon-envelope"></i>Pages</a>
                        <ul>
                            <li>
                                <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="forgot-password.html">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="blog.html"><i class="sicon-book-open"></i>Blog</a></li>
                    <li><a href="demo1-about.html"><i class="sicon-users"></i>About Us</a></li>
                </ul>

                <ul class="mobile-menu menu-with-icon mt-2 mb-2">
                    <li class="border-0">
                        <a href="#" target="_blank"><i class="sicon-star"></i>Buy Porto!<span
                                class="tip tip-hot">Hot</span></a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="demo1-contact.html">Contact Us</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="login.html" class="login-link">Log In</a></li>
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
            <a href="my-account.html" class="">
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

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/plugins.min.js"></script>
    <script src="../assets/js/jquery.plugin.min.js"></script>
    <script src="../assets/js/jquery.countdown.min.js"></script>

    <!-- Main JS File -->
    <script src="../assets/js/main.min.js"></script>

<script>
$(document).ready(function () {
    // ✅ Add to Cart
    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        let productId = $(this).data('product-id');
        let productName = $(this).data('product-name');
        let productPrice = $(this).data('product-price');
        let qty = $('#qty').val();
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
                console.error(xhr.responseText);
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const mainContainer = document.querySelector('.product-main-preview');
    const thumbnailContainer = document.querySelector('.prod-thumbnail');

    if (!mainContainer || !thumbnailContainer) return;

    function updateMainMedia(src, type, ext) {
        
        if (type === 'video') {
            
            mainContainer.innerHTML = `
                <video width="100%" autoplay muted loop playsinline style="object-fit: cover; border-radius: 6px;">
                    <source src="${src}" type="video/${ext}">
                </video>`;
        } else {
            mainContainer.innerHTML = `
                <img src="${src}" alt="Product" style="width: 100%; object-fit: cover; border-radius: 6px;" />`;
        }
    }

    function bindThumbnailEvents() {
        document.querySelectorAll('.owl-dot').forEach(dot => {
            dot.addEventListener('click', function () {
                updateMainMedia(this.dataset.src, this.dataset.type, this.dataset.ext);
            });
        });
    }
    bindThumbnailEvents();

    document.querySelectorAll('.color-swatch').forEach(swatch => {
    swatch.addEventListener('click', function () {
        let media = this.dataset.media;
        media = media.replace(/^.*\/uploads\//, '');
        const fullMediaUrl = "{{ env('SOURCE_PANEL_IMAGE_URL') }}" + media;
        const ext = this.dataset.ext;
        const productId = this.dataset.productId;
        const size = this.dataset.size;
        const price = this.dataset.price;

        let images = [];
        try {
            images = JSON.parse(this.dataset.images);
        } catch (e) {
            console.error('Invalid JSON in data-images', e);
        }

        updateMainMedia(fullMediaUrl, ['mp4','mov','avi','webm'].includes(ext) ? 'video' : 'image', ext);

        let thumbnailsHtml = '';
        images.forEach(img => {
            if (img.type === 'video') {
                thumbnailsHtml += `
                    <div class="owl-dot" data-src="${img.url}" data-type="video" data-ext="${img.ext}">
                        <video width="110" height="110" muted autoplay loop playsinline style="object-fit: cover; border-radius: 4px;">
                            <source src="${img.url}" type="video/${img.ext}">
                        </video>
                    </div>`;
            } else {
                thumbnailsHtml += `
                    <div class="owl-dot" data-src="${img.url}" data-type="image" data-ext="${img.ext}">
                        <img src="${img.url}" width="110" height="110" alt="Thumbnail" style="object-fit: cover; border-radius: 4px;" />
                    </div>`;
            }
        });

        // Destroy old carousel
        if ($('.prod-thumbnail').hasClass('owl-loaded')) {
            $('.prod-thumbnail').trigger('destroy.owl.carousel')
                .removeClass('owl-loaded owl-carousel owl-theme show-nav-hover');
            $('.prod-thumbnail').find('.owl-stage-outer').children().unwrap();
        }

        // Replace thumbnails
        thumbnailContainer.innerHTML = thumbnailsHtml;

        // Reinitialize Owl Carousel with default style
        $('.prod-thumbnail')
            .addClass('owl-carousel owl-theme show-nav-hover')
            .owlCarousel({
                items: 4,
                margin: 10,
                nav: true,
                dots: false
            });

        bindThumbnailEvents();

        document.getElementById('variant-size').innerText = size;
        document.getElementById('variant-price').innerText = `$${parseFloat(price).toFixed(2)}`;

        const cartBtn = document.querySelector('.addToCartBtn');
        if (cartBtn) {
            cartBtn.dataset.productId = productId;
            cartBtn.dataset.productPrice = price;
            cartBtn.dataset.productFilepath = media; // Ensure media is relative if needed
            cartBtn.dataset.productName = document.querySelector('.product-title')?.innerText || '';
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