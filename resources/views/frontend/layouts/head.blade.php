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

    /* Preloader Minimalist Black Spinner Redesign */
    .preloader {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        z-index: 999999999 !important;
        width: 100% !important;
        height: 100% !important;
        background-color: #ffffff !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    .preloader-inner {
        position: relative !important;
        top: auto !important;
        left: auto !important;
        transform: none !important;
    }
    .preloader-icon {
        width: 46px !important;
        height: 46px !important;
        border: 3px solid #e2e8f0 !important;
        border-top: 3px solid #000000 !important;
        border-radius: 50% !important;
        animation: luxury-spin 0.75s linear infinite !important;
    }
    .preloader-icon span {
        display: none !important;
    }
    @keyframes luxury-spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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
        padding: 10px 24px !important;
        min-height: 72px;
    }
    .header-logo-img {
        max-height: 65px;
        height: auto;
        width: auto;
        object-fit: contain;
        display: block;
        transition: transform 0.2s ease;
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
    
    /* Universal Owl Carousel Controls Override */
    .owl-nav div,
    .owl-nav button,
    .owl-prev,
    .owl-next,
    .owl-carousel .owl-nav div,
    .owl-carousel .owl-nav button {
        background: #ffffff !important;
        color: #111111 !important;
        border: 1px solid #e2e8f0 !important;
    }
    .owl-nav div:hover,
    .owl-nav button:hover,
    .owl-prev:hover,
    .owl-next:hover,
    .owl-nav div:focus,
    .owl-nav button:focus,
    .owl-nav div:active,
    .owl-nav button:active,
    .owl-carousel .owl-nav div:hover,
    .owl-carousel .owl-nav button:hover,
    .owl-carousel .owl-nav div:focus,
    .owl-carousel .owl-nav button:focus,
    .owl-theme .owl-nav [class*='owl-']:hover,
    .most-popular .owl-carousel .owl-nav div:hover,
    .most-popular .owl-carousel .owl-nav div:focus,
    .most-popular .owl-carousel .owl-nav div:active {
        background: #000000 !important;
        color: #ffffff !important;
        border-color: #000000 !important;
    }
    .section-title h2::before,
    .section-title h2::after,
    .shop-section-title h1::before,
    .shop-section-title h1::after {
        background: #000000 !important;
    }
    .filter-tope-group button.btn {
        margin: 4px 6px !important;
    }

    /* Fashion Product Card Modern E-Commerce Style */
    .fashion-card {
        background: #ffffff;
        border: none !important;
        position: relative;
    }
    .fashion-card .product-img {
        position: relative;
        overflow: hidden;
        background: #f7f7f7;
        border-radius: 2px;
    }
    .fashion-card .product-img img {
        width: 100%;
        aspect-ratio: 3 / 4;
        object-fit: cover;
        display: block;
    }
    .fashion-card .discount-badge {
        position: absolute;
        top: 8px;
        left: 8px;
        background: #c8102e;
        color: #ffffff;
        font-size: 11px;
        font-weight: 700;
        padding: 3px 7px;
        border-radius: 2px;
        z-index: 5;
        letter-spacing: 0.5px;
    }
    .fashion-card .card-wishlist-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        background: transparent;
        color: #111111;
        font-size: 18px;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 5;
        text-shadow: 0 1px 3px rgba(255,255,255,0.8);
        transition: transform 0.2s ease;
    }
    .fashion-card .card-wishlist-btn:hover {
        transform: scale(1.15);
        color: #c8102e;
    }
    .fashion-card .card-quick-bag-btn {
        position: absolute;
        bottom: 8px;
        right: 8px;
        background: #ffffff;
        color: #111111;
        font-size: 15px;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.18);
        z-index: 5;
        transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
    }
    .fashion-card .card-quick-bag-btn:hover {
        background: #000000;
        color: #ffffff;
        transform: scale(1.08);
    }
    .fashion-card .product-title-text {
        font-size: 12px !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.3px !important;
        line-height: 1.3 !important;
        margin-bottom: 4px !important;
        color: #111111 !important;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .fashion-card .product-title-text a {
        color: #111111 !important;
        text-decoration: none !important;
    }
    .fashion-card .current-price {
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #111111 !important;
    }
    .fashion-card .old-price {
        font-size: 12px !important;
        color: #888888 !important;
        text-decoration: line-through !important;
    }

    /* Isotope 2-Column Mobile Grid Fix */
    .isotope-grid {
        width: 100% !important;
    }
    @media (max-width: 767.98px) {
        .isotope-grid {
            height: auto !important;
            position: relative !important;
            display: flex !important;
            flex-wrap: wrap !important;
            margin-left: -4px !important;
            margin-right: -4px !important;
        }
        .isotope-grid .isotope-item,
        .isotope-item,
        .isotope-grid .col-6,
        .isotope-grid .col-sm-6 {
            position: relative !important;
            top: auto !important;
            left: auto !important;
            width: 50% !important;
            max-width: 50% !important;
            flex: 0 0 50% !important;
            box-sizing: border-box !important;
        }
    }

    /* Cart Page Theme & Responsive Overrides */
    .shopping-summery thead,
    .shopping-summery thead tr,
    .shopping-summery thead tr th {
        background: #000000 !important;
        color: #ffffff !important;
        border: none !important;
        font-weight: 600 !important;
    }
    .shopping-summery tbody tr td {
        border-color: #f1f5f9 !important;
        vertical-align: middle !important;
    }
    .shopping-summery tbody tr td.image img {
        max-width: 70px !important;
        border-radius: 4px !important;
    }
    .shopping-cart .total-amount .left .coupon form .btn,
    .shopping-cart .total-amount .right .button5 .btn {
        background: #000000 !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 4px !important;
    }

    @media (max-width: 767.98px) {
        /* Completely hide legacy table-to-card pseudo-element block headers */
        .shopping-cart .table td::before {
            display: none !important;
            content: "" !important;
            width: 0 !important;
            height: 0 !important;
            padding: 0 !important;
        }

        .shopping-summery tbody tr {
            display: flex !important;
            flex-wrap: wrap !important;
            position: relative !important;
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 8px !important;
            padding: 12px !important;
            margin-bottom: 15px !important;
            box-shadow: 0 2px 6px rgba(0,0,0,0.04) !important;
        }

        .shopping-summery tbody tr td {
            display: block !important;
            padding: 2px 4px !important;
            border: none !important;
            width: auto !important;
            margin-top: 0 !important;
            background: transparent !important;
        }

        .shopping-summery tbody tr td.image {
            width: 75px !important;
            flex: 0 0 75px !important;
            padding-left: 0 !important;
        }
        .shopping-summery tbody tr td.image img {
            width: 100% !important;
            max-width: 75px !important;
            height: auto !important;
            border-radius: 6px !important;
        }

        .shopping-summery tbody tr td.product-des {
            flex: 1 1 calc(100% - 115px) !important;
            padding-left: 10px !important;
            padding-right: 30px !important;
        }
        .shopping-summery tbody tr td.product-des p.product-name a {
            font-size: 13px !important;
            font-weight: 700 !important;
            color: #111111 !important;
            line-height: 1.3 !important;
        }
        .shopping-summery tbody tr td.product-des p.product-des {
            font-size: 11px !important;
            color: #666666 !important;
            margin-top: 4px !important;
        }

        .shopping-summery tbody tr td.price {
            display: none !important;
        }

        .shopping-summery tbody tr td.qty {
            width: 100% !important;
            flex: 0 0 100% !important;
            margin-top: 10px !important;
            padding-left: 0 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            border-top: 1px solid #f1f5f9 !important;
            padding-top: 10px !important;
        }

        .shopping-summery tbody tr td.total-amount {
            font-size: 14px !important;
            font-weight: 700 !important;
            color: #111111 !important;
        }

        .shopping-summery tbody tr td.action {
            position: absolute !important;
            top: 10px !important;
            right: 10px !important;
            padding: 0 !important;
        }

        .shopping-summery tbody tr td.action a {
            color: #dc2626 !important;
            font-size: 16px !important;
            padding: 4px !important;
        }
    }

    /* Global Overflow & Width Fix */
    html, body {
        overflow-x: hidden !important;
        max-width: 100% !important;
    }

    /* Midium Banner Rules */
    .midium-banner {
        overflow: hidden !important;
        width: 100% !important;
        max-width: 100% !important;
    }
    .midium-banner .container-fluid {
        width: 100% !important;
        max-width: 100% !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        overflow: hidden !important;
    }
    .midium-banner .row {
        margin-left: 0 !important;
        margin-right: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
    }
    .midium-banner .single-banner {
        position: relative !important;
        width: 100% !important;
        max-width: 100% !important;
        overflow: hidden !important;
    }
    .midium-banner .single-banner img {
        width: 100% !important;
        max-width: 100% !important;
        height: auto !important;
        display: block !important;
        object-fit: cover !important;
    }
    .midium-banner .single-banner h3 span,
    .midium-banner .single-banner p {
        color: #000000 !important;
    }

    /* ==========================================
       Comprehensive Mobile Responsiveness
    ========================================== */
    @media (max-width: 767.98px) {
        /* Midium Banner Mobile Fixes */
        .midium-banner .single-banner .content {
            padding: 14px 16px !important;
            left: 12px !important;
            right: auto !important;
            max-width: 75% !important;
            background: rgba(255, 255, 255, 0.92) !important;
            border-radius: 6px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12) !important;
            transform: translateY(-50%) !important;
        }
        .midium-banner .single-banner h3 {
            font-size: 13px !important;
            line-height: 1.3 !important;
            font-weight: 700 !important;
            color: #000000 !important;
            margin-bottom: 4px !important;
        }
        .midium-banner .single-banner h3 span {
            color: #000000 !important;
            font-weight: 700 !important;
        }
        .midium-banner .single-banner p {
            font-size: 10px !important;
            color: #555555 !important;
            font-weight: 600 !important;
            margin-bottom: 2px !important;
            letter-spacing: 0.5px !important;
        }
        .midium-banner .single-banner a.btn,
        .midium-banner .single-banner a.btn-primary {
            padding: 5px 14px !important;
            font-size: 11px !important;
            background: #000000 !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 4px !important;
            margin-top: 4px !important;
        }

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
            padding: 8px 14px !important;
            min-height: 56px !important;
        }
        .header-logo-img {
            max-height: 48px !important;
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
