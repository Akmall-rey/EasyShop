<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <div class="main-content text-center py-20 bg-black text-white">
        <h1 class="text-3xl">Shop in style</h1>
    </div>
    <div class="wrap">
        <div class="search mb-10">
            <input type="text" id="searchTerm" class="searchTerm" placeholder="Search...">
            <button type="submit" class="searchButton" onclick="searchProducts()">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>

    <div id="productContainer"
        class="products grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
        @forelse ($product as $product)
            <div class="product">
                @if ($product->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/images/'.$product->image) }}" alt="image" style="max-height: 700px; overflow:hidden;">
                    </div>
                @else
                    <img src="https://picsum.photos/seed/{{ $product->name }}/1200/700" class="card-img-top"
                        alt="{{ $product->name }}">
                @endif
                <div class="name">{{ $product->name }}</div>
                <div class="price">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                <br>
                <div class="product-card">
                    <a class="btn btn-primary view-details" data-bs-toggle="modal" data-bs-target="#productDetailModal"
                        data-product-id="{{ $product->id }}">View Details</a>
                </div>
            </div>
        @empty
            <h1>Kosong</h1>
        @endforelse
    </div>

    <!-- Product Detail -->
    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="productDetailModalLabel" style="font-size: 2em; font-weight: bold;">
                        Product Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row gx-4 gx-lg-5 align-items-center">
                            <div class="col-md-6">
                                <img id="productImage" class="card-img-top mb-5 mb-md-0" src=""
                                    alt="Product Image" />
                            </div>
                            <div class="col-md-6">
                                <h1 id="productName" style="font-size: 25px; font-weight: bold;"></h1>
                                <div class="fs-5 mb-5" style="font-size: 18px; padding-top: 20px">
                                    <span id="productPrice"></span>
                                </div>
                                <p class="lead" id="productDescription" style="font-size: 18px; padding-bottom: 15px">
                                </p>
                                <div class="d-flex">
                                    <input class="form-control text-center me-3" id="inputQuantity" type="number"
                                        value="1" style="max-width: 3rem" min="1" />

                                    <button class="btn btn-outline-dark flex-shrink-0" type="button" onclick="addToCart()">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product');
            const modal = new bootstrap.Modal(document.getElementById('productDetailModal'));

            productCards.forEach(card => {
                card.querySelector('.view-details').addEventListener('click', () => {
                    const name = card.querySelector('.name').innerText;
                    const price = card.querySelector('.price').innerText;
                    const description = "Deskripsi produk belum tersedia.";
                    const image = card.querySelector('img').src;
                    const productId = card.querySelector('.view-details').dataset.productId;

                    document.getElementById('productName').innerText = name;
                    document.getElementById('productPrice').innerText = price;
                    document.getElementById('productDescription').innerText = description;
                    document.getElementById('productImage').src = image;
                    document.getElementById('productDetailModal').dataset.productId = productId;

                    // modal.show();
                });
            });
        });

        async function addToCart() {
            const productId = document.getElementById('productDetailModal').dataset.productId;
            const quantity = document.getElementById('inputQuantity').value;

            try {
                console.log('{{ route('add_to_cart') }}');
                const response = await fetch('{{ route('add_to_cart') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: productId,
                        quantity: parseInt(quantity, 10)
                    })
                });

                const data = await response.json();

                if (data.success) {
                    alert('Product added to cart');
                } else {
                    alert('Failed to add product to cart');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            }
        }
    </script>
</x-app-layout>
