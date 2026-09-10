@extends('frontend.layouts.master')

@section('title','YN Trading || About Us')

@section('main-content')
@php
    $setting = DB::table('settings')->first();
    $photos = ($setting && !empty($setting->photo)) ? explode(',', $setting->photo) : [];
    $aboutPhoto = (count($photos) > 0 && !empty($photos[0])) ? trim($photos[0]) : 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=800&q=80';
@endphp

<!-- 1. Luxury About Us Hero Banner -->
<section class="about-hero-banner">
    <div class="container">
        <span class="about-hero-badge">OUR HERITAGE & VISION</span>
        <h1 class="about-hero-title">Crafting Timeless Luxury & Elegance</h1>
        <p class="about-hero-desc">
            Where traditional Pakistani artisanal embroidery meets modern high-fashion silhouettes, creating unforgettable couture for discerning wardrobes worldwide.
        </p>
        <div class="about-breadcrumbs">
            <a href="{{route('home')}}"><i class="ti-home"></i> Home</a>
            <span>/</span>
            <span style="color: #ffffff;">About Us</span>
        </div>
    </div>
</section>

<!-- 2. Brand Story & Visual Collage Section -->
<section class="about-story-section">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Left: Brand Philosophy & Content -->
            <div class="col-lg-6 col-12">
                <div class="about-story-content pr-lg-4">
                    <span class="story-subtitle">WHO WE ARE</span>
                    <h2>Redefining High Fashion & Pret Couture</h2>
                    
                    <p class="story-lead">
                        Founded with an unwavering passion for sartorial excellence, <strong>YN Trading</strong> stands as a premier destination for unstitched luxury fabrics, ready-to-wear pret, and bespoke bridal masterpieces.
                    </p>

                    <div class="story-body">
                        @if($setting && !empty($setting->description))
                            <p>{!! html_entity_decode($setting->description) !!}</p>
                        @else
                            <p>
                                Each collection is a celebration of exquisite textures, intricate hand-placed embellishments, and meticulous tailoring. We bridge the gap between timeless heritage techniques and modern global style, empowering our clientele to feel effortlessly refined on every occasion.
                            </p>
                        @endif
                    </div>

                    <!-- 3 Key Metrics Row -->
                    <div class="about-metrics-row">
                        <div class="about-metric-pill">
                            <h4>50K+</h4>
                            <p>Happy Shoppers</p>
                        </div>
                        <div class="about-metric-pill">
                            <h4>100%</h4>
                            <p>Authentic Fabrics</p>
                        </div>
                        <div class="about-metric-pill">
                            <h4>25+</h4>
                            <p>Master Artisans</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="about-actions-wrap">
                        <a href="{{route('product-grids')}}" class="about-primary-btn">
                            <span>Explore Collection</span>
                            <i class="ti-arrow-right"></i>
                        </a>
                        <a href="{{route('contact')}}" class="about-secondary-btn">
                            <span>Contact Concierge</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: High-Fashion Visual Collage -->
            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                <div class="about-image-collage">
                    <div class="about-main-img-box">
                        <img src="{{$aboutPhoto}}" alt="YN Trading Luxury Craftsmanship">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 3. Core Brand Pillars (4 Value Cards) -->
<section class="about-pillars-section">
    <div class="container">
        <div class="luxury-section-title mb-5">
            <span class="subtitle-tag">THE YN STANDARD</span>
            <h2>Our Core Pillars of Excellence</h2>
            <p>Every piece in our catalog embodies four non-negotiable promises of luxury</p>
        </div>

        <div class="row">
            <!-- Pillar 1 -->
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="about-pillar-card">
                    <div class="about-pillar-icon-box">
                        <i class="ti-crown"></i>
                    </div>
                    <h4>Artisanal Heritage</h4>
                    <p>Centuries-old zardozi, resham threadwork, and hand-placed sequin detailing on pure chiffons & silks.</p>
                </div>
            </div>

            <!-- Pillar 2 -->
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="about-pillar-card">
                    <div class="about-pillar-icon-box">
                        <i class="ti-cut"></i>
                    </div>
                    <h4>Master Tailoring</h4>
                    <p>Impeccable bespoke cuts, ergonomic drape, and custom made-to-measure stitching options.</p>
                </div>
            </div>

            <!-- Pillar 3 -->
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="about-pillar-card">
                    <div class="about-pillar-icon-box">
                        <i class="ti-package"></i>
                    </div>
                    <h4>Insured Express Shipping</h4>
                    <p>Tamper-proof signature packaging delivered safely across Pakistan and worldwide via DHL.</p>
                </div>
            </div>

            <!-- Pillar 4 -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="about-pillar-card">
                    <div class="about-pillar-icon-box">
                        <i class="ti-headphone-alt"></i>
                    </div>
                    <h4>Dedicated Concierge</h4>
                    <p>24/7 styling consultants available on WhatsApp to assist with sizes, matching, and order tracking.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. Craftsmanship Journey (4-Step Sequential Process) -->
<section class="about-process-section">
    <div class="container">
        <div class="luxury-section-title mb-5">
            <span class="subtitle-tag">FROM ATELIER TO YOU</span>
            <h2>The Craftsmanship Journey</h2>
            <p>How an idea transforms into a masterpiece in your wardrobe</p>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="process-step-card">
                    <div class="process-step-num">01</div>
                    <h4>Concept & Palette</h4>
                    <p>Our design studio sketches seasonal silhouettes and harmonizes rich royal color palettes.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="process-step-card">
                    <div class="process-step-num">02</div>
                    <h4>Pure Fabric Sourcing</h4>
                    <p>Only Grade-A pure raw silks, organic cotton lawns, velvets, and chiffons are handpicked.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="process-step-card">
                    <div class="process-step-num">03</div>
                    <h4>Master Embroidery</h4>
                    <p>Skilled artisans spend dozens of hours executing fine hand needlework and delicate borders.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="process-step-card">
                    <div class="process-step-num">04</div>
                    <h4>3-Stage Inspection</h4>
                    <p>Every seam is meticulously examined before sealing in our luxury magnetic gift packaging.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Luxury Testimonial Quote Banner -->
<section class="about-quote-section">
    <div class="container">
        <div class="about-quote-stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <p class="about-quote-text">
            "YN Trading is not merely about attire; it is an unmatched experience of timeless poise, exquisite textures, and flawless craftsmanship."
        </p>
        <span class="about-quote-author">Client Patron · Verified Luxury Shopper</span>
    </div>
</section>

<!-- 6. Call To Action (CTA) -->
<section class="py-5" style="background: #ffffff;">
    <div class="container text-center py-3">
        <h3 style="font-size: 26px; font-weight: 800; color: #111111; text-transform: uppercase; margin-bottom: 10px;">
            Ready to Elevate Your Wardrobe?
        </h3>
        <p style="color: #6b7280; font-size: 14.5px; max-width: 500px; margin: 0 auto 24px;">
            Explore our curated selection of seasonal unstitched ensembles, luxury pret, and festive statements.
        </p>
        <a href="{{route('product-grids')}}" class="about-primary-btn" style="padding: 14px 38px; border-radius: 30px;">
            <span>Discover The Collection</span>
            <i class="ti-arrow-right"></i>
        </a>
    </div>
</section>

<!-- Newsletter Component -->
@include('frontend.layouts.newsletter')

@endsection
