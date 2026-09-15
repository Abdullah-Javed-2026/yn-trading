@php
    $settings = DB::table('settings')->get();
    $rawAnnouncements = (count($settings) > 0 && !empty($settings[0]->announcement)) 
        ? $settings[0]->announcement 
        : '✨ FREE NATIONWIDE SHIPPING ON ORDERS ABOVE RS. 2,999 | 100% ORIGINAL DESIGNER FABRICS & LUXURY PRET | CASH ON DELIVERY AVAILABLE ACROSS PAKISTAN';
    
    $announcementItems = array_values(array_filter(array_map('trim', explode('|', $rawAnnouncements))));
    if (empty($announcementItems)) {
        $announcementItems = [
            '✨ FREE NATIONWIDE SHIPPING ON ORDERS ABOVE RS. 2,999',
            '100% ORIGINAL DESIGNER FABRICS & LUXURY PRET',
            'CASH ON DELIVERY AVAILABLE ACROSS PAKISTAN'
        ];
    }
    $tickerList = $announcementItems;
    while (count($tickerList) < 4) {
        $tickerList = array_merge($tickerList, $announcementItems);
    }
@endphp
<header class="header shop custom-header">
    <!-- Top Announcement Bar (Glassmorphic Obsidian Marquee) -->
    <div class="top-announcement-bar">
        <div class="container-fluid text-center px-0">
            <div class="announcement-ticker-wrap">
                <div class="announcement-ticker">
                    <div class="ticker-content">
                        @foreach($tickerList as $item)
                            <span class="ticker-item">{{$item}}</span>
                            <span class="ticker-dot">•</span>
                        @endforeach
                    </div>
                    <div class="ticker-content" aria-hidden="true">
                        @foreach($tickerList as $item)
                            <span class="ticker-item">{{$item}}</span>
                            <span class="ticker-dot">•</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Luxury Navbar (Transparent floating overlay on top of Hero) -->
    <div class="main-navbar-bar">
        <div class="container-fluid px-lg-4 px-3">
            <div class="navbar-header-row">
                
                <!-- Left: Hamburger (Mobile Only) & Brand Logo -->
                <div class="nav-left-branding d-flex align-items-center">
                    <!-- Mobile Hamburger Button (Only on <= 991px) -->
                    <button class="hamburger-menu-btn" type="button" id="menuToggleBtn" title="Open Menu">
                        <i class="ti-menu"></i>
                    </button>

                    <!-- Brand Logo -->
                    <a href="{{route('home')}}" class="logo-link d-inline-flex align-items-center">
                        @if(count($settings) > 0 && !empty($settings[0]->logo))
                            <img src="{{$settings[0]->logo}}" alt="YN Trading Logo" class="header-logo-img">
                        @else
                            <span class="logo-text-brand">YN TRADING</span>
                        @endif
                    </a>
                </div>

                <!-- Center: Desktop Luxury Navigation Menu (Hidden on <= 991px) -->
                <nav class="luxury-desktop-nav-wrap">
                    <ul class="luxury-desktop-nav">
                        <li class="luxury-nav-item">
                            <a href="{{route('home')}}" class="luxury-nav-link {{ Request::is('/') || Request::is('home') ? 'active-link' : '' }}">Home</a>
                        </li>
                        <li class="luxury-nav-item">
                            <a href="{{route('product-grids')}}" class="luxury-nav-link">New Arrivals</a>
                        </li>

                        <!-- Collections Dropdown -->
                        <li class="luxury-nav-item has-dropdown">
                            <a href="javascript:void(0);" class="luxury-nav-link">
                                Collections <i class="ti-angle-down"></i>
                            </a>
                            <ul class="luxury-dropdown-menu">
                                @php
                                    $navCategories = Helper::getAllCategory();
                                @endphp
                                @if($navCategories && count($navCategories) > 0)
                                    @foreach($navCategories as $cat)
                                        <li class="cat-dropdown-item">
                                            <a href="{{route('product-cat', $cat->slug)}}">
                                                <span>{{$cat->title}}</span>
                                                @if($cat->child_cat && $cat->child_cat->count() > 0)
                                                    <i class="ti-angle-right"></i>
                                                @endif
                                            </a>
                                            @if($cat->child_cat && $cat->child_cat->count() > 0)
                                                <ul class="sub-menu">
                                                    @foreach($cat->child_cat as $sub_cat)
                                                        <li>
                                                            <a href="{{route('product-sub-cat', [$cat->slug, $sub_cat->slug])}}">
                                                                {{$sub_cat->title}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                @else
                                    <li><a href="{{route('product-grids')}}">All Apparel</a></li>
                                @endif
                            </ul>
                        </li>

                        <li class="luxury-nav-item">
                            <a href="{{route('product-grids')}}" class="luxury-nav-link">
                                Hot Sale <span class="hot-sale-pill">HOT</span>
                            </a>
                        </li>

                        <li class="luxury-nav-item">
                            <a href="{{route('about-us')}}" class="luxury-nav-link">About Us</a>
                        </li>

                        <li class="luxury-nav-item">
                            <a href="{{route('contact')}}" class="luxury-nav-link">Contact</a>
                        </li>
                    </ul>
                </nav>

                <!-- Right: Action Icons (Search, User, Wishlist, Cart) -->
                <div class="header-action-icons-wrap">
                    
                    <!-- Search Icon Trigger -->
                    <button class="nav-action-btn" id="searchToggleBtn" type="button" title="Search Products">
                        <i class="ti-search"></i>
                    </button>

                    <!-- User Account -->
                    @auth
                        @if(Auth::user()->role=='admin')
                            <a href="{{route('admin')}}" title="Admin Dashboard" class="nav-action-link">
                                <i class="ti-user"></i>
                            </a>
                        @else
                            <a href="{{route('user')}}" title="My Account" class="nav-action-link">
                                <i class="ti-user"></i>
                            </a>
                        @endif
                    @else
                        <a href="{{route('login.form')}}" title="Login / Register" class="nav-action-link">
                            <i class="ti-user"></i>
                        </a>
                    @endauth

                    <!-- Wishlist Icon with Live Count Badge -->
                    <a href="{{route('wishlist')}}" class="nav-action-link" title="My Wishlist">
                        <i class="ti-heart"></i>
                        @php
                            $wishlistCount = Helper::wishlistCount();
                        @endphp
                        @if($wishlistCount > 0)
                            <span class="badge-count">{{$wishlistCount}}</span>
                        @endif
                    </a>

                    <!-- Shopping Cart / Bag with Dropdown -->
                    <div class="cart-dropdown-wrapper sinlge-bar shopping">
                        <a href="{{route('cart')}}" class="nav-action-link" title="Shopping Bag">
                            <i class="ti-bag"></i>
                            <span class="badge-count">{{Helper::cartCount()}}</span>
                        </a>

                        <!-- Mini Cart Dropdown -->
                        <div class="shopping-item mini-cart-luxury-dropdown">
                            <div class="dropdown-cart-header">
                                <span class="mini-cart-count-badge">SHOPPING BAG ({{count(Helper::getAllProductFromCart())}})</span>
                                <a href="{{route('cart')}}" class="mini-cart-header-view-link">View Bag &rarr;</a>
                            </div>

                            @php
                                $miniCartItems = Helper::getAllProductFromCart();
                            @endphp

                            @if(count($miniCartItems) > 0)
                                <ul class="shopping-list mini-cart-items-scroll">
                                    @foreach($miniCartItems as $data)
                                        @php
                                            $pro = is_object($data->product) ? $data->product : (object)$data->product;
                                            $photo = explode(',', $pro->photo ?? '');
                                            $title = $pro->title ?? 'YN Designer Wear';
                                            $slug = $pro->slug ?? '';
                                            $price = is_object($data) ? $data->price : $data['price'];
                                            $thumb = !empty($photo[0]) ? $photo[0] : asset('frontend/img/default-product.jpg');
                                        @endphp
                                        <li class="mini-cart-item-row">
                                            <a class="mini-cart-thumb" href="{{route('product-detail',$slug)}}">
                                                <img src="{{$thumb}}" alt="{{$title}}">
                                            </a>
                                            <div class="mini-cart-info">
                                                <h4 class="mini-cart-product-title">
                                                    <a href="{{route('product-detail',$slug)}}">{{$title}}</a>
                                                </h4>
                                                <div class="mini-cart-qty-price">
                                                    <span class="mini-qty-tag">{{$data->quantity}} &times;</span>
                                                    <span class="mini-amount-tag">PKR {{number_format($price, 0)}}</span>
                                                </div>
                                            </div>
                                            <a href="{{route('cart-delete',$data->id)}}" class="mini-cart-delete-btn" title="Remove from bag">
                                                <i class="ti-close"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="mini-cart-bottom-panel">
                                    <div class="mini-cart-subtotal-row">
                                        <span class="mini-subtotal-label">Subtotal</span>
                                        <span class="mini-subtotal-amount">PKR {{number_format(Helper::totalCartPrice(),0)}}</span>
                                    </div>
                                    <div class="mini-cart-actions-group">
                                        <a href="{{route('checkout')}}" class="mini-btn-checkout">Proceed To Checkout</a>
                                        <a href="{{route('cart')}}" class="mini-btn-view-cart">View Full Bag</a>
                                    </div>
                                </div>
                            @else
                                <div class="mini-cart-empty-state">
                                    <i class="ti-bag empty-bag-icon"></i>
                                    <p class="empty-bag-text">Your shopping bag is empty</p>
                                    <a href="{{route('product-grids')}}" class="mini-btn-shop-now">Explore Collection</a>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>

            <!-- Slide-down Search Overlay -->
            <div class="header-search-overlay" id="searchOverlay">
                <div class="container" style="max-width: 720px;">
                    <form method="POST" action="{{route('product.search')}}">
                        @csrf
                        <div class="search-input-box">
                            <input name="search" placeholder="Search unstitched, luxury pret, lawn, formal suits..." type="search" class="form-control" autocomplete="off">
                            <button class="search-submit-btn" type="submit">
                                <i class="ti-search mr-1"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- Left Mobile Sidebar Drawer Overlay -->
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<!-- Left Mobile Sidebar Drawer (Off-Canvas) -->
<aside class="left-sidebar-drawer" id="leftSidebarDrawer">
    <!-- Header with Close Button -->
    <div class="sidebar-header">
        <div class="d-flex align-items-center" style="gap: 8px;">
            <span class="sidebar-title">Menu</span>
        </div>
        <button type="button" class="close-sidebar-btn" id="closeSidebarBtn" title="Close Menu">&times;</button>
    </div>

    <!-- Menu List -->
    <div class="sidebar-body">
        <ul class="sidebar-menu-list">
            <li class="sidebar-item">
                <a href="{{route('home')}}" class="sidebar-link">Home</a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('product-grids')}}" class="sidebar-link">New Arrivals</a>
            </li>

            <!-- Dynamic Categories in Mobile Drawer -->
            @foreach(Helper::getAllCategory() as $cat)
                @if($cat->child_cat && $cat->child_cat->count() > 0)
                    <li class="sidebar-item has-sub">
                        <div class="sidebar-link-wrap">
                            <a href="{{route('product-cat', $cat->slug)}}" class="sidebar-link">{{$cat->title}}</a>
                            <span class="sub-toggle-icon"><i class="ti-angle-down"></i></span>
                        </div>
                        <ul class="sidebar-sub-menu">
                            @foreach($cat->child_cat as $sub_cat)
                                <li>
                                    <a href="{{route('product-sub-cat', [$cat->slug, $sub_cat->slug])}}">{{$sub_cat->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="sidebar-item">
                        <a href="{{route('product-cat', $cat->slug)}}" class="sidebar-link">{{$cat->title}}</a>
                    </li>
                @endif
            @endforeach

            <li class="sidebar-item">
                <a href="{{route('product-grids')}}" class="sidebar-link d-flex justify-content-between align-items-center">
                    <span>Hot Sale</span>
                    <span class="hot-sale-pill">HOT</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('wishlist')}}" class="sidebar-link d-flex justify-content-between align-items-center">
                    <span>Wishlist</span>
                    <span class="badge badge-dark" style="background: #111111; color: #ffffff;">{{Helper::wishlistCount()}}</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('order.track')}}" class="sidebar-link">Track Your Order</a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('about-us')}}" class="sidebar-link">About Us</a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('contact')}}" class="sidebar-link">Contact Us</a>
            </li>
        </ul>

        <div class="p-3 mt-3">
            @php
                $phone = (count($settings) > 0 && !empty($settings[0]->phone)) ? $settings[0]->phone : '+92 336 6888806';
                $rawWhatsapp = (count($settings) > 0 && !empty($settings[0]->whatsapp)) ? $settings[0]->whatsapp : $phone;
                $cleanWhatsapp = preg_replace('/[^0-9]/', '', $rawWhatsapp);
                if (substr($cleanWhatsapp, 0, 1) === '0') {
                    $cleanWhatsapp = '92' . substr($cleanWhatsapp, 1);
                }
                if (empty($cleanWhatsapp)) {
                    $cleanWhatsapp = '923366888806';
                }
            @endphp
            <a href="https://wa.me/{{$cleanWhatsapp}}" target="_blank" class="btn btn-block" style="background: #25D366; color: #ffffff; font-weight: 700; font-size: 13px; border-radius: 6px; padding: 12px; display: flex; align-items: center; justify-content: center; gap: 8px;">
                <i class="fa fa-whatsapp" style="font-size: 18px;"></i> WhatsApp Support
            </a>
        </div>
    </div>
