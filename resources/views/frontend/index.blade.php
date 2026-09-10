@extends('frontend.layouts.master')
@section('title','YN Trading || Luxury Fashion & Pakistani Apparel')

@push('styles')
<style>
    .popular-slider .owl-stage {
        transition-timing-function: linear !important;
        -webkit-transition-timing-function: linear !important;
    }
    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
        background: rgba(0, 0, 0, 0.4);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0;
        transition: all 0.3s ease;
        margin: 0 20px;
    }
    #Gslider:hover .carousel-control-prev,
    #Gslider:hover .carousel-control-next {
        opacity: 1;
    }
    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: rgba(0, 0, 0, 0.8);
    }
</style>
@endpush

@section('main-content')
<!-- 1. Hero Slider Area -->
@if(count($banners)>0)
    <section id="Gslider" class="carousel slide" data-ride="carousel" data-interval="4500">
        <ol class="carousel-indicators">
            @foreach($banners as $key=>$banner)
                <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
            @endforeach
        </ol>
        
        <div class="carousel-inner" role="listbox">
            @foreach($banners as $key=>$banner)
                <div class="carousel-item {{(($key==0)? 'active' : '')}}">
                    <img src="{{$banner->photo}}" alt="{{$banner->title}}">
                    <div class="hero-slider-overlay">
                        <div class="container">
                            <div class="hero-slider-content">
                                <span class="hero-badge wow fadeInDown" data-wow-delay="0.1s">Exclusive Collection</span>
                                <h1 class="hero-title wow fadeInDown" data-wow-delay="0.2s">{{$banner->title}}</h1>
                                <p class="hero-desc wow fadeInUp" data-wow-delay="0.3s">{!! html_entity_decode($banner->description) !!}</p>
                                <a class="hero-cta-btn wow fadeInUp" data-wow-delay="0.4s" href="{{route('product-grids')}}">
                                    Shop Collection <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>
@endif
<!--/ End Slider Area -->

<!-- 2. Value Props & Trust Badges Strip (Infinite Left-to-Right Loop Marquee) -->
<section class="trust-strip-section">
    <div class="trust-strip-wrapper">
        <div class="trust-strip-track">
            <!-- Set 1 -->
            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-truck"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Express Shipping</h4>
                    <p>Fast nationwide & worldwide delivery</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-crown"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>100% Authentic</h4>
                    <p>Original designer fabrics & apparel</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-wallet"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Cash on Delivery</h4>
                    <p>Safe doorstep & card payments</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-reload"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Easy 7-Day Exchange</h4>
                    <p>Hassle-free return policy</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-shield"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Secure Checkout</h4>
                    <p>256-Bit SSL encrypted payments</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-headphone-alt"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>24/7 Dedicated Support</h4>
                    <p>WhatsApp & helpline assistance</p>
                </div>
            </div>

            <!-- Set 2 (Identical for Seamless Loop) -->
            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-truck"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Express Shipping</h4>
                    <p>Fast nationwide & worldwide delivery</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-crown"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>100% Authentic</h4>
                    <p>Original designer fabrics & apparel</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-wallet"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Cash on Delivery</h4>
                    <p>Safe doorstep & card payments</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-reload"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Easy 7-Day Exchange</h4>
                    <p>Hassle-free return policy</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-shield"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Secure Checkout</h4>
                    <p>256-Bit SSL encrypted payments</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-headphone-alt"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>24/7 Dedicated Support</h4>
                    <p>WhatsApp & helpline assistance</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Trust Badges Strip -->

<!-- 3. Shop By Category (Luxury Dark Section with Wave Transitions) -->
<div class="dark-category-wrapper">
    <!-- Top Wave Transition -->
    <div class="wave-shape-top" style="line-height: 0; width: 100%; overflow: hidden; background: #ffffff;">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none" style="width: 100%; height: 42px; display: block;">
            <path d="M0,32L60,37.3C120,43,240,53,360,58.7C480,64,600,64,720,53.3C840,43,960,21,1080,16C1200,11,1320,21,1380,26.7L1440,32L1440,80L1380,80C1320,80,1200,80,1080,80C960,80,840,80,720,80C600,80,480,80,360,80C240,80,120,80,60,80L0,80Z" fill="#0a0a0a"></path>
        </svg>
    </div>

    <section class="featured-categories-section py-4" style="background: #0a0a0a; color: #ffffff;">
        <div class="container-fluid px-lg-5 px-3">
            
            <!-- Centered Heading -->
            <div class="text-center mb-5">
                <span class="subtitle-tag" style="font-size: 11px; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; color: #ffffff; background: rgba(255,255,255,0.12); padding: 5px 18px; border-radius: 20px; display: inline-block; margin-bottom: 12px; border: 1px solid rgba(255,255,255,0.18);">
                    CURATED STYLES
                </span>
                <h2 style="font-size: 32px; font-weight: 700; color: #ffffff; text-transform: uppercase; margin-bottom: 8px; letter-spacing: -0.5px;">
                    Shop By Category
                </h2>
                <p style="color: #999999; font-size: 14px; max-width: 520px; margin: 0 auto;">
                    Explore our premier selection of unstitched fabrics, luxury pret, and traditional silhouettes.
                </p>
            </div>
            
            <!-- 3-Card Responsive Grid -->
            <div class="row justify-content-center">
                @php
                    $category_lists = DB::table('categories')->where('status', 'active')->where('is_parent', 1)->get();
                    if(!$category_lists || count($category_lists) == 0) {
                        $category_lists = DB::table('categories')->where('status', 'active')->get();
                    }
                @endphp
                @if($category_lists)
                    @foreach($category_lists as $cat)
                        @php
                            $catCount = DB::table('products')->where('cat_id', $cat->id)->where('status', 'active')->count();
                        @endphp
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <a href="{{route('product-cat', $cat->slug)}}" class="luxury-dark-category-card">
                                <div class="dark-category-img-wrap">
                                    @if($cat->photo)
                                        <img src="{{$cat->photo}}" alt="{{$cat->title}}">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=600&q=80" alt="{{$cat->title}}">
                                    @endif
                                    <div class="dark-category-overlay">
                                        <span class="cat-pill-badge">
                                            {{$catCount > 0 ? $catCount.' Styles Available' : 'Explore Collection'}}
                                        </span>
                                        <h3 class="cat-title">{{$cat->title}}</h3>
                                        <span class="cat-cta-link">
                                            Explore Collection <i class="ti-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section>

    <!-- Bottom Wave Transition -->
    <div class="wave-shape-bottom" style="line-height: 0; width: 100%; overflow: hidden; background: #ffffff;">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none" style="width: 100%; height: 42px; display: block;">
            <path d="M0,48L60,42.7C120,37,240,27,360,21.3C480,16,600,16,720,26.7C840,37,960,59,1080,64C1200,69,1320,59,1380,53.3L1440,48L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z" fill="#0a0a0a"></path>
        </svg>
    </div>
