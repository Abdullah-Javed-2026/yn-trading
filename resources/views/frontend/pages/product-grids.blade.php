@extends('frontend.layouts.master')

@section('title', 'Collections & Catalog || YN Trading')

@section('main-content')
    <!-- Main Collection Page Container -->
    <div class="product-collection-page">
        <div class="container-fluid px-lg-5 px-3">
            
            <!-- Breadcrumb Trail -->
            <nav aria-label="breadcrumb" class="collection-breadcrumb-nav">
                <ol class="breadcrumb luxury-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="ti-home mr-1"></i>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product-grids')}}">Collections</a></li>
                    @if(!empty($_GET['category']))
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ ucwords(str_replace(['-', ','], [' ', ' & '], is_array($_GET['category']) ? implode(', ', $_GET['category']) : $_GET['category'])) }}
                        </li>
                    @elseif(!empty($_GET['brand']))
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ ucwords(str_replace(['-', ','], [' ', ' & '], is_array($_GET['brand']) ? implode(', ', $_GET['brand']) : $_GET['brand'])) }}
                        </li>
                    @elseif(!empty(request()->search))
                        <li class="breadcrumb-item active" aria-current="page">
                            Search: "{{ request()->search }}"
                        </li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">All Products</li>
                    @endif
                </ol>
            </nav>

            <!-- Luxury Page Hero Banner Header -->
            <div class="collection-hero-header">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-7 mb-3 mb-md-0">
                        <span class="collection-badge-tag">YN TRADING ATELIER</span>
                        <h1 class="collection-main-title">
                            @if(!empty($_GET['category']))
                                {{ ucwords(str_replace(['-', ','], [' ', ' & '], is_array($_GET['category']) ? implode(', ', $_GET['category']) : $_GET['category'])) }}
                            @elseif(!empty($_GET['brand']))
                                {{ ucwords(str_replace(['-', ','], [' ', ' & '], is_array($_GET['brand']) ? implode(', ', $_GET['brand']) : $_GET['brand'])) }}
                            @elseif(!empty(request()->search))
                                Results for "{{ request()->search }}"
                            @else
                                Curated Luxury Collections
                            @endif
                        </h1>
                        <p class="collection-sub-text">
                            Discover authentic 100% original designer wear, unstitched luxury lawn, handcrafted festive formals & ready-to-wear pret.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-5 text-md-right">
                        <div class="collection-stats-card">
                            <span class="stats-label">Total Catalog</span>
                            <span class="stats-count">
                                @if($products instanceof \Illuminate\Pagination\AbstractPaginator)
                                    {{ $products->total() }} Products
                                @else
                                    {{ count($products) }} Products
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modern Filter & Sort Control Toolbar -->
            <form action="{{route('shop.filter')}}" method="POST" id="collectionFilterForm">
                @csrf
                <div class="collection-control-bar">
                    <div class="row align-items-center">
                        
                        <!-- Left Controls: Category & Brand Dropdowns -->
                        <div class="col-lg-7 col-md-12 mb-3 mb-lg-0">
                            <div class="filter-controls-group d-flex flex-wrap align-items-center">
                                
                                <!-- Category Select Pill -->
                                <div class="filter-select-wrapper mr-lg-3 mr-2 mb-2 mb-sm-0">
                                    <label class="filter-select-label">
                                        <i class="ti-view-grid mr-1"></i> Category
                                    </label>
                                    <div class="custom-select-box">
                                        <select name="category[]" class="luxury-form-select" onchange="document.getElementById('collectionFilterForm').submit();">
                                            <option value="">All Categories</option>
                                            @php
                                                $menu = App\Models\Category::getAllParentWithChild();
                                                $currentCat = request()->get('category');
                                            @endphp
                                            @if($menu)
                                                @foreach($menu as $cat_info)
                                                    <option value="{{$cat_info->slug}}" @if(!empty($currentCat) && (is_array($currentCat) ? in_array($cat_info->slug, $currentCat) : $currentCat == $cat_info->slug)) selected @endif>
                                                        {{$cat_info->title}}
                                                    </option>
                                                    @if($cat_info->child_cat && $cat_info->child_cat->count() > 0)
                                                        @foreach($cat_info->child_cat as $sub_cat)
                                                            <option value="{{$sub_cat->slug}}" @if(!empty($currentCat) && (is_array($currentCat) ? in_array($sub_cat->slug, $currentCat) : $currentCat == $sub_cat->slug)) selected @endif>
                                                                &nbsp;&nbsp;↳ {{$sub_cat->title}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        <i class="ti-angle-down select-chevron"></i>
                                    </div>
                                </div>

                                <!-- Brand Select Pill -->
                                <div class="filter-select-wrapper mr-lg-3 mr-2 mb-2 mb-sm-0">
                                    <label class="filter-select-label">
                                        <i class="ti-tag mr-1"></i> Brand
                                    </label>
                                    <div class="custom-select-box">
                                        <select name="brand[]" class="luxury-form-select" onchange="document.getElementById('collectionFilterForm').submit();">
                                            <option value="">All Brands</option>
                                            @php
                                                $brands = DB::table('brands')->orderBy('title','ASC')->where('status','active')->get();
                                                $currentBrand = request()->get('brand');
                                            @endphp
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->slug}}" @if(!empty($currentBrand) && (is_array($currentBrand) ? in_array($brand->slug, $currentBrand) : $currentBrand == $brand->slug)) selected @endif>
                                                    {{$brand->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <i class="ti-angle-down select-chevron"></i>
                                    </div>
                                </div>

                                <!-- Clear Filters Button (Shows only if active filters exist) -->
                                @if(!empty($_GET['category']) || !empty($_GET['brand']) || !empty($_GET['sortBy']) || !empty($_GET['show']) || !empty(request()->search))
                                    <div class="active-filter-pill-wrapper mb-2 mb-sm-0">
                                        <a href="{{route('product-grids')}}" class="clear-filters-btn" title="Reset all applied filters">
                                            <i class="ti-reload mr-1"></i> Reset Filters
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <!-- Right Controls: Sort By & Items Per Page -->
                        <div class="col-lg-5 col-md-12">
                            <div class="sort-controls-group d-flex flex-wrap align-items-center justify-content-lg-end">
                                
                                <!-- Sort By Select -->
                                <div class="filter-select-wrapper mr-lg-3 mr-2 mb-2 mb-sm-0">
                                    <label class="filter-select-label">
                                        <i class="ti-exchange-vertical mr-1"></i> Sort By
                                    </label>
                                    <div class="custom-select-box">
                                        <select class="luxury-form-select" name="sortBy" onchange="document.getElementById('collectionFilterForm').submit();">
                                            <option value="">Latest Arrivals</option>
                                            <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>Price: Low to High</option>
                                            <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Product Name (A-Z)</option>
                                        </select>
                                        <i class="ti-angle-down select-chevron"></i>
                                    </div>
                                </div>

                                <!-- Show Count Select -->
                                <div class="filter-select-wrapper mb-2 mb-sm-0">
                                    <label class="filter-select-label">
                                        <i class="ti-layout-grid2 mr-1"></i> Show
                                    </label>
                                    <div class="custom-select-box show-count-box">
                                        <select class="luxury-form-select" name="show" onchange="document.getElementById('collectionFilterForm').submit();">
                                            <option value="9" @if(empty($_GET['show']) || $_GET['show']=='9') selected @endif>09 Items</option>
                                            <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15 Items</option>
                                            <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21 Items</option>
                                            <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30 Items</option>
                                        </select>
                                        <i class="ti-angle-down select-chevron"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>

            <!-- Products 3:4 Luxury Grid Section -->
            <div class="product-grid-wrapper">
                @if(count($products) > 0)
                    <!-- Explicit 4-column desktop, 3-column tablet, 2-column mobile Bootstrap Grid -->
                    <div class="row product-cards-grid">
                        @foreach($products as $product)
                            @php
                                $photo = explode(',', $product->photo);
                                $primaryImg = $photo[0] ?? asset('frontend/img/default-product.jpg');
                                $hoverImg = $photo[1] ?? $primaryImg;
                                $after_discount = ($product->price - ($product->price * $product->discount) / 100);
                                $categoryName = $product->cat_info->title ?? 'YN Couture';
                                $brandName = $product->brand->title ?? '';
                            @endphp
                            
                            <div class="col-xl-3 col-lg-3 col-md-4 col-6 px-2 mb-4">
                                <div class="luxury-product-grid-card">
                                    
                                    <!-- 3:4 Portrait Image Container with Dual-Image Swap -->
                                    <div class="product-media-wrap">
                                        <a href="{{route('product-detail', $product->slug)}}" class="product-image-link">
                                            <img class="main-portrait-img" src="{{$primaryImg}}" alt="{{$product->title}}" loading="lazy">
                                            <img class="hover-portrait-img" src="{{$hoverImg}}" alt="{{$product->title}}" loading="lazy">
                                        </a>

                                        <!-- Top Left Badges -->
                                        <div class="product-badge-group">
                                            @if($product->discount)
                                                <span class="luxury-badge discount-badge">-{{$product->discount}}%</span>
                                            @elseif($product->condition == 'new')
                                                <span class="luxury-badge new-badge">NEW</span>
                                            @elseif($product->condition == 'hot')
                                                <span class="luxury-badge hot-badge">HOT</span>
                                            @endif
                                        </div>

                                        <!-- Top Right Floating Wishlist Button -->
                                        <a href="{{route('add-to-wishlist', $product->slug)}}" class="product-wishlist-action-btn" title="Add to Wishlist" data-id="{{$product->id}}">
                                            <i class="ti-heart"></i>
                                        </a>

                                        <!-- Desktop Hover Action Overlay -->
                                        <div class="product-hover-action-bar d-none d-md-flex">
                                            <a href="{{route('add-to-cart', $product->slug)}}" class="hover-action-btn quick-cart-btn" title="Quick Add to Bag">
                                                <i class="ti-bag mr-1"></i> Add to Cart
                                            </a>
                                            <button type="button" class="hover-action-btn quick-view-btn" data-toggle="modal" data-target="#quickview-modal-{{$product->id}}" title="Quick View Product">
                                                <i class="ti-eye"></i>
                                            </button>
                                        </div>

                                        <!-- Mobile 1-Tap Quick Action (Floating Bag Button) -->
                                        <a href="{{route('add-to-cart', $product->slug)}}" class="mobile-quick-add-btn d-flex d-md-none" title="Add to Cart">
                                            <i class="ti-bag"></i>
                                        </a>
                                    </div>

                                    <!-- Product Content Details -->
                                    <div class="product-meta-details">
                                        <!-- Micro Meta Tag (Brand or Category) -->
                                        <div class="product-brand-tag">
                                            @if(!empty($brandName))
                                                <span>{{$brandName}}</span>
                                            @else
                                                <span>{{$categoryName}}</span>
                                            @endif
                                        </div>

                                        <!-- Title with 2-line clamp -->
                                        <h3 class="product-heading-title">
                                            <a href="{{route('product-detail', $product->slug)}}" title="{{$product->title}}">
                                                {{$product->title}}
                                            </a>
                                        </h3>

                                        <!-- Price Section -->
                                        <div class="product-price-row d-flex align-items-center flex-wrap">
                                            <span class="current-price-val">PKR {{number_format($after_discount, 0)}}</span>
                                            @if($product->discount)
                                                <del class="original-price-val">PKR {{number_format($product->price, 0)}}</del>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Luxury Pagination -->
                    <div class="collection-pagination-wrap mt-4 mb-5 text-center">
                        <div class="d-flex justify-content-center">
                            @if($products instanceof \Illuminate\Pagination\AbstractPaginator)
                                {{$products->appends($_GET)->links()}}
                            @endif
                        </div>
                    </div>

                @else
                    <!-- Elegant Empty State -->
                    <div class="empty-collection-box text-center">
                        <div class="empty-icon-circle">
                            <i class="ti-search"></i>
                        </div>
                        <h2 class="empty-state-title">No Products Found</h2>
                        <p class="empty-state-desc">
                            We couldn't find any designer items matching your current filters. Try changing category or reset to view all available collections.
                        </p>
                        <a href="{{route('product-grids')}}" class="btn-explore-all">
                            <i class="ti-reload mr-2"></i> Browse All Collections
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <!-- Quick View Modals (Centered with Frosted Glass Backdrop Blur) -->
    @if(count($products) > 0)
        @foreach($products as $product)
            @php
                $photo = array_values(array_filter(array_map('trim', explode(',', $product->photo))));
                if(empty($photo)) {
                    $photo = [asset('frontend/img/default-product.jpg')];
                }
                $after_discount = ($product->price - ($product->price * $product->discount) / 100);
            @endphp
            <div class="modal fade luxury-quickview-modal" id="quickview-modal-{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        
                        <!-- Top-Right Close Button -->
                        <button type="button" class="close-quickview-btn" data-dismiss="modal" aria-label="Close" title="Close Popup">
                            <i class="ti-close"></i>
                        </button>
                        
                        <div class="modal-body p-0">
                            <div class="row no-gutters">
                                
                                <!-- Modal Left: Product Imagery Gallery -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="quickview-media-gallery">
                                        <!-- Main Large Display Image -->
                                        <div class="quickview-main-image-box">
                                            <img src="{{$photo[0]}}" id="quickview-main-img-{{$product->id}}" alt="{{$product->title}}" class="quickview-display-img">
                                            
                                            @if($product->discount)
                                                <span class="modal-badge discount-tag">-{{$product->discount}}% OFF</span>
                                            @elseif($product->condition == 'new')
                                                <span class="modal-badge new-tag">NEW</span>
                                            @endif
                                        </div>

                                        <!-- Thumbnails Strip (if multiple photos) -->
                                        @if(count($photo) > 1)
                                            <div class="quickview-thumbs-strip">
                                                @foreach($photo as $tIdx => $tImg)
                                                    <div class="quickview-thumb-item {{ $tIdx == 0 ? 'active' : '' }}" 
                                                         onclick="changeQuickviewImage('{{$product->id}}', '{{$tImg}}', this)">
                                                        <img src="{{$tImg}}" alt="Thumbnail {{$tIdx+1}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Modal Right: Product Details & Add to Cart -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="quickview-details-pane">
                                        
                                        <!-- Brand Tag & Title -->
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="quickview-brand-title">{{ $product->brand->title ?? ($product->cat_info->title ?? 'YN TRADING') }}</span>
                                            <div class="stock-status-wrap">
                                                @if($product->stock > 0)
                                                    <span class="stock-pill in-stock"><i class="fa fa-check-circle mr-1"></i> In Stock ({{$product->stock}})</span>
                                                @else
                                                    <span class="stock-pill out-of-stock"><i class="fa fa-times-circle mr-1"></i> Sold Out</span>
                                                @endif
                                            </div>
                                        </div>

                                        <h2 class="quickview-product-name">{{$product->title}}</h2>

                                        <!-- Pricing Section -->
                                        <div class="quickview-price-tag mb-3">
                                            <span class="modal-live-price">PKR {{number_format($after_discount, 0)}}</span>
                                            @if($product->discount)
                                                <del class="modal-cut-price ml-2">PKR {{number_format($product->price, 0)}}</del>
                                                <span class="modal-save-pill ml-2">Save PKR {{number_format($product->price - $after_discount, 0)}}</span>
                                            @endif
                                        </div>

                                        <!-- Summary / Description -->
                                        @if(!empty($product->summary))
                                            <div class="quickview-desc-text mb-3">
                                                <p>{!! strip_tags(html_entity_decode($product->summary)) !!}</p>
                                            </div>
                                        @endif

                                        <!-- Add to Cart Form -->
                                        <form action="{{route('single-add-to-cart')}}" method="POST" class="quickview-action-form">
                                            @csrf
                                            <input type="hidden" name="slug" value="{{$product->slug}}">

                                            <!-- Size Selector -->
                                            @if($product->size)
                                                @php
                                                    $sizes = array_values(array_filter(array_map('trim', explode(',', $product->size))));
                                                @endphp
                                                @if(!empty($sizes))
                                                    <div class="quickview-size-box mb-3">
                                                        <label class="quickview-label">Select Size:</label>
                                                        <div class="size-options-row d-flex flex-wrap">
                                                            @foreach($sizes as $sIdx => $sizeVal)
                                                                <label class="size-pill-option">
                                                                    <input type="radio" name="size" value="{{$sizeVal}}" @if($sIdx == 0) checked @endif>
                                                                    <span class="size-pill-badge">{{$sizeVal}}</span>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif

                                            <!-- Quantity Stepper & Add to Bag Button -->
                                            <div class="quickview-actions-row d-flex align-items-center mb-3">
                                                <div class="qty-stepper-box mr-3">
                                                    <button type="button" class="stepper-btn" onclick="let q = this.nextElementSibling; if(parseInt(q.value) > 1) q.value = parseInt(q.value) - 1;">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                    <input type="number" name="quant[1]" class="stepper-input" min="1" max="100" value="1">
                                                    <button type="button" class="stepper-btn" onclick="let q = this.previousElementSibling; q.value = parseInt(q.value) + 1;">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div>

                                                <button type="submit" class="btn-quick-add-bag flex-grow-1">
                                                    <i class="ti-bag mr-2"></i> Add To Bag
                                                </button>
                                            </div>

                                            <div class="quickview-footer-links d-flex align-items-center justify-content-between pt-2 border-top">
                                                <a href="{{route('product-detail', $product->slug)}}" class="modal-view-detail-btn">
                                                    Full Product Details <i class="ti-arrow-right ml-1"></i>
                                                </a>
                                                <a href="{{route('add-to-wishlist', $product->slug)}}" class="modal-add-wishlist-btn">
                                                    <i class="ti-heart mr-1"></i> Wishlist
                                                </a>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection

@push('styles')
<style>
/* ==========================================================
   YN TRADING LUXURY COLLECTION & MODAL ARCHITECTURE
   ========================================================== */

/* 1. Main Page Section & Top Clearance */
.product-collection-page {
    background-color: #fafafa !important;
    padding-top: 35px !important;
    padding-bottom: 70px !important;
    min-height: 80vh;
    font-family: 'Montserrat', sans-serif !important;
}

@media (max-width: 991.98px) {
    .product-collection-page {
        padding-top: 25px !important;
        padding-bottom: 50px !important;
    }
}

/* 2. Breadcrumbs */
.collection-breadcrumb-nav {
    margin-bottom: 18px;
}
.luxury-breadcrumb {
    background: transparent !important;
    padding: 0 !important;
    margin: 0 !important;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}
.luxury-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    color: #aaaaaa;
    padding: 0 8px;
}
.luxury-breadcrumb .breadcrumb-item a {
    color: #666666;
    text-decoration: none;
    transition: color 0.2s ease;
}
.luxury-breadcrumb .breadcrumb-item a:hover {
    color: #000000;
}
.luxury-breadcrumb .breadcrumb-item.active {
    color: #111111;
    font-weight: 700;
}

/* 3. Hero Header Banner */
.collection-hero-header {
    background: #ffffff;
    border: 1px solid #eeeeee;
    border-radius: 12px;
    padding: 28px 32px;
    margin-bottom: 25px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
}
.collection-badge-tag {
    display: inline-block;
    font-size: 10.5px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #111111;
    background: #f4f4f5;
    padding: 3px 12px;
    border-radius: 50px;
    margin-bottom: 10px;
}
.collection-main-title {
    font-size: 26px !important;
    font-weight: 800 !important;
    color: #111111 !important;
    letter-spacing: -0.3px;
    text-transform: uppercase;
    margin-bottom: 8px !important;
    line-height: 1.2 !important;
}
.collection-sub-text {
    font-size: 13.5px;
    color: #666666;
    max-width: 650px;
    margin-bottom: 0;
    line-height: 1.5;
}
.collection-stats-card {
    display: inline-block;
    background: #111111;
    color: #ffffff;
    padding: 12px 22px;
    border-radius: 10px;
    text-align: right;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
}
.collection-stats-card .stats-label {
    display: block;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255, 255, 255, 0.6);
}
.collection-stats-card .stats-count {
    display: block;
    font-size: 16px;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: 0.5px;
}

