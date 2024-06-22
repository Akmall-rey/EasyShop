<x-app-layout>
    <section class="promotion-section">
        <img src="/assets/img/cardigan.jpg" alt="Promotional Image">
        <div class="promotion-content">
            <h2>Special Promotion</h2>
            <p>Discover our latest collection of exclusive items. Shop now and enjoy limited-time discounts on selected
                products. Don't miss out on these fantastic deals!</p>
            @auth()
                <a href="shop">Shop Now!</a>
            @else
                <a href="/login">Shop Now!</a>
                @endif
            </div>
        </section>
    </x-app-layout>