</div>
<!-- End Featured Categories Section -->

<!-- 4. New Arrivals & Filter Tabs Product Area -->
<div class="product-area section pt-4 pb-5">
    <div class="container-fluid px-lg-5 px-3">
        <div class="luxury-section-title">
            <span class="subtitle-tag">CURATED FOR YOU</span>
            <h2>New Arrivals</h2>
            <p>Discover our latest contemporary outfits and trendsetting silhouettes</p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="nav-main">
                        <!-- Category Filter Tabs -->
                        <ul class="luxury-filter-nav filter-tope-group" id="myTab" role="tablist">
                            @php
                                $categories=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
                            @endphp
                            <button class="filter-btn active" data-filter="*">
                                All Collection
                            </button>
                            @if($categories)
                                @foreach($categories as $key=>$cat)
                                    <button class="filter-btn" data-filter=".{{$cat->id}}">
                                        {{$cat->title}}
                                    </button>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <!-- Products Grid -->
                    <div class="tab-content isotope-grid row" id="myTabContent">
                        @php
                            $recentlyAddedProducts = DB::table('products')
                                ->where('status', 'active')
                                ->orderBy('created_at', 'desc')
                                ->take(8)
                                ->get();
                        @endphp

                        @foreach($recentlyAddedProducts as $key => $product)
                            <div class="col-6 col-md-4 col-lg-3 px-1 px-sm-2 mb-4 isotope-item {{$product->cat_id}}">
                                <div class="single-product fashion-card">
                                    <div class="product-img">
                                        <a href="{{route('product-detail', $product->slug)}}">
                                            @php
                                                $photos = explode(',', $product->photo);
                                            @endphp
                                            <img class="default-img" src="{{$photos[0]}}" alt="{{$product->title}}">
                                            <img class="hover-img" src="{{$photos[1] ?? $photos[0]}}" alt="{{$product->title}}">
                                        </a>

                                        <!-- Badges -->
                                        <div class="card-badge-wrap">
                                            @if($product->stock <= 0)
                                                <span class="badge-sold-out">Sold Out</span>
                                            @elseif($product->discount > 0)
                                                <span class="badge-discount">-{{number_format($product->discount, 0)}}%</span>
                                            @elseif($product->condition == 'new')
                                                <span class="badge-new">NEW</span>
                                            @endif
                                        </div>

                                        <!-- Top Right Wishlist -->
                                        <a title="Add to Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="card-wishlist-btn" data-id="{{$product->id}}">
                                            <i class="ti-heart"></i>
                                        </a>

                                        <!-- Quick View Button -->
                                        <button type="button" class="card-quick-view-btn" data-toggle="modal" data-target="#{{$product->id}}">
                                            <i class="ti-eye"></i> Quick View
                                        </button>

                                        <!-- Floating Quick Add Bag Icon -->
                                        <a title="Quick Add to Cart" href="{{route('add-to-cart',$product->slug)}}" class="card-quick-bag-btn">
                                            <i class="ti-bag"></i>
                                        </a>
                                    </div>

                                    <div class="product-content">
                                        @php
                                            $catInfo = DB::table('categories')->where('id', $product->cat_id)->first();
                                        @endphp
                                        @if($catInfo)
                                            <span class="product-category-tag">{{$catInfo->title}}</span>
                                        @endif
                                        <h3 class="product-title-text"><a href="{{route('product-detail', $product->slug)}}">{{$product->title}}</a></h3>
                                        @php
                                            $after_discount = ($product->price - ($product->price * $product->discount) / 100);
                                        @endphp
                                        <div class="price-box">
                                            <span class="current-price">PKR {{number_format($after_discount, 0)}}</span>
                                            @if($product->discount > 0)
                                                <del class="old-price">PKR {{number_format($product->price, 0)}}</del>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Area -->