</aside>

<!-- Dedicated Header & Off-Canvas Styles -->
<style>
/* ==========================================================
   LUXURY OBSIDIAN BLACK NAVBAR & RESPONSIVE ARCHITECTURE
   ========================================================== */

/* 1. Global Page Top Offset for Fixed Black Header */
body, 
body.homepage-layout,
body.innerpage-layout {
    padding-top: 76px !important;
}

@media (max-width: 991.98px) {
    body, 
    body.homepage-layout,
    body.innerpage-layout {
        padding-top: 68px !important;
    }
}

@media (max-width: 575.98px) {
    body, 
    body.homepage-layout,
    body.innerpage-layout {
        padding-top: 64px !important;
    }
}

/* 2. Base Header: Fixed Top Black Banner */
.header.shop.custom-header {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    width: 100% !important;
    z-index: 10000 !important;
    background: #000000 !important;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6) !important;
    border: none !important;
}

/* 3. Top Announcement Bar (Deep Black Obsidian Marquee) */
.top-announcement-bar {
    background: #080808 !important;
    color: #ffffff !important;
    padding: 4px 0 !important;
    font-size: 10.5px !important;
    font-weight: 600 !important;
    letter-spacing: 0.8px !important;
    text-transform: uppercase !important;
    overflow: hidden;
    position: relative;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    transition: all 0.3s ease;
}

