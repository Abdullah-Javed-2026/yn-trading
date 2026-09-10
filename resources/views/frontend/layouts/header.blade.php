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
    <!-- Top Announcement Bar (Solid Obsidian Black, Crisp White Text, Infinite Luxury Marquee) -->
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

    <!-- Main Luxury Navbar -->
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
                            <a href="{{route('home')}}" class="luxury-nav-link">Home</a>
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
                        <div class="shopping-item">
                            <div class="dropdown-cart-header">
                                <span>{{count(Helper::getAllProductFromCart())}} Items</span>
                                <a href="{{route('cart')}}">View Cart</a>
                            </div>
                            <ul class="shopping-list">
                                @foreach(Helper::getAllProductFromCart() as $data)
                                    @php
                                        $pro = is_object($data->product) ? $data->product : (object)$data->product;
                                        $photo = explode(',', $pro->photo ?? '');
                                        $title = $pro->title ?? '';
                                        $slug = $pro->slug ?? '';
                                        $price = is_object($data) ? $data->price : $data['price'];
                                    @endphp
                                    <li>
                                        <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="{{route('product-detail',$slug)}}"><img src="{{$photo[0]}}" alt="{{$title}}"></a>
                                        <h4><a href="{{route('product-detail',$slug)}}" target="_blank">{{$title}}</a></h4>
                                        <p class="quantity">{{$data->quantity}} x - <span class="amount">PKR {{number_format($price,0)}}</span></p>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="bottom">
                                <div class="total">
                                    <span>Total</span>
                                    <span class="total-amount">PKR {{number_format(Helper::totalCartPrice(),0)}}</span>
                                </div>
                                <a href="{{route('checkout')}}" class="btn btn-dark" style="background: #111111 !important; color: #ffffff !important; width: 100%; border-radius: 4px; font-weight: 600; padding: 10px;">Proceed To Checkout</a>
                            </div>
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
                            <input name="search" placeholder="Search unstitched, luxury pret, lawn, formal suits..." type="search" class="form-control">
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
        <span class="sidebar-title">Menu</span>
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
                <a href="{{route('wishlist')}}" class="sidebar-link d-flex justify-content-between align-items-center">
                    <span>Wishlist</span>
                    <span class="badge badge-dark" style="background: #111111; color: #ffffff;">{{Helper::wishlistCount()}}</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('about-us')}}" class="sidebar-link">About Us</a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('contact')}}" class="sidebar-link">Contact Us</a>
            </li>
        </ul>
    </div>
</aside>

<!-- Dedicated Header & Off-Canvas Styles -->
<style>
/* 1. Announcement Bar */
.top-announcement-bar {
    background: #000000 !important;
    color: #ffffff !important;
    padding: 7px 0 !important;
    font-size: 11px !important;
    font-weight: 600 !important;
    letter-spacing: 0.8px !important;
    text-transform: uppercase !important;
    overflow: hidden;
    position: relative;
    z-index: 1000;
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
    padding: 0 16px;
    font-size: 11.5px;
    color: #ffffff;
}
.ticker-dot {
    display: inline-block;
    color: #888888;
    padding: 0 4px;
    font-size: 10px;
}
@keyframes announcement-ticker-scroll {
    0% { transform: translate3d(0, 0, 0); }
    100% { transform: translate3d(-50%, 0, 0); }
}

/* 2. Main Navbar Bar */
.main-navbar-bar {
    background: #ffffff !important;
    border-bottom: 1px solid #f0f0f0 !important;
    position: relative;
    z-index: 999;
}
.navbar-header-row {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    min-height: 72px;
    width: 100%;
}
.header-logo-img {
    max-height: 46px;
    width: auto;
    object-fit: contain;
}
.logo-text-brand {
    font-size: 20px;
    font-weight: 800;
    letter-spacing: 1.5px;
    color: #111111;
}

/* 3. Desktop Navigation */
.luxury-desktop-nav-wrap {
    display: block;
}
.luxury-desktop-nav {
    display: flex;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 4px;
}
.luxury-nav-item {
    position: relative;
}
.luxury-nav-link {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 26px 14px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #111111 !important;
    text-decoration: none !important;
    position: relative;
    transition: color 0.2s ease;
}
.luxury-nav-link::after {
    content: '';
    position: absolute;
    bottom: 16px;
    left: 14px;
    right: 14px;
    height: 2px;
    background: #111111;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 0.25s cubic-bezier(0.25, 1, 0.5, 1);
}
.luxury-nav-link:hover::after,
.luxury-nav-item:hover > .luxury-nav-link::after {
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
    background: #c62828;
    color: #ffffff;
    font-size: 9px;
    font-weight: 700;
    padding: 2px 6px;
    border-radius: 3px;
    margin-left: 4px;
}