<!-- 5. Editorial Promotional Banners -->
<section class="editorial-promo-section">
    <div class="container-fluid px-lg-5 px-3">
        <div class="row">
            @if($featured && count($featured) > 0)
                @foreach($featured as $data)
                    <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                        <div class="editorial-card">
                            @php
                                $photo=explode(',',$data->photo);
                            @endphp
                            <img src="{{$photo[0]}}" alt="{{$data->title}}">
                            <div class="editorial-content-overlay">
                                <span class="editorial-tag">{{$data->cat_info['title'] ?? 'Featured'}}</span>
                                <h3>{{$data->title}}</h3>
                                <p>Get Up to {{number_format($data->discount, 0)}}% OFF on this premium selection.</p>
                                <a href="{{route('product-detail',$data->slug)}}" class="editorial-btn">
                                    Shop Collection <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                    <div class="editorial-card">
                        <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=800&q=80" alt="Unstitched Luxury">
                        <div class="editorial-content-overlay">
                            <span class="editorial-tag">Luxury Pret</span>
                            <h3>Timeless Elegance & Designer Cuts</h3>
                            <p>Hand-crafted embroidery with modern premium finishes.</p>
                            <a href="{{route('product-grids')}}" class="editorial-btn">Shop Now <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="editorial-card">
                        <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=800&q=80" alt="Ready To Wear">
                        <div class="editorial-content-overlay">
                            <span class="editorial-tag">Special Deals</span>
                            <h3>Curated Seasonal Favourites</h3>
                            <p>Unmatched quality at exclusive festive prices.</p>
                            <a href="{{route('product-grids')}}" class="editorial-btn">Explore Deals <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- End Editorial Promotional Banners -->

<!-- 6. POPULAR CHOICES: INTERACTIVE HOTSPOT LOOKBOOK (Shop The Look) -->
@php
    $settingsObj = DB::table('settings')->first();
    $lookbookData = !empty($settingsObj->lookbook_data) ? json_decode($settingsObj->lookbook_data, true) : null;
    
    $lbTitle = $lookbookData['title'] ?? 'Popular Choices — Shop The Look';
    $lbSubtitle = $lookbookData['subtitle'] ?? 'INTERACTIVE LOOKBOOK';
    $lbDesc = $lookbookData['description'] ?? 'Hover or tap on the glowing hotspots (+) to discover and shop the curated designer pieces.';
    $lbImage = !empty($lookbookData['image']) ? $lookbookData['image'] : 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1200&q=85';

    $defaultSpots = [
        [
            'id' => 1,
            'top' => '22%',
            'left' => '44%',
            'title' => 'Pure Silk Embroidered Dupatta',
            'category' => 'Festive Silk',
            'price' => 3850,
            'old_price' => 4500,
            'image' => 'https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?auto=format&fit=crop&w=600&q=80',
            'slug' => null,
            'prod_id' => null,
            'tag' => 'ITEM 01 • SCARF / DUPATTA',
        ],
        [
            'id' => 2,
            'top' => '50%',
            'left' => '60%',
            'title' => 'Hand-Crafted Designer Pret Kurti',
            'category' => 'Luxury Pret',
            'price' => 6950,
            'old_price' => 8200,
            'image' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=600&q=80',
            'slug' => null,
            'prod_id' => null,
            'tag' => 'ITEM 02 • DESIGNER SHIRT',
        ],
        [
            'id' => 3,
            'top' => '80%',
            'left' => '42%',
            'title' => 'Raw Silk Tailored Straight Trousers',
            'category' => 'Bottoms & Pants',
            'price' => 2950,
            'old_price' => 3500,
            'image' => 'https://images.unsplash.com/photo-1509631179647-0177331693ae?auto=format&fit=crop&w=600&q=80',
            'slug' => null,
            'prod_id' => null,
            'tag' => 'ITEM 03 • RAW SILK BOTTOM',
        ],
    ];

    $hotspots = [];
    for ($i = 1; $i <= 3; $i++) {
        $saved = $lookbookData['items'][$i - 1] ?? null;
        $fallback = $defaultSpots[$i - 1];

        $prodId = $saved['product_id'] ?? null;
        $prod = $prodId ? DB::table('products')->where('id', $prodId)->where('status', 'active')->first() : null;

        $top = !empty($saved['top']) ? $saved['top'] : $fallback['top'];
        if (is_numeric($top)) $top = $top . '%';
        $left = !empty($saved['left']) ? $saved['left'] : $fallback['left'];
        if (is_numeric($left)) $left = $left . '%';

        $tag = !empty($saved['tag']) ? $saved['tag'] : $fallback['tag'];
        $cat = !empty($saved['category']) ? $saved['category'] : ($prod ? (DB::table('categories')->where('id', $prod->cat_id)->value('title') ?? 'Luxury Apparel') : $fallback['category']);
        $title = !empty($saved['title']) ? $saved['title'] : ($prod ? $prod->title : $fallback['title']);

        if ($prod) {
            $price = $prod->price - ($prod->price * $prod->discount) / 100;
            $oldPrice = ($prod->discount > 0) ? $prod->price : 0;
            $photos = explode(',', $prod->photo);
            $photo = !empty($saved['photo']) ? $saved['photo'] : $photos[0];
            $slug = $prod->slug;
            $pId = $prod->id;
        } else {
            $price = !empty($saved['price']) ? $saved['price'] : $fallback['price'];
            $oldPrice = $fallback['old_price'];
            $photo = !empty($saved['photo']) ? $saved['photo'] : $fallback['image'];
            $slug = null;
            $pId = null;
        }

        $hotspots[] = [
            'id' => $i,
            'top' => $top,
            'left' => $left,
            'title' => $title,
            'category' => $cat,
            'price' => $price,
            'old_price' => $oldPrice,
            'image' => $photo,
            'slug' => $slug,
            'prod_id' => $pId,
            'tag' => $tag,
        ];
    }
