<x-app-layout>
    <div class="cart-container container mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6">My Cart</h2>
        @php
            $total = 0;
            $totalQuantity = 0;
        @endphp
        @if (session('cart'))
            @csrf
            @forelse (session('cart') as $id => $details)
                @php
                    $total += $details['price'] * $details['quantity'];
                    $totalQuantity += $details['quantity'];
                @endphp
                <div class="cart-item flex items-center justify-between p-4 mb-4 bg-white rounded shadow"
                    data-id="{{ $id }}">
                    <img src="https://via.placeholder.com/150" alt="image" style="max-height: 100px; overflow:hidden;">
                    <div class="details flex-grow ml-4">
                        <h3 class="text-lg font-semibold">{{ $details['product_name'] }}</h3>
                        <span class="text-gray-500">Rp{{ number_format($details['price'], 0, ',', '.') }}</span>
                    </div>
                    <div class="quantity flex items-center pr-5">
                        <input type="number" value="{{ $details['quantity'] }}"
                            class="form-control quantity cart_update w-16 text-center border rounded" min="1" />
                    </div>
                    <div class="total-price text-center" id="total-price">
                        Rp{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                    </div>
                    <div class="actions ml-4">
                        <button class="btn btn-danger btn-sm delete-item" href="{{ route('remove_from_cart') }}"
                            data-id="{{ $id }}"><i class="fa fa-trash-o"></i> Delete</button>
                        <form id="delete-form-{{ $id }}" action="{{ route('remove_from_cart') }}"
                            method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $id }}">
                        </form>
                    </div>
                </div>
            @empty
                <h2 class="text-center">Kosong</h2>
            @endforelse
            <div class="container mx-auto mt-10">
                <table class="table-auto w-full">
                    <tr>
                        <td colspan="5" class="text-right p-4">
                            <h3 class="text-xl font-bold">Total: Rp{{ number_format($total, 0, ',', '.') }}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right p-4">
                            <div style="display: flex; justify-content: flex-end; align-items: center;">
                                <a href="{{ url('/shop') }}" class="btn btn-danger" style="margin-right: 10px;">
                                    <i class="fa fa-arrow-left"></i> Continue Shopping
                                </a>
                                <form id="checkout-form" action="/checkout" method="POST" style="margin: 0;">
                                    @csrf
                                    <input type="hidden" name="qty" value="{{ $totalQuantity }}">
                                    <input type="hidden" name="total_price" value="{{ $total }}">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-money"></i> Check Out
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        @else
            <div class="empty-cart flex flex-col items-center justify-center text-center mt-10">
                <img style="max-height: 100px; overflow:hidden;" src="assets/img/shopping-cart.png" alt="Empty Cart"
                    class="mb-4">
                <h2 class="text-2xl font-bold mb-2">Keranjang Anda Kosong</h2>
                <p class="text-gray-500 mb-6">Anda belum menambahkan barang apapun ke keranjang.</p>
                <a href="{{ url('/shop') }}" class="btn btn-primary">
                    <i class="fa fa-arrow-left"></i> Belanja Sekarang
                </a>
            </div>
        @endif
    </div>


    <script type="text/javascript">
        document.querySelectorAll('.cart_update').forEach(function(element) {
            element.addEventListener('change', function(e) {
                e.preventDefault();
                var ele = this;

                fetch('{{ route('update_cart') }}', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: ele.closest(".cart-item").getAttribute("data-id"),
                        quantity: ele.value
                    })
                }).then(response => response.json()).then(data => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        console.error('Error updating cart');
                    }
                }).catch(error => console.error('Error:', error));
            });
        });

        document.querySelectorAll('.delete-item').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var itemId = this.getAttribute('data-id');

                Swal.fire({
                    icon: 'warning',
                    title: 'Anda Yakin?',
                    text: 'Apakah Anda yakin ingin menghapus item ini?',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'sw-popup',
                        title: 'sw-title',
                        htmlContainer: 'sw-text',
                        icon: 'sw-icon',
                        closeButton: 'bg-secondary border-0 shadow-none',
                        confirmButton: 'bg-danger border-0 shadow-none',
                    },
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + itemId).submit();
                    }
                });
            });
        });

        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            e.preventDefault();
            var form = this;

            Swal.fire({
                icon: 'info',
                title: 'Konfirmasi Checkout',
                text: 'Pastikan barang anda sudah sesuai',
                showCancelButton: true,
                confirmButtonText: 'Lanjutkan',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'sw-popup',
                    title: 'sw-title',
                    htmlContainer: 'sw-text',
                    icon: 'sw-icon',
                    closeButton: 'bg-secondary border-0 shadow-none',
                    confirmButton: 'bg-primary border-0 shadow-none',
                },
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</x-app-layout>