.announcement-ticker-wrap {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
}
.announcement-ticker {
    display: inline-flex;
    white-space: nowrap;
    animation: announcement-ticker-scroll 32s linear infinite;
    will-change: transform;
}
.announcement-ticker-wrap:hover .announcement-ticker {
    animation-play-state: paused;
}
.ticker-content {
    display: inline-flex;
    align-items: center;
    flex-shrink: 0;
}
.ticker-item {
    display: inline-block;
    padding: 0 14px;
    font-size: 11px;
    color: #ffffff;
    font-weight: 500;
}
.ticker-dot {
    display: inline-block;
    color: rgba(255, 255, 255, 0.4);
    padding: 0 4px;
    font-size: 10px;
}
@keyframes announcement-ticker-scroll {
    0% { transform: translate3d(0, 0, 0); }
    100% { transform: translate3d(-50%, 0, 0); }
}

/* 4. Main Navbar Bar (Solid Sleek Black - Reduced Height) */
.main-navbar-bar {
    background: #000000 !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    position: relative;
    z-index: 999;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
}

.navbar-header-row {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    min-height: 52px;
    width: 100%;
    padding: 0;
    transition: min-height 0.3s ease;
}

/* Brand Logo */
.logo-link {
    text-decoration: none !important;
}
.header-logo-img {
    max-height: 34px;
    width: auto;
    object-fit: contain;
    transition: transform 0.25s ease;
}
.header-logo-img:hover {
    transform: scale(1.03);
}