@endphp
<section class="lookbook-section py-5">
    <div class="container-fluid px-lg-5 px-3">
        
        <!-- Clean Luxury Header -->
        <div class="luxury-section-title text-center mb-4">
            <span class="subtitle-tag" style="font-size: 11px; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; color: #111111; display: inline-block; margin-bottom: 6px;">
                <i class="fa fa-crosshairs text-dark mr-1"></i> {{$lbSubtitle}}
            </span>
            <h2 style="font-size: 30px; font-weight: 700; color: #111111; text-transform: uppercase; margin: 0; letter-spacing: -0.5px;">
                {{$lbTitle}}
            </h2>
            <p style="color: #666666; font-size: 14px; margin-top: 6px; max-width: 600px; margin-left: auto; margin-right: auto;">
                {{$lbDesc}}
            </p>
        </div>

        <div class="row align-items-center">
            
            <!-- Left: Interactive Model Banner with Hotspots (col-lg-7 col-12) -->
            <div class="col-lg-7 col-12 mb-4 mb-lg-0">
                <div class="lookbook-stage">
                    <img src="{{$lbImage}}" alt="Shop The Look Model" class="lookbook-hero-img">
                    
                    <!-- Floating Hint Badge -->
                    <div class="lookbook-hint-badge">
                        <i class="fa fa-hand-pointer-o mr-1"></i> Tap pins to view items
                    </div>

                    <!-- Hotspot Pins -->
                    @foreach($hotspots as $spot)
                        <div class="lookbook-pin-wrap" style="top: {{$spot['top']}}; left: {{$spot['left']}};" data-spot-id="{{$spot['id']}}">
                            
                            <!-- Pulsing Pin Button -->
                            <button type="button" class="lookbook-pin-btn" aria-label="View {{$spot['title']}}">
                                <span class="pin-ripple"></span>
                                <span class="pin-core"><i class="ti-plus"></i></span>
                            </button>

                            <!-- Floating Mini Popover Card -->
                            <div class="lookbook-popover-card">
                                <button type="button" class="popover-close-btn">&times;</button>
                                <div class="popover-content-flex">
                                    <img src="{{$spot['image']}}" alt="{{$spot['title']}}" class="popover-thumb">
                                    <div class="popover-info">
                                        <span class="popover-cat">{{$spot['category']}}</span>
                                        <h5 class="popover-title">{{$spot['title']}}</h5>
                                        <div class="popover-price">
                                            <span class="popover-current">PKR {{number_format($spot['price'], 0)}}</span>
                                            @if($spot['old_price'] > $spot['price'])
                                                <del class="popover-old">PKR {{number_format($spot['old_price'], 0)}}</del>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="popover-actions mt-2">
                                    @if(!empty($spot['prod_id']))
                                        <button type="button" class="popover-quickview-btn" data-toggle="modal" data-target="#{{$spot['prod_id']}}">
                                            <i class="ti-eye"></i> Quick View
                                        </button>
                                        <a href="{{route('product-detail', $spot['slug'])}}" class="popover-details-btn">
                                            <span>Shop</span> <i class="ti-arrow-right"></i>
                                        </a>
                                    @else
                                        <a href="{{route('product-grids')}}" class="popover-details-btn btn-block text-center">
                                            <span>Explore Style</span> <i class="ti-arrow-right"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Right: Curated Ensemble Matching Pieces (col-lg-5 col-12) -->
            <div class="col-lg-5 col-12">
                <div class="lookbook-sidebar-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="ensemble-title mb-0">The Complete Look</h4>
                        <span class="badge badge-dark px-2 py-1 font-weight-normal" style="background: #111111; color: #ffffff; font-size: 11px;">3 PIECES</span>
                    </div>
                    <p class="ensemble-desc mb-3">
                        Each piece is tailored with handpicked fabrics, contemporary cuts, and timeless Pakistani craftsmanship.
                    </p>

                    <!-- List of 3 items -->
                    <div class="ensemble-items-list">
                        @foreach($hotspots as $spot)
                            <div class="ensemble-item-card" data-spot-id="{{$spot['id']}}">
                                <div class="ensemble-item-thumb-wrap">
                                    <img src="{{$spot['image']}}" alt="{{$spot['title']}}">
                                    <span class="ensemble-spot-badge">{{$spot['id']}}</span>
                                </div>
                                <div class="ensemble-item-details">
                                    <span class="ensemble-item-tag">{{$spot['tag']}}</span>
                                    <h5 class="ensemble-item-name">{{$spot['title']}}</h5>
                                    <div class="ensemble-item-price">
                                        <span class="current">PKR {{number_format($spot['price'], 0)}}</span>
                                        @if($spot['old_price'] > $spot['price'])
                                            <del class="old">PKR {{number_format($spot['old_price'], 0)}}</del>
                                        @endif
                                    </div>
                                </div>
                                <div class="ensemble-item-action">
                                    @if(!empty($spot['prod_id']))
                                        <button type="button" class="ensemble-quick-btn" data-toggle="modal" data-target="#{{$spot['prod_id']}}" title="Quick View">
                                            <i class="ti-eye"></i>
                                        </button>
                                    @else
                                        <a href="{{route('product-grids')}}" class="ensemble-quick-btn" title="Explore">
                                            <i class="ti-arrow-right"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bottom Action: WhatsApp Styling Consultation -->
                    @php
                        $settings = DB::table('settings')->get();
                        $rawWhatsapp = (count($settings) > 0 && !empty($settings[0]->whatsapp)) ? $settings[0]->whatsapp : ($settings[0]->phone ?? '923366888806');
                        $cleanWhatsapp = preg_replace('/[^0-9]/', '', $rawWhatsapp);
                        if (substr($cleanWhatsapp, 0, 1) === '0') {
                            $cleanWhatsapp = '92' . substr($cleanWhatsapp, 1);
                        }
                        if (empty($cleanWhatsapp)) {
                            $cleanWhatsapp = '923366888806';
                        }
                    @endphp
                    <div class="mt-4 pt-3 border-top">
                        <a href="https://wa.me/{{$cleanWhatsapp}}?text={{urlencode('Hi YN-Trading, I would like to consult on the Shop The Look Popular Choices ensemble.')}}" target="_blank" class="ensemble-whatsapp-btn">
                            <i class="fa fa-whatsapp mr-2" style="font-size: 16px;"></i> Ask Stylist On WhatsApp
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
<!-- End POPULAR CHOICES: INTERACTIVE HOTSPOT LOOKBOOK -->

