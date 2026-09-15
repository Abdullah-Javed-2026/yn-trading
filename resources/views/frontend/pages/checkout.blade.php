@extends('frontend.layouts.master')

@section('title', 'Secure Express Checkout || YN Trading')

@section('main-content')
    @php
        $settings = DB::table('settings')->get();
    @endphp

    <!-- Sticky Distraction-Free Top Bar (Return to Bag Only) -->
    <header class="checkout-sticky-topbar">
        <div class="container-fluid px-lg-5 px-3">
            <div class="checkout-sticky-topbar-inner">
                <!-- Left/Side: Clean Return to Bag Button -->
                <a href="{{route('cart')}}" class="checkout-sticky-return-btn">
                    <i class="ti-arrow-left mr-2"></i> <span>Return to Bag</span>
                </a>

                <!-- Right: Encrypted SSL Indicator -->
                <div class="checkout-topbar-right">
                    <span class="checkout-secure-lock-badge">
                        <i class="ti-lock mr-1"></i> <span class="d-none d-sm-inline">256-Bit </span>SSL Encrypted Checkout
                    </span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Checkout Content (Shifted Upwards) -->
    <div class="luxury-checkout-page">
        <div class="container-fluid px-lg-5 px-3">
            
            <!-- Compact Title Strip (Shifted Up) -->
            <div class="checkout-header-compact">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div>
                        <h1 class="checkout-compact-title">Express Checkout</h1>
                        <p class="checkout-compact-sub">Please fill in your delivery details to complete your order.</p>
                    </div>
                    <div class="checkout-trust-pill d-none d-md-flex align-items-center">
                        <i class="ti-shield mr-2"></i> 100% Genuine Designer Wear
                    </div>
                </div>
            </div>

            <!-- Checkout Form -->
            <form class="checkout-form-root" method="POST" action="{{route('cart.order')}}">
                @csrf
                <div class="row">
                    
                    <!-- Left Column: Delivery & Payment Information -->
                    <div class="col-lg-7 col-12 mb-4 mb-lg-0">
                        
                        <!-- Step 1: Customer Contact & Delivery Info -->
                        <div class="checkout-section-card mb-4">
                            <div class="checkout-section-header">
                                <span class="step-num">1</span>
                                <div>
                                    <h3 class="step-title">Delivery Address</h3>
                                    <p class="step-desc">Enter the address where you would like your parcel delivered.</p>
                                </div>
                            </div>

                            <div class="checkout-fields-body pt-3">
                                <div class="row">
                                    
                                    <!-- First Name -->
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group custom-checkout-group">
                                            <label class="checkout-field-label">First Name <span class="text-danger">*</span></label>
                                            <input type="text" name="first_name" class="checkout-input" placeholder="First Name" value="{{old('first_name')}}" required>
                                            @error('first_name')
                                                <span class="field-error-msg">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group custom-checkout-group">
                                            <label class="checkout-field-label">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" name="last_name" class="checkout-input" placeholder="Last Name" value="{{old('last_name')}}" required>
                                            @error('last_name')
                                                <span class="field-error-msg">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group custom-checkout-group">
                                            <label class="checkout-field-label">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="checkout-input" placeholder="you@example.com" value="{{old('email')}}" required>
                                            @error('email')
                                                <span class="field-error-msg">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group custom-checkout-group">
                                            <label class="checkout-field-label">Phone / WhatsApp Number <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" class="checkout-input" placeholder="03XXXXXXXXX" value="{{old('phone')}}" required>
                                            @error('phone')
                                                <span class="field-error-msg">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Country -->
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group custom-checkout-group">
                                            <label class="checkout-field-label">Country / Region <span class="text-danger">*</span></label>
                                            <div class="custom-select-wrap">
                                                <select name="country" id="country" class="checkout-select" required>
                                                    <option value="PK" selected>Pakistan</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US">United States</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="BH">Bahrain</option>
                                                </select>
                                                <i class="ti-angle-down select-arrow-icon"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group custom-checkout-group">
                                            <label class="checkout-field-label">City / Town <span class="text-danger">*</span></label>
                                            <input type="text" name="city" class="checkout-input" placeholder="e.g. Lahore, Karachi, Islamabad" value="{{old('city')}}" required>
                                        </div>
                                    </div>

                                    <!-- Street Address 1 -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group custom-checkout-group">
                                            <label class="checkout-field-label">Complete Street Address & House / Flat No. <span class="text-danger">*</span></label>
                                            <input type="text" name="address1" class="checkout-input" placeholder="House #, Street name, Sector / Block" value="{{old('address1')}}" required>
                                            @error('address1')
                                                <span class="field-error-msg">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Street Address 2 -->
                                    <div class="col-md-8 col-12 mb-3">
                                        <div class="form-group custom-checkout-group">
                                            <label class="checkout-field-label">Apartment, Suite, Unit, Landmark (Optional)</label>
                                            <input type="text" name="address2" class="checkout-input" placeholder="Near landmark, building floor" value="{{old('address2')}}">
                                        </div>
                                    </div>

                                    <!-- Postal Code -->
                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="form-group custom-checkout-group">
                                            <label class="checkout-field-label">Postal / Zip Code</label>
                                            <input type="text" name="post_code" class="checkout-input" placeholder="e.g. 54000" value="{{old('post_code')}}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Shipping Method -->
                        <div class="checkout-section-card mb-4">
                            <div class="checkout-section-header">
                                <span class="step-num">2</span>
                                <div>
                                    <h3 class="step-title">Shipping Method</h3>
                                    <p class="step-desc">Select your preferred courier and delivery speed.</p>
                                </div>
                            </div>

                            <div class="checkout-fields-body pt-3">
                                @php
                                    $shippings = Helper::shipping();
                                @endphp

                                @if(count($shippings) > 0 && Helper::cartCount() > 0)
                                    <div class="shipping-options-list">
                                        @foreach($shippings as $sIndex => $ship)
                                            <label class="shipping-option-card {{ $sIndex == 0 ? 'selected' : '' }}">
                                                <div class="d-flex align-items-center">
                                                    <input type="radio" name="shipping" value="{{$ship->id}}" class="shipping-radio-input" data-price="{{$ship->price}}" @if($sIndex == 0) checked @endif required>
                                                    <div class="shipping-info-text ml-3">
                                                        <span class="shipping-name">{{$ship->type}}</span>
                                                        <span class="shipping-sub">Nationwide Tracked Courier (2 - 4 business days)</span>
                                                    </div>
                                                </div>
                                                <span class="shipping-cost-badge">PKR {{number_format($ship->price, 0)}}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="shipping-option-card selected">
                                        <div class="d-flex align-items-center">
                                            <input type="radio" name="shipping_free" value="0" checked disabled>
                                            <div class="shipping-info-text ml-3">
                                                <span class="shipping-name">Standard Nationwide Delivery</span>
                                                <span class="shipping-sub">Free Nationwide Express Delivery (Orders over PKR 2,999)</span>
                                            </div>
                                        </div>
                                        <span class="shipping-cost-badge text-success">FREE</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Step 3: Payment Method -->
                        <div class="checkout-section-card mb-4">
                            <div class="checkout-section-header">
                                <span class="step-num">3</span>
                                <div>
                                    <h3 class="step-title">Payment Method</h3>
                                    <p class="step-desc">All transactions are encrypted and 100% secure.</p>
                                </div>
                            </div>

                            <div class="checkout-fields-body pt-3">
                                <div class="payment-methods-stack">
                                    
                                    <!-- Option 1: Cash On Delivery -->
                                    <label class="payment-card-pill active" id="codPaymentCard">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="d-flex align-items-center">
                                                <input type="radio" name="payment_method" value="cod" checked required class="payment-radio">
                                                <div class="payment-meta-text ml-3">
                                                    <span class="payment-title">Cash on Delivery (COD)</span>
                                                    <span class="payment-desc">Pay in cash when your parcel arrives at your doorstep.</span>
                                                </div>
                                            </div>
                                            <div class="payment-icon-box">
                                                <i class="ti-money"></i>
                                            </div>
                                        </div>
                                    </label>

                                    <!-- Option 2: Card Payment -->
                                    <label class="payment-card-pill" id="cardPaymentCard">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="d-flex align-items-center">
                                                <input type="radio" name="payment_method" value="cardpay" required class="payment-radio">
                                                <div class="payment-meta-text ml-3">
                                                    <span class="payment-title">Debit / Credit Card</span>
                                                    <span class="payment-desc">Visa, MasterCard, PayPak & UnionPay accepted securely.</span>
                                                </div>
                                            </div>
                                            <div class="payment-icon-box">
                                                <i class="ti-credit-card"></i>
                                            </div>
                                        </div>

                                        <!-- Hidden Card Input Fields -->
                                        <div id="creditCardDetailsBox" class="credit-card-inputs-pane mt-3 pt-3 border-top" style="display: none;">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label class="checkout-field-label">Card Number</label>
                                                    <input type="text" name="card_number" id="cardNumber" class="checkout-input" placeholder="0000 0000 0000 0000" maxlength="19">
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <label class="checkout-field-label">Name on Card</label>
                                                    <input type="text" name="card_name" id="cardName" class="checkout-input" placeholder="Cardholder Name">
                                                </div>
                                                <div class="col-md-3 col-6 mb-3">
                                                    <label class="checkout-field-label">MM / YY</label>
                                                    <input type="text" name="expiration_date" id="expirationDate" class="checkout-input" placeholder="MM/YY" maxlength="5">
                                                </div>
                                                <div class="col-md-3 col-6 mb-3">
                                                    <label class="checkout-field-label">CVV / CVC</label>
                                                    <input type="text" name="cvv" id="cvv" class="checkout-input" placeholder="123" maxlength="4">
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Order Review & Sticky Summary -->
                    <div class="col-lg-5 col-12">
                        <div class="checkout-summary-card sticky-top" style="top: 20px;">
                            
                            <div class="summary-card-header border-bottom pb-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="summary-heading">Order Summary ({{Helper::cartCount()}})</h3>
                                    <a href="{{route('cart')}}" class="edit-cart-link">Edit Bag</a>
                                </div>
                            </div>

                            <!-- Cart Product Preview List -->
                            <div class="checkout-mini-products-list mb-3">
                                @foreach(Helper::getAllProductFromCart() as $cartItem)
                                    @php
                                        $p = is_object($cartItem->product) ? $cartItem->product : (object)$cartItem->product;
                                        $photo = explode(',', $p->photo ?? '');
                                        $thumb = $photo[0] ?? asset('frontend/img/default-product.jpg');
                                        $price = is_object($cartItem) ? $cartItem->price : $cartItem['price'];
                                        $amount = is_object($cartItem) ? $cartItem->amount : $cartItem['amount'];
                                        $qty = is_object($cartItem) ? $cartItem->quantity : $cartItem['quantity'];
                                    @endphp
                                    <div class="checkout-mini-item d-flex align-items-center mb-3">
                                        <div class="mini-item-thumb-box">
                                            <img src="{{$thumb}}" alt="{{$p->title ?? ''}}" class="mini-item-img">
                                            <span class="mini-item-qty-badge">{{$qty}}</span>
                                        </div>
                                        <div class="mini-item-info ml-3 flex-grow-1">
                                            <h5 class="mini-item-title">{{$p->title ?? 'YN Product'}}</h5>
                                            <span class="mini-item-unit-price">PKR {{number_format($price, 0)}}</span>
                                        </div>
                                        <div class="mini-item-total text-right">
                                            <span class="mini-total-val">PKR {{number_format($amount, 0)}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="summary-divider border-top my-3"></div>

                            <!-- Price Breakdown -->
                            <div class="summary-pricing-breakdown">
                                
                                <div class="price-row d-flex justify-content-between mb-2">
                                    <span class="price-row-label order_subtotal" data-price="{{Helper::totalCartPrice()}}">Subtotal</span>
                                    <span class="price-row-val font-weight-bold">PKR {{number_format(Helper::totalCartPrice(), 0)}}</span>
                                </div>

                                <!-- Dynamic Shipping Cost -->
                                <div class="price-row d-flex justify-content-between mb-2">
                                    <span class="price-row-label">Shipping</span>
                                    <span class="price-row-val" id="shippingPriceDisplay">
                                        @if(count(Helper::shipping()) > 0)
                                            PKR {{number_format(Helper::shipping()[0]->price ?? 0, 0)}}
                                        @else
                                            FREE
                                        @endif
                                    </span>
                                </div>

                                <!-- Coupon Discount -->
                                @if(session()->has('coupon'))
                                    <div class="price-row d-flex justify-content-between mb-2 text-danger">
                                        <span class="price-row-label coupon_price" data-price="{{session('coupon')['value']}}">Coupon Savings</span>
                                        <span class="price-row-val">- PKR {{number_format(session('coupon')['value'], 0)}}</span>
                                    </div>
                                @endif

                                <div class="summary-divider border-top my-3"></div>

                                @php
                                    $initialShippingCost = (count(Helper::shipping()) > 0) ? (Helper::shipping()[0]->price ?? 0) : 0;
                                    $initialTotal = Helper::totalCartPrice() + $initialShippingCost;
                                    if(session()->has('coupon')){
                                        $initialTotal = $initialTotal - session('coupon')['value'];
                                    }
                                @endphp
                                <div class="grand-total-row d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <span class="grand-total-label">Total Amount</span>
                                        <span class="grand-total-sub">Includes sales tax & delivery</span>
                                    </div>
                                    <span class="grand-total-val" id="order_total_price">
                                        <span>PKR {{number_format($initialTotal, 0)}}</span>
                                    </span>
                                </div>

                            </div>

                            <!-- Solid Black Place Order Button (No Gradients, Simple & Premium) -->
                            <button type="submit" class="btn-place-order-solid">
                                Place Order Now <i class="ti-check ml-2"></i>
                            </button>

                            <!-- Guarantee Badges -->
                            <div class="checkout-guarantee-box mt-4 p-3 bg-light rounded text-center border">
                                <div class="d-flex justify-content-around text-muted" style="font-size: 11px;">
                                    <div><i class="ti-shield text-dark mr-1"></i> Authentic Guarantee</div>
                                    <div><i class="ti-lock text-dark mr-1"></i> Secure Payment</div>
                                    <div><i class="ti-reload text-dark mr-1"></i> Easy Support</div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <!-- Distraction-Free Minimalist Checkout Footer -->
    <footer class="distraction-free-checkout-footer">
        <div class="container text-center py-4">
            <p class="mb-1 text-muted" style="font-size: 12px;">© {{date('Y')}} YN Trading Atelier. All Rights Reserved.</p>
            <p class="mb-0 text-muted" style="font-size: 11px;">100% Authentic Designer Fabrics & Luxury Pret • Cash on Delivery Across Pakistan</p>
        </div>
    </footer>

@endsection

@push('styles')
<style>
/* ==========================================================
   DISTRACTION-FREE CHECKOUT OVERRIDES (Hides Main Nav & Footer)
   ========================================================== */

/* 1. Completely Hide Main Navbar, Ticker Announcement, and Default Footers */
header.header,
header.custom-header,
.top-announcement-bar,
.main-navbar-bar,
footer.footer,
.floating-island-footer-wrapper,
.floating-island-footer,
.shop-services,
.trust-strip-section,
.left-sidebar-drawer,
.sidebar-backdrop,
#scrollUp {
    display: none !important;
}

