<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Repladeez - China factory direct supply for Watches HandBags Shoes Clothes Sunglasses Jewellery</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Repladeez - eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">

    <style>
        #category-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #ffffffff;
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
            padding: 10px;
            float:left;
            cursor: pointer;
            color: #035b34ff;
        }
      
    </style>
</head>
<body>

    <header id="category-header">
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
                            $media = optional($product->images->sortBy('serial_no')->first());
                            $file1 = $media && $media->file_path ? $media->file_path : null;
                            if (empty($file1)) continue;
                            $filePath = env('SOURCE_PANEL_IMAGE_URL') . $file1;
                            $ext = strtolower(pathinfo($file1, PATHINFO_EXTENSION));
                            $isVideo = in_array($ext, ['mp4', 'webm', 'mov', 'avi']);
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

                                        <div style="position: relative; padding-right: 140px; display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                                            <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap; flex: 1;">
                                                <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/{{ $product->product_url }}" 
                                                   style="font-weight: bold; color: inherit; text-decoration: none;">
                                                    {{ \Illuminate\Support\Str::limit($product->product_name, 20) }}
                                                </a>

                                                @if(!$product->product_price || $product->product_price == 0)
                                                    <a href="https://wa.me/8618202031361?text={{ urlencode('Check out this product: ' . env('SOURCE_PANEL_ECOMMERCE_URL') . '/product/' . $product->product_url) }}" 
                                                    target="_blank" 
                                                    title="Share on WhatsApp"
                                                    style="color: #555; text-decoration: none;">
                                                        $0.00
                                                    </a>
                                                @else
                                                    <span style="color: #555;">
                                                        ${{ number_format($product->product_price, 2) }}
                                                    </span>
                                                @endif


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
                                                   title="View Product" 
                                                   target="_blank"
                                                   style="display: flex; align-items: center;">
                                                    View Page
                                                </a>
                                            </div>

                                            <div style="position: absolute; right: 0; top: 50%; transform: translateY(-50%);">
                                                <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}" title="Go to Home">
                                                    <img src="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/assets/images/logo.png" 
                                                         width="111" 
                                                         height="34" 
                                                         alt="Repladeez Logo" />
                                                </a>
                                            </div>
                                        </div>                            
                                    </div>
                                </div>
                                <div>
                                    <span class="dot"><i class="fas fa-ellipsis-h"></i></span>
                                </div>
                            </div>

                            <div class="imgBx">
                                @if($isVideo)
                                    <video class="cover" muted autoplay loop playsinline controls style="width: 100%; height: 100%; object-fit: cover;">
                                        <source src="{{ $filePath }}" type="video/{{ $ext }}">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{ $filePath }}" alt="{{ $product->product_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                            </div>                        
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
    let currentCategory = '';

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
        var categoryName = document.getElementById('categoryName').value;
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
                let file = product.images?.[0]?.file_path;
                if (!file) return;

                let ext = file.split('.').pop().toLowerCase();
                let url = '{{ env("SOURCE_PANEL_IMAGE_URL") }}' + file;
                let isVideo = ['mp4', 'mov', 'webm', 'avi'].includes(ext);

                let priceHTML = '';
                if (!product.product_price || product.product_price == 0) {
                    priceHTML = `<a href="https://wa.me/8618202031361?text=${encodeURIComponent('Check out this product: {{ env("SOURCE_PANEL_ECOMMERCE_URL") }}/product/' + product.product_url)}" 
                                    target="_blank" 
                                    title="Share on WhatsApp"
                                    style="color: #555; text-decoration: none;">
                                    $0.00
                                 </a>`;
                } else {
                    priceHTML = `<span style="color: #555;">$${Number(product.product_price).toFixed(2)}</span>`;
                }

                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <div class="top">
                        <div class="userDetails">
                            <div class="bottom">
                                <div class="actionBtns">
                                    <div class="left"><span class="heart"></span></div>
                                    <div class="right"></div>
                                </div>

                                <div style="position: relative; padding-right: 140px; display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                                    <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap; flex: 1;">
                                        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/${product.product_url}" 
                                           style="font-weight: bold; color: inherit; text-decoration: none;">
                                            ${truncateText(product.product_name, 20)}
                                        </a>
                                        ${priceHTML}

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
                                           title="View Product" 
                                           target="_blank"
                                           style="display: flex; align-items: center;">
                                            View Page
                                        </a>
                                    </div>

                                    <!-- Absolute logo on the right -->
                                    <div style="position: absolute; right: 0; top: 50%; transform: translateY(-50%);">
                                        <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}" title="Go to Home">
                                            <img src="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/assets/images/logo.png" 
                                                 width="111" 
                                                 height="34" 
                                                 alt="Repladeez Logo" />
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="imgBx">
                        ${isVideo ? `<video class="cover" muted autoplay loop playsinline controls style="width:100%; height:100%; object-fit: cover;">
                                        <source src="${url}" type="video/${ext}">
                                     </video>` 
                                  : `<img src="${url}" style="width:100%; height:100%; object-fit: cover;">`}
                    </div>
                `;

                container.appendChild(card);
            });

            offset += products.length;
            loading = false;
            document.getElementById('loader').style.display = 'none';
        })
        .catch(err => {
            console.error(err);
            loading = false;
            document.getElementById('loader').style.display = 'none';
        });
    }
</script>

</body>
</html>
