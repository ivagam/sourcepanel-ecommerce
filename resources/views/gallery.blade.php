
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

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q2JZF5MT1B"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-Q2JZF5MT1B');
    </script>

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
        #category-header a{
            padding: 10px;
            float:left;
            cursor: pointer;
            color:#000;
        }
        #category-header a:hover{
            color: #035b34;
        }
        .bottom{
            padding: 5px !important;
        }

        .slider-container {
            position: relative;
            overflow: hidden;
            width: 100%;            
            border-radius: 10px;
        }
        .slider-wrapper {
            display: flex;
            transition: transform 0.4s ease-in-out;
        }
        .slide {
            min-width: 100%;
            height: 100%;
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
        .slider-btn.prev { left: 10px; }
        .slider-btn.next { right: 10px; }

    </style>
</head>
<body>
    <header id="category-header">
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}" title="Go to Home">
            <img src="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/assets/images/logo.png" 
            width="75" 
            height="34" 
            alt="Repladeez Logo" />
        </a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=watches">Watches</a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=handbags/wallets">Handbags</a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=shoes">Shoes</a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=clothings">Clothes</a>
        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/gallery?category=sunglasses">Sunglasses</a>        
    </header>

    <main style="padding-top: 10px;">
        <div class="container">
            <div class="col-9">
                <div id="product-list">
                    @foreach($products as $product)
                    
                        @php                        
                            $images = $product->images->sortBy('serial_no');
                            if ($images->isEmpty()) continue;
                        @endphp

                        <div class="card">
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
                                                        ${{ number_format($product->product_price, 2) }}
                                                    </span>
                                                @endif                                               

                                                <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/{{ $product->product_url }}" 
                                                   title="View Product" 
                                                   target="_blank"
                                                   style="display: flex; align-items: center;">
                                                    View Page
                                                </a>
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
                                                <video muted autoplay loop playsinline controls style="width:100%; height:100%; object-fit: cover;">
                                                    <source src="{{ $filePath }}" type="video/{{ $ext }}">
                                                </video>
                                            @else
                                                <img src="{{ $filePath }}" alt="{{ $product->product_name }}" style="width:100%; height:100%; object-fit: cover;">
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
                </div>
                <div id="loader" style="text-align:center; display:none; margin:20px;">Loading...</div>
            </div>
        </div>
    </main>
    <input type="hidden" id="categoryName" value="{{ $categoryName }}"/>

    <script>
let offset = {{ count($products) }};
let loading = false;

function truncateText(text, maxLength) {
    return text.length > maxLength ? text.substring(0, maxLength) + '…' : text;
}

window.addEventListener('scroll', () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100 && !loading) {
        loadMoreProducts();
    }
});

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
        body: JSON.stringify({ offset, category: categoryName })
    })
    .then(response => response.json())
    .then(products => {
        const container = document.getElementById('product-list');

        products.forEach(product => {
            let images = product.images || [];
            if (images.length === 0) return;

            images.sort((a, b) => (a.serial_no || 0) - (b.serial_no || 0));

            let priceHTML = '';
            if (product.product_price && product.product_price > 0) {
                priceHTML = `<span style="color: #555;">$${Number(product.product_price).toFixed(2)}</span>`;
            }

            const card = document.createElement('div');
            card.className = 'card';

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
                                ? `<video muted autoplay loop playsinline controls style="width:100%; height:100%; object-fit: cover;">
                                    <source src="${url}" type="video/${ext}">
                                </video>`
                                : `<img src="${url}" alt="${product.product_name}" style="width:100%; height:100%; object-fit: cover;">`}
                        </div>`;
            }).join('');

            let sliderButtons = "";
            if (images.length > 1) {
                sliderButtons = `
                    <button class="slider-btn prev">&#10094;</button>
                    <button class="slider-btn next">&#10095;</button>
                `;
            }

            card.innerHTML = `
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
                                       target="_blank" 
                                       title="Share on WhatsApp"
                                       style="display: flex; align-items: center;">
                                        <img src="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/public/whatsapp.png" 
                                        alt="WhatsApp" 
                                        width="24" 
                                        height="24" />
                                    </a>

                                    <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/${product.product_url}" 
                                       style="font-weight: bold; color: inherit; text-decoration: none;">
                                        ${truncateText(product.product_name, 20)}
                                    </a>
                                    ${priceHTML}                                        

                                    <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/${product.product_url}" 
                                       title="View Product" 
                                       target="_blank"
                                       style="display: flex; align-items: center;">
                                        View Page
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="imgBx slider-container">
                    <div class="slider-wrapper">
                        ${slidesHTML}
                    </div>
                    ${sliderButtons}
                </div>
            `;
            container.appendChild(card);
        });

        offset += products.length;
        loading = false;
        document.getElementById('loader').style.display = 'none';

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
        const slides = container.querySelectorAll('.slide');
        let index = 0;
        let startX = 0;
        let endX = 0;

        const updateSlide = () => {
            wrapper.style.transform = `translateX(-${index * 100}%)`;

            slides.forEach((slide, i) => {
                const video = slide.querySelector('video');
                if (video) {
                    if (i === index) {
                        video.play().catch(() => {});
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
</body>
</html>