<!-- 7. Hot Trending Items Carousel -->
<div class="product-area most-popular section py-5">
    <div class="container-fluid px-lg-5 px-3">
        <div class="luxury-section-title">
            <span class="subtitle-tag">DISCOVER THE HYPE</span>
            <h2>Trending Now</h2>
            <p>The most sought-after apparel and hot styles loved by our customers</p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($product_lists as $product)
                        @if($product->condition=='hot' || $product->is_featured == 1 || $loop->iteration <= 6)
                            <div class="single-product fashion-card">
                                <div class="product-img">
                                    <a href="{{route('product-detail',$product->slug)}}">
                                        @php
                                            $photo=explode(',',$product->photo);
                                        @endphp
                                        <img class="default-img" src="{{$photo[0]}}" alt="{{$product->title}}">
                                        <img class="hover-img" src="{{$photo[1] ?? $photo[0]}}" alt="{{$product->title}}">
                                    </a>

                                    <!-- Badges -->
                                    <div class="card-badge-wrap">
                                        @if($product->discount > 0)
                                            <span class="badge-discount">-{{number_format($product->discount,0)}}%</span>
                                        @else
                                            <span class="badge-new">HOT</span>
                                        @endif
                                    </div>

                                    <!-- Wishlist Button -->
                                    <a title="Add to Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="card-wishlist-btn" data-id="{{$product->id}}">
                                        <i class="ti-heart"></i>
                                    </a>

                                    <!-- Quick View Button -->
                                    <button type="button" class="card-quick-view-btn" data-toggle="modal" data-target="#{{$product->id}}">
                                        <i class="ti-eye"></i> Quick View
                                    </button>

                                    <!-- Quick Add Bag -->
                                    <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}" class="card-quick-bag-btn">
                                        <i class="ti-bag"></i>
                                    </a>
                                </div>

                                <div class="product-content">
                                    <h3 class="product-title-text"><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                    @php
                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                    @endphp
                                    <div class="price-box">
                                        <span class="current-price">PKR {{number_format($after_discount,0)}}</span>
                                        @if($product->discount > 0)
                                            <del class="old-price">PKR {{number_format($product->price,0)}}</del>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hot Trending Items Area -->