@media (max-width: 767.98px) {
    .collection-hero-header {
        padding: 20px;
    }
    .collection-main-title {
        font-size: 20px !important;
    }
    .collection-stats-card {
        text-align: left;
        display: block;
        margin-top: 12px;
        padding: 10px 16px;
    }
}

/* 4. Luxury Filter & Sort Control Toolbar */
.collection-control-bar {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 14px 22px;
    margin-bottom: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
}
.filter-select-wrapper {
    display: flex;
    align-items: center;
    gap: 8px;
}
.filter-select-label {
    font-size: 11.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #333333;
    margin: 0;
    white-space: nowrap;
}
.custom-select-box {
    position: relative;
    display: inline-block;
}
.luxury-form-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: #f9f9fa;
    border: 1.5px solid #e0e0e0;
    border-radius: 8px;
    padding: 7px 32px 7px 12px;
    font-size: 12.5px;
    font-weight: 600;
    color: #111111;
    cursor: pointer;
    min-width: 140px;
    height: 38px;
    outline: none;
    transition: all 0.2s ease;
}
.luxury-form-select:hover,
.luxury-form-select:focus {
    border-color: #111111;
    background: #ffffff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}
.show-count-box .luxury-form-select {
    min-width: 110px;
}
.select-chevron {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 10px;
    color: #666666;
    pointer-events: none;
}
.clear-filters-btn {
    display: inline-flex;
    align-items: center;
    background: #fef2f2;
    color: #dc2626 !important;
    border: 1px solid #fecaca;
    padding: 7px 14px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none !important;
    transition: all 0.2s ease;
    height: 38px;
}
.clear-filters-btn:hover {
    background: #dc2626;
    color: #ffffff !important;
    border-color: #dc2626;
}

@media (max-width: 991.98px) {
    .collection-control-bar {
        padding: 14px;
    }
    .filter-select-wrapper {
        flex: 1 1 calc(50% - 10px);
        margin-right: 0 !important;
    }
    .filter-select-wrapper .custom-select-box {
        width: 100%;
    }
    .luxury-form-select {
        width: 100%;
        min-width: unset;
    }
}

/* 5. 3:4 Portrait Luxury Product Grid Cards */
.product-cards-grid {
    margin-left: -8px;
    margin-right: -8px;
}
.luxury-product-grid-card {
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    border: 1px solid #eeeeee;
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
}
.luxury-product-grid-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
    border-color: #dddddd;
}