.logo-text-brand {
    font-size: 18px;
    font-weight: 800;
    letter-spacing: 1.6px;
    color: #ffffff !important;
    text-transform: uppercase;
    transition: opacity 0.2s ease;
}
.logo-text-brand:hover {
    opacity: 0.9;
}

/* 5. Desktop Navigation Links (Crisp White Text) */
.luxury-desktop-nav-wrap {
    display: block;
}
.luxury-desktop-nav {
    display: flex;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 2px;
}
.luxury-nav-item {
    position: relative;
}
.luxury-nav-link {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 14px 14px;
    font-size: 12.5px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #ffffff !important;
    text-decoration: none !important;
    position: relative;
    transition: color 0.25s ease;
}

.luxury-nav-link::after {
    content: '';
    position: absolute;
    bottom: 8px;
    left: 14px;
    right: 14px;
    height: 2px;
    background: #ffffff;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 0.25s cubic-bezier(0.25, 1, 0.5, 1);
    box-shadow: 0 0 6px rgba(255, 255, 255, 0.4);
}

.luxury-nav-link:hover::after,
.luxury-nav-item:hover > .luxury-nav-link::after,
.luxury-nav-link.active-link::after {
    transform: scaleX(1);
}

.luxury-nav-link i {
    font-size: 10px;
    margin-left: 2px;
    transition: transform 0.25s ease;
}
.luxury-nav-item:hover > .luxury-nav-link i {
    transform: rotate(180deg);
}