<!-- 7. Customer Reviews & Social Proof Slider (Ultra-Luxury Showcase) -->
<section class="testimonials-section">
    <div class="container-fluid px-lg-5 px-3">
        
        <!-- Header & Trust Rating Summary -->
        <div class="testimonials-header-wrap">
            <div>
                <span class="subtitle-tag" style="font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: #111111; display: block; margin-bottom: 4px;">REAL EXPERIENCES</span>
                <h2 style="font-size: 28px; font-weight: 700; color: #111111; text-transform: uppercase; margin: 0; letter-spacing: -0.5px;">Loved By 50,000+ Shoppers</h2>
                <div class="trust-summary-pill">
                    <span class="trust-score">4.9</span>
                    <span class="trust-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                    <span class="trust-total-reviews">| 2,500+ Verified Reviews</span>
                </div>
            </div>
            
            <!-- Navigation Arrow Controls -->
            <div class="d-flex align-items-center" style="gap: 10px;">
                <button class="review-nav-btn" id="reviewScrollLeftBtn" title="Previous Reviews" type="button">
                    <i class="ti-arrow-left"></i>
                </button>
                <button class="review-nav-btn" id="reviewScrollRightBtn" title="Next Reviews" type="button">
                    <i class="ti-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Reviews Horizontal Slider Track -->
        <div class="testimonials-carousel-track no-scrollbar" id="testimonialsTrack">
            
            <!-- Review Card 1 -->
            <div class="testimonial-card-item">
                <div>
                    <div class="testimonial-card-header">
                        <div class="testimonial-stars">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <span class="verified-buyer-badge">
                            <i class="fa fa-check-circle"></i> Verified
                        </span>
                    </div>
                    <div class="review-product-tag">
                        <i class="ti-tag"></i> Luxury Unstitched Chiffon
                    </div>
                    <h4 class="testimonial-headline">"Exceeded All My Expectations!"</h4>
                    <p class="testimonial-quote">"The embroidery finesse and pure chiffon dupatta quality are breathtaking. Arrived in Karachi within 2 working days in luxury boxed packaging."</p>
                </div>
                <div class="testimonial-author-row">
                    <div class="testimonial-avatar" style="background: #111111;">A</div>
                    <div class="testimonial-author-details">
                        <h5>Ayesha Khan</h5>
                        <span class="author-location">Karachi, Pakistan</span>
                    </div>
                    <span class="time-tag">2 days ago</span>
                </div>
            </div>

            <!-- Review Card 2 -->
            <div class="testimonial-card-item">
                <div>
                    <div class="testimonial-card-header">
                        <div class="testimonial-stars">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <span class="verified-buyer-badge">
                            <i class="fa fa-check-circle"></i> Verified
                        </span>
                    </div>
                    <div class="review-product-tag">
                        <i class="ti-tag"></i> 3-Piece Festive Wedding Pret
                    </div>
                    <h4 class="testimonial-headline">"True To Color & Perfect Fit"</h4>
                    <p class="testimonial-quote">"Ordered 3 suits for my sister's wedding in Lahore. The color palette was exactly as shown on the website and the fabric drape was pure perfection."</p>
                </div>
                <div class="testimonial-author-row">
                    <div class="testimonial-avatar" style="background: #2b2b2b;">F</div>
                    <div class="testimonial-author-details">
                        <h5>Fatima Zahra</h5>
                        <span class="author-location">Lahore, Pakistan</span>
                    </div>
                    <span class="time-tag">5 days ago</span>
                </div>
            </div>

            <!-- Review Card 3 -->
            <div class="testimonial-card-item">
                <div>
                    <div class="testimonial-card-header">
                        <div class="testimonial-stars">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <span class="verified-buyer-badge">
                            <i class="fa fa-check-circle"></i> Verified
                        </span>
                    </div>
                    <div class="review-product-tag">
                        <i class="ti-tag"></i> Ready-To-Wear Designer Cut
                    </div>
                    <h4 class="testimonial-headline">"Top-Notch Support & Fast COD"</h4>
                    <p class="testimonial-quote">"WhatsApp team helped me select the right size. Received my parcel in Islamabad right on time. Outstanding shopping experience!"</p>
                </div>
                <div class="testimonial-author-row">
                    <div class="testimonial-avatar" style="background: #1f2937;">S</div>
                    <div class="testimonial-author-details">
                        <h5>Sadia Tariq</h5>
                        <span class="author-location">Islamabad, Pakistan</span>
                    </div>
                    <span class="time-tag">1 week ago</span>
                </div>
            </div>

            <!-- Review Card 4 -->
            <div class="testimonial-card-item">
                <div>
                    <div class="testimonial-card-header">
                        <div class="testimonial-stars">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <span class="verified-buyer-badge">
                            <i class="fa fa-check-circle"></i> Verified
                        </span>
                    </div>
                    <div class="review-product-tag">
                        <i class="ti-tag"></i> Festive Lawn Embroidered
                    </div>
                    <h4 class="testimonial-headline">"Seamless International Delivery"</h4>
                    <p class="testimonial-quote">"Shipped to Dubai in 4 business days. The organza patches and vibrant silk dupatta were immaculate. YN Trading has earned a loyal client."</p>
                </div>
                <div class="testimonial-author-row">
                    <div class="testimonial-avatar" style="background: #374151;">M</div>
                    <div class="testimonial-author-details">
                        <h5>Maryam Sheikh</h5>
                        <span class="author-location">Dubai, UAE</span>
                    </div>
                    <span class="time-tag">1 week ago</span>
                </div>
            </div>

            <!-- Review Card 5 -->
            <div class="testimonial-card-item">
                <div>
                    <div class="testimonial-card-header">
                        <div class="testimonial-stars">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <span class="verified-buyer-badge">
                            <i class="fa fa-check-circle"></i> Verified
                        </span>
                    </div>
                    <div class="review-product-tag">
                        <i class="ti-tag"></i> Modest Luxury Kurti & Trouser
                    </div>
                    <h4 class="testimonial-headline">"Finest Stitching & Neat Borders"</h4>
                    <p class="testimonial-quote">"The stitching neatness on sleeves and daman is exceptional. Premium lining included. Very satisfied with the fabric breathability."</p>
                </div>
                <div class="testimonial-author-row">
                    <div class="testimonial-avatar" style="background: #111827;">Z</div>
                    <div class="testimonial-author-details">
                        <h5>Zainab Raza</h5>
                        <span class="author-location">Faisalabad, Pakistan</span>
                    </div>
                    <span class="time-tag">2 weeks ago</span>
                </div>
            </div>

            <!-- Review Card 6 -->
            <div class="testimonial-card-item">
                <div>
                    <div class="testimonial-card-header">
                        <div class="testimonial-stars">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <span class="verified-buyer-badge">
                            <i class="fa fa-check-circle"></i> Verified
                        </span>
                    </div>
                    <div class="review-product-tag">
                        <i class="ti-tag"></i> Luxury Jacquard Collection
                    </div>
                    <h4 class="testimonial-headline">"Will Be Ordering Again Soon!"</h4>
                    <p class="testimonial-quote">"The jacquard texture and metallic lace accents are pure elegance. Received compliments all evening. 10/10 recommended!"</p>
                </div>
                <div class="testimonial-author-row">
                    <div class="testimonial-avatar" style="background: #0f172a;">H</div>
                    <div class="testimonial-author-details">
                        <h5>Hina Bilal</h5>
                        <span class="author-location">Rawalpindi, Pakistan</span>
                    </div>
                    <span class="time-tag">2 weeks ago</span>
                </div>
            </div>

        </div>

        <!-- Social Proof Stats Strip -->
        <div class="testimonials-stats-bar">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="stat-metric-box">
                        <div class="stat-metric-number">4.9 / 5.0</div>
                        <div class="stat-metric-label">Average Customer Score</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-metric-box">
                        <div class="stat-metric-number">50,000+</div>
                        <div class="stat-metric-label">Orders Delivered</div>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 mt-md-0">
                    <div class="stat-metric-box">
                        <div class="stat-metric-number">98.6%</div>
                        <div class="stat-metric-label">Client Satisfaction Rate</div>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 mt-md-0">
                    <div class="stat-metric-box">
                        <div class="stat-metric-number">24 - 48 Hrs</div>
                        <div class="stat-metric-label">Express Delivery Speed</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Reviews Section -->

