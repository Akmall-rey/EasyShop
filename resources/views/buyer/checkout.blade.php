<x-app-layout>
    <div class="checkout-container container">
        <div class="checkout-header">
            <h2>Checkout</h2>
            <div class="total-amount">
                <span><i class="fas fa-wallet"></i> Rp 500.000</span>
            </div>
        </div>
        {{-- <div class="shipping-address">
            <label for="address">Alamat Pengiriman</label>
            <textarea id="address" rows="3"></textarea>
        </div> --}}
        <div class="cart-summary">
            <h3>Produk yang Dipesan</h3>
            <div class="cart-item">
                <img src="https://via.placeholder.com/100" alt="Nike Dunk Panda">
                <div class="item-details">
                    <h5>Nike Dunk Panda</h5>
                </div>
                <div class="item-quantity">
                    <span>1</span>
                </div>
                <div class="item-price">
                    <span class="currency">Rp</span>
                    <p>1.250.000</p>
                </div>
                <div class="item-actions">
                    <button class="btn btn-danger" onclick="createOrder()">Buat Pesanan</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
