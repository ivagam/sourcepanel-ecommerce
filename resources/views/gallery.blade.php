<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Repladeez - China factory direct supply for Watches HandBags Shoes Clothes Sunglasses Jewellery</title>

    <meta name="keywords" content="Watches HandBags Shoes Clothes Sunglasses Jewellery" />
    <meta name="description" content="Repladeez - China factory">
    <meta name="author" content="SW-THEMES">

    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">

    <style>
       #category-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #fff;
            box-shadow: 0 2px 5px rgba(6, 83, 35, 0.1);
            z-index: 1000;
            padding: 10px 0;
            overflow-x: auto;
        }

        #category-header a {
            padding: 10px;
            float: left;
            cursor: pointer;
            color: #000;
        }

        #category-header a:hover {
            color: #035b34;
        }

        .bottom {
            padding: 5px !important;
        }
        .slider-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 600px;
            height: 400px !important; /* force height */
            border-radius: 10px;
            margin: auto;
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.4s ease-in-out;
            height: 100% !important;
        }

        .slide {
            min-width: 100%;
            height: 100% !important;
            box-sizing: border-box;
            position: relative;
        }

        .slide img,
        .slide video {
            width: 100%;
            height: 100%;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
        }

        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            outline: none;
            box-shadow: none;
            color: green;
            font-size: 32px;
            cursor: pointer;
            padding: 0;
            line-height: 1;
        }

        .slider-btn.prev {
            left: 10px;
        }

        .slider-btn.next {
            right: 10px;
        }
    </style>