/* 3:4 Media Box with Fixed Proportions across all products */
.product-media-wrap {
    position: relative;
    width: 100%;
    aspect-ratio: 3 / 4;
    height: 360px;
    max-height: 360px;
    background-color: #f5f5f5;
    overflow: hidden;
}

@media (max-width: 1199.98px) {
    .product-media-wrap {
        height: 320px;
        max-height: 320px;
    }
}
@media (max-width: 991.98px) {
    .product-media-wrap {
        height: 300px;
        max-height: 300px;
    }
}
@media (max-width: 575.98px) {
    .product-media-wrap {
        height: 240px;
        max-height: 240px;
    }
}

.product-image-link {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
}
.main-portrait-img,
.hover-portrait-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    position: absolute;
    top: 0;
    left: 0;
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease;
}
.hover-portrait-img {
    opacity: 0;
}
.luxury-product-grid-card:hover .main-portrait-img {
    transform: scale(1.05);
}
.luxury-product-grid-card:hover .hover-portrait-img {
    opacity: 1;
    transform: scale(1.05);
}

/* Badges */
.product-badge-group {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 5;
}
.luxury-badge {
    display: inline-block;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    padding: 4px 9px;
    border-radius: 4px;
    line-height: 1;
}
.discount-badge {
    background: #e53935;
    color: #ffffff;
    box-shadow: 0 2px 8px rgba(229, 57, 53, 0.4);
}
.new-badge {
    background: #111111;
    color: #ffffff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}
.hot-badge {
    background: #d97706;
    color: #ffffff;
}

/* Wishlist Top-Right Button */
.product-wishlist-action-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 34px;
    height: 34px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(4px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #111111 !important;
    font-size: 14px;
    z-index: 6;
    border: 1px solid rgba(0, 0, 0, 0.08);
    transition: all 0.25s ease;
    text-decoration: none !important;
}
.product-wishlist-action-btn:hover {
    background: #ffffff;
    color: #e53935 !important;
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Desktop Hover Action Overlay */
.product-hover-action-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 12px;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 100%);
    display: flex;
    align-items: center;
    gap: 8px;
    transform: translateY(100%);
    opacity: 0;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    z-index: 7;
}
.luxury-product-grid-card:hover .product-hover-action-bar {
    transform: translateY(0);
    opacity: 1;
}
.hover-action-btn {
    height: 38px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none !important;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
}
.quick-cart-btn {
    flex-grow: 1;
    background: #ffffff;
    color: #111111 !important;
}
.quick-cart-btn:hover {
    background: #111111;
    color: #ffffff !important;
}
.quick-view-btn {
    width: 38px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(6px);
    color: #ffffff !important;
}
.quick-view-btn:hover {
    background: #ffffff;
    color: #111111 !important;
}

