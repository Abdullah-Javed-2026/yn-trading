<header class="header shop custom-header">
    <!-- Top Announcement Bar -->
    <div class="top-announcement-bar">
        <div class="announcement-ticker-wrap">
            <div class="announcement-ticker">
                <span>YN Trading Azadi Sale is LIVE | Up to 50% OFF – Shop Now!</span>
                <span>YN Trading Azadi Sale is LIVE | Up to 50% OFF – Shop Now!</span>
                <span>YN Trading Azadi Sale is LIVE | Up to 50% OFF – Shop Now!</span>
                <span>YN Trading Azadi Sale is LIVE | Up to 50% OFF – Shop Now!</span>
                <span>YN Trading Azadi Sale is LIVE | Up to 50% OFF – Shop Now!</span>
                <span>YN Trading Azadi Sale is LIVE | Up to 50% OFF – Shop Now!</span>
            </div>
        </div>
    </div>
    

    <!-- Main Minimalist Navbar -->
    <div class="main-navbar-bar">
        <div class="container-fluid custom-nav-container">
            <div class="d-flex align-items-center justify-content-between py-2 px-4 border-bottom">
                
                <!-- Left: Hamburger Menu Icon -->
                <div class="nav-left-item">
                    <button class="hamburger-menu-btn" type="button" id="menuToggleBtn" title="Open Sidebar Menu">
                        <i class="ti-menu"></i>
                    </button>
                </div>

                <!-- Center: Logo -->
                <div class="nav-center-logo text-center">
                    @php
                        $settings=DB::table('settings')->get();
                    @endphp                    
                    <a href="{{route('home')}}" class="logo-link">
                        <img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo" style="max-height: 45px;">
                    </a>
                </div>

                <!-- Right: Action Icons (User, Search, Cart) -->
                <div class="nav-right-icons d-flex align-items-center">
                    <!-- User Icon -->
                    <div class="icon-item user-wrap mr-3">
                        @auth
                            @if(Auth::user()->role=='admin')
                                <a href="{{route('admin')}}" title="Dashboard" class="action-icon-link"><i class="ti-user"></i></a>
                            @else
                                <a href="{{route('user')}}" title="Account" class="action-icon-link"><i class="ti-user"></i></a>
                            @endif
                        @else
                            <a href="{{route('login.form')}}" title="Login / Register" class="action-icon-link"><i class="ti-user"></i></a>
                        @endauth
                    </div>

                    <!-- Search Icon -->
                    <div class="icon-item search-wrap mr-3">
                        <button class="action-icon-btn" id="searchToggleBtn" type="button" title="Search">
                            <i class="ti-search"></i>
                        </button>
                    </div>

                    <!-- Shopping Cart / Bag Icon -->
                    <div class="icon-item cart-wrap sinlge-bar shopping">
                        <a href="{{route('cart')}}" class="single-icon action-icon-link" title="Shopping Bag">
                            <i class="ti-bag"></i>
                            <span class="total-count">{{Helper::cartCount()}}</span>
                        </a>
                        <!-- Shopping Cart Item Dropdown -->
                        @auth
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{count(Helper::getAllProductFromCart())}} Items</span>
                                    <a href="{{route('cart')}}">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                    @foreach(Helper::getAllProductFromCart() as $data)
                                        @php
                                            $photo=explode(',',$data->product['photo']);
                                        @endphp
                                        <li>
                                            <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                            <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                            <p class="quantity">{{$data->quantity}} x - <span class="amount">Rs. {{number_format($data->price,0)}}</span></p>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">Rs. {{number_format(Helper::totalCartPrice(),0)}}</span>
                                    </div>
                                    <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>

            </div>

            <!-- Search Dropdown Overlay -->
            <div class="header-search-overlay" id="searchOverlay" style="display: none;">
                <div class="container py-3">
                    <form method="POST" action="{{route('product.search')}}" class="d-flex align-items-center justify-content-center">
                        @csrf
                        <div class="search-bar-pill d-flex align-items-stretch" style="max-width: 650px; width: 100%; border: 1px solid #111111; border-radius: 30px; overflow: hidden; background: #ffffff; height: 46px;">
                            <input name="search" placeholder="Search Products Here....." type="search" class="form-control" style="border: none !important; box-shadow: none !important; border-radius: 30px 0 0 30px !important; padding: 0 20px !important; height: 100% !important; background: transparent; font-size: 14px; color: #111111;">
                            <button class="btn btn-dark" type="submit" style="border: none !important; border-radius: 0 30px 30px 0 !important; padding: 0 28px !important; height: 100% !important; background: #000000 !important; color: #ffffff !important; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; white-space: nowrap;">
                                <i class="ti-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Left Sidebar Drawer Overlay -->
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<!-- Left Sidebar Drawer -->
<aside class="left-sidebar-drawer" id="leftSidebarDrawer">
    <!-- Header with Close Button -->
    <div class="sidebar-header d-flex justify-content-end align-items-center">
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

            <!-- Dynamic Categories -->
            @foreach(Helper::getAllCategory() as $cat)
                @if($cat->child_cat && $cat->child_cat->count() > 0)
                    <li class="sidebar-item has-sub">
                        <div class="sidebar-link-wrap d-flex justify-content-between align-items-center">
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
                <a href="{{route('about-us')}}" class="sidebar-link">About Us</a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('blog')}}" class="sidebar-link">Blog</a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('contact')}}" class="sidebar-link">Contact Us</a>
            </li>
        </ul>
    </div>