.hot-sale-pill {
    background: #e53935;
    color: #ffffff;
    font-size: 8.5px;
    font-weight: 800;
    padding: 2px 6px;
    border-radius: 4px;
    margin-left: 3px;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 6px rgba(229, 57, 53, 0.5);
    display: inline-block;
}

/* 6. Luxury Dark Dropdown Menus */
.luxury-dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 250px;
    background: #111111 !important;
    border: 1px solid rgba(255, 255, 255, 0.12) !important;
    border-radius: 8px !important;
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.75) !important;
    padding: 10px 0;
    list-style: none;
    margin: 0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.25s cubic-bezier(0.25, 1, 0.5, 1);
    z-index: 1000;
}
.luxury-nav-item:hover > .luxury-dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
.luxury-dropdown-menu li {
    position: relative;
}
.luxury-dropdown-menu li a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 11px 22px;
    font-size: 13.5px;
    font-weight: 500;
    color: #eeeeee !important;
    text-decoration: none !important;
    transition: all 0.2s ease;
}
.luxury-dropdown-menu li a:hover {
    background: rgba(255, 255, 255, 0.08) !important;
    color: #ffffff !important;
    padding-left: 26px;
}
.luxury-dropdown-menu .sub-menu {
    position: absolute;
    top: 0;
    left: 100%;
    min-width: 230px;
    background: #161616 !important;
    border: 1px solid rgba(255, 255, 255, 0.12) !important;
    border-radius: 8px !important;
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.75) !important;
    padding: 10px 0;
    list-style: none;
    margin: 0;
    opacity: 0;
    visibility: hidden;
    transform: translateX(10px);
    transition: all 0.25s ease;
}
.luxury-dropdown-menu li:hover > .sub-menu {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
}

/* 7. Right Action Icons (Search, User, Wishlist, Cart) */
.header-action-icons-wrap {
    display: flex !important;
    align-items: center !important;
    gap: 7px;
}

.nav-action-btn,
.nav-action-link {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    color: #ffffff !important;
    background: rgba(255, 255, 255, 0.08) !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    font-size: 14px;
    cursor: pointer;
    position: relative;
    transition: all 0.25s ease;
    text-decoration: none !important;
    outline: none !important;
}

.nav-action-btn:hover,
.nav-action-link:hover {
    background: #ffffff !important;
    color: #000000 !important;
    border-color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
}

.badge-count {
    position: absolute;
    top: -4px;
    right: -4px;
    background: #ffffff !important;
    color: #000000 !important;
    font-size: 9.5px;
    font-weight: 800;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
    border: 1.5px solid #000000;
}

/* 8. Mobile Hamburger Button */
.hamburger-menu-btn {
    background: rgba(255, 255, 255, 0.08) !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    border-radius: 50%;
    width: 34px;
    height: 34px;
    font-size: 16px;
    color: #ffffff !important;
    cursor: pointer;
    outline: none !important;
    padding: 0;
    display: none;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
    transition: all 0.25s ease;
}

.hamburger-menu-btn:hover {
    background: #ffffff !important;
    color: #000000 !important;
    border-color: #ffffff !important;
    transform: translateY(-1px);
}

/* ==========================================================
   SCROLLED / STICKY STATE
   ========================================================== */
.custom-header.is-scrolled .main-navbar-bar,
.custom-header.sticky-active .main-navbar-bar {
    background: rgba(8, 8, 8, 0.96) !important;
    backdrop-filter: blur(16px) !important;
    -webkit-backdrop-filter: blur(16px) !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important;
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.7) !important;
}

