@extends('frontend.layouts.master')

@section('title','YN Trading || Contact Us')

@section('main-content')
@php
    $settings = DB::table('settings')->get();
    $phone = $settings[0]->phone ?? '+92 336 6888806';
    $rawWhatsapp = !empty($settings[0]->whatsapp) ? $settings[0]->whatsapp : $phone;
    $cleanWhatsapp = preg_replace('/[^0-9]/', '', $rawWhatsapp);
    if (substr($cleanWhatsapp, 0, 1) === '0') {
        $cleanWhatsapp = '92' . substr($cleanWhatsapp, 1);
    }
    if (empty($cleanWhatsapp)) {
        $cleanWhatsapp = '923366888806';
    }
    $email = $settings[0]->email ?? 'support@yntrading.com';
    $address = $settings[0]->address ?? 'Plot 12-C, Main Boulevard, Gulberg III, Lahore, Pakistan';
@endphp

<!-- 1. Luxury Contact Hero Banner -->
<section class="contact-hero-banner">
    <div class="container">
        <span class="contact-hero-badge">WE ARE HERE TO HELP</span>
        <h1 class="contact-hero-title">Contact Our Client Concierge</h1>
        <p class="contact-hero-desc">
            Have a question regarding custom tailoring, order tracking, or our latest collections? Reach out to our dedicated client care team.
        </p>
        <div class="contact-breadcrumbs">
            <a href="{{route('home')}}"><i class="ti-home"></i> Home</a>
            <span>/</span>
            <span style="color: #ffffff;">Contact Us</span>
        </div>
    </div>
</section>

<!-- 2. Contact Info Cards Strip -->
<div class="contact-info-strip">
    <div class="container">
        <div class="row">
            <!-- Phone & WhatsApp Card -->
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="contact-info-card whatsapp">
                    <div class="contact-info-icon-box">
                        <i class="ti-headphone-alt"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4>24/7 Helpline & WhatsApp</h4>
                        <p>Direct fashion consultant support</p>
                        <a href="tel:{{$phone}}" class="contact-link mb-1">
                            <i class="ti-mobile"></i> {{$phone}}
                        </a>
                        <br>
                        <a href="https://wa.me/{{$cleanWhatsapp}}?text={{urlencode('Hi YN-Trading, I have an inquiry regarding your collection')}}" target="_blank" class="contact-whatsapp-badge-btn">
                            <i class="fa fa-whatsapp"></i> Chat on WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Email Concierge Card -->
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="contact-info-card">
                    <div class="contact-info-icon-box">
                        <i class="ti-email"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4>Client Support Email</h4>
                        <p>Average response within 2 hours</p>
                        <a href="mailto:{{$email}}" class="contact-link">
                            <i class="ti-arrow-top-right"></i> {{$email}}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Flagship Store Address Card -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="contact-info-card">
                    <div class="contact-info-icon-box">
                        <i class="ti-location-pin"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4>Flagship Boutique</h4>
                        <p>{{$address}}</p>
                        <span class="contact-link" style="color: #059669; font-size: 12px;">
                            <i class="fa fa-check-circle"></i> Open for Walk-in Shopping
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3. Main Form & Sidebar Section -->
<section class="contact-main-section py-4">
    <div class="container">
        <div class="row">
            
            <!-- Left: Ultra-Luxury Contact Form -->
            <div class="col-lg-7 col-12 mb-4 mb-lg-0">
                <div class="luxury-form-card">
                    <div class="luxury-form-header">
                        <span class="form-subtitle">GET IN TOUCH</span>
                        <h3>Send Us An Inquiry</h3>
                        <p>Fill in the details below and our team will get back to you promptly.</p>
                        @auth
                        @else
                            <div class="mt-2" style="font-size: 12.5px; color: #71717a;">
                                <i class="ti-info-alt text-muted"></i> You are submitting as a guest. <a href="{{route('login.form')}}" style="color: #111111; font-weight: 700; text-decoration: underline;">Sign In</a> for instant order lookup.
                            </div>
                        @endauth
                    </div>

                    <form class="contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            
                            <!-- Full Name -->
                            <div class="col-md-6 col-12">
                                <div class="luxury-input-group">
                                    <label for="name">Your Full Name<span>*</span></label>
                                    <div class="luxury-input-wrap">
                                        <span class="input-icon-addon"><i class="ti-user"></i></span>
                                        <input name="name" id="name" type="text" placeholder="e.g. Ayesha Khan" required value="{{Auth::check() ? Auth::user()->name : ''}}">
                                    </div>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6 col-12">
                                <div class="luxury-input-group">
                                    <label for="phone">Phone Number<span>*</span></label>
                                    <div class="luxury-input-wrap">
                                        <span class="input-icon-addon"><i class="ti-mobile"></i></span>
                                        <input name="phone" id="phone" type="number" placeholder="03XXXXXXXXX" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="col-md-6 col-12">
                                <div class="luxury-input-group">
                                    <label for="email">Email Address<span>*</span></label>
                                    <div class="luxury-input-wrap">
                                        <span class="input-icon-addon"><i class="ti-email"></i></span>
                                        <input name="email" id="email" type="email" placeholder="name@domain.com" required value="{{Auth::check() ? Auth::user()->email : ''}}">
                                    </div>
                                </div>
                            </div>

                            <!-- Subject -->
                            <div class="col-md-6 col-12">
                                <div class="luxury-input-group">
                                    <label for="subject">Subject / Topic<span>*</span></label>
                                    <div class="luxury-input-wrap">
                                        <span class="input-icon-addon"><i class="ti-tag"></i></span>
                                        <input name="subject" id="subject" type="text" placeholder="e.g. Order Tracking or Tailoring" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Message Body -->
                            <div class="col-12">
                                <div class="luxury-input-group">
                                    <label for="message">Your Message<span>*</span></label>
                                    <div class="luxury-input-wrap textarea-wrap">
                                        <span class="input-icon-addon"><i class="ti-pencil"></i></span>
                                        <textarea name="message" id="message" rows="5" placeholder="Please provide detailed information about your inquiry (minimum 20 characters)..." required></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="luxury-submit-btn" id="contactSubmitBtn">
                                    <span>Send Message</span>
                                    <i class="ti-arrow-right"></i>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Right: Operational Info & Instant WhatsApp Card -->
            <div class="col-lg-5 col-12">
                <div class="contact-sidebar-wrap">
                    
                    <!-- Dark Luxury WhatsApp VIP Assistance Card -->
                    <div class="contact-sidebar-card dark-card">
                        <h4><i class="fa fa-whatsapp" style="color: #25D366; font-size: 20px;"></i> Instant WhatsApp Concierge</h4>
                        <p style="font-size: 13.5px; line-height: 1.5; margin-bottom: 16px;">
                            Need immediate assistance with sizing, color matching, or customized bridal stitching? Chat live with our styling specialists.
                        </p>
                        <a href="https://wa.me/{{$cleanWhatsapp}}?text={{urlencode('Hi YN-Trading, I would like assistance with an order')}}" target="_blank" class="contact-whatsapp-badge-btn" style="padding: 10px 22px; font-size: 13px;">
                            <i class="fa fa-whatsapp"></i> Start WhatsApp Consultation
                        </a>
                    </div>

                    <!-- Boutique Operating Hours Card -->
                    <div class="contact-sidebar-card">
                        <h4><i class="ti-time"></i> Operating Hours</h4>
                        <ul class="operating-hours-list">
                            <li>
                                <span class="day-label">Monday – Friday</span>
                                <span class="time-badge open">10:00 AM – 09:00 PM</span>
                            </li>
                            <li>
                                <span class="day-label">Saturday</span>
                                <span class="time-badge open">11:00 AM – 10:00 PM</span>
                            </li>
                            <li>
                                <span class="day-label">Sunday</span>
                                <span class="time-badge">12:00 PM – 07:00 PM</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Quick Support FAQs -->
                    <div class="contact-sidebar-card">
                        <h4><i class="ti-help-alt"></i> Frequently Asked Questions</h4>
                        
                        <div class="contact-faq-item">
                            <h5>How do I track my order shipment?</h5>
                            <p>Once dispatched, you will receive a tracking link via SMS & email to monitor live courier progress.</p>
                        </div>

                        <div class="contact-faq-item">
                            <h5>What is the standard delivery timeframe?</h5>
                            <p>Major cities in Pakistan receive delivery within 2 to 4 business days with 100% insured parcels.</p>
                        </div>

                        <div class="contact-faq-item">
                            <h5>Do you accept returns and exchanges?</h5>
                            <p>Yes, we offer a 7-day hassle-free exchange policy on all unstitched & pret garments.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- 4. Luxury Embedded Interactive Map Section -->
        <div class="luxury-map-container">
            <iframe src="https://maps.google.com/maps?q=Lahore,%20Pakistan&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <div class="map-floating-overlay">
                <h5><i class="ti-location-pin text-danger"></i> YN Trading Flagship</h5>
                <p>{{$address}}</p>
            </div>
        </div>

    </div>
