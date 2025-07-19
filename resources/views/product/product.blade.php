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
                                @endphp
                            <div class="product-item">
                                @if(in_array($mainExt, ['mp4', 'mov', 'avi', 'webm']))
                                    <video id="mainProductMedia" width="100%" autoplay muted loop playsinline
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
                                @php
                                    $videoExtensions = ['mp4', 'mov', 'avi', 'webm'];
                                @endphp

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
                                            <video width="110" height="110" muted autoplay loop preload="metadata" playsinline
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
                            <h1 class="product-title">{{ $product->product_name }}</h1>

                            

                            @if(session('frontend'))
                                <a target="_blank" href="{{ env('SOURCE_PANEL_URL') }}/product/editProduct/{{ $product->product_id }}">
                                    Edit
                                </a>
                            @endif

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
                            @php
                                $firstVariant = $variants->first();
                            @endphp
                            <div class="price-box">
                                <span id="variant-price" class="product-price">${{ number_format($firstVariant->product_price, 2) }}</span>
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
                            <div class="d-flex align-items-center mb-3">
                                <label class="mr-2" style="min-width: 60px;">Colors:</label>
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

                            <p class="product-size">Size: <span id="variant-size">{{ $product->size }}</span></p>
                        </div><!-- End .tab-pane -->
                        
                        
                    </div><!-- End .tab-content -->
                </div><!-- End .product-single-tabs -->

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
                                                <a href="{{ url()->current() }}?category={{ $related->category_id }}" class="product-category">
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

</body>

</html>