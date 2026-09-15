@extends('frontend.layouts.master')
@section('title', 'Shopping Bag || YN Trading')

@section('main-content')
    <!-- Main Cart Container -->
    <div class="luxury-cart-page">
        <div class="container-fluid px-lg-5 px-3">
            
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb" class="cart-breadcrumb-nav">
                <ol class="breadcrumb luxury-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="ti-home mr-1"></i>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product-grids')}}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Bag</li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="cart-page-header">
                <div class="row align-items-center">
                    <div class="col-md-8 col-12 mb-2 mb-md-0">
                        <span class="cart-badge-tag">YOUR SELECTION</span>
                        <h1 class="cart-main-heading">Shopping Bag</h1>
                        <p class="cart-sub-heading">Review your luxury fashion selections before proceeding to secure checkout.</p>
                    </div>
                    <div class="col-md-4 col-12 text-md-right">
                        <div class="cart-items-counter-badge">
                            <i class="ti-bag mr-1"></i> {{ Helper::cartCount() }} {{ Helper::cartCount() == 1 ? 'Item' : 'Items' }} in Bag
                        </div>
                    </div>
                </div>
            </div>

            @php
                $cartItems = Helper::getAllProductFromCart();
            @endphp

            @if(count($cartItems) > 0)
                <div class="row">
                    <!-- Left: Cart Items Table / List -->
                    <div class="col-lg-8 col-12 mb-4 mb-lg-0">
                        <div class="cart-items-card">
                            
                            <form action="{{route('cart.update')}}" method="POST" id="cartUpdateForm">
                                @csrf
                                
                                <!-- Desktop Table View -->
                                <div class="table-responsive d-none d-md-block">
                                    <table class="table luxury-cart-table mb-0">
                                        <thead>
                                            <tr>
                                                <th class="cart-th-product">Item Details</th>
                                                <th class="cart-th-price text-center">Unit Price</th>
                                                <th class="cart-th-qty text-center">Quantity</th>
                                                <th class="cart-th-total text-right">Subtotal</th>
                                                <th class="cart-th-action text-center"><i class="ti-trash"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cartItems as $key => $cart)
                                                @php
                                                    $pro = is_object($cart->product) ? $cart->product : (object)$cart->product;
                                                    $photo = explode(',', $pro->photo ?? '');
                                                    $primaryImg = $photo[0] ?? asset('frontend/img/default-product.jpg');
                                                    $title = $pro->title ?? 'YN Designer Apparel';
                                                    $slug = $pro->slug ?? '';
                                                    $price = is_object($cart) ? $cart->price : $cart['price'];
                                                    $amount = is_object($cart) ? $cart->amount : $cart['amount'];
                                                    $cartId = is_object($cart) ? $cart->id : $cart['id'];
                                                    $cartQty = is_object($cart) ? $cart->quantity : $cart['quantity'];
                                                @endphp
                                                <tr class="cart-item-row">
                                                    <!-- Product Info -->
                                                    <td class="cart-item-details">
                                                        <div class="d-flex align-items-center">
                                                            <a href="{{route('product-detail', $slug)}}" class="cart-item-thumb-link">
                                                                <img src="{{$primaryImg}}" alt="{{$title}}" class="cart-item-thumb">
                                                            </a>
                                                            <div class="cart-item-meta ml-3">
                                                                <span class="cart-item-brand">{{ $pro->brand->title ?? 'YN TRADING ATELIER' }}</span>
                                                                <h4 class="cart-item-title">
                                                                    <a href="{{route('product-detail', $slug)}}">{{$title}}</a>
                                                                </h4>
                                                                @if(!empty($cart->size))
                                                                    <span class="cart-item-variant">Size: <strong>{{$cart->size}}</strong></span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <!-- Unit Price -->
                                                    <td class="cart-item-unit-price text-center align-middle">
                                                        <span>PKR {{number_format($price, 0)}}</span>
                                                    </td>

                                                    <!-- Quantity Stepper -->
                                                    <td class="cart-item-quantity text-center align-middle">
                                                        <div class="cart-qty-stepper">
                                                            <button type="button" class="cart-qty-btn minus" onclick="let input = this.nextElementSibling; if(parseInt(input.value) > 1) { input.value = parseInt(input.value) - 1; }">
                                                                <i class="ti-minus"></i>
                                                            </button>
                                                            <input type="number" name="quant[{{$key}}]" class="cart-qty-input" min="1" max="100" value="{{$cartQty}}">
                                                            <input type="hidden" name="qty_id[{{$key}}]" value="{{$cartId}}">
                                                            <button type="button" class="cart-qty-btn plus" onclick="let input = this.previousElementSibling.previousElementSibling; input.value = parseInt(input.value) + 1;">
                                                                <i class="ti-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>

                                                    <!-- Line Total -->
                                                    <td class="cart-item-subtotal text-right align-middle">
                                                        <span class="line-total-amount">PKR {{number_format($amount, 0)}}</span>
                                                    </td>

                                                    <!-- Delete -->
                                                    <td class="cart-item-remove text-center align-middle">
                                                        <a href="{{route('cart-delete', $cartId)}}" class="cart-delete-btn" title="Remove Item">
                                                            <i class="ti-close"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Mobile List View (Cards on <= 767px) -->
                                <div class="d-block d-md-none p-3">
                                    @foreach($cartItems as $key => $cart)
                                        @php
                                            $pro = is_object($cart->product) ? $cart->product : (object)$cart->product;
                                            $photo = explode(',', $pro->photo ?? '');
                                            $primaryImg = $photo[0] ?? asset('frontend/img/default-product.jpg');
                                            $title = $pro->title ?? 'YN Designer Apparel';
                                            $slug = $pro->slug ?? '';
                                            $price = is_object($cart) ? $cart->price : $cart['price'];
                                            $amount = is_object($cart) ? $cart->amount : $cart['amount'];
                                            $cartId = is_object($cart) ? $cart->id : $cart['id'];
                                            $cartQty = is_object($cart) ? $cart->quantity : $cart['quantity'];
                                        @endphp
                                        <div class="mobile-cart-item-card mb-3 pb-3 border-bottom">
                                            <div class="d-flex">
                                                <a href="{{route('product-detail', $slug)}}" class="mobile-cart-thumb-wrap">
                                                    <img src="{{$primaryImg}}" alt="{{$title}}" class="mobile-cart-thumb">
                                                </a>
                                                <div class="mobile-cart-info ml-3 flex-grow-1">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <h4 class="mobile-cart-title mb-1">
                                                            <a href="{{route('product-detail', $slug)}}">{{$title}}</a>
                                                        </h4>
                                                        <a href="{{route('cart-delete', $cartId)}}" class="mobile-cart-del-btn text-muted" title="Remove">
                                                            <i class="ti-close"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mobile-cart-price-line mb-2">
                                                        <span class="text-muted" style="font-size: 12px;">PKR {{number_format($price, 0)}} each</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="cart-qty-stepper">
                                                            <button type="button" class="cart-qty-btn minus" onclick="let input = this.nextElementSibling; if(parseInt(input.value) > 1) { input.value = parseInt(input.value) - 1; }">
                                                                <i class="ti-minus"></i>
                                                            </button>
                                                            <input type="number" name="quant[{{$key}}]" class="cart-qty-input" min="1" max="100" value="{{$cartQty}}">
                                                            <input type="hidden" name="qty_id[{{$key}}]" value="{{$cartId}}">
                                                            <button type="button" class="cart-qty-btn plus" onclick="let input = this.previousElementSibling.previousElementSibling; input.value = parseInt(input.value) + 1;">
                                                                <i class="ti-plus"></i>
                                                            </button>
                                                        </div>
                                                        <span class="mobile-line-total">PKR {{number_format($amount, 0)}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Action Buttons Row -->
                                <div class="cart-actions-toolbar d-flex flex-wrap justify-content-between align-items-center p-3 border-top">
                                    <a href="{{route('product-grids')}}" class="btn-cart-continue">
                                        <i class="ti-arrow-left mr-2"></i> Continue Shopping
                                    </a>
                                    <button type="submit" class="btn-cart-update">
                                        <i class="ti-reload mr-2"></i> Update Shopping Bag
                                    </button>
                                </div>

                            </form>

                        </div>

                        <!-- Coupon Promo Voucher Box -->
                        <div class="cart-coupon-card mt-4">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12 mb-3 mb-md-0">
                                    <div class="d-flex align-items-center">
                                        <div class="coupon-icon-wrap mr-3">
                                            <i class="ti-ticket"></i>
                                        </div>
                                        <div>
                                            <h4 class="coupon-box-title">Have a Promotional Voucher?</h4>
                                            <p class="coupon-box-sub">Enter your discount code to redeem instant savings.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <form action="{{route('coupon-store')}}" method="POST" class="coupon-input-form">
                                        @csrf
                                        <div class="coupon-field-group">
                                            <input type="text" name="code" placeholder="Enter Coupon Code" class="coupon-input-field" required autocomplete="off">
                                            <button type="submit" class="btn-coupon-apply">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right: Order Summary Card -->
                    <div class="col-lg-4 col-12">
                        <div class="cart-order-summary-box sticky-top" style="top: 95px;">
                            
                            <div class="summary-header-row border-bottom pb-3 mb-3">
                                <h3 class="summary-card-title">Order Summary</h3>
                                <span class="summary-card-sub">Nationwide Express Delivery</span>
                            </div>

                            <div class="summary-breakdown-list">
                                
                                <!-- Subtotal -->
                                <div class="summary-line-item d-flex justify-content-between mb-2">
                                    <span class="summary-item-label">Bag Subtotal</span>
                                    <span class="summary-item-value">PKR {{number_format(Helper::totalCartPrice(), 0)}}</span>
                                </div>

                                <!-- Coupon Saving (if active) -->
                                @if(session()->has('coupon'))
                                    <div class="summary-line-item coupon-applied d-flex justify-content-between mb-2">
                                        <span class="summary-item-label text-danger">Coupon Discount</span>
                                        <span class="summary-item-value text-danger">- PKR {{number_format(Session::get('coupon')['value'], 0)}}</span>
                                    </div>
                                @endif

                                <!-- Estimated Delivery Info -->
                                <div class="summary-line-item d-flex justify-content-between mb-2">
                                    <span class="summary-item-label">Shipping</span>
                                    <span class="summary-item-value text-success font-weight-bold">
                                        @if(Helper::totalCartPrice() >= 2999)
                                            FREE Delivery
                                        @else
                                            Calculated at Checkout
                                        @endif
                                    </span>
                                </div>

                                <div class="free-shipping-progress-box my-3 p-2 rounded bg-light border">
                                    @if(Helper::totalCartPrice() >= 2999)
                                        <div class="text-success font-weight-bold" style="font-size: 11.5px;">
                                            <i class="fa fa-check-circle mr-1"></i> You qualify for FREE Nationwide Delivery!
                                        </div>
                                    @else
                                        @php
                                            $remainingForFree = 2999 - Helper::totalCartPrice();
                                        @endphp
                                        <div class="text-muted" style="font-size: 11.5px;">
                                            Add <strong>PKR {{number_format($remainingForFree, 0)}}</strong> more for <strong>FREE Delivery</strong>
                                        </div>
                                    @endif
                                </div>

                                <div class="summary-divider border-top my-3"></div>

                                <!-- Total Payable -->
                                @php
                                    $finalTotal = Helper::totalCartPrice();
                                    if(session()->has('coupon')){
                                        $finalTotal = $finalTotal - Session::get('coupon')['value'];
                                    }
                                @endphp
                                <div class="summary-total-row d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <span class="total-text-label">Estimated Total</span>
                                        <span class="total-tax-sub">Includes all applicable sales taxes</span>
                                    </div>
                                    <span class="final-total-amount">PKR {{number_format($finalTotal, 0)}}</span>
                                </div>

                            </div>

                            <!-- Checkout Primary CTA Button (Solid Dark, No Gradient, Crisp Hover) -->
                            <a href="{{route('checkout')}}" class="btn-checkout-solid-cta">
                                Proceed to Checkout <i class="ti-arrow-right ml-2"></i>
                            </a>

                            <!-- Trust Badges Strip -->
                            <div class="cart-trust-badges mt-4 pt-3 border-top text-center">
                                <div class="d-flex justify-content-around text-muted" style="font-size: 11px;">
                                    <div><i class="ti-shield mr-1"></i> 100% Authentic</div>
                                    <div><i class="ti-lock mr-1"></i> 256-Bit SSL</div>
                                    <div><i class="ti-truck mr-1"></i> Cash On Delivery</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            @else
                <!-- Elegant Empty Cart State -->
                <div class="empty-cart-state-box text-center">
                    <div class="empty-cart-icon-circle">
                        <i class="ti-bag"></i>
                    </div>
                    <h2 class="empty-cart-title">Your Shopping Bag is Empty</h2>
                    <p class="empty-cart-desc">
                        Explore our latest designer collections, festive unstitched luxury & contemporary pret ready-to-wear.
                    </p>
                    <a href="{{route('product-grids')}}" class="btn-start-shopping-solid">
                        <i class="ti-view-grid mr-2"></i> Explore Collections
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection

@push('styles')
<style>
/* ==========================================================
   YN TRADING LUXURY SHOPPING BAG / VIEW CART STYLES
   ========================================================== */

/* 1. Page Clearance & Top Background */
.luxury-cart-page {
    background-color: #fafafa !important;
    padding-top: 35px !important;
    padding-bottom: 70px !important;
    min-height: 80vh;
    font-family: 'Montserrat', sans-serif !important;
}

/* 2. Breadcrumbs */
.cart-breadcrumb-nav {
    margin-bottom: 16px;
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

/* 3. Header */
.cart-page-header {
    background: #ffffff;
    border: 1px solid #eeeeee;
    border-radius: 12px;
    padding: 24px 28px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}
.cart-badge-tag {
    display: inline-block;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.8px;
    text-transform: uppercase;
    color: #111111;
    background: #f4f4f5;
    padding: 3px 10px;
    border-radius: 50px;
    margin-bottom: 8px;
}
.cart-main-heading {
    font-size: 24px !important;
    font-weight: 800 !important;
    color: #111111 !important;
    text-transform: uppercase;
    letter-spacing: -0.3px;
    margin-bottom: 6px !important;
    line-height: 1.2 !important;
}
.cart-sub-heading {
    font-size: 13px;
    color: #666666;
    margin-bottom: 0;
}
.cart-items-counter-badge {
    display: inline-block;
    background: #111111;
    color: #ffffff;
    padding: 10px 18px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

/* 4. Cart Items Card & Table */
.cart-items-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}
.luxury-cart-table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
}
.luxury-cart-table thead th {
    background: #f8f8f8;
    color: #333333;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-top: none;
    border-bottom: 1px solid #e5e7eb;
    padding: 14px 18px;
}
.cart-item-row td {
    padding: 18px;
    border-bottom: 1px solid #f0f0f0;
}
.cart-item-thumb-link {
    display: block;
    width: 72px;
    height: 96px;
    border-radius: 8px;
    overflow: hidden;
    background: #f5f5f5;
    flex-shrink: 0;
    border: 1px solid #eeeeee;
}
.cart-item-thumb {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    transition: transform 0.3s ease;
}
.cart-item-thumb-link:hover .cart-item-thumb {
    transform: scale(1.06);
}
.cart-item-brand {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #888888;
    display: block;
    margin-bottom: 3px;
}
.cart-item-title {
    font-size: 14px !important;
    font-weight: 700 !important;
    line-height: 1.35;
    margin-bottom: 4px;
}
.cart-item-title a {
    color: #111111 !important;
    text-decoration: none !important;
    transition: color 0.2s ease;
}
.cart-item-title a:hover {
    color: #e53935 !important;
}
.cart-item-variant {
    font-size: 11.5px;
    color: #666666;
    background: #f4f4f5;
    padding: 2px 8px;
    border-radius: 4px;
    display: inline-block;
}
.cart-item-unit-price span {
    font-size: 13.5px;
    font-weight: 600;
    color: #444444;
}
.line-total-amount {
    font-size: 15px;
    font-weight: 800;
    color: #111111;
}

/* Stepper */
.cart-qty-stepper {
    display: inline-flex;
    align-items: center;
    border: 1.5px solid #e0e0e0;
    border-radius: 6px;
    overflow: hidden;
    height: 36px;
    background: #ffffff;
}
.cart-qty-btn {
    width: 32px;
    height: 100%;
    background: #f8f8f8;
    border: none;
    font-size: 11px;
    color: #111111;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s ease;
}
.cart-qty-btn:hover {
    background: #e4e4e7;
}
.cart-qty-input {
    width: 40px;
    height: 100%;
    border: none;
    text-align: center;
    font-size: 13px;
    font-weight: 700;
    color: #111111;
    outline: none;
    background: #ffffff;
}
.cart-delete-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #f8f8f8;
    color: #777777 !important;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    text-decoration: none !important;
    transition: all 0.2s ease;
}
.cart-delete-btn:hover {
    background: #fee2e2;
    color: #dc2626 !important;
    transform: scale(1.1);
}

