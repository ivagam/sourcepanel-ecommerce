<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React Porto Documentation</title>
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">
    <link rel="stylesheet"
        href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800%7CPoppins:300,400,500,600,700,800"
        media="all">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="docs/vendor/porto-new-font.css">
    <link rel="stylesheet" href="docs/doc.css">
</head>

<body class="loaded">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <div id="root">
        <div class="porto">
            <div class="page-wrapper">
                <h1 class="d-none">Porto Ecommerce HTML - Documentation</h1>
                <header class="header" style="background-image: url('./docs/images/header_bg.jpg');">
                    <div class="header-top">
                        <div class="container">
                            <div class="header-left">
                                <a class="logo" href="index.html">
                                    <img src="docs/images/logo.png" alt="Porto Logo">
                                </a>
                            </div>
                            <div class="header-right">
                                <button class="mobile-menu-toggler" type="button">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <nav class="main-nav">
                                    <ul class="main">
                                        <li><a href="{{ route('home') }}">HOME</a></li>
                                        <li><a href="#">SUPPORT</a></li>
                                        <li><a href="#">CHANGELOG</a></li>
                                        <li><a href="#">PURCHASE PORTO!</a></li>
                                    </ul>
                                </nav>
                                <div class="social-icons">
                                    <a class="social-icon" target="_blank" href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="social-icon" target="_blank" href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-middle">
                        <div class="container">
                            <div class="title-box">
                                <h2 class="header-title">PORTO DOCS</h2>
                                <h3 class="header-subtitle"
                                    style="background: url('./docs/images/header_docs_bitmap.png') 3px 9px no-repeat;">
                                    <span style="background-image: url('./docs/images/header_docs_bottom.png');">HOW
                                        CAN WE HELP YOU?</span>
                                </h3>
                            </div>
                            <div class="header-search">
                                <form>
                                    <div class="header-search-wrapper">
                                        <input type="search" class="form-control" name="q" placeholder="Search..."
                                            autoComplete="off" id="search-text">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <h5 class="header-description"><strong>Popular Topics</strong>: How to install and run porto
                                template</h5>
                        </div>
                    </div>
                </header>
                <main class="main">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="sidebar-wrapper sticky-sidebar" style="position: sticky; top: 20px;">
                                    <ul class="sidebar-menu">
                                        <li class="with-sf-arrow">
                                            <a href="#general" data-toggle="collapse">General</a>
                                            <ul class="sub-menu collapse show" style="overflow: hidden;" id="general">
                                                <li>
                                                    <a index="0" sub-index="0" href="#" class="active">Getting
                                                        Started</a>
                                                </li>
                                                <li>
                                                    <a index="0" sub-index="1" href="#" class="">Features</a>
                                                </li>
                                                <li>
                                                    <a index="0" sub-index="2" href="#" class="">Files Structure</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="with-sf-arrow"><a href="#style"
                                                data-toggle="collapse">Stylesheets</a>
                                            <ul class="sub-menu collapse" style="overflow: hidden;" id="style">
                                                <li>
                                                    <a index="1" sub-index="0" href="#">Helpers</a>
                                                </li>
                                                <li>
                                                    <a index="1" sub-index="1" href="#">Mixins</a>
                                                </li>
                                                <li>
                                                    <a index="1" sub-index="2" href="#">Configuration</a>
                                                </li>
                                                <li>
                                                    <a index="1" sub-index="3" href="#">Theme Variables</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="with-sf-arrow"><a href="#js" data-toggle="collapse">Javascripts</a>
                                            <ul class="sub-menu collapse" style="overflow: hidden;" id="js">
                                                <li><a index="2" sub-index="0" href="#">Overview</a></li>
                                            </ul>
                                        </li>
                                        <li class="with-sf-arrow"><a href="#components"
                                                data-toggle="collapse">Components</a>
                                            <ul class="sub-menu collapse" style="overflow: hidden;" id="components">
                                                <li>
                                                    <a index="3" sub-index="0" href="#">Alerts</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="1" href="#">Breadcrumb</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="2" href="#">Button</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="3" href="#">Card</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="4" href="#">Countdown</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="5" href="#">Counters</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="6" href="#">Feature Box</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="7" href="#">Info Box</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="8" href="#">Member</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="9" href="#">Page Header</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="10" href="#">Pagination</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="11" href="#">Popup</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="12" href="#">Product</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="13" href="#">Product
                                                        Category</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="14" href="#">Slider</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="15" href="#">Social Icons</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="16" href="#">Sticky Header</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="17" href="#">Store</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="18" href="#">Tabs</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="19" href="#">Testimonial</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="20" href="#">Word Rotate</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-menu pl-0">
                                            <a index="4" sub-index="0" href="#">Thank you</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 content-wrapper">
                                <div class="document-content">
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="footer">
                    <div class="footer-top">
                        <div class="container">
                            <div class="purchase-desc">
                                <h2>Porto is an <strong>amazing</strong> eCommerce website!</h2>
                                <h4>Haven't you Porto Yet? Purchase Now!</h4>
                            </div><a class="btn btn-primary" href="#">PURCHASE PORTO</a>
                        </div>
                    </div>
                    <div class="footer-middle">
                        <div class="container"><a class="footer-logo" href="logo.html"><img src="docs/images/logo.png"
                                    alt="Porto Logo"></a><span class="footer-copyright">©
                                Copyright 2021. All Rights Reserved.</span></div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="docs/doc-data.js"></script>
    <script src="docs/doc.js"></script>
</body>

</html>