<!-- 8. VIP Newsletter Subscription -->
@include('frontend.layouts.newsletter')

<!-- 9. Quick View Modals (Ultra-Luxury & Responsive for All Products) -->
@php
    $allModalProducts = DB::table('products')->where('status', 'active')->get();
@endphp
@if($allModalProducts)
    @foreach($allModalProducts as $key=>$product)
        <div class="modal fade custom-quickview-modal" id="{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                    <!-- Top Right Close Button -->
                    <button type="button" class="quickview-close-btn" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>

                    <div class="modal-body">
                        <div class="row no-gutters align-items-center">
                            
                            <!-- Left Column: Gallery -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="qv-gallery-col">
                                    @php
                                        $photos = explode(',', $product->photo);
                                    @endphp
                                    <div class="qv-main-img-wrap">
                                        <img id="main-qv-img-{{$product->id}}" src="{{$photos[0]}}" alt="{{$product->title}}">
                                    </div>
                                    @if(count($photos) > 1)
                                        <div class="qv-thumbnails-wrap">
                                            @foreach($photos as $pIndex => $pPhoto)
                                                <div class="qv-thumb-item {{$pIndex == 0 ? 'active' : ''}}" onclick="document.getElementById('main-qv-img-{{$product->id}}').src = '{{$pPhoto}}'; $(this).addClass('active').siblings().removeClass('active');">
                                                    <img src="{{$pPhoto}}" alt="thumbnail">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Right Column: Product Info -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="qv-details-col">
                                    @php
                                        $catInfo = DB::table('categories')->where('id', $product->cat_id)->first();
                                    @endphp
                                    @if($catInfo)
                                        <span class="qv-category-tag">{{$catInfo->title}}</span>
                                    @endif

                                    <h2 class="qv-title">{{$product->title}}</h2>

                                    <div class="qv-meta-row">
                                        <div class="qv-stars">
                                            @php
                                                $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                            @endphp
                                            @for($i=1; $i<=5; $i++)
                                                @if($rate>=$i)
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="fa fa-star-o text-muted"></i>
                                                @endif
                                            @endfor
                                            <span class="text-muted ml-1" style="font-size: 12px;">({{$rate_count}} reviews)</span>
                                        </div>

                                        @if($product->stock > 0)
                                            <span class="qv-stock-badge"><i class="fa fa-check-circle"></i> In Stock ({{$product->stock}})</span>
                                        @else
                                            <span class="qv-stock-badge out"><i class="fa fa-times-circle"></i> Sold Out</span>
                                        @endif
                                    </div>

                                    @php
                                        $after_discount = ($product->price - ($product->price * $product->discount) / 100);
                                    @endphp
                                    <div class="qv-price-box">
                                        <span class="qv-current-price">PKR {{number_format($after_discount,0)}}</span>
                                        @if($product->discount > 0)
                                            <del class="qv-old-price">PKR {{number_format($product->price,0)}}</del>
                                            <span class="qv-discount-badge">-{{number_format($product->discount,0)}}% OFF</span>
                                        @endif
                                    </div>

                                    <div class="qv-summary">
                                        <p>{!! strip_tags(html_entity_decode($product->summary)) !!}</p>
                                    </div>

                                    <form action="{{route('single-add-to-cart')}}" method="POST" class="mt-2">
                                        @csrf
                                        <input type="hidden" name="slug" value="{{$product->slug}}">

                                        @if($product->size)
                                            <div class="qv-size-wrap">
                                                <span class="qv-size-title">Select Size:</span>
                                                <div class="qv-size-pills">
                                                    @php
                                                        $sizes=explode(',',$product->size);
                                                    @endphp
                                                    @foreach($sizes as $sIdx => $size)
                                                        <label class="qv-size-pill {{$sIdx == 0 ? 'active' : ''}}">
                                                            <input type="radio" name="size" value="{{$size}}" {{$sIdx == 0 ? 'checked' : ''}}>
                                                            <span>{{$size}}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        <div class="qv-action-form">
                                            <!-- Quantity Stepper -->
                                            <div class="qv-qty-stepper">
                                                <button type="button" class="qv-qty-btn" onclick="var input = this.parentNode.querySelector('input'); var val = parseInt(input.value); if(val > 1) input.value = val - 1;">
                                                    <i class="ti-minus"></i>
                                                </button>
                                                <input type="text" name="quant[1]" class="qv-qty-input" value="1" min="1" max="100" readonly>
                                                <button type="button" class="qv-qty-btn" onclick="var input = this.parentNode.querySelector('input'); var val = parseInt(input.value); input.value = val + 1;">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>

                                            <button type="submit" class="qv-add-cart-btn" {{$product->stock <= 0 ? 'disabled' : ''}}>
                                                <i class="ti-bag"></i> Add To Cart
                                            </button>

                                            <a href="{{route('add-to-wishlist',$product->slug)}}" class="qv-wishlist-btn" title="Add to Wishlist">
                                                <i class="ti-heart"></i>
                                            </a>
                                        </div>
                                    </form>

                                    <a href="{{route('product-detail', $product->slug)}}" class="qv-view-detail-link">
                                        View Full Details <i class="ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endif