</section>

<!-- Newsletter Component -->
@include('frontend.layouts.newsletter')

<!-- Contact Success Modal -->
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 440px;">
        <div class="modal-content" style="border-radius: 18px; border: none; overflow: hidden; text-align: center; padding: 30px 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
            <div style="width: 60px; height: 60px; border-radius: 50%; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 26px; margin: 0 auto 16px;">
                <i class="fa fa-check"></i>
            </div>
            <h3 style="font-size: 22px; font-weight: 800; color: #111111; margin-bottom: 8px;">Message Received!</h3>
            <p style="color: #6b7280; font-size: 14px; margin-bottom: 24px;">Thank you for contacting YN Trading. Our client care team will get back to you shortly.</p>
            <button type="button" class="luxury-submit-btn" data-dismiss="modal" style="width: 100%; justify-content: center; height: 44px;">
                Continue Shopping
            </button>
        </div>
    </div>
</div>

<!-- Contact Error Modal -->
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 440px;">
        <div class="modal-content" style="border-radius: 18px; border: none; overflow: hidden; text-align: center; padding: 30px 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
            <div style="width: 60px; height: 60px; border-radius: 50%; background: #fef2f2; color: #dc2626; display: flex; align-items: center; justify-content: center; font-size: 26px; margin: 0 auto 16px;">
                <i class="fa fa-exclamation-triangle"></i>
            </div>
            <h3 style="font-size: 22px; font-weight: 800; color: #111111; margin-bottom: 8px;">Submission Failed</h3>
            <p style="color: #6b7280; font-size: 14px; margin-bottom: 24px;">Please make sure all fields are filled accurately (minimum 20 characters in message) and try again.</p>
            <button type="button" class="luxury-submit-btn" data-dismiss="modal" style="width: 100%; justify-content: center; height: 44px; background: #dc2626 !important;">
                Try Again
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush