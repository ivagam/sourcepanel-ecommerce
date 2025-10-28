<style>
.header-bottom.sticky-header {
  position: relative;
  top: -20px;
}
.megamenu.megamenu-fixed-width.megamenu-3cols {
  max-height: 400px;
  overflow-y: auto;
  overflow-x: hidden;
  padding-right: 8px;
}

.megamenu.megamenu-fixed-width.megamenu-3cols::-webkit-scrollbar {
  width: 6px;
}
.megamenu.megamenu-fixed-width.megamenu-3cols::-webkit-scrollbar-thumb {
  background-color: #ccc;
  border-radius: 3px;
}

@keyframes green-blink {
    0% { background-color: #1cec0aff; }
    50% { background-color: transparent; }
    100% { background-color: #1cec0aff; }
}

.blink-logo {
    animation: green-blink 1s infinite;
    border-radius: 50%;
    padding: 10px;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.live-results-box {
    position: absolute;
	top: 50px;
    z-index: 999;
    background: white;
    width: 100%;
	left: 0;
    right: auto;
    border: 1px solid #ccc;
    display: none;
    max-height: 300px;
    overflow-y: auto;
}
.live-results-box a {
    display: block;
    padding: 8px 12px;
    color: #333;
	text-align: left;
    text-decoration: none;
    cursor: pointer;
}
.live-results-box a:hover {
    background-color: #f0f0f0;
}
.logo {
    max-width: 150px;
}

#search-input {    
    font-size: 16px;
    color: #222;
    font-weight: 400;    
}

.header-bottom{
        background-color:#08c;
    }
     .header .menu li{
        background-color:#08c;
        padding-left: 10px;
        padding-right: 10px;      
    }    
    .header .menu li:hover{
        background-color: #fff;
        padding-left: 10px;
        padding-right: 10px;
        color:#08c !important;
    }
    .header .menu li a{
        color:#fff !important;
    }
     .header .menu li a:hover{
        color:#08c !important;
    }
    .megamenu-3cols{
    background-color:#08c !important;
    }
</style>
<header class="header">			

    <div class="header-middle sticky-header" data-sticky-options="{'mobile': false}">
        <div class="container" style="margin-bottom:7px">
            <div class="header-left col-lg-2 w-auto pl-0"> 
                <button class="mobile-menu-toggler mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>               
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" width="211" height="84" alt="Repladeez Logo">
                </a>
            </div><!-- End .header-left -->

            <div class="header-right w-lg-max">
                <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="{{ route('live.search') }}" method="GET" autocomplete="off">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="search" id="search-input" placeholder="Search..." autocomplete="off" value="{{ request()->query('search') }}" required>                            

                            <button class="btn icon-magnifier p-0" type="submit"></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div style="position: relative; display: flex; align-items: center; gap: 15px; flex-wrap: wrap; padding: 10px">
                    <a href="https://api.whatsapp.com/send?phone=8618202031361&text={{ urlencode(url()->current()) }}"
                        target="_blank" 
                        title="Share on WhatsApp"
                        style="display: flex; align-items: center;">
                        <img src="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/public/whatsapp.png" 
                            alt="WhatsApp" 
                            width="24" 
                            height="24" class="blink-logo"/>
                    </a>
                </div>

                <!--<div class="dropdown cart-dropdown">
                    <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="minicart-icon"></i>
                        <span class="cart-count badge-circle">{{ $globalCartCount }}</span>
                    </a>

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">Shopping Cart</div>

                            <div class="dropdown-cart-products">
                                @foreach($globalCart as $item)
                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                <a href="{{ route('product.show', $item['id'] ?? '#') }}">{{ $item['name'] ?? 'Product' }}</a>
                                            </h4>
                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{ $item['qty'] ?? 0 }}</span> × USD{{ number_format($item['price'])}}
                                            </span>
                                        </div>
                                        <figure class="product-image-container">
                                            <a href="{{ url('product/' . ($item['id'] ?? '')) }}" class="product-image">
                                                @php
                                                    $filePath = $item['file_path'] ?? '';
                                                    if (is_array($filePath)) {
                                                        $filePath = $filePath[0] ?? '';
                                                    }
                                                    $mediaUrl = env('SOURCE_PANEL_IMAGE_URL') . $filePath;
                                                    $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                                                @endphp

                                                @if(in_array($fileExtension, ['mp4', 'webm', 'ogg']))
                                                    <video width="80" height="80" autoplay muted loop style="object-fit: cover;">
                                                        <source src="{{ $mediaUrl }}" type="video/{{ $fileExtension }}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @elseif(!empty($filePath))
                                                    <img src="{{ $mediaUrl }}" alt="product" width="80" height="80" style="object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('images/no-image.png') }}" alt="No Image" width="80" height="80" style="object-fit: cover;">
                                                @endif
                                            </a>

                                            <a href="javascript:;" class="btn-remove remove-from-cart" data-id="{{ $item['id'] ?? '' }}" title="Remove Product">
                                                <span>×</span>
                                            </a>
                                        </figure>
                                    </div>
                                @endforeach
                            </div>

                            <div class="dropdown-cart-total">
                                <span>SUBTOTAL:</span>
                                <span class="cart-total-price float-right">USD{{ number_format($globalCartTotal) }}</span>
                            </div>

                            <div class="dropdown-cart-action">
                                <a href="{{ route('cart.index') }}" class="btn btn-gray btn-block view-cart">View Cart</a>
                                <a href="{{ route('checkout.index') }}" class="btn btn-dark btn-block">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>-->

            </div><!-- End .header-right -->

            <div class="user-logout ml-3">
                @if(session('logged_in'))
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-primary">Logout</button>
                </form>
                @endif
            </div><!-- End .user-logout -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header" data-sticky-options="{'mobile': true}">
        <div class="container">
            <nav class="main-nav w-100">
                @php
                    function renderCategoryTree($categories)
                    {
                        foreach ($categories as $category) {
                            echo '<li>';
                            echo '<a href="' . url()->current() . '?category=' . $category->category_id . '">' . e($category->category_name) . '</a>';

                            if ($category->children->isNotEmpty()) {
                                echo '<ul class="submenu">';
                                renderCategoryTree($category->children);
                                echo '</ul>';
                            }
                            echo '</li>';
                        }
                    }
                @endphp

                <ul class="menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>
                        <a>Brands</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols" >
                            <div class="row">
                                <div class="col-lg-3">                                    
                                    <ul class="submenu">
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Acne+Studios">Acne Studios</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Addidas">Addidas</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Alexander+Wang">Alexander Wang</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Alenander+Mcqueen">Alenander Mcqueen</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Alaia+Paris">Alaia Paris</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Ami+Paris">Ami Paris</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Amina+Muaddi">Amina Muaddi</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Amiri">Amiri</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Arcteryx">Arcteryx</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Armani">Armani</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Bally">Bally</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Balenciaga">Balenciaga</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Balmain">Balmain</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Berluti">Berluti</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Brunello+cucinelli">Brunello cucinelli</a></li>
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Bottega+Veneta">Bottega Veneta</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Burberry">Burberry</a></li>
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Cartier">Cartier</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">                                    
                                    <ul class="submenu">
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Casablanca">Casablanca</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Chanel">Chanel</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Chloe">Chloe</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Coach">Coach</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dolce+%26+Gabbana">DG (Dolce & Gabbana)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dita">Dita</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dsquared2">Dsquared2</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dsquare">Dsquare</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dior">Dior (Christian Dior)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Emporio+Armani">Emporio Armani</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Ferragamo">Ferragamo</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Fendi">Fendi</a></li>										
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Givenchy">Givenchy</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Golden+Goose">Golden Goose</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Gucci">Gucci (GG)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Hermes">Hermes</a></li>
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Jimmy+Choo">Jimmy Choo</a></li>
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Kaws">Kaws</a></li>
                                    </ul>
                                </div>
                                 <div class="col-lg-3">                                    
                                    <ul class="submenu">
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Kenzo">Kenzo</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Kiton">Kiton</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Lanvin">Lanvin</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Loewe">Loewe</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Loro+Piana">Loro Piana</a></li>
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Lv">LV</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Maison+Margiela">Maison Margiela</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Marc+Jacobs">Marc Jacobs</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=MontBlanc">MontBlanc</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Moncler">Moncler</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Nike">Nike</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Off+White">Off White</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Palm+Angels">Palm Angels</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Philipp+Plein">Philipp Plein</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Polene">Polene</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Prada">Prada</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Ralph+Lauren">Ralph Lauren</a></li>
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Rimova">Rimova</a></li>
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Stone+island">Stone island</a></li>										
                                    </ul>
                                </div>
                                <div class="col-lg-3">                                    
                                    <ul class="submenu">
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Supreme">Supreme</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=The+North+Face">The North Face</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=The+Row">The Row</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Thom+Browne">Thom Browne</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Timberland">Timberland</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tod's">Tod's</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tom+Ford">Tom Ford</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tommy">Tommy</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tory+Burch">Tory Burch</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=UGG">UGG</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Valentino">Valentino</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Van+Cleef+%26+Arpels">Van Cleef & Arpels</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Vetements">Vetements</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Versace">Versace</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Y-3">Y-3</a></li>
                                        <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Saint+Laurent">YSL (Saint Laurent)</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Yeezy">Yeezy</a></li>
										<li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Zimmermann">Zimmermann</a></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <!-- End .megamenu -->
                    </li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=1">Watches</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Handbags">Handbags</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Clothings">Clothings</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Shoes">Shoes</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Belts">Belts</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Jewelery">Jewelery</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Glassware">Glassware</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Sunglasses">Sunglass</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=113">Others</a></li>
                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    @php renderCategoryTree($categories); @endphp
                </ul>
            </nav>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->

<div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
               <ul class="mobile-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>                        
                        <a href="">Brands</a>
                        <ul class="submenu">
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Acne+Studios">Acne Studios</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Addidas">Addidas</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Alexander+Wang">Alexander Wang</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Alenander+Mcqueen">Alenander Mcqueen</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Alaia+Paris">Alaia Paris</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Ami+Paris">Ami Paris</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Amina+Muaddi">Amina Muaddi</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Amiri">Amiri</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Arcteryx">Arcteryx</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Armani">Armani</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Bally">Bally</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Balenciaga">Balenciaga</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Balmain">Balmain</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Berluti">Berluti</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Brunello+cucinelli">Brunello cucinelli</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Bottega+Veneta">Bottega Veneta</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Burberry">Burberry</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Cartier">Cartier</a></li>                                 
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Casablanca">Casablanca</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Chanel">Chanel</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Chloe">Chloe</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Coach">Coach</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dolce+%26+Gabbana">DG (Dolce & Gabbana)</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dita">Dita</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dsquared2">Dsquared2</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dsquare">Dsquare</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Dior">Dior (Christian Dior)</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Emporio+Armani">Emporio Armani</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Ferragamo">Ferragamo</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Fendi">Fendi</a></li>										
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Givenchy">Givenchy</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Golden+Goose">Golden Goose</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Gucci">Gucci (GG)</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Hermes">Hermes</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Jimmy+Choo">Jimmy Choo</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Kaws">Kaws</a></li>                                  
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Kenzo">Kenzo</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Kiton">Kiton</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Lanvin">Lanvin</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Loewe">Loewe</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Loro+Piana">Loro Piana</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Lv">LV</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Maison+Margiela">Maison Margiela</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Marc+Jacobs">Marc Jacobs</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=MontBlanc">MontBlanc</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Moncler">Moncler</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Nike">Nike</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Off+White">Off White</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Palm+Angels">Palm Angels</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Philipp+Plein">Philipp Plein</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Polene">Polene</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Prada">Prada</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Ralph+Lauren">Ralph Lauren</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Rimova">Rimova</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Stone+island">Stone island</a></li>										                                  
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Supreme">Supreme</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=The+North+Face">The North Face</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=The+Row">The Row</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Thom+Browne">Thom Browne</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Timberland">Timberland</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tod's">Tod's</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tom+Ford">Tom Ford</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tommy">Tommy</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Tory+Burch">Tory Burch</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=UGG">UGG</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Valentino">Valentino</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Van+Cleef+%26+Arpels">Van Cleef & Arpels</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Vetements">Vetements</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Versace">Versace</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Y-3">Y-3</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Saint+Laurent">YSL (Saint Laurent)</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Yeezy">Yeezy</a></li>
                            <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}/live-search?search=Zimmermann">Zimmermann</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=1">Watches</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Handbags">Handbags</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Clothings">Clothings</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Shoes">Shoes</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Belts">Belts</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Jewelery">Jewelery</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Glassware">Glassware</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Sunglasses">Sunglass</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=113">Others</a></li>
                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    @php renderCategoryTree($categories); @endphp
                </ul>                
            </nav>
            <!-- End .mobile-nav -->            
        </div>
        <!-- End .mobile-menu-wrapper -->
    </div>
    

</header>


		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<script>
    $(document).ready(function () {
        $(document).on('click', '.remove-from-cart', function (e) {
            e.preventDefault();

            let productId = $(this).data('id');

            $.ajax({
                url: "{{ route('remove.from.cart') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    alert(response.success);
                    location.reload(); // Refresh to update cart UI
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert("Failed to remove product from cart.");
                }
            });
        });
    });

	
</script>