.custom-header.is-scrolled .navbar-header-row,
.custom-header.sticky-active .navbar-header-row {
    min-height: 48px;
}

/* ==========================================================
   SLIDE-DOWN SEARCH OVERLAY (DARK LUXURY THEME)
   ========================================================== */
.header-search-overlay {
    display: none;
    background: #0d0d0d !important;
    border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
    padding: 20px 0;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7);
}
.search-input-box {
    display: flex;
    align-items: stretch;
    border: 1.5px solid rgba(255, 255, 255, 0.2);
    border-radius: 50px;
    overflow: hidden;
    background: #181818;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    height: 50px;
    transition: border-color 0.25s ease;
}
.search-input-box:focus-within {
    border-color: #ffffff;
}
.search-input-box input {
    border: none !important;
    box-shadow: none !important;
    padding: 0 24px !important;
    font-size: 14px;
    color: #ffffff !important;
    height: 100% !important;
    background: transparent;
}
.search-input-box input::placeholder {
    color: #888888;
}
.search-submit-btn {
    background: #ffffff !important;
    color: #000000 !important;
    border: none !important;
    padding: 0 26px !important;
    font-weight: 700 !important;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 12px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}
.search-submit-btn:hover {
    background: #e2e2e2 !important;
    color: #000000 !important;
}

/* ==========================================================
   MINI SHOPPING CART DROPDOWN (DARK LUXURY THEME)
   ========================================================== */
.cart-dropdown-wrapper {
    position: relative;
}
.header .shopping-item,
.header .shopping-item.mini-cart-luxury-dropdown {
    position: absolute;
    top: calc(100% + 14px);
    right: 0;
    width: 330px;
    background: #141414 !important;
    border: 1px solid rgba(255, 255, 255, 0.14) !important;
    border-radius: 12px !important;
    padding: 16px 18px !important;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.85) !important;
    z-index: 100000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.25s cubic-bezier(0.25, 1, 0.5, 1);
}
.cart-dropdown-wrapper:hover .shopping-item,
.header .shopping:hover .shopping-item {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
.dropdown-cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    margin-bottom: 10px;
}
.mini-cart-count-badge {
    font-size: 11px;
    font-weight: 700;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}
.mini-cart-header-view-link {
    font-size: 11.5px;
    font-weight: 600;
    color: #aaaaaa !important;
    text-decoration: none !important;
    transition: color 0.2s ease;
}
.mini-cart-header-view-link:hover {
    color: #ffffff !important;
}

/* Scrollable items */
.mini-cart-items-scroll {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
    max-height: 240px;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: rgba(255, 255, 255, 0.2) transparent;
}
.mini-cart-items-scroll::-webkit-scrollbar {
    width: 4px;
}
.mini-cart-items-scroll::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 4px;
}

.mini-cart-item-row {
    position: relative;
    padding: 10px 0 !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
    display: flex !important;
    align-items: center !important;
    gap: 12px;
}
.mini-cart-item-row:last-child {
    border-bottom: none !important;
}

.mini-cart-thumb {
    width: 48px;
    height: 60px;
    border-radius: 6px;
    overflow: hidden;
    flex-shrink: 0;
    background: #222;
    border: 1px solid rgba(255, 255, 255, 0.08);
    display: block;
}
.mini-cart-thumb img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    display: block;
}

.mini-cart-info {
    flex-grow: 1;
    min-width: 0;
    padding-right: 22px;
}
.mini-cart-product-title {
    margin: 0 0 4px !important;
    font-size: 12.5px !important;
    font-weight: 600 !important;
    line-height: 1.3 !important;
}
.mini-cart-product-title a {
    color: #f1f1f1 !important;
    text-decoration: none !important;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.2s ease;
}
.mini-cart-product-title a:hover {
    color: #ffffff !important;
    text-decoration: underline !important;
}
.mini-cart-qty-price {
    font-size: 11.5px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.mini-qty-tag {
    color: #888888;
    font-weight: 500;
}
.mini-amount-tag {
    color: #ffffff;
    font-weight: 700;
}

.mini-cart-delete-btn {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.08);
    color: #888888 !important;
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none !important;
    transition: all 0.2s ease;
}
.mini-cart-delete-btn:hover {
    background: #e53935 !important;
    color: #ffffff !important;
}