/* Actions Toolbar */
.btn-cart-continue {
    font-size: 12.5px;
    font-weight: 700;
    color: #111111 !important;
    text-decoration: none !important;
    transition: color 0.2s ease;
}
.btn-cart-continue:hover {
    color: #e53935 !important;
}
.btn-cart-update {
    background: #ffffff;
    color: #111111 !important;
    border: 1.5px solid #111111;
    font-size: 12.5px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    padding: 8px 18px;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
}
.btn-cart-update:hover {
    background: #111111;
    color: #ffffff !important;
}

/* Coupon Card */
.cart-coupon-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 20px 24px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}
.coupon-icon-wrap {
    width: 42px;
    height: 42px;
    background: #f4f4f5;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #111111;
    flex-shrink: 0;
}
.coupon-box-title {
    font-size: 14px !important;
    font-weight: 700 !important;
    color: #111111;
    margin-bottom: 2px;
}
.coupon-box-sub {
    font-size: 12px;
    color: #777777;
    margin-bottom: 0;
}
.coupon-field-group {
    display: flex;
    border: 1.5px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
    background: #ffffff;
    height: 42px;
}
.coupon-input-field {
    border: none;
    padding: 0 16px;
    font-size: 13px;
    color: #111111;
    flex-grow: 1;
    outline: none;
}
.btn-coupon-apply {
    background: #111111;
    color: #ffffff !important;
    border: none;
    padding: 0 20px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.2s ease;
}
.btn-coupon-apply:hover {
    background: #333333;
}