/* 4. Dropdowns */
.luxury-dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 240px;
    background: #ffffff;
    border: 1px solid #e8e8e8;
    border-radius: 8px;
    box-shadow: 0 14px 35px rgba(0, 0, 0, 0.09);
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
    padding: 10px 20px;
    font-size: 13px;
    font-weight: 500;
    color: #333333 !important;
    text-decoration: none !important;
    transition: all 0.2s ease;
}
.luxury-dropdown-menu li a:hover {
    background: #f8f8f8;
    color: #000000 !important;
    padding-left: 24px;
}
.luxury-dropdown-menu .sub-menu {
    position: absolute;
    top: 0;
    left: 100%;
    min-width: 220px;
    background: #ffffff;
    border: 1px solid #e8e8e8;
    border-radius: 8px;
    box-shadow: 0 14px 35px rgba(0, 0, 0, 0.09);
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

/* 5. Right Action Icons */
.header-action-icons-wrap {
    display: flex !important;
    align-items: center !important;
    gap: 4px;
}
.nav-action-btn,
.nav-action-link {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: #111111 !important;
    background: transparent;
    border: none;
    font-size: 18px;
    cursor: pointer;
    position: relative;
    transition: all 0.2s ease;
    text-decoration: none !important;
    outline: none !important;
}
.nav-action-btn:hover,
.nav-action-link:hover {
    background: #f4f4f4;
    color: #000000 !important;
}
.badge-count {
    position: absolute;
    top: 2px;
    right: 2px;
    background: #111111;
    color: #ffffff;
    font-size: 10px;
    font-weight: 700;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.cart-dropdown-wrapper {
    position: relative;
}

/* 6. Hamburger Menu Button */
.hamburger-menu-btn {
    background: transparent;
    border: none;
    font-size: 22px;
    color: #111111;
    cursor: pointer;
    outline: none !important;
    padding: 6px;
    display: none;
    align-items: center;
    justify-content: center;
}

/* 7. Slide-Down Search Overlay */
.header-search-overlay {
    display: none;
    background: #ffffff;
    border-top: 1px solid #f0f0f0;
    padding: 16px 0;
}
.search-input-box {
    display: flex;
    align-items: stretch;
    border: 1.5px solid #111111;
    border-radius: 40px;
    overflow: hidden;
    background: #ffffff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.06);
    height: 48px;
}
.search-input-box input {
    border: none !important;
    box-shadow: none !important;
    padding: 0 20px !important;
    font-size: 14px;
    color: #111111;
    height: 100% !important;
    background: transparent;
}
.search-submit-btn {
    background: #111111 !important;
    color: #ffffff !important;
    border: none !important;
    padding: 0 24px !important;
    font-weight: 700 !important;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    font-size: 12px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* 8. Off-Canvas Sidebar Drawer & Backdrop (CRITICAL: MUST BE FIXED OFF-CANVAS) */
.sidebar-backdrop {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100vw !important;
    height: 100vh !important;
    background-color: rgba(0, 0, 0, 0.5) !important;
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
    background-color: #ffffff !important;
    z-index: 99999 !important;
    transform: translateX(-100%) !important;
    transition: transform 0.35s cubic-bezier(0.25, 1, 0.5, 1) !important;
    box-shadow: 4px 0 25px rgba(0, 0, 0, 0.18) !important;
    display: flex !important;
    flex-direction: column !important;
    overflow: hidden !important;
}
.left-sidebar-drawer.active {
    transform: translateX(0) !important;
}
.sidebar-header {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    border-bottom: 1px solid #f0f0f0;
    padding: 16px 20px !important;
}
.sidebar-title {
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #111111;
}
.close-sidebar-btn {
    background: transparent;
    border: none;
    font-size: 26px;
    color: #333333;
    cursor: pointer;
    line-height: 1;
    outline: none !important;
    padding: 0;
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
    border-bottom: 1px solid #f4f4f4;
}
.sidebar-link {
    display: block;
    padding: 14px 20px;
    font-size: 14px;
    font-weight: 500;
    color: #222222 !important;
    text-decoration: none !important;
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
    color: #666666;
    padding: 10px;
    cursor: pointer;
    transition: transform 0.25s ease;
}
.sidebar-item.open .sub-toggle-icon {
    transform: rotate(180deg);
}
.sidebar-sub-menu {
    list-style: none;
    margin: 0;
    padding: 4px 0 12px 30px;
    display: none;
    background-color: #fafafa;
}
.sidebar-sub-menu li a {
    display: block;
    padding: 8px 0;
    font-size: 13px;
    color: #555555 !important;
    text-decoration: none !important;
}

/* 9. Responsive Breakpoints */
@media (max-width: 991.98px) {
    .hamburger-menu-btn {
        display: inline-flex !important;
        margin-right: 10px;
    }
    .luxury-desktop-nav-wrap {
        display: none !important;
    }
    .navbar-header-row {
        min-height: 60px;
    }
    .header-logo-img {
        max-height: 40px;
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var menuBtn = document.getElementById('menuToggleBtn');
    var closeBtn = document.getElementById('closeSidebarBtn');
    var sidebar = document.getElementById('leftSidebarDrawer');
    var backdrop = document.getElementById('sidebarBackdrop');

    var searchBtn = document.getElementById('searchToggleBtn');
    var searchOverlay = document.getElementById('searchOverlay');

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

    if (searchBtn && searchOverlay) {
        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (searchOverlay.style.display === 'none' || searchOverlay.style.display === '') {
                searchOverlay.style.display = 'block';
            } else {
                searchOverlay.style.display = 'none';
            }
        });
    }

    // Mobile Sidebar submenus
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