</aside>

<style>
/* Top Announcement Ticker Bar */
.top-announcement-bar {
    background-color: #000000;
    color: #ffffff;
    padding: 8px 0;
    overflow: hidden;
    white-space: nowrap;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.announcement-ticker-wrap {
    width: 100%;
    overflow: hidden;
}

.announcement-ticker {
    display: inline-block;
    white-space: nowrap;
    animation: announcement-scroll 30s linear infinite;
}

.announcement-ticker span {
    display: inline-block;
    padding-right: 60px;
}

@keyframes announcement-scroll {
    0% {
        transform: translate3d(0, 0, 0);
    }
    100% {
        transform: translate3d(-50%, 0, 0);
    }
}

.main-navbar-bar {
    background-color: #ffffff;
    position: relative;
    z-index: 99;
}

.hamburger-menu-btn {
    background: transparent;
    border: none;
    font-size: 24px;
    color: #000000;
    cursor: pointer;
    outline: none !important;
    padding: 5px 8px;
    line-height: 1;
}

.hamburger-menu-btn:hover {
    color: #f7941d;
}

.action-icon-link, .action-icon-btn {
    background: transparent;
    border: none;
    font-size: 22px;
    color: #000000 !important;
    cursor: pointer;
    outline: none !important;
    padding: 5px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none !important;
    line-height: 1;
}

.action-icon-link:hover, .action-icon-btn:hover {
    color: #f7941d !important;
}

.nav-right-icons .cart-wrap {
    position: relative;
}

.header-search-overlay {
    background-color: #f8f9fa;
    border-bottom: 1px solid #e2e8f0;
}

/* Sidebar Backdrop Overlay */
.sidebar-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 99998;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.sidebar-backdrop.active {
    opacity: 1;
    visibility: visible;
}

/* Left Sidebar Drawer */
.left-sidebar-drawer {
    position: fixed;
    top: 0;
    left: 0;
    width: 340px;
    max-width: 85vw;
    height: 100vh;
    background-color: #ffffff;
    z-index: 99999;
    transform: translateX(-100%);
    transition: transform 0.35s cubic-bezier(0.25, 1, 0.5, 1);
    box-shadow: 4px 0 25px rgba(0, 0, 0, 0.15);
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.left-sidebar-drawer.active {
    transform: translateX(0);
}

.sidebar-header {
    border-bottom: 1px solid #f0f0f0;
    padding: 15px 20px !important;
}

.close-sidebar-btn {
    background: transparent;
    border: none;
    font-size: 28px;
    color: #333333;
    cursor: pointer;
    line-height: 1;
    outline: none !important;
    padding: 0;
}

.close-sidebar-btn:hover {
    color: #000000;
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
    border-bottom: 1px solid #f0f0f0;
}

.sidebar-link-wrap {
    padding: 0 20px;
}

.sidebar-link {
    display: block;
    padding: 16px 20px;
    font-size: 16px;
    font-weight: 400;
    color: #222222 !important;
    text-decoration: none !important;
    transition: color 0.2s ease;
}

.sidebar-link-wrap .sidebar-link {
    padding: 16px 0;
    flex: 1;
}

.sidebar-link:hover {
    color: #000000 !important;
}

.sub-toggle-icon {
    font-size: 14px;
    color: #666666;
    cursor: pointer;
    padding: 16px 0 16px 15px;
    transition: transform 0.2s ease;
}

.sidebar-item.open .sub-toggle-icon {
    transform: rotate(180deg);
}

.sidebar-sub-menu {
    list-style: none;
    margin: 0;
    padding: 0 0 10px 30px;
    display: none;
    background-color: #fafafa;
}

.sidebar-sub-menu li a {
    display: block;
    padding: 10px 0;
    font-size: 14px;
    color: #555555 !important;
    text-decoration: none !important;
}

.sidebar-sub-menu li a:hover {
    color: #000000 !important;
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
        searchBtn.addEventListener('click', function() {
            if (searchOverlay.style.display === 'none' || searchOverlay.style.display === '') {
                searchOverlay.style.display = 'block';
            } else {
                searchOverlay.style.display = 'none';
            }
        });
    }

    // Toggle sub-menus in sidebar
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