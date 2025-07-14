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
</head>

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

                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    @php
                                    $videoExtensions = ['mp4', 'mov', 'avi', 'webm'];
                                @endphp

                                @foreach ($product->images->sortBy('serial_no') as $image)
                                    @php
                                        $ext = strtolower(pathinfo($image->file_path, PATHINFO_EXTENSION));
                                        $isVideo = in_array($ext, $videoExtensions);
                                        $mediaUrl = env('SOURCE_PANEL_IMAGE_URL') . $image->file_path;
                                    @endphp

                                    <div class="product-item">
                                        @if($isVideo)
                                            <video class="product-single-image"
                                                src="{{ $mediaUrl }}"
                                                data-zoom-image="{{ $mediaUrl }}"
                                                width="468" height="468"
                                                muted autoplay loop playsinline
                                                style="object-fit: cover;">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <img class="product-single-image"
                                                src="{{ $mediaUrl }}"
                                                data-zoom-image="{{ $mediaUrl }}"
                                                width="468" height="468"
                                                alt="product" />
                                        @endif
                                    </div>
                                @endforeach
                                </div>
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>

                            <div class="prod-thumbnail owl-dots">
                               @php
                                    $videoExtensions = ['mp4', 'mov', 'avi', 'webm'];
                                @endphp

                                @foreach ($product->images->sortBy('serial_no') as $image)
                                    @php
                                        $ext = strtolower(pathinfo($image->file_path, PATHINFO_EXTENSION));
                                        $isVideo = in_array($ext, $videoExtensions);
                                        $mediaUrl = env('SOURCE_PANEL_IMAGE_URL') . $image->file_path;
                                    @endphp

                                    <div class="owl-dot">
                                        @if($isVideo)
                                            <video width="110" height="110" muted autoplay loop preload="metadata" playsinline
                                                style="object-fit: cover; border-radius: 4px;">
                                                <source src="{{ $mediaUrl }}" type="video/{{ $ext }}">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <img src="{{ $mediaUrl }}" width="110" height="110" alt="product-thumbnail" style="object-fit: cover; border-radius: 4px;" />
                                        @endif
                                    </div>
                                @endforeach

                            </div>
                        </div><!-- End .product-single-gallery -->

                        <div class="col-lg-7 col-md-6 product-single-details">
                            <h1 class="product-title">{{ $product->product_name }}</h1>

                            <div class="product-nav">
                                <div class="product-prev">
                                    <a href="#">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150"
                                                    src="../assets/images/products/product-3.jpg"
                                                    style="padding-top: 0px;">

                                                <span>Circled Ultimate 3D Speaker</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>

                                <div class="product-next">
                                    <a href="#">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150"
                                                    src="../assets/images/products/product-4.jpg"
                                                    style="padding-top: 0px;">

                                                <span>Blue Backpack for the Young</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                          
                            <hr class="short-divider">

                            <div class="price-box">
                                <span class="product-price">${{ number_format($product->product_price, 2) }}</span>
                            </div>
                            <!-- End .price-box -->

                            <div class="product-desc">
                                <p>{{ $product->description }}</p>
                            </div><!-- End .product-desc -->

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

                                <a href="javascript:;"
                                    class="btn btn-dark mr-2 addToCartBtn"
                                    data-product-id="{{ $product->product_id }}"
                                    data-product-name="{{ $product->product_name }}"
                                    data-product-price="{{ $product->product_price }}"
                                    data-product-filepath="{{ $image->file_path }}">
                                    Add to Cart
                                    </a>


                                <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                            </div><!-- End .product-action -->

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

                               <!--<a href="javascript:void(0);" 
                                    class="btn-icon-wish add-wishlist" 
                                    data-id="{{ $product->product_id }}" 
                                    title="Add to Wishlist">
                                    <i class="icon-wishlist-2"></i>
                                    <span>Add to Wishlist</span>
                                </a>-->

                            </div><!-- End .product single-share -->
                        </div><!-- End .product-single-details -->
                    </div><!-- End .row -->
                </div><!-- End .product-single-container -->

                <div class="product-single-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                                href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                                aria-selected="true">Description</a>
                        </li>
                    
                         @if (!empty($product->color) || !empty($product->size))
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                                role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                                Information</a>
                        </li>
                      @endif
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                            aria-labelledby="product-tab-desc">
                            <div class="product-desc-content">
                                {{ $product->description }}
                            </div><!-- End .product-desc-content -->
                        </div><!-- End .tab-pane -->

                       

                        @if (!empty($product->color) || !empty($product->size))
                            <div class="tab-pane fade" id="product-tags-content" role="tabpanel"
                                aria-labelledby="product-tab-tags">
                                <table class="table table-striped mt-2">
                                    <tbody>
                                        @if (!empty($product->color))
                                        <tr>
                                            <th>Color</th>
                                            <td>
                                                <div style="display: flex; align-items: center; gap: 6px;">
                                                    <div style="width: 16px; height: 16px; background-color: {{ $product->color }}; border: 1px solid #ccc;"></div>
                                                    <span>{{ $product->color }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif

                                        @if (!empty($product->size))
                                        <tr>
                                            <th>Size</th>
                                            <td>{{ $product->size }}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>

                        
                    </div><!-- End .tab-content -->
                </div><!-- End .product-single-tabs -->

                <div class="products-section pt-0">
                    <h2 class="section-title">Related Products</h2>

                    <div class="products-slider 5col owl-carousel owl-theme dots-top dots-small">
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="../assets/images/demoes/demo1/products/product-1.jpg" width="205"
                                        height="205" alt="product">
                                    <img src="../assets/images/demoes/demo1/products/product-1-2.jpg" width="205"
                                        height="205" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>

                                <div class="product-countdown-container">
                                    <span class="product-countdown-title">offer ends in:</span>
                                    <div class="product-countdown countdown-compact" data-until="2021, 10, 5"
                                        data-compact="true">
                                    </div><!-- End .product-countdown -->
                                </div><!-- End .product-countdown-container -->
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Black Grey Headset</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="../assets/images/demoes/demo1/products/product-2.jpg" width="205"
                                        height="205" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="demo1-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Battery Charger</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="../assets/images/demoes/demo1/products/product-3.jpg" width="205"
                                        height="205" alt="product">
                                    <img src="../assets/images/demoes/demo1/products/product-3-2.jpg" width="205"
                                        height="205" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Brown Bag</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="../assets/images/demoes/demo1/products/product-4.jpg" width="205"
                                        height="205" alt="product">
                                    <img src="../assets/images/demoes/demo1/products/product-4-2.jpg" width="205"
                                        height="205" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Casual Note Bag</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="../assets/images/demoes/demo1/products/product-5.jpg" width="205"
                                        height="205" alt="product">
                                    <img src="../assets/images/demoes/demo1/products/product-5-2.jpg" width="205"
                                        height="205" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="demo1-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Porto Extended Camera</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .products-slider -->
                </div><!-- End .products-section -->

                <hr class="mt-0 m-b-5" />

                <div class="product-widgets-container row pb-2">
                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">                        
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-1.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-1-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Ultimate 3D Bluetooth
                                        Speaker</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-2.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-2-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Brown Women Casual HandBag</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-3.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-3-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Circled Ultimate 3D Speaker</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Best Selling Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-4.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-4-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Blue Backpack for the Young -
                                        S</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-5.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-5-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Casual Spring Blue Shoes</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-6.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-6-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Men Black Gentle Belt</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Latest Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-7.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-7-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Brown-Black Men Casual
                                        Glasses</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-8.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-8-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Brown-Black Men Casual
                                        Glasses</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-9.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-9-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Black Men Casual Glasses</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Top Rated Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-10.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-10-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Basketball Sports Blue Shoes</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-11.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-11-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Men Sports Travel Bag</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="../assets/images/products/small/product-12.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="../assets/images/products/small/product-12-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Brown HandBag</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                </div><!-- End .row -->
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