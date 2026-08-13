<!-- Meta Tag -->
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
</style>
@stack('styles')