/* Mobile 1-Tap Quick Action */
.mobile-quick-add-btn {
    position: absolute;
    bottom: 8px;
    right: 8px;
    width: 32px;
    height: 32px;
    background: #111111;
    color: #ffffff !important;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    z-index: 6;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    text-decoration: none !important;
}

/* Card Content Details */
.product-meta-details {
    padding: 14px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
@media (max-width: 575.98px) {
    .product-meta-details {
        padding: 10px;
    }
}
.product-brand-tag {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: #888888;
    margin-bottom: 4px;
}
.product-heading-title {
    font-size: 13.5px !important;
    font-weight: 600 !important;
    line-height: 1.35 !important;
    margin-bottom: 8px !important;
    min-height: 36px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
@media (max-width: 575.98px) {
    .product-heading-title {
        font-size: 12px !important;
        min-height: 32px;
    }
}
.product-heading-title a {
    color: #111111 !important;
    text-decoration: none !important;
    transition: color 0.2s ease;
}
.product-heading-title a:hover {
    color: #e53935 !important;
}
.product-price-row {
    margin-top: auto;
    padding-top: 4px;
    gap: 6px;
}
.current-price-val {
    font-size: 14.5px;
    font-weight: 800;
    color: #111111;
}
@media (max-width: 575.98px) {
    .current-price-val {
        font-size: 13px;
    }
}
.original-price-val {
    font-size: 12px;
    color: #999999;
}

/* 6. Empty State */
.empty-collection-box {
    background: #ffffff;
    border: 1px solid #eeeeee;
    border-radius: 16px;
    padding: 60px 20px;
    max-width: 600px;
    margin: 40px auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
}
.empty-icon-circle {
    width: 70px;
    height: 70px;
    background: #f4f4f5;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: #555555;
    margin-bottom: 20px;
}
.empty-state-title {
    font-size: 22px !important;
    font-weight: 800 !important;
    color: #111111;
    margin-bottom: 10px;
    text-transform: uppercase;
}
.empty-state-desc {
    font-size: 14px;
    color: #666666;
    margin-bottom: 25px;
    line-height: 1.6;
}
.btn-explore-all {
    display: inline-flex;
    align-items: center;
    background: #111111;
    color: #ffffff !important;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 12px 28px;
    border-radius: 50px;
    text-decoration: none !important;
    transition: all 0.25s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}
.btn-explore-all:hover {
    background: #333333;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

/* 7. Pagination Styling */
.collection-pagination-wrap .pagination {
    display: inline-flex;
    gap: 6px;
    list-style: none;
    padding: 0;
    margin: 0;
}
.collection-pagination-wrap .page-item .page-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 38px;
    height: 38px;
    padding: 0 12px;
    font-size: 13px;
    font-weight: 700;
    border-radius: 8px !important;
    border: 1px solid #e0e0e0 !important;
    background: #ffffff !important;
    color: #111111 !important;
    transition: all 0.2s ease;
}
.collection-pagination-wrap .page-item.active .page-link {
    background: #000000 !important;
    border-color: #000000 !important;
    color: #ffffff !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
}
.collection-pagination-wrap .page-item .page-link:hover {
    background: #f4f4f5 !important;
    border-color: #000000 !important;
    color: #000000 !important;
}

/* ==========================================================
   8. LUXURY QUICK VIEW POPUP & FROSTED GLASS BACKDROP
   ========================================================== */

/* Prevent page background scrolling when modal is open */
body.modal-open {
    overflow: hidden !important;
    padding-right: 0 !important;
}

/* High Z-Index Frosted Glass Backdrop (Blurs Everything Behind) */
.modal-backdrop {
    z-index: 100005 !important;
    background-color: rgba(0, 0, 0, 0.72) !important;
    backdrop-filter: blur(12px) !important;
    -webkit-backdrop-filter: blur(12px) !important;
    transition: opacity 0.3s ease !important;
}
.modal-backdrop.show {
    opacity: 1 !important;
}

/* Modal Window Container (Centered above Backdrop and Fixed Navbar) */
.modal.luxury-quickview-modal {
    z-index: 100010 !important;
    padding-right: 0 !important;
}

.luxury-quickview-modal .modal-dialog {
    max-width: 900px;
    margin: 1.75rem auto;
    display: flex;
    align-items: center;
    min-height: calc(100% - 3.5rem);
}

@media (max-width: 991.98px) {
    .luxury-quickview-modal .modal-dialog {
        max-width: 95vw;
        margin: 1rem auto;
        min-height: calc(100% - 2rem);
    }
}

/* Modal Content Card (Crystal Clear White, Crisp, No Internal Blur) */
.luxury-quickview-modal .modal-content {
    background: #ffffff !important;
    border-radius: 18px !important;
    overflow: hidden !important;
    border: none !important;
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.6) !important;
    position: relative !important;
    animation: modalPopIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

@keyframes modalPopIn {
    0% {
        opacity: 0;
        transform: scale(0.92) translateY(20px);
    }
    100% {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

/* Top-Right Circular Close Button */
.close-quickview-btn {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 36px;
    height: 36px;
    background: #ffffff;
    border: 1px solid #e5e5e5;
    border-radius: 50%;
    z-index: 20;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    color: #111111;
    cursor: pointer;
    transition: all 0.2s ease;
    outline: none !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}
.close-quickview-btn:hover {
    background: #111111;
    color: #ffffff;
    border-color: #111111;
    transform: scale(1.08);
}

/* Left Media Gallery */
.quickview-media-gallery {
    background: #f8f8f8;
    height: 100%;
    min-height: 480px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    padding: 15px;
}
.quickview-main-image-box {
    position: relative;
    width: 100%;
    height: 380px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-radius: 12px;
    background: #ffffff;
}
.quickview-display-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    transition: opacity 0.25s ease;
}
.modal-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 5px 10px;
    border-radius: 4px;
    z-index: 2;
}
.modal-badge.discount-tag {
    background: #e53935;
    color: #ffffff;
}
.modal-badge.new-tag {
    background: #111111;
    color: #ffffff;
}

/* Thumbnails Strip */
.quickview-thumbs-strip {
    display: flex;
    gap: 8px;
    overflow-x: auto;
    padding-top: 12px;
}
.quickview-thumb-item {
    width: 58px;
    height: 68px;
    border-radius: 6px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    transition: all 0.2s ease;
    flex-shrink: 0;
    background: #ffffff;
}
.quickview-thumb-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.quickview-thumb-item:hover,
.quickview-thumb-item.active {
    border-color: #111111;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

/* Right Details Pane */
.quickview-details-pane {
    padding: 35px 30px 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
}
@media (max-width: 575.98px) {
    .quickview-details-pane {
        padding: 20px;
    }
}
.quickview-brand-title {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #888888;
}
.stock-pill {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 3px 8px;
    border-radius: 4px;
}
.stock-pill.in-stock {
    background: #dcfce7;
    color: #15803d;
}
.stock-pill.out-of-stock {
    background: #fee2e2;
    color: #b91c1c;
}
.quickview-product-name {
    font-size: 22px !important;
    font-weight: 800 !important;
    color: #111111 !important;
    margin-top: 4px;
    margin-bottom: 12px !important;
    line-height: 1.3 !important;
}
.quickview-price-tag {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}
.modal-live-price {
    font-size: 22px;
    font-weight: 800;
    color: #111111;
}
.modal-cut-price {
    font-size: 14px;
    color: #999999;
}
.modal-save-pill {
    background: #fef2f2;
    color: #dc2626;
    border: 1px solid #fecaca;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 4px;
}
.quickview-desc-text p {
    font-size: 13px;
    color: #666666;
    line-height: 1.6;
    margin-bottom: 0;
    max-height: 70px;
    overflow-y: auto;
}

/* Size Options */
.quickview-label {
    font-size: 11.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #111111;
    margin-bottom: 6px;
    display: block;
}
.size-pill-option {
    margin-right: 8px;
    margin-bottom: 6px;
    cursor: pointer;
}
.size-pill-option input {
    display: none;
}
.size-pill-badge {
    display: inline-block;
    padding: 6px 14px;
    font-size: 12px;
    font-weight: 700;
    border: 1.5px solid #e0e0e0;
    border-radius: 6px;
    background: #ffffff;
    color: #111111;
    transition: all 0.2s ease;
}
.size-pill-option input:checked + .size-pill-badge {
    border-color: #111111;
    background: #111111;
    color: #ffffff;
}

/* Quantity Stepper & Buttons */
.qty-stepper-box {
    display: inline-flex;
    align-items: center;
    border: 1.5px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
    height: 44px;
}
.stepper-btn {
    width: 38px;
    height: 100%;
    background: #f8f8f8;
    border: none;
    font-size: 12px;
    color: #111111;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s ease;
}
.stepper-btn:hover {
    background: #e5e5e5;
}
.stepper-input {
    width: 44px;
    height: 100%;
    text-align: center;
    border: none;
    font-size: 14px;
    font-weight: 700;
    color: #111111;
    outline: none;
    background: #ffffff;
}
.btn-quick-add-bag {
    background: #111111;
    color: #ffffff !important;
    border: none;
    border-radius: 8px;
    height: 44px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
    cursor: pointer;
}
.btn-quick-add-bag:hover {
    background: #333333;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}
.modal-view-detail-btn,
.modal-add-wishlist-btn {
    font-size: 12px;
    font-weight: 700;
    color: #111111;
    text-decoration: none !important;
    transition: color 0.2s ease;
}
.modal-view-detail-btn:hover,
.modal-add-wishlist-btn:hover {
    color: #e53935;
}
</style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        // Interactive Image Switcher inside Quick View Modal
        function changeQuickviewImage(productId, newImgSrc, thumbElement) {
            var mainImg = document.getElementById('quickview-main-img-' + productId);
            if (mainImg) {
                mainImg.style.opacity = '0.4';
                setTimeout(function() {
                    mainImg.src = newImgSrc;
                    mainImg.style.opacity = '1';
                }, 150);
            }
            // Update active state on clicked thumbnail
            var parent = thumbElement.parentElement;
            if (parent) {
                var thumbs = parent.querySelectorAll('.quickview-thumb-item');
                thumbs.forEach(function(el) {
                    el.classList.remove('active');
                });
                thumbElement.classList.add('active');
            }
        }

        // Clean Bootstrap Modal Scroll Lock Handlers
        $(document).ready(function() {
            $('.luxury-quickview-modal').on('show.bs.modal', function() {
                $('body').addClass('modal-open');
            });
            $('.luxury-quickview-modal').on('hidden.bs.modal', function() {
                if ($('.modal.show').length === 0) {
                    $('body').removeClass('modal-open');
                }
            });
        });
    </script>
@endpush