/* 2. Reset Page Body Offset on Checkout */
body, 
body.homepage-layout,
body.innerpage-layout {
    padding-top: 0 !important;
    background-color: #fafafa !important;
}

/* 3. Distraction-Free Top Bar (Static Position at Top - Does not move on scroll) */
.checkout-sticky-topbar {
    background: #000000 !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.12);
    position: relative !important;
    z-index: 10;
    box-shadow: none !important;
}
.checkout-sticky-topbar-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 48px;
    padding: 6px 0;
}
.checkout-sticky-return-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #ffffff !important;
    font-size: 12.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    text-decoration: none !important;
    padding: 7px 16px;
    border-radius: 6px;
    background: rgba(255, 255, 255, 0.09);
    border: 1px solid rgba(255, 255, 255, 0.18);
    transition: all 0.2s ease;
}
.checkout-sticky-return-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff !important;
    border-color: rgba(255, 255, 255, 0.35);
}
.checkout-secure-lock-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #aaaaaa;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* 4. Main Page Section (Shifted Upwards) */
.luxury-checkout-page {
    padding-top: 14px !important;
    padding-bottom: 45px !important;
    min-height: 80vh;
    font-family: 'Montserrat', sans-serif !important;
}

/* 5. Compact Header Strip (Shifted Upwards) */
.checkout-header-compact {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 14px 20px;
    margin-bottom: 18px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
}
.checkout-compact-title {
    font-size: 18px !important;
    font-weight: 800 !important;
    color: #111111 !important;
    text-transform: uppercase;
    letter-spacing: -0.2px;
    margin-bottom: 2px !important;
    line-height: 1.2 !important;
}
.checkout-compact-sub {
    font-size: 12px !important;
    color: #666666 !important;
    margin-bottom: 0;
}
.checkout-trust-pill {
    font-size: 11.5px;
    font-weight: 700;
    color: #111111;
    background: #f4f4f5;
    padding: 6px 14px;
    border-radius: 50px;
    letter-spacing: 0.3px;
}

