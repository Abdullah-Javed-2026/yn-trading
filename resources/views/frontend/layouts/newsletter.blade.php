<!-- VIP Newsletter Section -->
<section class="vip-newsletter-section">
    <div class="container">
        <div class="vip-newsletter-content">
            <span class="tag">Exclusive Perks</span>
            <h2>Join the YN Trading VIP Circle</h2>
            <p>Subscribe to receive exclusive early access to luxury collections, secret discount drops, and 10% off your first order.</p>
            
            <form action="{{route('subscribe')}}" method="POST" class="vip-newsletter-form">
                @csrf
                <input type="email" name="email" placeholder="Enter your email address..." required autocomplete="off">
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
</section>