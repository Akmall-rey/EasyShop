<x-app-layout>
    <div style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
        <div class="card" style="width: 100%; max-width: 500px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-header" style="text-align: center; padding: 10px; background: #f8f9fa;">
                <h2 style="margin: 0;">Invoice</h2>
            </div>

            @php
                $total = 0;
                $totalQuantity = 0;
            @endphp

            <div class="card-body" style="padding: 20px;">
                <!-- Ubah data di bawah ini dengan produk Anda -->
                @forelse (session('cart') as $id => $details)
                    @php
                        $total += $details['price'] * $details['quantity'];
                        $totalQuantity += $details['quantity'];
                    @endphp
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="font-weight: bold; flex: 1;">{{ $details['product_name'] }}</span>
                        <span style="flex: 1; text-align: right;">Rp{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</span>
                    </div>
                @empty
                    <p style="text-align: center;">Tidak ada produk di keranjang.</p>
                @endforelse
            </div>

            <hr style="border: none; border-top: 1px solid #e9ecef; margin: 20px 0;">

            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                <span style="font-weight: bold; flex: 1;">Quantity :</span>
                <span style="flex: 1; text-align: right;">{{ $totalQuantity }}</span>
            </div>

            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <strong style="flex: 1;">Total Harga :</strong>
                <strong style="flex: 1; text-align: right;">Rp{{ number_format($total, 0, ',', '.') }}</strong>
            </div>
        </div>
    </div>
</x-app-layout>