<!-- Modal end -->
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    /* Isotope Filtering */
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });
    });

    $(window).on('load', function () {
        $topeContainer.each(function () {
            var $grid = $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true
            });
            setTimeout(function(){
                $grid.isotope('layout');
            }, 300);
        });
    });

    var isotopeButton = $('.filter-tope-group button');
    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('active').removeClass('how-active1');
            }
            $(this).addClass('active');
        });
    });

    $(document).ready(function() {
        $('#Gslider').carousel({
            interval: 4500,
            pause: 'hover'
        });

        /* 1. Category Horizontal Scroll (< > Buttons) */
        var catTrack = document.getElementById('categoryCircleTrack');
        var catLeft = document.getElementById('catScrollLeftBtn');
        var catRight = document.getElementById('catScrollRightBtn');

        if (catTrack && catLeft && catRight) {
            catLeft.addEventListener('click', function() {
                catTrack.scrollBy({ left: -320, behavior: 'smooth' });
            });
            catRight.addEventListener('click', function() {
                catTrack.scrollBy({ left: 320, behavior: 'smooth' });
            });
        }

        /* 2. Testimonials Horizontal Scroll (< > Buttons) */
        var reviewTrack = document.getElementById('testimonialsTrack');
        var reviewLeft = document.getElementById('reviewScrollLeftBtn');
        var reviewRight = document.getElementById('reviewScrollRightBtn');

        if (reviewTrack && reviewLeft && reviewRight) {
            reviewLeft.addEventListener('click', function() {
                reviewTrack.scrollBy({ left: -380, behavior: 'smooth' });
            });
            reviewRight.addEventListener('click', function() {
                reviewTrack.scrollBy({ left: 380, behavior: 'smooth' });
            });
        }

        /* 3. Interactive Lookbook Hotspots & Ensemble Linking */
        $('.lookbook-pin-btn').on('click', function(e) {
            e.stopPropagation();
            var $pinWrap = $(this).closest('.lookbook-pin-wrap');
            var spotId = $pinWrap.data('spot-id');
            var isActive = $pinWrap.hasClass('active');

            $('.lookbook-pin-wrap').removeClass('active');
            $('.ensemble-item-card').removeClass('active');

            if (!isActive) {
                $pinWrap.addClass('active');
                $('.ensemble-item-card[data-spot-id="' + spotId + '"]').addClass('active');
            }
        });

        $('.popover-close-btn').on('click', function(e) {
            e.stopPropagation();
            $(this).closest('.lookbook-pin-wrap').removeClass('active');
            $('.ensemble-item-card').removeClass('active');
        });

        $('.ensemble-item-card').on('mouseenter', function() {
            var spotId = $(this).data('spot-id');
            $('.ensemble-item-card').removeClass('active');
            $(this).addClass('active');
            $('.lookbook-pin-wrap').removeClass('active');
            $('.lookbook-pin-wrap[data-spot-id="' + spotId + '"]').addClass('active');
        }).on('mouseleave', function() {
            var spotId = $(this).data('spot-id');
            $(this).removeClass('active');
            $('.lookbook-pin-wrap[data-spot-id="' + spotId + '"]').removeClass('active');
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.lookbook-pin-wrap').length) {
                $('.lookbook-pin-wrap').removeClass('active');
                $('.ensemble-item-card').removeClass('active');
            }
        });

        /* 4. Modal Background Scroll Lock & Size Selection */
        $(document).on('show.bs.modal', '.custom-quickview-modal', function () {
            $('body').addClass('modal-open').css({ 'overflow': 'hidden', 'height': '100vh' });
        });
        $(document).on('hidden.bs.modal', '.custom-quickview-modal', function () {
            $('body').removeClass('modal-open').css({ 'overflow': '', 'height': '' });
        });

        $(document).on('click', '.qv-size-pill', function() {
            $(this).addClass('active').siblings().removeClass('active');
            $(this).find('input[type="radio"]').prop('checked', true);
        });
    });
</script>
@endpush