/* 6. Section Cards */
.checkout-section-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px 28px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}
.checkout-section-header {
    display: flex;
    align-items: flex-start;
    padding-bottom: 14px;
    border-bottom: 1px solid #f0f0f0;
}
.step-num {
    width: 30px;
    height: 30px;
    background: #111111;
    color: #ffffff;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 800;
    margin-right: 12px;
    flex-shrink: 0;
}
.step-title {
    font-size: 15px !important;
    font-weight: 800 !important;
    color: #111111;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 2px;
}
.step-desc {
    font-size: 12px;
    color: #777777;
    margin-bottom: 0;
}

/* Inputs */
.custom-checkout-group {
    margin-bottom: 0;
}
.checkout-field-label {
    font-size: 11.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    color: #333333;
    margin-bottom: 6px;
    display: block;
}
.checkout-input {
    width: 100%;
    height: 44px;
    border: 1.5px solid #e0e0e0;
    border-radius: 8px;
    padding: 0 14px;
    font-size: 13.5px;
    color: #111111;
    background: #fdfdfd;
    outline: none;
    transition: all 0.2s ease;
}
.checkout-input:focus {
    border-color: #111111;
    background: #ffffff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}
.field-error-msg {
    font-size: 11.5px;
    color: #dc2626;
    margin-top: 4px;
    display: block;
}
.custom-select-wrap {
    position: relative;
}
.checkout-select {
    width: 100%;
    height: 44px;
    border: 1.5px solid #e0e0e0;
    border-radius: 8px;
    padding: 0 34px 0 14px;
    font-size: 13.5px;
    font-weight: 600;
    color: #111111;
    background: #fdfdfd;
    appearance: none;
    -webkit-appearance: none;
    outline: none;
    cursor: pointer;
    transition: all 0.2s ease;
}
.checkout-select:focus {
    border-color: #111111;
    background: #ffffff;
}
.select-arrow-icon {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 10px;
    color: #777777;
    pointer-events: none;
}

/* Shipping Option Cards */
.shipping-options-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.shipping-option-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 18px;
    border: 1.5px solid #e0e0e0;
    border-radius: 10px;
    background: #ffffff;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-bottom: 0;
}
.shipping-option-card:hover {
    border-color: #111111;
    background: #fafafa;
}
.shipping-option-card.selected,
.shipping-option-card:has(input:checked) {
    border-color: #111111;
    background: #fcfcfc;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}
.shipping-name {
    display: block;
    font-size: 13.5px;
    font-weight: 700;
    color: #111111;
}
.shipping-sub {
    display: block;
    font-size: 11.5px;
    color: #777777;
}
.shipping-cost-badge {
    font-size: 13.5px;
    font-weight: 800;
    color: #111111;
}

/* Payment Methods */
.payment-methods-stack {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.payment-card-pill {
    display: block;
    padding: 16px 20px;
    border: 1.5px solid #e0e0e0;
    border-radius: 10px;
    background: #ffffff;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-bottom: 0;
}
.payment-card-pill:hover {
    border-color: #111111;
    background: #fafafa;
}
.payment-card-pill.active,
.payment-card-pill:has(input:checked) {
    border-color: #111111;
    background: #fcfcfc;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}
.payment-title {
    display: block;
    font-size: 14px;
    font-weight: 700;
    color: #111111;
}
.payment-desc {
    display: block;
    font-size: 12px;
    color: #777777;
}
.payment-icon-box {
    font-size: 20px;
    color: #333333;
}

/* Summary Card */
.checkout-summary-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    padding: 24px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.03);
}
.summary-heading {
    font-size: 16px !important;
    font-weight: 800 !important;
    color: #111111;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0;
}
.edit-cart-link {
    font-size: 12px;
    font-weight: 700;
    color: #111111;
    text-decoration: underline;
    transition: color 0.2s ease;
}
.edit-cart-link:hover {
    color: #e53935;
}

/* Mini Item */
.checkout-mini-products-list {
    max-height: 260px;
    overflow-y: auto;
    padding-right: 4px;
}
.mini-item-thumb-box {
    position: relative;
    width: 48px;
    height: 62px;
    border-radius: 6px;
    overflow: hidden;
    background: #f5f5f5;
    flex-shrink: 0;
    border: 1px solid #eeeeee;
}
.mini-item-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.mini-item-qty-badge {
    position: absolute;
    top: -4px;
    right: -4px;
    background: #111111;
    color: #ffffff;
    font-size: 9px;
    font-weight: 800;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.mini-item-title {
    font-size: 12.5px !important;
    font-weight: 700 !important;
    color: #111111;
    line-height: 1.3;
    margin-bottom: 2px;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.mini-item-unit-price {
    font-size: 11px;
    color: #777777;
}
.mini-total-val {
    font-size: 13px;
    font-weight: 700;
    color: #111111;
}

/* Price Breakdown */
.price-row-label {
    font-size: 13px;
    color: #555555;
}
.price-row-val {
    font-size: 13px;
    color: #111111;
}
.grand-total-label {
    display: block;
    font-size: 14.5px;
    font-weight: 800;
    color: #111111;
    text-transform: uppercase;
}
.grand-total-sub {
    display: block;
    font-size: 10.5px;
    color: #888888;
}
.grand-total-val {
    font-size: 20px;
    font-weight: 800;
    color: #111111;
}

/* Solid Black Place Order Button */
.btn-place-order-solid {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    background: #111111 !important;
    color: #ffffff !important;
    border: none;
    border-radius: 8px;
    padding: 15px 24px;
    font-size: 14px;
    font-weight: 800;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.15s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
.btn-place-order-solid:hover {
    background: #333333 !important;
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
}

/* 8. Distraction-Free Footer */
.distraction-free-checkout-footer {
    background: #ffffff;
    border-top: 1px solid #eeeeee;
    margin-top: 30px;
}
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Toggle Card details pane when card payment option is selected
        $('input[name="payment_method"]').change(function() {
            $('.payment-card-pill').removeClass('active');
            $(this).closest('.payment-card-pill').addClass('active');

            if ($(this).val() === 'cardpay') {
                $('#creditCardDetailsBox').slideDown(200);
            } else {
                $('#creditCardDetailsBox').slideUp(200);
            }
        });

        // Dynamic Shipping Cost Calculation
        $('input[name="shipping"]').change(function() {
            $('.shipping-option-card').removeClass('selected');
            $(this).closest('.shipping-option-card').addClass('selected');

            let cost = parseFloat($(this).data('price')) || 0;
            let subtotal = parseFloat($('.order_subtotal').data('price')) || 0;
            let coupon = parseFloat($('.coupon_price').data('price')) || 0;
            let total = subtotal + cost - coupon;

            $('#shippingPriceDisplay').text('PKR ' + cost.toLocaleString());
            $('#order_total_price span').text('PKR ' + total.toLocaleString());
        });
    });
</script>
@endpush