<!-- Meta Tag -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
@yield('meta')
<!-- Title Tag  -->
<title>@yield('title')</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png">
<!-- Web Font -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
<!-- Fancybox -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<!-- Themify Icons -->
<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
<!-- Slicknav -->
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
<!-- Jquery Ui -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">

<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
<!-- Sanaulla Sale Modern Theme -->
<link rel="stylesheet" href="{{asset('frontend/css/sanaulla-theme.css')}}">
<style>
    /* Multilevel dropdown */
    .dropdown-submenu {
    position: relative;
    }

    .dropdown-submenu>a:after {
    content: "\f0da";
    float: right;
    border: none;
    font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: 0px;
    margin-left: 0px;
    }

    /* Black & White Global Theme Overrides */
    .nice-select,
    .nice-select .current {
        color: #111111 !important;
        font-weight: 600 !important;
    }

    /* High Z-Index for Dropdowns over product badges */
    .shop-top {
        position: relative !important;
        z-index: 1000 !important;
        padding: 8px 15px !important;
    }
    .nice-select {
        position: relative !important;
        z-index: 1001 !important;
    }
    .nice-select.open {
        z-index: 99999 !important;
    }
    .nice-select .list {
        background-color: #ffffff !important;
        border: 1px solid #dcdcdc !important;
        border-radius: 4px !important;
        box-shadow: 0 6px 16px rgba(0,0,0,0.18) !important;
        z-index: 999999 !important;
    }
    .single-product .product-img a span.price-dec,
    .single-product .product-img span {
        z-index: 2 !important;
    }

    .nice-select .option,
    .nice-select .list li,
    .nice-select .list li.option {
        color: #111111 !important;
        background-color: #ffffff !important;
        font-weight: 400 !important;
        opacity: 1 !important;
    }

    .nice-select .option.selected,
    .nice-select .list li.selected,
    .nice-select .list li.option.selected {
        color: #000000 !important;
        background-color: #f0f0f0 !important;
        font-weight: 700 !important;
    }

    .nice-select .option:hover,
    .nice-select .option.focus,
    .nice-select .option.selected:hover,
    .nice-select .list li:hover,
    .nice-select .list li.focus,
    .nice-select .list li.selected:hover {
        background-color: #000000 !important;
        color: #ffffff !important;
    }

    .nice-select:focus,
    .nice-select.open,
    .nice-select:active {
        border-color: #000000 !important;
    }

    .nice-select::after {
        border-color: #111111 !important;
    }

    /* Product Bullet Point Dots & Rating Stars Override */
    .single-des ul li::before,
    .single-des ul li:before,
    .product-info ul li::before,
    .product-info ul li:before,
    .shop.single .single-des ul li::before {
        background-color: #000000 !important;
    }

    .shop.single .ratting-main .single-rating ul li i,
    .ratting-main .single-rating ul li i,
    .ratings ul.rating li i,
    ul.rating li i,
    .rating li i {
        color: #111111 !important;
    }

    /* Header Alignment & Logo Rules */
    .navbar-header-row {
        padding: 12px 20px !important;
        min-height: 58px;
    }
    .header-logo-img {
        max-height: 42px;
        width: auto;
        object-fit: contain;
        display: block;
    }
    .hamburger-menu-btn, .action-icon-link, .action-icon-btn {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        line-height: 1 !important;
        vertical-align: middle !important;
    }
    #Gslider .carousel-indicators {
        bottom: 12px !important;
        margin-bottom: 0 !important;
        z-index: 10 !important;
    }
    #Gslider .carousel-indicators li {
        width: 22px !important;
        height: 3px !important;
        border-radius: 2px !important;
        background-color: rgba(255, 255, 255, 0.6) !important;
        border: none !important;
        margin: 0 4px !important;
    }
    #Gslider .carousel-indicators li.active {
        background-color: #ffffff !important;
        width: 30px !important;
    }
    .section-title h2::before,
    .section-title h2::after {
        background: #000000 !important;
    }
    .filter-tope-group button.btn {
        margin: 4px 6px !important;
    }

    /* ==========================================
       Comprehensive Mobile Responsiveness
    ========================================== */
    @media (max-width: 767.98px) {
        /* General Page & Section Spacing */
        .section {
            padding: 25px 0 !important;
        }
        .container-fluid.px-4 {
            padding-left: 12px !important;
            padding-right: 12px !important;
        }

        /* Header Navigation Mobile Fixes */
        .top-announcement-bar {
            font-size: 11px !important;
            padding: 5px 0 !important;
        }
        .navbar-header-row {
            padding: 8px 10px !important;
            min-height: 50px !important;
        }
        .header-logo-img {
            max-height: 32px !important;
        }
        .hamburger-menu-btn {
            font-size: 22px !important;
            padding: 4px 6px !important;
        }
        .action-icon-link, .action-icon-btn {
            font-size: 20px !important;
            padding: 4px !important;
        }
        .icon-item.mr-3 {
            margin-right: 8px !important;
        }

        /* Home Banner Slider Fix */
        #Gslider {
            background: #ffffff !important;
            position: relative !important;
        }
        #Gslider .carousel-inner,
        #Gslider .carousel-item {
            background: #ffffff !important;
            height: auto !important;
            min-height: 0 !important;
        }
        #Gslider .carousel-item img {
            width: 100% !important;
            height: auto !important;
            max-height: 420px !important;
            object-fit: cover !important;
        }
        #Gslider .carousel-indicators {
            bottom: 8px !important;
            margin-bottom: 0 !important;
            z-index: 10 !important;
        }
        #Gslider .carousel-indicators li {
            width: 18px !important;
            height: 3px !important;
            border-radius: 2px !important;
            background-color: rgba(255, 255, 255, 0.6) !important;
            border: none !important;
            margin: 0 3px !important;
        }
        #Gslider .carousel-indicators li.active {
            background-color: #ffffff !important;
            width: 24px !important;
        }

        /* Shop Filter Bar Mobile Layout */
        .shop-top {
            padding: 10px 12px !important;
        }
        .shop-top .d-flex.justify-content-between {
            flex-direction: column !important;
            align-items: stretch !important;
            gap: 8px !important;
        }
        .shop-top .d-flex.flex-wrap {
            width: 100% !important;
            justify-content: space-between !important;
        }
        .shop-top .d-flex.align-items-center {
            margin-right: 0 !important;
            flex: 1 1 calc(50% - 6px) !important;
            min-width: 130px !important;
        }
        .shop-top select.form-control-sm {
            width: 100% !important;
            min-width: 0 !important;
            font-size: 12px !important;
            height: 34px !important;
        }
        .shop-top label {
            font-size: 11px !important;
            margin-right: 4px !important;
        }

        /* Product Cards 2-Column Mobile Grid */
        .single-product {
            margin-bottom: 20px !important;
        }
        .single-product .product-content h3 {
            font-size: 13px !important;
            line-height: 1.3 !important;
        }
        .single-product .product-content span {
            font-size: 13px !important;
        }

        /* Contact Page Mobile Fixes */
        .contact-us .form-main {
            padding: 20px 15px !important;
        }
        .contact-us .single-head {
            padding: 20px 15px !important;
            margin-top: 25px !important;
        }
        .contact-us .title h3 {
            font-size: 20px !important;
        }
        .contact-us .form .form-group input,
        .contact-us .form .form-group textarea {
            font-size: 14px !important;
        }

        /* About Us Mobile Fixes */
        .about-us .about-content h3 {
            font-size: 22px !important;
        }
        .about-us .about-img {
            margin-top: 25px !important;
        }

        /* Shopping Cart & Modal Mobile Adjustments */
        .shopping-item {
            width: 300px !important;
            right: -10px !important;
        }
    }
</style>
@stack('styles')
