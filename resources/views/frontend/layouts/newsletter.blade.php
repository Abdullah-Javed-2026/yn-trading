<!-- VIP Newsletter Section (Option 1: Luxury Obsidian Glassmorphism Box + 3 Micro-Perks) -->
<section class="vip-newsletter-section">
    <div class="container-fluid px-lg-5 px-3">
        <div class="vip-newsletter-card">
            <!-- Ambient Background Glow -->
            <div class="vip-ambient-glow"></div>

            <div class="vip-newsletter-content text-center">
                <!-- Eyebrow Pill Tag -->
                <span class="vip-tag">✨ VIP INVITATION ONLY</span>
                
                <h2 class="vip-title">Join The YN Trading VIP Circle</h2>
                <p class="vip-desc">Subscribe to receive exclusive early access to luxury collections, secret couture drops & an instant 10% discount on your first designer order.</p>

                <!-- 3 Micro-Perks Row -->
                <div class="vip-perks-row">
                    <div class="vip-perk-item">
                        <span class="vip-perk-icon">🎁</span>
                        <span class="vip-perk-text">10% Off First Order</span>
                    </div>
                    <div class="vip-perk-divider"></div>
                    <div class="vip-perk-item">
                        <span class="vip-perk-icon">⚡</span>
                        <span class="vip-perk-text">Priority Early Access</span>
                    </div>
                    <div class="vip-perk-divider"></div>
                    <div class="vip-perk-item">
                        <span class="vip-perk-icon">🕊️</span>
                        <span class="vip-perk-text">Luxury Gift Packaging</span>
                    </div>
                </div>

                <!-- Input Form -->
                <form action="{{route('subscribe')}}" method="POST" class="vip-newsletter-form">
                    @csrf
                    <div class="vip-input-wrap">
                        <i class="ti-email vip-input-icon"></i>
                        <input type="email" name="email" placeholder="Enter your email address..." required autocomplete="off">
                        <button type="submit" class="vip-submit-btn">
                            <span>Claim VIP Access</span>
                            <i class="ti-arrow-right"></i>
                        </button>
                    </div>
                </form>

                <!-- Privacy & Zero Spam Note -->
                <p class="vip-privacy-note">
                    <i class="ti-lock mr-1"></i> Zero spam. Unsubscribe anytime with 1-click.
                </p>
            </div>
        </div>
    </div>
</section>