</head>
<body>
    <header id="category-header">
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}" title="Go to Home">
            <img src="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/assets/images/logo.png" width="75" height="34" alt="Repladeez Logo" />
        </a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=watches">Watches</a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=handbags/wallets">Handbags</a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=shoes">Shoes</a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=clothings">Clothes</a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=sunglasses">Sunglasses</a>
        {{-- Videos link (goes to ?category=videos) --}}
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=videos" style="display:flex;align-items:center;gap:5px;">Videos</a>
    </header>

    <main style="padding-top: 10px;">
        <div class="container">
            <div class="col-9">
                <div id="product-list">

                    {{-- If this is the videos page, collect video media items from the provided $products and render video-only cards.
                         Otherwise render your normal product cards (name/price/whatsapp + slider). --}}

                    @php
                        $isVideosPage = (isset($categoryName) && $categoryName === 'videos');
                    @endphp

                    @if($isVideosPage)
                        {{-- Build a collection of video media from the initial $products server-side --}}
                        @php
                            $initialVideos = collect();
                            foreach($products as $product) {
                                $images = $product->images->sortBy('serial_no');
                                foreach ($images as $media) {
                                    $file = $media->file_path;
                                    if (!$file) continue;
                                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                    if (in_array($ext, ['mp4','webm','mov','avi'])) {
                                        $initialVideos->push([
                                            'url' => env('SOURCE_PANEL_IMAGE_URL') . $file,
                                            'ext' => $ext,
                                            // optional: could carry product_url if needed
                                            'product_url' => $product->product_url ?? '',
                                        ]);
                                    }
                                }
                            }
                        @endphp

                        {{-- Render the initial videos (keeps exactly same visual size as other cards) --}}
                        @foreach($initialVideos as $vid)
                            <div class="card">
                                <div class="imgBx slider-container">
                                    <div class="slider-wrapper">
                                        <div class="slide">
                                            <video controls>
                                                <source src="{{ $vid['url'] }}" type="video/{{ $vid['ext'] }}">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        {{-- Normal product cards (unchanged) --}}
                        @foreach($products as $product)
                            @php
                                $images = $product->images->sortBy('serial_no');
                                if ($images->isEmpty()) continue;
                            @endphp

                            <div class="card" @if($loop->first) style="top: 25px;" @endif>
                                <div class="top">
                                    <div class="userDetails">
                                        <div class="bottom">
                                            <div class="actionBtns">
                                                <div class="left">
                                                    <span class="heart"></span>
                                                </div>
                                                <div class="right"></div>
                                            </div>

                                            <div style="position: relative; display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                                                <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap; flex: 1;">

                                                    <a href="https://wa.me/8618202031361?text={{ urlencode('Check out this product: ' . env('SOURCE_PANEL_ECOMMERCE_URL') . '/product/' . $product->product_url) }}" 
                                                        target="_blank" 
                                                        title="Share on WhatsApp"
                                                        style="display: flex; align-items: center;">
                                                            <img src="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/public/whatsapp.png" 
                                                            alt="WhatsApp" 
                                                            width="24" 
                                                            height="24" />
                                                    </a>

                                                    <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/{{ $product->product_url }}" 
                                                        style="font-weight: bold; color: inherit; text-decoration: none;">
                                                        {{ \Illuminate\Support\Str::limit($product->product_name, 30) }}
                                                    </a>

                                                    @if($product->product_price && $product->product_price > 0)
                                                        <span style="color: #555;">
                                                            USD {{ number_format($product->product_price) }}
                                                        </span>
                                                    @endif                                               

                                                    <div style="display: flex; align-items: center; gap: 15px; flex: 1;">
                                                    <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/{{ $product->product_url }}" 
                                                        title="View Product" 
                                                        target="_blank"
                                                        style="display: flex; align-items: center;">
                                                        View Page
                                                    </a>

                                                    <a href="https://wa.me/8618202031361?text={{ urlencode('Hi! I am interested in ' . $product->product_name . '. Please share the price/availability. Link: ' . env('SOURCE_PANEL_ECOMMERCE_URL') . '/product/' . $product->product_url) }}"
                                                        title="Ask Price / Contact Us"
                                                        target="_blank"
                                                        rel="noopener"
                                                        style="display: flex; align-items: center; margin-left: auto;">
                                                        Ask Price / Contact Us
                                                    </a>

                                                    </div>
                                                </div>
                                            </div>                            
                                        </div>
                                    </div>
                                    <div>
                                        <span class="dot"><i class="fas fa-ellipsis-h"></i></span>
                                    </div>
                                </div>

                                <!-- Slider Start -->
                                <div class="imgBx slider-container">
                                    <div class="slider-wrapper">
                                        @foreach($images as $media)
                                            @php
                                                $file = $media->file_path;
                                                if (!$file) continue;
                                                $filePath = env('SOURCE_PANEL_IMAGE_URL') . $file;
                                                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                $isVideo = in_array($ext, ['mp4', 'webm', 'mov', 'avi']);
                                            @endphp
                                            <div class="slide">
                                                @if($isVideo)
                                                    <video controls>
                                                        <source src="{{ $filePath }}" type="video/{{ $ext }}">
                                                    </video>
                                                @else
                                                    <img src="{{ $filePath }}" alt="{{ $product->product_name }}">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>

                                    {{-- Only show arrows if more than 1 image/video --}}
                                    @if($images->count() > 1)
                                        <button class="slider-btn prev">&#10094;</button>
                                        <button class="slider-btn next">&#10095;</button>
                                    @endif
                                </div>
                                <!-- Slider End -->
                            </div>
                        @endforeach
                    @endif

                </div>

                <div id="loader" style="text-align:center; display:none; margin:20px;">Loading...</div>
            </div>
        </div>
    </main>

    {{-- expose variables to JS --}}
    <input type="hidden" id="categoryName" value="{{ $categoryName ?? '' }}"/>
    <script>
    // initial offsets:
    // offsetProducts tracks how many products were initially loaded from server (server used take(12) in controller)
    // We must keep incrementing offsetProducts by the number of products returned by each loadMore call.
    let offsetProducts = {{ count($products) }};
    let loading = false;
    const isVideosPage = (document.getElementById('categoryName').value === 'videos');

    window.addEventListener('scroll', () => {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100 && !loading) {
            loadMoreProducts();
        }
    });

    function truncateText(text, maxLength) {
        return text.length > maxLength ? text.substring(0, maxLength) + '…' : text;
    }

    function loadMoreProducts() {
        loading = true;
        const categoryName = document.getElementById('categoryName').value;
        document.getElementById('loader').style.display = 'block';

        fetch('{{ env("SOURCE_PANEL_ECOMMERCE_URL") }}/load-more-products', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ offset: offsetProducts, category: categoryName })
        })
        .then(response => response.json())
        .then(products => {
            const container = document.getElementById('product-list');

            // If videos page: for each returned product, extract only video media and append a video-only card for each video found.
            if (isVideosPage) {
                products.forEach(product => {
                    const images = product.images || [];
                    images.sort((a,b) => (a.serial_no || 0) - (b.serial_no || 0));
                    images.forEach(img => {
                        if (!img.file_path) return;
                        const file = img.file_path;
                        const ext = file.split('.').pop().toLowerCase();
                        if (!['mp4','mov','webm','avi'].includes(ext)) return; // only videos on videos page
                        const url = '{{ env("SOURCE_PANEL_IMAGE_URL") }}' + file;

                        // create a card that contains only the video (same size as product cards)
                        const card = document.createElement('div');
                        card.className = 'card';
                        card.innerHTML = `
                            <div class="imgBx slider-container">
                                <div class="slider-wrapper">
                                    <div class="slide">
                                        <video controls>
                                            <source src="${url}" type="video/${ext}">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            </div>
                        `;
                        container.appendChild(card);
                    });
                });
            } else {
                // Normal page: append full product cards (name/price/whatsapp + slider) - keep markup same as server-rendered cards
                products.forEach(product => {
                    let images = product.images || [];
                    if (images.length === 0) return;

                    images.sort((a, b) => (a.serial_no || 0) - (b.serial_no || 0));

                    let priceHTML = '';
                    if (product.product_price && product.product_price > 0) {
                        priceHTML = `<span style="color: #555;">USD ${Number(product.product_price)}</span>`;
                    }

                    let slidesHTML = images.map(img => {
                        if (!img.file_path) return '';
                        let file = img.file_path;
                        if (!file) return '';
                        let url = '{{ env("SOURCE_PANEL_IMAGE_URL") }}' + file;
                        let ext = file.split('.').pop().toLowerCase();
                        let isVideo = ['mp4','mov','webm','avi'].includes(ext);
                        return `
                            <div class="slide">
                                ${isVideo 
                                    ? `<video controls>
                                        <source src="${url}" type="video/${ext}">
                                    </video>`
                                    : `<img src="${url}" alt="${product.product_name}">`}
                            </div>`;
                    }).join('');

                    let sliderButtons = "";
                    if (images.length > 1) {
                        sliderButtons = `
                            <button class="slider-btn prev">&#10094;</button>
                            <button class="slider-btn next">&#10095;</button>
                        `;
                    }

                    // Build the same top block (whatsapp, name, price, links)
                    const topHtml = `
                        <div class="top">
                            <div class="userDetails">
                                <div class="bottom">
                                    <div class="actionBtns">
                                        <div class="left"><span class="heart"></span></div>
                                        <div class="right"></div>
                                    </div>
                                    <div style="position: relative; display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                                        <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap; flex: 1;">
                                            <a href="https://wa.me/8618202031361?text=${encodeURIComponent('Check out this product: {{ env("SOURCE_PANEL_ECOMMERCE_URL") }}/product/' + product.product_url)}" 
                                               target="_blank" title="Share on WhatsApp" style="display:flex;align-items:center;">
                                                <img src="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/public/whatsapp.png" width="24" height="24" alt="WhatsApp" />
                                            </a>
                                            <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/${product.product_url}" style="font-weight:bold; color:inherit; text-decoration:none;">
                                                ${truncateText(product.product_name, 30)}
                                            </a>
                                            ${priceHTML}
                                            <div style="display:flex; align-items:center; gap:15px; flex:1;">
                                                <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/${product.product_url}" target="_blank">View Page</a>
                                                <a href="https://wa.me/8618202031361?text=${encodeURIComponent('Hi! I am interested in ' + product.product_name + '. Please share the price/availability. Link: ' + '{{ env("SOURCE_PANEL_ECOMMERCE_URL") }}/product/' + product.product_url)}" target="_blank" style="margin-left:auto;">Ask Price / Contact Us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div><span class="dot"><i class="fas fa-ellipsis-h"></i></span></div>
                        </div>
                    `;

                    const card = document.createElement('div');
                    card.className = 'card';
                    card.innerHTML = topHtml + `
                        <div class="imgBx slider-container">
                            <div class="slider-wrapper">
                                ${slidesHTML}
                            </div>
                            ${sliderButtons}
                        </div>
                    `;
                    container.appendChild(card);
                });
            }

            // update offsetProducts by number of products returned (server returns products array)
            offsetProducts += products.length;

            loading = false;
            document.getElementById('loader').style.display = 'none';

            // initialize sliders for newly appended items
            initSliders();
        })
        .catch(err => {
            console.error(err);
            loading = false;
            document.getElementById('loader').style.display = 'none';
        });
    }

    function initSliders() {
        document.querySelectorAll('.slider-container').forEach(container => {
            const wrapper = container.querySelector('.slider-wrapper');
            if (!wrapper) return;
            const slides = container.querySelectorAll('.slide');
            if (!slides || slides.length === 0) return;
            let index = 0;
            let startX = 0;
            let endX = 0;

            const updateSlide = () => {
                wrapper.style.transform = `translateX(-${index * 100}%)`;

                slides.forEach((slide, i) => {
                    const video = slide.querySelector('video');
                    if (video) {
                        if (i === index) {
                            video.play().catch(()=>{});
                        } else {
                            video.pause();
                        }
                    }
                });
            };

            const prevBtn = container.querySelector('.prev');
            const nextBtn = container.querySelector('.next');

            if (prevBtn && nextBtn) {
                prevBtn.onclick = () => {
                    index = (index > 0) ? index - 1 : slides.length - 1;
                    updateSlide();
                };
                nextBtn.onclick = () => {
                    index = (index < slides.length - 1) ? index + 1 : 0;
                    updateSlide();
                };
            }

            wrapper.addEventListener("touchstart", e => {
                startX = e.touches[0].clientX;
            });

            wrapper.addEventListener("touchmove", e => {
                endX = e.touches[0].clientX;
            });

            wrapper.addEventListener("touchend", () => {
                if (startX - endX > 50) {
                    index = (index < slides.length - 1) ? index + 1 : 0;
                    updateSlide();
                } else if (endX - startX > 50) {
                    index = (index > 0) ? index - 1 : slides.length - 1;
                    updateSlide();
                }
                startX = endX = 0;
            });

            updateSlide();
        });
    }

    initSliders();
    </script>

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
</body>
</html>
