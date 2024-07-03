<x-app-layout>
    <div class="checkout-container container">
        <div class="checkout-header">
            <h2>Checkout</h2>
            <div class="total-amount">
            </div>
        </div>

        @php
            $total = 0;
            $totalQuantity = 0;
        @endphp
        @if (session('cart'))
            @forelse (session('cart') as $id => $details)
                @php
                    $total += $details['price'] * $details['quantity'];
                    $totalQuantity += $details['quantity'];
                @endphp
                <div class="shipping-address flex items-center justify-between p-4 mb-4 bg-white rounded shadow"
                    data-id="{{ $id }}">
                    <img src="https://via.placeholder.com/100" alt="Product Image" class="w-16 h-16 rounded">
                    <div class="details flex-grow ml-4">
                        <h3 class="text-lg font-semibold">{{ $details['product_name'] }}</h3>
                        <span class="text-gray-500">Rp{{ number_format($details['price'], 0, ',', '.') }}</span>
                    </div>
                    <div class="quantity flex items-center pr-5">
                        <input type="number" value="{{ $details['quantity'] }}"
                            class="form-control quantity cart_update w-16 text-center border rounded" min="1"
                            readonly />
                    </div>
                    <div class="total-price text-center" id="total-price">
                        Rp{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                    </div>
                    <div class="actions ml-4">
                    </div>
                </div>

            @empty
                <div class="empty-cart flex flex-col items-center justify-center text-center mt-10">
                    <img src="https://via.placeholder.com/150" alt="Empty Cart" class="mb-4">
                    <h2 class="text-2xl font-bold mb-2">Keranjang Anda Kosong</h2>
                    <p class="text-gray-500 mb-6">Anda belum menambahkan barang apapun ke keranjang.</p>
                    <a href="{{ url('/shop') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Belanja Sekarang
                    </a>
                </div>
            @endforelse
            <div class="container mx-auto mt-10">
                <table class="table-auto w-full">
                    <tr>
                        <td colspan="5" class="text-right p-4">
                            <h3 class="text-xl font-bold">Total: Rp{{ number_format($total, 0, ',', '.') }}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right p-3">
                            <button id="pay-button" class="btn btn-primary"><i class="fa fa-money"></i> Bayar
                                Sekarang</button>
                        </td>
                        <div id="snap-container"></div>
                    </tr>
                </table>
            </div>
        @else
            <div class="empty-cart flex flex-col items-center justify-center text-center mt-10">
                <img src="assets/img/shopping-cart.png" alt="Empty Cart" class="mb-4">
                <h2 class="text-2xl font-bold mb-2">Keranjang Anda Kosong</h2>
                <p class="text-gray-500 mb-6">Anda belum menambahkan barang apapun ke keranjang.</p>
                <a href="{{ url('/shop') }}" class="btn btn-primary">
                    <i class="fa fa-arrow-left"></i> Belanja Sekarang
                </a>
            </div>
        @endif
    </div>

    <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
    <div id="snap-container"></div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    fetch('{{ route('reduce.stock') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Stock reduced successfully');
                                fetch('{{ route('clear.cart') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            console.log('Cart cleared successfully');
                                            window.location.href = '/success';
                                        } else {
                                            console.log('Failed to clear cart');
                                        }
                                    })
                                    .catch((error) => {
                                        console.error('Error:', error);
                                    });
    
                            } else {
                                console.log('Failed to reduce stock');
                            }
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
    
                    console.log(result);
                },
                onPending: function(result) {
                    alert("waiting for your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>    
</x-app-layout>