/* Bottom Actions */
.mini-cart-bottom-panel {
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    margin-top: 6px;
}
.mini-cart-subtotal-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13.5px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 12px;
}
.mini-subtotal-label {
    text-transform: uppercase;
    letter-spacing: 0.6px;
    font-size: 11.5px;
    color: #aaaaaa;
}
.mini-subtotal-amount {
    color: #ffffff;
    font-size: 14px;
}

.mini-cart-actions-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.mini-btn-checkout {
    background: #ffffff !important;
    color: #000000 !important;
    font-weight: 700 !important;
    font-size: 12px !important;
    text-transform: uppercase !important;
    letter-spacing: 0.8px !important;
    border-radius: 6px !important;
    padding: 10px !important;
    display: block;
    width: 100%;
    text-align: center;
    text-decoration: none !important;
    transition: background 0.2s ease !important;
    border: none !important;
}
.mini-btn-checkout:hover {
    background: #e0e0e0 !important;
    color: #000000 !important;
}
.mini-btn-view-cart {
    background: transparent !important;
    color: #cccccc !important;
    font-weight: 600 !important;
    font-size: 11px !important;
    text-transform: uppercase !important;
    letter-spacing: 0.6px !important;
    border-radius: 6px !important;
    padding: 7px !important;
    display: block;
    width: 100%;
    text-align: center;
    text-decoration: none !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    transition: all 0.2s ease !important;
}
.mini-btn-view-cart:hover {
    border-color: rgba(255, 255, 255, 0.4) !important;
    color: #ffffff !important;
    background: rgba(255, 255, 255, 0.05) !important;
}

/* Empty State */
.mini-cart-empty-state {
    text-align: center;
    padding: 22px 10px;
}
.empty-bag-icon {
    font-size: 30px;
    color: #666666;
    margin-bottom: 8px;
    display: block;
}
.empty-bag-text {
    font-size: 12.5px;
    color: #aaaaaa;
    margin-bottom: 12px;
}
.mini-btn-shop-now {
    display: inline-block;
    background: #ffffff;
    color: #000000 !important;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none !important;
    transition: background 0.2s ease;
}
.mini-btn-shop-now:hover {
    background: #e0e0e0;
}

/* ==========================================================
   OFF-CANVAS SIDEBAR DRAWER (DARK LUXURY THEME)
   ========================================================== */
.sidebar-backdrop {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100vw !important;
    height: 100vh !important;
    background-color: rgba(0, 0, 0, 0.75) !important;
    backdrop-filter: blur(5px) !important;
    -webkit-backdrop-filter: blur(5px) !important;
    z-index: 99998 !important;
    opacity: 0 !important;
    visibility: hidden !important;
    transition: opacity 0.3s ease, visibility 0.3s ease !important;
}
.sidebar-backdrop.active {
    opacity: 1 !important;
    visibility: visible !important;
}
.left-sidebar-drawer {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 320px !important;
    max-width: 85vw !important;
    height: 100vh !important;
    background-color: #0d0d0d !important;
    z-index: 99999 !important;
    transform: translateX(-100%) !important;
    visibility: hidden !important;
    transition: transform 0.35s cubic-bezier(0.25, 1, 0.5, 1), visibility 0.35s ease !important;
    box-shadow: none !important;
    display: flex !important;
    flex-direction: column !important;
    overflow: hidden !important;
}
.left-sidebar-drawer.active {
    transform: translateX(0) !important;
    visibility: visible !important;
    box-shadow: 8px 0 35px rgba(0, 0, 0, 0.8) !important;
}
.sidebar-header {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding: 18px 22px !important;
    background: #141414;
}
.sidebar-title {
    font-weight: 800;
    font-size: 15px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #ffffff;
}
.close-sidebar-btn {
    background: transparent;
    border: none;
    font-size: 28px;
    color: #ffffff;
    cursor: pointer;
    line-height: 1;
    outline: none !important;
    padding: 0;
    transition: transform 0.2s ease;
}
.close-sidebar-btn:hover {
    transform: rotate(90deg);
}
.sidebar-body {
    flex: 1;
    overflow-y: auto;
}
.sidebar-menu-list {
    list-style: none;
    margin: 0;
    padding: 0;
}
.sidebar-item {
    border-bottom: 1px solid rgba(255, 255, 255, 0.07);
}
.sidebar-link {
    display: block;
    padding: 15px 22px;
    font-size: 14px;
    font-weight: 600;
    color: #ffffff !important;
    text-decoration: none !important;
    letter-spacing: 0.3px;
    transition: background 0.2s ease;
}
.sidebar-link:hover {
    background: rgba(255, 255, 255, 0.05);
}
.sidebar-link-wrap {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-right: 15px;
}
.sidebar-link-wrap .sidebar-link {
    flex: 1;
}
.sub-toggle-icon {
    font-size: 14px;
    color: #aaaaaa;
    padding: 12px;
    cursor: pointer;
    transition: transform 0.25s ease;
}
.sidebar-item.open .sub-toggle-icon {
    transform: rotate(180deg);
}
.sidebar-sub-menu {
    list-style: none;
    margin: 0;
    padding: 6px 0 14px 34px;
    display: none;
    background-color: #161616;
}
.sidebar-sub-menu li a {
    display: block;
    padding: 9px 0;
    font-size: 13.5px;
    color: #cccccc !important;
    text-decoration: none !important;
    transition: color 0.2s ease;
}
.sidebar-sub-menu li a:hover {
    color: #ffffff !important;
}

