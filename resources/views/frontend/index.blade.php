@extends('frontend.layouts.master')
@section('title','YN Trading || Luxury Fashion & Pakistani Apparel')

@push('styles')
<style>
    /* ==========================================================
       TRUST BADGES & VALUE PROPS SECTION (LUXURY HOOK STRIP)
       ========================================================== */
    .trust-strip-section {
        background: #ffffff;
        padding: 90px 0 100px 0;
        margin-top: 25px;
        margin-bottom: 55px;
        overflow: hidden;
        position: relative;
        border-bottom: 1px solid #f0f0f0;
    }

    .trust-hook-tag {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #111111;
        background: #f4f4f5;
        border: 1px solid #e4e4e7;
        padding: 5px 18px;
        border-radius: 50px;
        margin-bottom: 14px;
    }

    .trust-hook-title {
        font-size: 24px;
        font-weight: 800;
        color: #111111;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .trust-hook-sub {
        font-size: 13.5px;
        color: #666666;
        max-width: 520px;
        margin: 0 auto 48px;
        line-height: 1.5;
    }

    .trust-strip-wrapper {
        display: flex;
        overflow: hidden;
        user-select: none;
        width: 100%;
        -webkit-mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent);
        mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent);
        padding: 10px 0;
    }

    .trust-strip-track {
        display: flex;
        flex-shrink: 0;
        align-items: center;
        gap: 22px;
        animation: trust-strip-scroll-ltr 28s linear infinite;
        will-change: transform;
    }

    .trust-strip-wrapper:hover .trust-strip-track {
        animation-play-state: paused;
    }

    @keyframes trust-strip-scroll-ltr {
        0% {
            transform: translate3d(-50%, 0, 0);
        }
        100% {
            transform: translate3d(0%, 0, 0);
        }
    }

    .trust-feature-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #ffffff;
        border: 1.5px solid #eaeaea;
        border-radius: 50px;
        padding: 10px 24px 10px 14px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
        white-space: nowrap;
        flex-shrink: 0;
        cursor: default;
    }

    .trust-feature-card:hover {
        background: #ffffff;
        border-color: #111111;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .trust-feature-icon {
        width: 44px;
        height: 44px;
        min-width: 44px;
        border-radius: 50%;
        background: #111111;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: all 0.25s ease;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.18);
    }

    .trust-feature-card:hover .trust-feature-icon {
        background: #000000;
        transform: scale(1.08);
    }

    .trust-feature-content h4 {
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #111111 !important;
        margin: 0 0 2px 0 !important;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }

    .trust-feature-content p {
        font-size: 11.5px !important;
        color: #666666 !important;
        margin: 0 !important;
        line-height: 1.3 !important;
    }

    /* ==========================================================
       CATEGORY CARDS & SECTION REFINEMENTS
       ========================================================== */
    .featured-categories-section {
        padding: 40px 0 85px 0 !important;
    }

    .category-section-header {
        margin-top: -10px;
        margin-bottom: 40px;
    }

    .category-card-wrapper {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .luxury-dark-category-card {
        display: block;
        text-decoration: none !important;
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.45);
        border: 1px solid rgba(255, 255, 255, 0.12);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        height: 380px;
        background: #141414;
    }

    .category-card-wrapper:hover .luxury-dark-category-card {
        border-color: rgba(255, 255, 255, 0.28);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6);
    }

    .dark-category-img-wrap {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .dark-category-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
        filter: brightness(0.85);
        transition: none !important;
        transform: none !important;
    }

    .dark-category-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.78) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
        padding: 26px 22px;
    }

    .cat-title {
        font-size: 23px !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        margin: 0 !important;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        line-height: 1.25;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
    }

    .category-card-footer {
        padding-top: 6px;
    }

    .cat-bottom-link {
        font-size: 13px;
        font-weight: 700;
        color: #ffffff !important;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent !important;
        border: none !important;
        padding: 0 !important;
        text-decoration: none !important;
        transition: gap 0.25s ease, opacity 0.2s ease;
    }

    .cat-bottom-link i {
        font-size: 11px;
        transition: transform 0.25s ease;
    }

    .category-card-wrapper:hover .cat-bottom-link {
        opacity: 0.9;
    }

    .category-card-wrapper:hover .cat-bottom-link i {
        transform: translateX(5px);
    }

    /* ==========================================================
       OPTION A: LUXURY NEW ARRIVALS & FILTER TABS
       ========================================================== */
    .luxury-new-arrivals-section {
        padding: 85px 0 95px 0 !important;
        background: #ffffff;
        position: relative;
    }

    .new-arrivals-header {
        margin-bottom: 35px;
    }

    .new-arrivals-tag {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #111111;
        background: #f4f4f5;
        border: 1px solid #e4e4e7;
        padding: 5px 18px;
        border-radius: 50px;
        margin-bottom: 12px;
    }

    .new-arrivals-title {
        font-size: 32px;
        font-weight: 800;
        color: #111111;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
        line-height: 1.25;
    }

    .new-arrivals-sub {
        font-size: 14px;
        color: #666666;
        max-width: 540px;
        margin: 0 auto;
        line-height: 1.5;
    }

    /* Filter Navigation Pills */
    .luxury-filter-nav-wrap {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        padding: 6px 4px 14px 4px;
    }

    .luxury-filter-nav-wrap::-webkit-scrollbar {
        display: none;
    }

    .luxury-filter-nav {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 6px 8px;
        background: #f8f9fa;
        border: 1.5px solid #e9ecef;
        border-radius: 50px;
        list-style: none;
        margin: 0;
    }

    .filter-pill-btn {
        background: transparent;
        border: 1px solid transparent;
        outline: none !important;
        padding: 9px 24px;
        border-radius: 50px;
        font-size: 13.5px;
        font-weight: 600;
        color: #4b5563;
        letter-spacing: 0.3px;
        cursor: pointer;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .filter-pill-btn:hover {
        color: #000000;
        background: rgba(0, 0, 0, 0.05);
    }

    .filter-pill-btn.active {
        background: #000000 !important;
        color: #ffffff !important;
        border-color: #000000 !important;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2);
    }

    /* Product Card */
    .luxury-product-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #eef0f2;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .luxury-product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.09);
        border-color: #d1d5db;
    }

    .card-media-wrap {
        position: relative;
        width: 100%;
        aspect-ratio: 3 / 4;
        overflow: hidden;
        background: #f4f5f7;
    }

    .card-media-wrap .product-link {
        display: block;
        width: 100%;
        height: 100%;
        position: relative;
        text-decoration: none;
    }

    .card-media-wrap img.img-primary,
    .card-media-wrap img.img-secondary {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
        transition: transform 0.65s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.4s ease;
    }

    .card-media-wrap img.img-secondary {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .luxury-product-card:hover .card-media-wrap img.img-primary {
        transform: scale(1.05);
    }

    .luxury-product-card:hover .card-media-wrap img.img-secondary {
        opacity: 1;
        transform: scale(1.05);
    }

    /* Badges */
    .card-badges-container {
        position: absolute;
        top: 12px;
        left: 12px;
        z-index: 3;
        display: flex;
        flex-direction: column;
        gap: 6px;
        pointer-events: none;
    }

    .luxury-badge {
        font-size: 10.5px;
        font-weight: 800;
        padding: 5px 10px;
        border-radius: 4px;
        letter-spacing: 0.6px;
        text-transform: uppercase;
        line-height: 1;
        display: inline-block;
        width: fit-content;
    }

    .badge-sale {
        background: #000000;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
    }

    .badge-brandnew {
        background: #ffffff;
        color: #000000;
        border: 1px solid #000000;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .badge-soldout {
        background: #71717a;
        color: #ffffff;
    }

    /* Glassmorphic Wishlist */
    .card-glass-wishlist {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(0, 0, 0, 0.06);
        color: #111111;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        z-index: 4;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        text-decoration: none !important;
    }

    .card-glass-wishlist:hover {
        background: #c62828;
        color: #ffffff !important;
        border-color: #c62828;
        transform: scale(1.12);
        box-shadow: 0 6px 18px rgba(198, 40, 40, 0.3);
    }

    /* Slide-Up Bottom Action Bar */
    .card-action-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        align-items: center;
        background: rgba(10, 10, 10, 0.92);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        z-index: 4;
        transform: translateY(101%);
        transition: transform 0.32s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .luxury-product-card:hover .card-action-bar {
        transform: translateY(0);
    }

    .card-action-bar .action-btn {
        flex: 1;
        padding: 12px 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        color: #ffffff !important;
        font-size: 11.5px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        text-decoration: none !important;
        background: transparent;
        border: none;
        cursor: pointer;
        transition: background 0.2s ease, color 0.2s ease;
        line-height: 1;
    }

    .card-action-bar .action-btn i {
        font-size: 13px;
    }

    .card-action-bar .action-btn.action-cart {
        border-right: 1px solid rgba(255, 255, 255, 0.16);
    }

    .card-action-bar .action-btn:hover {
        background: #ffffff;
        color: #000000 !important;
    }

    /* Product Card Body */
    .card-info-wrap {
        padding: 16px 16px 20px 16px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .card-category-eyebrow {
        font-size: 11px;
        font-weight: 600;
        color: #888888;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 6px;
        display: block;
    }

    .card-product-title {
        font-size: 14.5px !important;
        font-weight: 600 !important;
        line-height: 1.4 !important;
        margin: 0 0 10px 0 !important;
        height: 40px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .card-product-title a {
        color: #111111 !important;
        text-decoration: none !important;
        transition: color 0.2s ease;
    }

    .card-product-title a:hover {
        color: #000000 !important;
        text-decoration: underline !important;
    }

    .card-price-row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: auto;
    }

    .price-current {
        font-size: 15.5px;
        font-weight: 800;
        color: #111111;
        letter-spacing: -0.2px;
    }

    .price-original {
        font-size: 13px;
        color: #9ca3af;
        text-decoration: line-through;
    }

    .price-discount-pill {
        font-size: 10px;
        font-weight: 700;
        color: #b91c1c;
        background: #fee2e2;
        padding: 2px 7px;
        border-radius: 4px;
        letter-spacing: 0.3px;
    }

    /* Bottom Centered CTA */
    .luxury-explore-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 15px 42px;
        background: #000000;
        color: #ffffff !important;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        text-decoration: none !important;
        box-shadow: 0 6px 22px rgba(0, 0, 0, 0.16);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1.5px solid #000000;
    }

    .luxury-explore-all-btn i {
        font-size: 12px;
        transition: transform 0.25s ease;
    }

    .luxury-explore-all-btn:hover {
        background: #ffffff;
        color: #000000 !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        transform: translateY(-2px);
    }

    .luxury-explore-all-btn:hover i {
        transform: translateX(6px);
    }

    /* ==========================================================
       OPTION 1: LUXURY TRENDING NOW SECTION & SLIDER
       ========================================================== */
    .luxury-trending-section {
        padding: 85px 0 95px 0 !important;
        background: #fbfbfb;
        position: relative;
        border-top: 1px solid #f0f0f0;
        border-bottom: 1px solid #f0f0f0;
    }

    .trending-header-centered {
        max-width: 680px;
        margin: 0 auto 36px auto;
    }

    .trending-tag {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #111111;
        background: #ffffff;
        border: 1px solid #e4e4e7;
        padding: 5px 18px;
        border-radius: 50px;
        margin-bottom: 12px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
    }

    .trending-title {
        font-size: 32px;
        font-weight: 800;
        color: #111111;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        line-height: 1.25;
    }

    .trending-subtitle {
        font-size: 14px;
        color: #666666;
        margin: 0 auto;
        line-height: 1.5;
        max-width: 520px;
    }

    .trending-center-controls {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        margin-top: 18px;
    }

    .trending-center-pill {
        font-size: 12.5px;
        font-weight: 700;
        color: #111111 !important;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #ffffff;
        border: 1.5px solid #e5e7eb;
        padding: 10px 24px;
        border-radius: 50px;
        text-decoration: none !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .trending-center-pill i {
        font-size: 11px;
        transition: transform 0.25s ease;
    }

    .trending-center-pill:hover {
        background: #000000;
        color: #ffffff !important;
        border-color: #000000;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    .trending-center-pill:hover i {
        transform: translateX(4px);
    }

    .trending-nav-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #ffffff;
        border: 1.5px solid #e5e7eb;
        color: #111111;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        cursor: pointer;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        outline: none !important;
    }

    .trending-nav-btn:hover {
        background: #000000;
        border-color: #000000;
        color: #ffffff;
        transform: scale(1.06);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .trending-nav-btn:active {
        transform: scale(0.96);
    }

    /* Ranking Badges */
    .badge-rank-top {
        background: #000000 !important;
        color: #ffffff !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .badge-rank-second {
        background: #1e293b !important;
        color: #ffffff !important;
    }

    .badge-rank-third {
        background: #334155 !important;
        color: #ffffff !important;
    }

    .badge-hot {
        background: #b91c1c !important;
        color: #ffffff !important;
    }

    /* Owl Carousel Customization for Trending */
    .luxury-trending-slider .owl-stage-outer {
        padding: 10px 0 16px 0;
    }

    .luxury-trending-slider .owl-nav {
        display: none !important;
    }

    .luxury-trending-slider .owl-dots {
        margin-top: 24px;
        text-align: center;
    }

    .luxury-trending-slider .owl-dot span {
        width: 8px;
        height: 8px;
        margin: 4px;
        background: #d1d5db;
        display: inline-block;
        border-radius: 50%;
        transition: all 0.25s ease;
    }

    .luxury-trending-slider .owl-dot.active span {
        background: #000000;
        width: 24px;
        border-radius: 10px;
    }

    /* ==========================================================
       CENTERED LUXURY TESTIMONIALS SECTION
       ========================================================== */
    .testimonials-section {
        padding: 85px 0 85px;
        background: #ffffff;
        border-top: 1px solid #f0f0f0;
        border-bottom: 1px solid #f0f0f0;
        position: relative;
    }

    .testimonials-header-centered {
        max-width: 680px;
        margin: 0 auto 38px auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .testimonials-tag {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #111111;
        background: #f4f4f5;
        border: 1px solid #e4e4e7;
        padding: 5px 18px;
        border-radius: 50px;
        margin-bottom: 12px;
    }

    .testimonials-title {
        font-size: 32px;
        font-weight: 800;
        color: #111111;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 12px;
        line-height: 1.25;
    }

    .trust-summary-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #ffffff;
        border: 1.5px solid #e5e7eb;
        padding: 7px 18px;
        border-radius: 50px;
        margin-bottom: 18px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .trust-score {
        font-size: 15px;
        font-weight: 800;
        color: #111111;
    }

    .trust-stars {
        color: #f59e0b;
        font-size: 13px;
        letter-spacing: 1.5px;
    }

    .trust-total-reviews {
        font-size: 12px;
        color: #666666;
        font-weight: 600;
    }

    .testimonials-center-controls {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .review-nav-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #ffffff;
        border: 1.5px solid #e5e7eb;
        color: #111111;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        font-size: 15px;
        outline: none !important;
    }

    .review-nav-btn:hover {
        background: #000000;
        border-color: #000000;
        color: #ffffff;
        transform: scale(1.06);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .review-nav-btn:active {
        transform: scale(0.96);
    }

    /* ==========================================================
       OPTION 1: LUXURY VIP NEWSLETTER (OBSIDIAN GLASSMORPHISM)
       ========================================================== */
    .vip-newsletter-section {
        padding: 85px 0 95px 0;
        background: #ffffff;
        position: relative;
    }

    .vip-newsletter-card {
        background: #0a0a0a;
        border: 1.5px solid rgba(255, 255, 255, 0.14);
        border-radius: 36px;
        padding: 68px 36px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }

    .vip-ambient-glow {
        position: absolute;
        top: -50%;
        left: 50%;
        transform: translateX(-50%);
        width: 600px;
        height: 350px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0) 70%);
        pointer-events: none;
    }

    .vip-newsletter-content {
        max-width: 720px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .vip-tag {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #ffffff;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 7px 22px;
        border-radius: 9999px;
        margin-bottom: 18px;
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
    }

    .vip-title {
        font-size: 34px !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 12px !important;
        line-height: 1.25 !important;
    }

    .vip-desc {
        font-size: 14.5px !important;
        color: rgba(255, 255, 255, 0.75) !important;
        line-height: 1.6 !important;
        max-width: 580px;
        margin: 0 auto 30px auto !important;
    }

    /* 3 Micro Perks Row - Pill Capsules */
    .vip-perks-row {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 34px;
        flex-wrap: wrap;
    }

    .vip-perk-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.95);
        letter-spacing: 0.3px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.12);
        padding: 8px 18px;
        border-radius: 9999px;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        transition: all 0.25s ease;
    }

    .vip-perk-item:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.25);
        transform: translateY(-2px);
    }

    .vip-perk-icon {
        font-size: 15px;
    }

    .vip-perk-divider {
        display: none;
    }

    /* Form Styling */
    .vip-newsletter-form {
        max-width: 560px;
        margin: 0 auto 16px auto;
    }

    .vip-input-wrap {
        display: flex;
        align-items: center;
        background: #ffffff;
        border-radius: 9999px !important;
        padding: 6px 6px 6px 22px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        transition: box-shadow 0.3s ease;
    }

    .vip-input-icon {
        color: #6b7280;
        font-size: 16px;
        margin-right: 10px;
    }

    .vip-input-wrap input {
        flex: 1;
        border: none !important;
        outline: none !important;
        background: transparent !important;
        font-size: 14px;
        color: #111111 !important;
        padding: 10px 0;
    }

    .vip-input-wrap input::placeholder {
        color: #9ca3af;
    }

    .vip-submit-btn {
        background: #000000 !important;
        color: #ffffff !important;
        border: 1px solid #000000 !important;
        border-radius: 9999px !important;
        padding: 13px 32px;
        font-size: 12.5px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
        white-space: nowrap;
    }

    .vip-submit-btn i {
        font-size: 11px;
        transition: transform 0.25s ease;
    }

    .vip-submit-btn:hover {
        background: #ffffff !important;
        color: #000000 !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2);
    }

    .vip-submit-btn:hover i {
        transform: translateX(4px);
    }

    .vip-privacy-note {
        font-size: 11.5px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 !important;
        letter-spacing: 0.2px;
    }

    @media (max-width: 991.98px) {
        .vip-newsletter-card {
            padding: 50px 25px;
            border-radius: 30px;
        }
        .vip-title {
            font-size: 28px !important;
        }
        .testimonials-section {
            padding: 65px 0 65px;
        }
        .testimonials-title {
            font-size: 28px;
        }
        .luxury-trending-section {
            padding: 65px 0 75px 0 !important;
        }
        .trending-title {
            font-size: 28px;
        }
        .luxury-new-arrivals-section {
            padding: 65px 0 75px 0 !important;
        }
        .new-arrivals-title {
            font-size: 28px;
        }
        .luxury-dark-category-card {
            height: 330px;
        }
        .featured-categories-section {
            padding: 35px 0 70px 0 !important;
        }
        .category-section-header {
            margin-top: -5px;
            margin-bottom: 32px;
        }
    }

    @media (max-width: 767.98px) {
        .vip-newsletter-section {
            padding: 50px 0 60px 0;
        }
        .vip-newsletter-card {
            padding: 40px 18px;
            border-radius: 26px;
        }
        .vip-title {
            font-size: 22px !important;
            margin-bottom: 8px !important;
        }
        .vip-desc {
            font-size: 13px !important;
            margin-bottom: 20px !important;
        }
        .vip-perks-row {
            gap: 8px;
            margin-bottom: 24px;
        }
        .vip-perk-item {
            font-size: 11px;
            padding: 6px 14px;
        }
        .vip-perk-divider {
            display: none;
        }
        .vip-input-wrap {
            flex-direction: column;
            padding: 8px;
            border-radius: 9999px !important;
            gap: 8px;
            background: #ffffff;
        }
        .vip-input-icon {
            display: none;
        }
        .vip-input-wrap input {
            width: 100%;
            text-align: center;
            padding: 12px 18px;
            font-size: 13.5px;
            border-radius: 9999px !important;
        }
        .vip-submit-btn {
            width: 100%;
            justify-content: center;
            padding: 13px 24px;
            font-size: 12.5px;
            border-radius: 9999px !important;
        }
        .testimonials-section {
            padding: 50px 0 55px;
        }
        .testimonials-header-centered {
            margin-bottom: 24px;
        }
        .testimonials-tag {
            margin-bottom: 8px;
        }
        .testimonials-title {
            font-size: 22px;
            margin-bottom: 8px;
        }
        .trust-summary-pill {
            padding: 5px 14px;
            margin-bottom: 14px;
            font-size: 11px;
        }
        .trust-score {
            font-size: 13.5px;
        }
        .trust-stars {
            font-size: 11px;
        }
        .trust-total-reviews {
            font-size: 10.5px;
        }
        .review-nav-btn {
            width: 38px;
            height: 38px;
            font-size: 13px;
        }
        .luxury-trending-section {
            padding: 50px 0 60px 0 !important;
        }
        .trending-header-centered {
            margin-bottom: 22px;
        }
        .trending-title {
            font-size: 22px;
            margin-bottom: 6px;
        }
        .trending-tag {
            margin-bottom: 8px;
        }
        .trending-subtitle {
            font-size: 12.5px;
            margin-bottom: 14px;
        }
        .trending-center-controls {
            gap: 10px;
            margin-top: 14px;
        }
        .trending-center-pill {
            padding: 8px 16px;
            font-size: 11.5px;
            letter-spacing: 0.8px;
        }
        .trending-nav-btn {
            width: 38px;
            height: 38px;
            font-size: 13px;
        }
        .luxury-trending-slider .owl-stage-outer {
            padding: 5px 0 10px 0;
        }
        .luxury-new-arrivals-section {
            padding: 50px 0 65px 0 !important;
        }
        .new-arrivals-tag {
            margin-bottom: 8px;
        }
        .new-arrivals-title {
            font-size: 22px;
            margin-bottom: 8px;
        }
        .new-arrivals-sub {
            font-size: 12.5px;
            margin-bottom: 20px;
        }
        .luxury-filter-nav-wrap {
            justify-content: flex-start;
            padding-left: 10px;
            padding-right: 10px;
            margin-bottom: 25px;
        }
        .luxury-filter-nav {
            flex-wrap: nowrap;
            gap: 6px;
            padding: 4px 6px;
        }
        .filter-pill-btn {
            padding: 7px 16px;
            font-size: 12px;
        }
        .card-info-wrap {
            padding: 10px 10px 14px 10px;
        }
        .card-category-eyebrow {
            font-size: 10px;
            margin-bottom: 4px;
        }
        .card-product-title {
            font-size: 12.5px !important;
            height: 35px;
            line-height: 1.35 !important;
            margin-bottom: 6px !important;
        }
        .price-current {
            font-size: 13.5px;
        }
        .price-original {
            font-size: 11px;
        }
        .price-discount-pill {
            font-size: 9px;
            padding: 1px 5px;
        }
        .card-glass-wishlist {
            width: 32px;
            height: 32px;
            font-size: 13px;
            top: 8px;
            right: 8px;
        }
        .card-badges-container {
            top: 8px;
            left: 8px;
        }
        .luxury-badge {
            font-size: 9px;
            padding: 3px 6px;
        }
        .card-action-bar {
            transform: translateY(0);
            background: rgba(0, 0, 0, 0.82);
            padding: 2px 0;
        }
        .card-action-bar .action-btn {
            padding: 8px 4px;
            font-size: 10.5px;
            gap: 4px;
        }
        .luxury-explore-all-btn {
            padding: 13px 30px;
            font-size: 12px;
            width: 90%;
            justify-content: center;
        }
        .trust-strip-section {
            padding: 60px 0 70px 0;
            margin-top: 15px;
            margin-bottom: 35px;
        }
        .trust-hook-tag {
            margin-bottom: 10px;
        }
        .trust-hook-title {
            font-size: 19px;
            margin-bottom: 10px;
        }
        .trust-hook-sub {
            font-size: 12.5px;
            margin-bottom: 34px;
        }
        .trust-feature-card {
            padding: 8px 18px 8px 10px;
            gap: 10px;
        }
        .trust-feature-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            font-size: 15px;
        }
        .trust-feature-content h4 {
            font-size: 12px !important;
        }
        .trust-feature-content p {
            font-size: 10.5px !important;
        }
        .featured-categories-section {
            padding: 25px 0 60px 0 !important;
        }
        .category-section-header {
            margin-top: -5px;
            margin-bottom: 25px;
        }
        .luxury-dark-category-card {
            height: 280px;
            border-radius: 12px;
        }
        .dark-category-overlay {
            padding: 18px 16px;
        }
        .cat-title {
            font-size: 18px !important;
        }
        .cat-bottom-link {
            font-size: 11.5px;
            letter-spacing: 1px;
        }
    }

    /* ==========================================================
       OPTION 1: LUXURY FLOATING ISLAND FOOTER (CLEAN BRAND HOVERS)
       ========================================================== */
    footer.footer.luxury-floating-footer {
        background: transparent !important;
        padding: 0 36px 0 36px !important;
        margin-top: 70px !important;
        border: none !important;
        box-shadow: none !important;
    }

    @media (max-width: 991.98px) {
        footer.footer.luxury-floating-footer {
            padding: 0 20px 0 20px !important;
            margin-top: 50px !important;
        }
    }

    @media (max-width: 767.98px) {
        footer.footer.luxury-floating-footer {
            padding: 0 10px 0 10px !important;
            margin-top: 40px !important;
        }
    }

    .footer-card-container {
        background: #080808 !important;
        border-top-left-radius: 36px !important;
        border-top-right-radius: 36px !important;
        border: 1px solid rgba(255, 255, 255, 0.12) !important;
        border-bottom: none !important;
        overflow: hidden;
        box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.25);
        padding: 48px 48px 0 48px;
        position: relative;
    }

    @media (max-width: 991.98px) {
        .footer-card-container {
            padding: 40px 28px 0 28px;
            border-top-left-radius: 28px !important;
            border-top-right-radius: 28px !important;
        }
    }

    @media (max-width: 767.98px) {
        .footer-card-container {
            padding: 32px 18px 0 18px;
            border-top-left-radius: 22px !important;
            border-top-right-radius: 22px !important;
        }
    }

    /* Top Brand & Concierge Strip */
    .footer-top-strip {
        padding-bottom: 24px;
    }

    .footer-brand-wrap {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .footer-brand-logo {
        display: inline-block;
        text-decoration: none !important;
    }

    .footer-brand-text {
        font-size: 22px;
        font-weight: 800;
        letter-spacing: 2px;
        color: #ffffff;
        text-transform: uppercase;
    }

    .footer-brand-tagline {
        font-size: 11.5px;
        color: rgba(255, 255, 255, 0.65);
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 500;
    }

    .footer-concierge-pill {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        background: #141414;
        border: 1px solid rgba(255, 255, 255, 0.16);
        padding: 10px 22px;
        border-radius: 9999px;
        color: #ffffff !important;
        text-decoration: none !important;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .footer-concierge-pill i {
        color: #25D366;
        font-size: 16px;
        transition: color 0.25s ease;
    }

    .footer-concierge-pill:hover {
        background: #25D366;
        border-color: #25D366;
        color: #ffffff !important;
    }

    .footer-concierge-pill:hover i {
        color: #ffffff;
    }

    .footer-divider-line {
        width: 100%;
        height: 1px;
        background: rgba(255, 255, 255, 0.08);
        margin-bottom: 36px;
    }

    /* 4-Column Grid Styling */
    .footer-col-title {
        color: #ffffff !important;
        font-size: 13px !important;
        font-weight: 800 !important;
        letter-spacing: 1.8px !important;
        text-transform: uppercase !important;
        margin-bottom: 20px !important;
        position: relative;
        display: inline-block;
    }

    .footer-card-container p.text {
        color: rgba(255, 255, 255, 0.72) !important;
        font-size: 13.5px !important;
        line-height: 1.7 !important;
        max-width: 340px;
    }

    .footer-card-container ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-card-container ul li {
        margin-bottom: 12px !important;
    }

    .footer-card-container ul li a {
        color: rgba(255, 255, 255, 0.72) !important;
        font-size: 13.5px !important;
        text-decoration: none !important;
        transition: all 0.22s ease !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .footer-card-container ul li a:hover {
        color: #ffffff !important;
        transform: translateX(4px);
    }

    .footer-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        color: rgba(255, 255, 255, 0.72);
        font-size: 13.5px;
        margin-bottom: 14px;
    }

    .footer-contact-item i {
        color: #ffffff;
        font-size: 16px;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .footer-whatsapp-chat-btn {
        background: #181818;
        color: #ffffff !important;
        font-size: 13px;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 9999px;
        padding: 10px 22px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none !important;
        transition: all 0.25s ease;
    }

    .footer-whatsapp-chat-btn i {
        color: #25D366;
        font-size: 15px;
        transition: color 0.25s ease;
    }

    .footer-whatsapp-chat-btn:hover {
        background: #25D366;
        color: #ffffff !important;
        border-color: #25D366;
    }

    .footer-whatsapp-chat-btn:hover i {
        color: #ffffff !important;
    }

    /* Social Icons With Clear Visibility & Official Brand Colors */
    .footer-social-strip {
        display: flex;
        gap: 10px;
        margin-top: 22px;
    }

    .footer-social-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #181818;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #ffffff !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        transition: all 0.25s ease;
        text-decoration: none !important;
    }

    .footer-social-btn.social-fb:hover {
        background: #1877F2;
        border-color: #1877F2;
        color: #ffffff !important;
    }

    .footer-social-btn.social-insta:hover {
        background: #E1306C;
        border-color: #E1306C;
        color: #ffffff !important;
    }

    .footer-social-btn.social-wa:hover {
        background: #25D366;
        border-color: #25D366;
        color: #ffffff !important;
    }

    .footer-social-btn.social-tiktok:hover {
        background: #010101;
        border-color: #FE2C55;
        color: #FE2C55 !important;
    }

    /* Base Copyright Area Inside Rounded Card */
    .footer-card-copyright {
        background: #030303;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        margin: 48px -48px 0 -48px;
        padding: 24px 48px;
    }

    @media (max-width: 991.98px) {
        .footer-card-copyright {
            margin: 36px -28px 0 -28px;
            padding: 20px 28px;
        }
    }

    @media (max-width: 767.98px) {
        .footer-card-copyright {
            margin: 28px -18px 0 -18px;
            padding: 20px 18px;
        }
    }

    .footer-copy-text {
        margin: 0;
        font-size: 12.5px;
        color: rgba(255, 255, 255, 0.6);
    }

    .footer-copy-text a {
        color: #ffffff;
        font-weight: 600;
        text-decoration: none !important;
    }

    .footer-payment-badges {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        flex-wrap: wrap;
    }

    @media (max-width: 991.98px) {
        .footer-payment-badges {
            justify-content: center;
        }
    }

    .footer-badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #141414;
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 6px 14px;
        border-radius: 9999px;
        color: rgba(255, 255, 255, 0.75);
        font-size: 11.5px;
        font-weight: 500;
        letter-spacing: 0.2px;
    }

    .footer-badge-pill i {
        color: #ffffff;
        font-size: 11px;
    }
</style>
@endpush

@section('main-content')
<!-- 1. Hero Slider Area (Clean, Ultra-Premium Minimalist Editorial Viewport) -->
@php
    $heroBanners = count($banners) > 0 ? $banners : [
        (object)[
            'photo' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=1920&auto=format&fit=crop',
            'title' => 'LUXURY FESTIVE PRET 2026'
        ],
        (object)[
            'photo' => 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=1920&auto=format&fit=crop',
            'title' => 'TIMELESS COUTURE COLLECTION'
        ]
    ];
@endphp
<section id="Gslider" class="carousel slide hero-fullscreen-slider" data-ride="carousel" data-interval="5000">
    @if(count($heroBanners) > 1)
        <ol class="carousel-indicators">
            @foreach($heroBanners as $key=>$banner)
                <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
            @endforeach
        </ol>
    @endif
    
    <div class="carousel-inner" role="listbox">
        @foreach($heroBanners as $key=>$banner)
            <div class="carousel-item {{(($key==0)? 'active' : '')}}">
                <img src="{{$banner->photo}}" alt="{{$banner->title ?? 'Banner'}}">
                <div class="hero-slider-overlay">
                    <div class="container text-center">
                        <div class="hero-center-bottom-wrap">
                            <a class="hero-cta-btn wow fadeInUp" data-wow-delay="0.2s" href="{{route('product-grids')}}">
                                Shop Collection <i class="ti-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!--/ End Slider Area -->

<!-- 2. Value Props & Trust Badges Section -->
<section class="trust-strip-section">
    <div class="container-fluid px-lg-5 px-3">
        <!-- Centered Catchy Hook Heading -->
        <div class="trust-strip-header text-center mb-4">
            <span class="trust-hook-tag">✨ THE YN PROMISE</span>
            <h2 class="trust-hook-title">100% Authentic • Worry-Free Shopping</h2>
            <p class="trust-hook-sub">Premium designer collections delivered with seamless doorstep trust across Pakistan</p>
        </div>
    </div>

    <!-- Scrolling Track with Gradient Mask (Continuous Left to Right Marquee) -->
    <div class="trust-strip-wrapper">
        <div class="trust-strip-track">
            <!-- Set 1 -->
            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-crown"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>100% Authentic</h4>
                    <p>Original designer fabrics & pret</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-wallet"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Cash on Delivery</h4>
                    <p>Safe doorstep payments nationwide</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-truck"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Express Shipping</h4>
                    <p>Fast dispatch within 24-48 hours</p>
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
                    <h4>100% Secure Checkout</h4>
                    <p>256-Bit SSL encrypted payments</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-headphone-alt"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>24/7 Dedicated Support</h4>
                    <p>Direct WhatsApp & helpline support</p>
                </div>
            </div>

            <!-- Set 2 (Identical for Smooth Continuous Loop) -->
            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-crown"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>100% Authentic</h4>
                    <p>Original designer fabrics & pret</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-wallet"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Cash on Delivery</h4>
                    <p>Safe doorstep payments nationwide</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-truck"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>Express Shipping</h4>
                    <p>Fast dispatch within 24-48 hours</p>
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
                    <h4>100% Secure Checkout</h4>
                    <p>256-Bit SSL encrypted payments</p>
                </div>
            </div>

            <div class="trust-feature-card">
                <div class="trust-feature-icon">
                    <i class="ti-headphone-alt"></i>
                </div>
                <div class="trust-feature-content">
                    <h4>24/7 Dedicated Support</h4>
                    <p>Direct WhatsApp & helpline support</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Trust Badges Section -->

<!-- 3. Shop By Category (Luxury Dark Section with Wave Transitions) -->
<div class="dark-category-wrapper">
    <!-- Top Wave Transition -->
    <div class="wave-shape-top" style="line-height: 0; width: 100%; overflow: hidden; background: #ffffff;">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none" style="width: 100%; height: 42px; display: block;">
            <path d="M0,32L60,37.3C120,43,240,53,360,58.7C480,64,600,64,720,53.3C840,43,960,21,1080,16C1200,11,1320,21,1380,26.7L1440,32L1440,80L1380,80C1320,80,1200,80,1080,80C960,80,840,80,720,80C600,80,480,80,360,80C240,80,120,80,60,80L0,80Z" fill="#0a0a0a"></path>
        </svg>
    </div>

    <section class="featured-categories-section" style="background: #0a0a0a; color: #ffffff;">
        <div class="container-fluid px-lg-5 px-3">
            
            <!-- Centered Heading Shifted Upwards -->
            <div class="category-section-header text-center">
                <span class="subtitle-tag" style="font-size: 11px; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; color: #ffffff; background: rgba(255,255,255,0.12); padding: 5px 18px; border-radius: 20px; display: inline-block; margin-bottom: 12px; border: 1px solid rgba(255,255,255,0.18);">
                    CURATED STYLES
                </span>
                <h2 style="font-size: 32px; font-weight: 700; color: #ffffff; text-transform: uppercase; margin-bottom: 10px; letter-spacing: -0.5px;">
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
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="category-card-wrapper">
                                <a href="{{route('product-cat', $cat->slug)}}" class="luxury-dark-category-card">
                                    <div class="dark-category-img-wrap">
                                        @if($cat->photo)
                                            <img src="{{$cat->photo}}" alt="{{$cat->title}}">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=600&q=80" alt="{{$cat->title}}">
                                        @endif
                                        <div class="dark-category-overlay">
                                            <h3 class="cat-title">{{$cat->title}}</h3>
                                        </div>
                                    </div>
                                </a>
                                <div class="category-card-footer mt-3">
                                    <a href="{{route('product-cat', $cat->slug)}}" class="cat-bottom-link">
                                        Explore Collection <i class="ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
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

<!-- 4. New Arrivals & Filter Tabs (Option A: Luxury Editorial Cards & Pill Navigation) -->
<section class="luxury-new-arrivals-section">
    <div class="container-fluid px-lg-5 px-3">
        
        <!-- Section Title Header -->
        <div class="new-arrivals-header text-center">
            <span class="new-arrivals-tag">✨ JUST DROPPED</span>
            <h2 class="new-arrivals-title">New Arrivals</h2>
            <p class="new-arrivals-sub">Discover our latest contemporary outfits, fine unstitched fabrics & trendsetting silhouettes</p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    
                    <!-- Horizontal Scrollable Pill Navigation -->
                    <div class="luxury-filter-nav-wrap">
                        <div class="luxury-filter-nav filter-tope-group" id="myTab" role="tablist">
                            @php
                                $categories=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
                            @endphp
                            <button class="filter-pill-btn active" data-filter="*">
                                <span>All Collection</span>
                            </button>
                            @if($categories)
                                @foreach($categories as $key=>$cat)
                                    <button class="filter-pill-btn" data-filter=".{{$cat->id}}">
                                        <span>{{$cat->title}}</span>
                                    </button>
                                @endforeach
                            @endif
                        </div>
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
                            <div class="col-6 col-md-4 col-lg-3 px-1 px-sm-2 mb-3 mb-md-4 isotope-item {{$product->cat_id}}">
                                <div class="single-product luxury-product-card">
                                    
                                    <!-- 3:4 Portrait Image Box -->
                                    <div class="card-media-wrap">
                                        <a href="{{route('product-detail', $product->slug)}}" class="product-link">
                                            @php
                                                $photos = explode(',', $product->photo);
                                            @endphp
                                            <img class="img-primary default-img" src="{{$photos[0]}}" alt="{{$product->title}}">
                                            @if(isset($photos[1]) && !empty(trim($photos[1])))
                                                <img class="img-secondary hover-img" src="{{$photos[1]}}" alt="{{$product->title}}">
                                            @endif
                                        </a>

                                        <!-- Top Left Badges -->
                                        <div class="card-badges-container">
                                            @if($product->stock <= 0)
                                                <span class="luxury-badge badge-soldout">Sold Out</span>
                                            @elseif($product->discount > 0)
                                                <span class="luxury-badge badge-sale">-{{number_format($product->discount, 0)}}% OFF</span>
                                            @elseif($product->condition == 'new')
                                                <span class="luxury-badge badge-brandnew">NEW</span>
                                            @endif
                                        </div>

                                        <!-- Top Right Glass Wishlist Button -->
                                        <a title="Add to Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="card-glass-wishlist card-wishlist-btn" data-id="{{$product->id}}">
                                            <i class="ti-heart"></i>
                                        </a>

                                        <!-- Slide-Up Bottom Action Bar -->
                                        <div class="card-action-bar">
                                            <a href="{{route('add-to-cart',$product->slug)}}" class="action-btn action-cart" title="Quick Add to Cart">
                                                <i class="ti-bag"></i> <span>+ Quick Add</span>
                                            </a>
                                            <button type="button" class="action-btn action-quickview" data-toggle="modal" data-target="#{{$product->id}}" title="Quick View">
                                                <i class="ti-eye"></i> <span>Quick View</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Product Content Info -->
                                    <div class="card-info-wrap product-content">
                                        @php
                                            $catInfo = DB::table('categories')->where('id', $product->cat_id)->first();
                                        @endphp
                                        @if($catInfo)
                                            <span class="card-category-eyebrow">{{$catInfo->title}}</span>
                                        @else
                                            <span class="card-category-eyebrow">Luxury Collection</span>
                                        @endif
                                        
                                        <h3 class="card-product-title">
                                            <a href="{{route('product-detail', $product->slug)}}" title="{{$product->title}}">{{$product->title}}</a>
                                        </h3>

                                        @php
                                            $after_discount = ($product->price - ($product->price * $product->discount) / 100);
                                        @endphp
                                        <div class="card-price-row price-box">
                                            <span class="price-current current-price">PKR {{number_format($after_discount, 0)}}</span>
                                            @if($product->discount > 0)
                                                <del class="price-original old-price">PKR {{number_format($product->price, 0)}}</del>
                                                <span class="price-discount-pill">{{number_format($product->discount, 0)}}% OFF</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bottom Centered CTA: Explore All New Arrivals -->
                    <div class="row mt-4 pt-2">
                        <div class="col-12 text-center">
                            <a href="{{route('product-grids')}}" class="luxury-explore-all-btn">
                                <span>Explore All New Arrivals</span>
                                <i class="ti-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
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

<!-- 7. Hot Trending Items Carousel (Option 1: Luxury Slider with Header Controls & Ranking Badges) -->
<section class="luxury-trending-section">
    <div class="container-fluid px-lg-5 px-3">
        
        <!-- Centered Header with Title & Navigation Controls -->
        <div class="trending-header-centered text-center mb-4">
            <span class="trending-tag">🔥 DISCOVER THE HYPE</span>
            <h2 class="trending-title">Trending Now</h2>
            <p class="trending-subtitle">The most sought-after apparel and hot styles loved by our customers</p>
            
            <!-- Centered Navigation & View All Action Pill -->
            <div class="trending-center-controls">
                <button type="button" class="trending-nav-btn" id="trendingPrevBtn" aria-label="Previous Slide">
                    <i class="ti-arrow-left"></i>
                </button>
                <a href="{{route('product-grids')}}" class="trending-center-pill">
                    <span>Explore All Trending</span>
                    <i class="ti-arrow-right"></i>
                </a>
                <button type="button" class="trending-nav-btn" id="trendingNextBtn" aria-label="Next Slide">
                    <i class="ti-arrow-right"></i>
                </button>
            </div>
        </div>

        @php
            $trendingProducts = DB::table('products')
                ->where('status', 'active')
                ->where(function($q) {
                    $q->where('condition', 'hot')
                      ->orWhere('is_featured', 1);
                })
                ->orderBy('id', 'desc')
                ->take(10)
                ->get();

            if ($trendingProducts->isEmpty()) {
                $trendingProducts = DB::table('products')
                    ->where('status', 'active')
                    ->orderBy('id', 'desc')
                    ->take(10)
                    ->get();
            }
        @endphp

        <div class="trending-slider-container">
            <div class="owl-carousel luxury-trending-slider">
                @foreach($trendingProducts as $index => $product)
                    <div class="trending-item-wrap">
                        <div class="single-product luxury-product-card">
                            
                            <!-- 3:4 Portrait Image Box -->
                            <div class="card-media-wrap">
                                <a href="{{route('product-detail', $product->slug)}}" class="product-link">
                                    @php
                                        $photos = explode(',', $product->photo);
                                    @endphp
                                    <img class="img-primary default-img" src="{{$photos[0]}}" alt="{{$product->title}}">
                                    @if(isset($photos[1]) && !empty(trim($photos[1])))
                                        <img class="img-secondary hover-img" src="{{$photos[1]}}" alt="{{$product->title}}">
                                    @endif
                                </a>

                                <!-- Top Left Badges & Ranking -->
                                <div class="card-badges-container">
                                    @if($index == 0)
                                        <span class="luxury-badge badge-rank-top">#01 TRENDING</span>
                                    @elseif($index == 1)
                                        <span class="luxury-badge badge-rank-second">#02 TOP PICK</span>
                                    @elseif($index == 2)
                                        <span class="luxury-badge badge-rank-third">#03 BESTSELLER</span>
                                    @elseif($product->discount > 0)
                                        <span class="luxury-badge badge-sale">-{{number_format($product->discount, 0)}}% OFF</span>
                                    @elseif($product->condition == 'hot')
                                        <span class="luxury-badge badge-hot">🔥 HOT</span>
                                    @elseif($product->condition == 'new')
                                        <span class="luxury-badge badge-brandnew">NEW</span>
                                    @endif
                                </div>

                                <!-- Top Right Glass Wishlist Button -->
                                <a title="Add to Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="card-glass-wishlist card-wishlist-btn" data-id="{{$product->id}}">
                                    <i class="ti-heart"></i>
                                </a>

                                <!-- Slide-Up Bottom Action Bar -->
                                <div class="card-action-bar">
                                    <a href="{{route('add-to-cart',$product->slug)}}" class="action-btn action-cart" title="Quick Add to Cart">
                                        <i class="ti-bag"></i> <span>+ Quick Add</span>
                                    </a>
                                    <button type="button" class="action-btn action-quickview" data-toggle="modal" data-target="#{{$product->id}}" title="Quick View">
                                        <i class="ti-eye"></i> <span>Quick View</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Product Content Info -->
                            <div class="card-info-wrap product-content">
                                @php
                                    $catInfo = DB::table('categories')->where('id', $product->cat_id)->first();
                                @endphp
                                @if($catInfo)
                                    <span class="card-category-eyebrow">{{$catInfo->title}}</span>
                                @else
                                    <span class="card-category-eyebrow">Trending Style</span>
                                @endif
                                
                                <h3 class="card-product-title">
                                    <a href="{{route('product-detail', $product->slug)}}" title="{{$product->title}}">{{$product->title}}</a>
                                </h3>

                                @php
                                    $after_discount = ($product->price - ($product->price * $product->discount) / 100);
                                @endphp
                                <div class="card-price-row price-box">
                                    <span class="price-current current-price">PKR {{number_format($after_discount, 0)}}</span>
                                    @if($product->discount > 0)
                                        <del class="price-original old-price">PKR {{number_format($product->price, 0)}}</del>
                                        <span class="price-discount-pill">{{number_format($product->discount, 0)}}% OFF</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Mobile Bottom View All Button -->
        <div class="trending-mobile-cta text-center d-block d-md-none mt-3">
            <a href="{{route('product-grids')}}" class="luxury-explore-all-btn">
                <span>Explore All Trending</span>
                <i class="ti-arrow-right"></i>
            </a>
        </div>

    </div>
</section>
<!-- End Hot Trending Items Area -->

<!-- 7. Customer Reviews & Social Proof Slider (Ultra-Luxury Showcase) -->
<section class="testimonials-section">
    <div class="container-fluid px-lg-5 px-3">
        
        <!-- Centered Header & Trust Rating Summary with Controls -->
        <div class="testimonials-header-centered text-center mb-4">
            <span class="testimonials-tag">✨ REAL EXPERIENCES</span>
            <h2 class="testimonials-title">Loved By 50,000+ Shoppers</h2>
            <div class="trust-summary-pill">
                <span class="trust-score">4.9</span>
                <span class="trust-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                <span class="trust-total-reviews">| 2,500+ Verified Reviews</span>
            </div>
            
            <!-- Centered Navigation Arrow Controls -->
            <div class="testimonials-center-controls">
                <button class="review-nav-btn" id="reviewScrollLeftBtn" title="Previous Reviews" type="button" aria-label="Previous Reviews">
                    <i class="ti-arrow-left"></i>
                </button>
                <button class="review-nav-btn" id="reviewScrollRightBtn" title="Next Reviews" type="button" aria-label="Next Reviews">
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

        /* Luxury Trending Carousel Slider */
        var $trendSlider = $('.luxury-trending-slider');
        if ($trendSlider.length) {
            $trendSlider.owlCarousel({
                items: 4,
                loop: true,
                margin: 20,
                autoplay: true,
                autoplayTimeout: 4500,
                autoplaySpeed: 700,
                smartSpeed: 700,
                autoplayHoverPause: true,
                nav: false,
                dots: true,
                responsive: {
                    0: { items: 2, margin: 10 },
                    576: { items: 2, margin: 14 },
                    768: { items: 3, margin: 18 },
                    1170: { items: 4, margin: 20 }
                }
            });

            $('#trendingPrevBtn').on('click', function(e) {
                e.preventDefault();
                $trendSlider.trigger('prev.owl.carousel');
            });
            $('#trendingNextBtn').on('click', function(e) {
                e.preventDefault();
                $trendSlider.trigger('next.owl.carousel');
            });
        }

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
