<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Porto - Bootstrap eCommerce Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
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
                        <div class="home-slider slide-animate owl-carousel owl-theme mb-2" data-owl-options="{
							'loop': false,
							'dots': true,
							'nav': false
						}">
                            @foreach ($banners as $banner)
                                <div class="home-slide banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                    <img class="slide-bg"
                                        style="background-color: {{ $banner->bg_color ?? '#ffffff' }};"
                                        src="{{ env('SOURCE_PANEL_URL') . '/public/' . $banner->file_path }}"
                                        width="880" height="428" alt="home-slider">

                                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                                        <h4 class="text-white mb-0">{{ $banner->sub_title ?? 'Sub Title' }}</h4>
                                        <h2 class="text-white mb-0">{{ $banner->title ?? 'Title' }}</h2>
                                        <h3 class="text-white text-uppercase m-b-3">{{ $banner->discount_text ?? 'Discount' }}</h3>
                                        <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">
                                            Starting At
                                            <b class="coupon-sale-text bg-secondary text-white d-inline-block">
                                                $<em class="align-text-top">{{ $banner->price ?? '199' }}</em>99
                                            </b>
                                        </h5>
                                        <a href="{{ $banner->link ?? '#' }}" class="btn btn-dark btn-md ls-10">Shop Now!</a>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End .home-slide -->
                        </div>
                        <!-- End .home-slider -->

                       

                        <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Featured Products</h2>

                        <div id="product-list" class="row products-group" style="margin: 0;">
                            @foreach($products as $product)
                                <div class="col-6 col-sm-4 col-md-3">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure class="img-effect">
                                            <a href="{{ url('product/' . $product->product_url) }}">
                                                @foreach($product->images->take(2) as $image)
                                                    <img src="{{ env('SOURCE_PANEL_URL') . '/public/' . $image->file_path }}" style="width: 205px; height: 205px; object-fit: cover;" alt="{{ $product->product_name }}">
                                                @endforeach
                                            </a>
                                            @if($product->is_hot)
                                                <div class="label-group">
                                                    <div class="product-label label-hot">HOT</div>
                                                    @if($product->discount_percent)
                                                        <div class="product-label label-sale">-{{ $product->discount_percent }}%</div>
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="btn-icon-group">
                                                <a href="javascript:;"
                                                    class="btn-icon btn-add-cart product-type-simple addToCartBtn"
                                                    data-product-id="{{ $product->product_id }}"
                                                    data-product-name="{{ $product->product_name }}"
                                                    data-product-price="{{ $product->product_price }}"
                                                    data-product-filepath="{{ $image->file_path }}">
                                                    <i class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="{{ route('product-quick-view', $product->product_id) }}" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                             <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="{{ url()->current() }}?category={{ $product->category_id }}" class="product-category">
                                                        {{ $product->category->category_name }}
                                                    </a>
                                                </div>                                               
                                            </div>
                                            <h3 class="product-title">
                                                <a href="{{ url('product/' . $product->product_url) }}">{{ $product->product_name }}</a>
                                            </h3>
                                           
                                            <div class="price-box">
                                                @if($product->old_price)
                                                    <span class="old-price">${{ $product->old_price }}</span>
                                                @endif
                                                <span class="product-price">${{ $product->product_price }}</span>
                                            </div>
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

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                    <aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
                        <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
                            <h2 class="side-menu-title bg-gray ls-n-25">Browse Categories</h2>

                            <nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                            <li class="active"><a href="{{ route('home') }}"><i class="icon-home"></i>Home</a></li>

                            @php
                                function renderCategories($categories)
                                {
                                    foreach ($categories as $category) {
                                        echo '<li>';
                                        echo '<a href="' . url()->current() . '?category=' . $category->category_id . '">' . $category->category_name . '</a>';

                                        if ($category->children && $category->children->isNotEmpty()) {
                                            echo '<ul class="submenu">';
                                            renderCategories($category->children); // Recursive call here
                                            echo '</ul>';
                                        }

                                        echo '</li>';
                                    }
                                }
                            @endphp

                            @php renderCategories($categories); @endphp
                        </ul>

                            </nav>
                        </div>
                        <!-- End .side-menu-container -->

                        <div class="widget widget-banners px-3 pb-3 text-center">
                            <div class="owl-carousel owl-theme dots-small">
                                <div class="banner d-flex flex-column align-items-center">
                                    <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase">
                                        <em>Sale</em>Many Item
                                    </h3>

                                    <h4 class="sale-text text-uppercase"><small>UP
                                            TO</small>50<sup>%</sup><sub>off</sub></h4>
                                    <p>Bags, Clothing, T-Shirts, Shoes, Watches and much more...</p>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md">View Sale</a>
                                </div>
                                <!-- End .banner -->

                                <div class="banner banner4">
                                    <figure>
                                        <img src="assets/images/demoes/demo1/banners/banner-7.jpg" alt="banner">
                                    </figure>

                                    <div class="banner-layer">
                                        <div class="coupon-sale-content">
                                            <h4>DRONE + CAMERAS</h4>
                                            <h5 class="coupon-sale-text text-gray ls-n-10 p-0 font1"><i>UP
                                                    TO</i><b class="text-white bg-dark font1">$100</b> OFF</h5>
                                            <p class="ls-0">Top Brands and Models!</p>
                                            <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                                SALE</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .banner -->

                                <div class="banner banner5">
                                    <h4>HEADPHONES SALE</h4>

                                    <figure class="m-b-3">
                                        <img src="assets/images/demoes/demo1/banners/banner-8.jpg" alt="banner">
                                    </figure>

                                    <div class="banner-layer">
                                        <div class="coupon-sale-content">
                                            <h5 class="coupon-sale-text ls-n-10 p-0 font1"><i>UP
                                                    TO</i><b class="text-white bg-secondary font1">50%</b> OFF</h5>
                                            <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                                SALE</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .banner -->
                            </div>
                            <!-- End .banner-slider -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-newsletters bg-gray text-center">
                            <h3 class="widget-title text-uppercase m-b-3">Subscribe Newsletter</h3>
                            <p class="mb-2">Get all the latest information on Events, Sales and Offers. </p>
                            <form action="#">
                                <div class="form-group position-relative sicon-envolope-letter">
                                    <input type="email" class="form-control" name="newsletter-email" placeholder="Email address">
                                </div>
                                <!-- Endd .form-group -->
                                <input type="submit" class="btn btn-primary btn-md" value="Subscribe">
                            </form>
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-testimonials">
                            <div class="owl-carousel owl-theme dots-left dots-small">
                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="assets/images/clients/client-1.jpg" alt="client">
                                        </figure>

                                        <div>
                                            <h4 class="testimonial-title">john Smith</h4>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>
                                    <!-- End .testimonial-owner -->

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                <!-- End .testimonial -->

                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="assets/images/clients/client-2.jpg" alt="client">
                                        </figure>

                                        <div>
                                            <h4 class="testimonial-title">Dae Smith</h4>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>
                                    <!-- End .testimonial-owner -->

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                <!-- End .testimonial -->

                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="assets/images/clients/client-3.jpg" alt="client">
                                        </figure>

                                        <div>
                                            <h4 class="testimonial-title">John Doe</h4>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>
                                    <!-- End .testimonial-owner -->

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                <!-- End .testimonial -->
                            </div>
                            <!-- End .testimonials-slider -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-posts post-date-in-media media-with-zoom mb-0 mb-lg-2 pb-lg-2">
                            <div class="owl-carousel owl-theme dots-left dots-m-0 dots-small" data-owl-options="
                                { 'margin' : 20,
                                  'loop': false }">
                                <article class="post">
                                    <div class="post-media">
                                        <a href="single.html">
                                            <img src="assets/images/blog/home/post-1.jpg" data-zoom-image="assets/images/blog/home/post-1.jpg" width="280" height="209" alt="Post">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">29</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        <!-- End .post-date -->

                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="single.html">Post Format Standard</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="single.html" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        <!-- End .post-content -->
                                    </div>
                                    <!-- End .post-body -->
                                </article>

                                <article class="post">
                                    <div class="post-media">
                                        <a href="single.html">
                                            <img src="assets/images/blog/home/post-2.jpg" data-zoom-image="assets/images/blog/home/post-2.jpg" width="280" height="209" alt="Post">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">29</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        <!-- End .post-date -->
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="single.html">Fashion Trends</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="single.html" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        <!-- End .post-content -->
                                    </div>
                                    <!-- End .post-body -->
                                </article>

                                <article class="post">
                                    <div class="post-media">
                                        <a href="single.html">
                                            <img src="assets/images/blog/home/post-3.jpg" data-zoom-image="assets/images/blog/home/post-3.jpg" width="280" height="209" alt="Post">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">29</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        <!-- End .post-date -->
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="single.html">
                                                Post Format Video</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="single.html" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        <!-- End .post-content -->
                                    </div>
                                    <!-- End .post-body -->
                                </article>
                            </div>
                            <!-- End .posts-slider -->
                        </div>
                        <!-- End .widget -->
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
            </nav>
            <!-- End .mobile-nav -->

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
        </div>
        <!-- End .mobile-menu-wrapper -->
    </div>
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

    let offset = {{ count($products) }};
    let isLoading = false;

    document.getElementById('loadMoreBtn').addEventListener('click', function () {
        if (isLoading) return;
        loadMoreProducts();
    });

    function getCategoryFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('category'); // returns string or null
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
            body: JSON.stringify({ offset: offset,  category: category })
        })
        .then(response => response.json())
        .then(products => {
            if (products.length === 0) {
                document.getElementById('loading').innerText = 'No more products.';
                document.getElementById('loadMoreBtn').style.display = 'none';
                return;
            }

            products.forEach(product => {
                let imagesHtml = '';
                product.images.slice(0, 2).forEach(image => {
                    imagesHtml += `
                                <img src="${SOURCE_PANEL_URL}/public/${image.file_path}" 
                                style="width: 205px; height: 205px; object-fit: cover;" 
                                alt="${product.product_name}">
                        `;
                });

                let labelHtml = '';
                if(product.is_hot){
                    labelHtml = `<div class="label-group"><div class="product-label label-hot">HOT</div>`;
                    if(product.discount_percent){
                        labelHtml += `<div class="product-label label-sale">-${product.discount_percent}%</div>`;
                    }
                    labelHtml += `</div>`;
                }

                let newItem = `
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="product/${product.product_url}">
                                    ${imagesHtml}
                                </a>
                                ${labelHtml}
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view/${product.product_id}" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                    <div class="category-list">
                                         <a href="${window.location.pathname}?category=${product.category.category_id}" class="product-category">
                                            ${product.category.category_name}
                                        </a>
                                    </div>    
                                <h3 class="product-title">
                                    <a href="product/${product.product_url}">${product.product_name}</a>
                                </h3>
                               
                                <div class="price-box">
                                    ${product.old_price ? `<span class="old-price">$${product.old_price}</span>` : ''}
                                    <span class="product-price">$${product.product_price}</span>
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

    $(document).ready(function () {
        $('.addToCartBtn').click(function (e) {
            e.preventDefault();

            console.log('Add to Cart button clicked');

            let productId = $(this).data('product-id');
            let productName = $(this).data('product-name');
            let productPrice = $(this).data('product-price');
            let qty = '1'; // Make sure this qty input is unique per product or handled properly
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

    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.add-wishlist').forEach(function (btn) {
        btn.addEventListener('click', function () {
            let productId = this.getAttribute('data-id');

            fetch("{{ route('wishlist.add') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    product_id: productId
                }),
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert(data.success);
                } else {
                    alert(data.error);
                }
            });
        });
    });
});
</script>
</body>

</html>