/* ==========================================================
   RESPONSIVE BREAKPOINTS
   ========================================================== */
@media (max-width: 991.98px) {
    .hamburger-menu-btn {
        display: inline-flex !important;
    }
    .luxury-desktop-nav-wrap {
        display: none !important;
    }
    .navbar-header-row {
        min-height: 48px;
    }
    .header-logo-img {
        max-height: 30px;
    }
    .logo-text-brand {
        font-size: 16px;
        letter-spacing: 1.2px;
    }
    .header .shopping-item {
        right: -30px;
        width: 290px;
    }
}
@media (min-width: 992px) {
    .hamburger-menu-btn {
        display: none !important;
    }
    .luxury-desktop-nav-wrap {
        display: block !important;
    }
}
@media (max-width: 575.98px) {
    .navbar-header-row {
        min-height: 44px;
    }
    .header-action-icons-wrap {
        gap: 5px;
    }
    .nav-action-btn,
    .nav-action-link,
    .hamburger-menu-btn {
        width: 32px;
        height: 32px;
        font-size: 13px;
    }
    .logo-text-brand {
        font-size: 14.5px;
        letter-spacing: 0.8px;
    }
    .header-logo-img {
        max-height: 26px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var menuBtn = document.getElementById('menuToggleBtn');
    var closeBtn = document.getElementById('closeSidebarBtn');
    var sidebar = document.getElementById('leftSidebarDrawer');
    var backdrop = document.getElementById('sidebarBackdrop');

    var searchBtn = document.getElementById('searchToggleBtn');
    var searchOverlay = document.getElementById('searchOverlay');
    var header = document.querySelector('.custom-header');

    // Sticky / Scroll Handler
    function handleScroll() {
        if (!header) return;
        if (window.scrollY > 25) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    }
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();

    // Mobile Drawer Controls
    function openSidebar() {
        if (sidebar && backdrop) {
            sidebar.classList.add('active');
            backdrop.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeSidebar() {
        if (sidebar && backdrop) {
            sidebar.classList.remove('active');
            backdrop.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    if (menuBtn) {
        menuBtn.addEventListener('click', openSidebar);
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }
    if (backdrop) {
        backdrop.addEventListener('click', closeSidebar);
    }

    // Search Overlay Toggle
    if (searchBtn && searchOverlay) {
        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (searchOverlay.style.display === 'none' || searchOverlay.style.display === '') {
                searchOverlay.style.display = 'block';
                var input = searchOverlay.querySelector('input');
                if (input) setTimeout(function() { input.focus(); }, 100);
            } else {
                searchOverlay.style.display = 'none';
            }
        });
    }

    // Mobile Submenus Accordion
    var subToggles = document.querySelectorAll('.sub-toggle-icon');
    subToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            var parentItem = this.closest('.sidebar-item');
            var subMenu = parentItem.querySelector('.sidebar-sub-menu');
            if (subMenu) {
                if (subMenu.style.display === 'block') {
                    subMenu.style.display = 'none';
                    parentItem.classList.remove('open');
                } else {
                    subMenu.style.display = 'block';
                    parentItem.classList.add('open');
                }
            }
        });
    });
});
</script>