/* 5. Order Summary Card */
.cart-order-summary-box {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    padding: 24px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.03);
}
.summary-card-title {
    font-size: 17px !important;
    font-weight: 800 !important;
    color: #111111;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 2px;
}
.summary-card-sub {
    font-size: 11.5px;
    color: #888888;
}
.summary-item-label {
    font-size: 13px;
    color: #555555;
    font-weight: 500;
}
.summary-item-value {
    font-size: 13.5px;
    font-weight: 700;
    color: #111111;
}
.total-text-label {
    display: block;
    font-size: 14px;
    font-weight: 800;
    color: #111111;
    text-transform: uppercase;
}
.total-tax-sub {
    display: block;
    font-size: 10.5px;
    color: #888888;
}
.final-total-amount {
    font-size: 20px;
    font-weight: 800;
    color: #111111;
}

/* Checkout Button (Solid Dark, No Gradient, Crisp Hover) */
.btn-checkout-solid-cta {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    background: #111111 !important;
    color: #ffffff !important;
    border: none;
    border-radius: 8px;
    padding: 14px 20px;
    font-size: 13.5px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    text-decoration: none !important;
    transition: background 0.2s ease, transform 0.15s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
.btn-checkout-solid-cta:hover {
    background: #333333 !important;
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}

/* 6. Empty State */
.empty-cart-state-box {
    background: #ffffff;
    border: 1px solid #eeeeee;
    border-radius: 16px;
    padding: 60px 20px;
    max-width: 580px;
    margin: 40px auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
}
.empty-cart-icon-circle {
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
.empty-cart-title {
    font-size: 22px !important;
    font-weight: 800 !important;
    color: #111111;
    margin-bottom: 10px;
    text-transform: uppercase;
}
.empty-cart-desc {
    font-size: 13.5px;
    color: #666666;
    margin-bottom: 25px;
    line-height: 1.6;
}
.btn-start-shopping-solid {
    display: inline-flex;
    align-items: center;
    background: #111111;
    color: #ffffff !important;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 12px 28px;
    border-radius: 8px;
    text-decoration: none !important;
    transition: background 0.2s ease, transform 0.15s ease;
}
.btn-start-shopping-solid:hover {
    background: #333333;
    transform: translateY(-1px);
}

/* Mobile Styling */
@media (max-width: 767.98px) {
    .mobile-cart-thumb-wrap {
        width: 70px;
        height: 90px;
        border-radius: 6px;
        overflow: hidden;
        flex-shrink: 0;
        background: #f5f5f5;
        border: 1px solid #eeeeee;
        display: block;
    }
    .mobile-cart-thumb {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .mobile-cart-title {
        font-size: 13px !important;
        font-weight: 700 !important;
        line-height: 1.3;
    }
    .mobile-cart-title a {
        color: #111111 !important;
        text-decoration: none;
    }
    .mobile-line-total {
        font-size: 14px;
        font-weight: 800;
        color: #111111;
    }
}
</style>
@endpush
