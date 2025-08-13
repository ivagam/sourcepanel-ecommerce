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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">
   
</head>
<body>
    <main>
        <div class="container">
            <div class="col-9">
                <div id="product-list">
                     @foreach($products as $product)
                    @php
                        $media = optional($product->images->sortBy('serial_no')->first());
                        $file1 = $media && $media->file_path ? $media->file_path : null;

                        // Skip this product if file_path is null or empty
                        if (empty($file1)) {
                            continue;
                        }

                        $filePath = env('SOURCE_PANEL_IMAGE_URL') . $file1;
                        $ext = strtolower(pathinfo($file1, PATHINFO_EXTENSION));
                        $isVideo = in_array($ext, ['mp4', 'webm', 'mov', 'avi']);
                    @endphp

                    <div class="card">
                        <div class="top">
                            <div class="userDetails">
                                <div class="profilepic">
                                    <div class="profile_img">
                                        <div class="image">
                                            <img src="{{ $filePath }}" alt="Product Image">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bottom">
                            <div class="actionBtns">
                                <div class="left">
                                    <span class="heart">
                                        <!-- Like icon SVG -->
                                    </span>
                                    <!-- Comment icon SVG -->
                                    <!-- Share icon SVG -->
                                </div>
                                <div class="right">
                                    <!-- Save icon SVG -->
                                </div>
                            </div>

                            <div style="position: relative; padding-right: 140px; display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                                <!-- Left + WhatsApp + Eye all inside this flex container -->
                                <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap; flex: 1;">
                                    <!-- Product Name -->
                                    <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/{{ $product->product_url }}" 
                                        style="font-weight: bold; color: inherit; text-decoration: none;">
                                        {{ \Illuminate\Support\Str::limit($product->product_name, 20) }}
                                    </a>

                                    <!-- Category and Price -->
                                    <span style="color: #555;">
                                        {{ $product->category->category_name ?? '' }} ${{ $product->product_price ?? '0.00' }}
                                    </span>

                                    <!-- WhatsApp Icon -->
                                    <a href="https://wa.me/8618202031361?text={{ urlencode('Check out this product: ' . env('SOURCE_PANEL_ECOMMERCE_URL') . '/product/' . $product->product_url) }}" 
                                        target="_blank" 
                                        title="Share on WhatsApp"
                                        style="display: flex; align-items: center;">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" 
                                            alt="WhatsApp" 
                                            width="24" 
                                            height="24" />
                                    </a>

                                    <!-- Eye Icon (View Product) -->
                                    <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/{{ $product->product_url }}" 
                                        title="View Product" 
                                        target="_blank"
                                        style="display: flex; align-items: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" 
                                            height="24" 
                                            width="24" 
                                            fill="#262626" 
                                            viewBox="0 0 24 24">
                                            <path d="M12 5c-7 0-11 7-11 7s4 7 11 7 11-7 11-7-4-7-11-7zm0 12c-2.8 0-5-2.2-5-5s2.2-5 
                                                    5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 
                                                    3 3 3 3-1.3 3-3-1.3-3-3-3z"/>
                                        </svg>
                                    </a>
                                </div>

                                <!-- Logo fixed at the extreme right corner -->
                                <div style="position: absolute; right: 0; top: 50%; transform: translateY(-50%);">
                                    <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}" title="Go to Home">
                                        <img src="http://localhost:8080/sourcepanel-ecommerce/assets/images/logo.png" 
                                            width="111" 
                                            height="34" 
                                            alt="Repladeez Logo" />
                                    </a>
                                </div>
                            </div>                            
                            
                        </div>
                            </div>
                            <div>
                                <span class="dot">
                                    <i class="fas fa-ellipsis-h"></i>
                                </span>
                            </div>
                        </div>

                        <div class="imgBx">
                            @if($isVideo)
                                <video class="cover" muted autoplay loop playsinline controls
                                       style="width: 100%; height: 100%; object-fit: cover;">
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

    <script>
        let offset = {{ count($products) }};
        let loading = false;

        window.addEventListener('scroll', () => {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100 && !loading) {
                loadMoreProducts();
            }
        });

        function loadMoreProducts() {
            loading = true;
            document.getElementById('loader').style.display = 'block';

            fetch('{{ env("SOURCE_PANEL_ECOMMERCE_URL") }}/load-more-products', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ offset })
            })
            .then(response => response.json())
            .then(products => {
                const container = document.getElementById('product-list');

                products.forEach(product => {
                    const card = document.createElement('div');
                    card.className = 'card';

                    let file = product.images?.[0]?.file_path;

                    if (!file) {
                        return;
                    }
                    let ext = file.split('.').pop().toLowerCase();
                    let url = '{{ env('SOURCE_PANEL_IMAGE_URL') }}' + file;
                    let isVideo = ['mp4','mov','webm','avi'].includes(ext);

                    let mediaHtml = isVideo
                        ? `<video class="cover" muted autoplay loop playsinline controls
                                style="width: 100%; height: 100%; object-fit: cover;">
                                <source src="${url}" type="video/${ext}">
                                Your browser does not support the video tag.
                        </video>`
                        : `<img src="${url}" alt="${product.product_name}" class="cover">`;

                    card.innerHTML = `
                        <div class="top">
                            <div class="userDetails">
                                <div class="profilepic">
                                    <div class="profile_img">
                                        <div class="image">
                                            <img src="${url}" alt="Product Image">
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/${product.product_url}"><h3>${product.product_name}<br></h3></a>
                            </div>
                            <div>
                                <span class="dot">
                                    <i class="fas fa-ellipsis-h"></i>
                                </span>
                            </div>
                        </div>

                        <div class="imgBx">
                            ${mediaHtml}
                        </div>

                        <div class="bottom">
                            <div class="actionBtns">
                                        <div class="left" style="display: flex; align-items: center; gap: 10px;">
                                            <!-- WhatsApp Share -->
                                            <a href="https://wa.me/8618202031361?text={{ urlencode('Check out this product: ' . env('SOURCE_PANEL_URL') . '/product/' . $product->product_url) }}" 
                                            target="_blank" 
                                            title="Share on WhatsApp">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" 
                                                    alt="WhatsApp" 
                                                    width="24" 
                                                    height="24">
                                            </a>

                                            <!-- View Product -->
                                            <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/${product.product_url}"
                                            title="View Product" 
                                            target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" 
                                                    height="24" 
                                                    width="24" 
                                                    fill="#262626" 
                                                    viewBox="0 0 24 24">
                                                    <path d="M12 5c-7 0-11 7-11 7s4 7 11 7 11-7 11-7-4-7-11-7zm0 12c-2.8 0-5-2.2-5-5s2.2-5 
                                                            5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 
                                                            3 3 3 3-1.3 3-3-1.3-3-3-3z"/>
                                                </svg>
                                            </a>
                                        </div>
                                </div>
                            
                                <p class="message">
                                    <a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/product/${product.product_url}"><h3>${product.product_name}<br></h3></a>
                                    <p>${product.category?.category_name || 'Unknown Category'}</p>
                                    <p>$${product.product_price || '0.00'}</p>
                                    ${product.description?.substring(0, 200) || ''}
                                </p>                    

                        </div>
                    `;

                    container.appendChild(card);
                });

                offset += products.length;
                loading = false;
                document.getElementById('loader').style.display = 'none';
            })
            .catch(() => {
                loading = false;
                document.getElementById('loader').style.display = 'none';
            });
        }

    </script>
</body>
</html>