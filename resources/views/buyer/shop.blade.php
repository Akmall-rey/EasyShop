
<style>
    .rating {
        display: flex;
        align-items: center;
    }

    .rating .bi {
        font-size: 1.5rem;
        color: gold;
    }

    .rating .rating-value {
        margin-left: 0.5rem;
        font-size: 1.25rem;
    }

    .review-list {
        list-style: none;
        padding: 0;
    }

    .review-list li {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }
</style>

<x-app-layout>
    <link href="/assets/css/detail.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

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

    <!-- Shop Items -->
    <div class="container my-5">
        <div id="productContainer"
            class="products grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
            @forelse ($products as $product)
                <div class="col">
                    <div class="card h-100 product-card" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                        data-price="{{ number_format($product->price, 0, ',', '.') }}"
                        data-description="Description Product" data-rating="4.5"
                        data-image="{{ $product->image ? asset('storage/images/' . $product->image) : 'https://picsum.photos/seed/' . $product->name . '/600/700' }}">
                        @if ($product->image)
                            <div style="max-height: 350px; overflow:hidden;">
                                <img src="{{ asset('storage/images/' . $product->image) }}" alt="image"
                                    style="max-height: 700px; overflow:hidden;">
                            </div>
                        @else
                            <img src="https://picsum.photos/seed/{{ $product->name }}/600/700" class="card-img-top"
                                alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>
                            <p class="card-text">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary view-details">View Details</button>
                        </div>
                    </div>
                </div>
            @empty
                <h1>Kosong</h1>
            @endforelse
        </div>
    </div>


    <!-- Product Detail -->
    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-bold" id="productDetailModalLabel">Product Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row gx-4 gx-lg-5 align-items-center">
                            <div class="col-md-6">
                                @if ($product->image)
                                    <img id="productImage" class="card-img-top mb-5 mb-md-0"
                                        src="{{ asset('storage/images/' . $product->image) }}" alt="image" />
                                @else
                                    <img id="productImage" class="card-img-top mb-5 mb-md-0"
                                        src="https://picsum.photos/seed/{{ $product->name }}/600/700" alt="image" />
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h1 class="display-5 fw-bolder" id="productName"></h1>
                                <div class="fs-5 mb-5">
                                    <span id="productPrice"></span>
                                </div>
                                <p class="lead" id="productDescription">Product Description</p>
                                <div class="rating mb-3" id="productRating">
                                    <!-- Rating stars will be inserted here -->
                                </div>
                                <div class="d-flex">
                                    <input class="form-control text-center me-3" id="inputQuantity" type="number"
                                        value="1" style="max-width: 4rem" />
                                    <button class="btn btn-outline-dark flex-shrink-0" type="button"
                                        onclick="addToCart()">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>Customer Reviews</h3>
                        <ul class="review-list" id="reviewList">
                            <!-- Reviews will be inserted here -->
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card');
            const modal = new bootstrap.Modal(document.getElementById('productDetailModal'));
            const reviewList = document.getElementById('reviewList');

            productCards.forEach(card => {
                card.querySelector('.view-details').addEventListener('click', () => {
                    const productId = card.getAttribute(
                        'data-id'); // Pastikan data-id ada pada setiap kartu produk
                    const name = card.getAttribute('data-name');
                    const price = card.getAttribute('data-price');
                    const description = card.getAttribute('data-description');
                    const image = card.getAttribute('data-image');
                    const rating = card.getAttribute('data-rating');

                    document.getElementById('productName').textContent = name;
                    document.getElementById('productPrice').textContent = `Rp ${price}`;
                    document.getElementById('productDescription').textContent = description;
                    document.getElementById('productImage').src = image;

                    // Set the product ID to the modal for use in addToCart function
                    document.getElementById('productDetailModal').dataset.productId = productId;

                    const ratingValue = parseFloat(rating);
                    const fullStars = Math.floor(ratingValue);
                    const halfStar = ratingValue % 1 !== 0;
                    const starsContainer = document.getElementById('productRating');
                    starsContainer.innerHTML = '';

                    for (let i = 0; i < fullStars; i++) {
                        const star = document.createElement('i');
                        star.classList.add('bi', 'bi-star-fill');
                        starsContainer.appendChild(star);
                    }

                    if (halfStar) {
                        const star = document.createElement('i');
                        star.classList.add('bi', 'bi-star-half');
                        starsContainer.appendChild(star);
                    }

                    for (let i = fullStars + (halfStar ? 1 : 0); i < 5; i++) {
                        const star = document.createElement('i');
                        star.classList.add('bi', 'bi-star');
                        starsContainer.appendChild(star);
                    }

                    const ratingText = document.createElement('span');
                    ratingText.classList.add('rating-value');
                    ratingText.id = 'ratingValue';
                    ratingText.textContent = ratingValue.toFixed(1);
                    starsContainer.appendChild(ratingText);

                    // Load reviews
                    loadReviews(name);

                    modal.show();
                });
            });

            function loadReviews(product) {
                reviewList.innerHTML = '';

                let reviews = JSON.parse(localStorage.getItem('reviews')) || {};
                if (reviews[product]) {
                    reviews[product].forEach(review => {
                        const li = document.createElement('li');
                        li.innerHTML = `
                <div class="rating">
                    ${'<i class="bi bi-star-fill"></i>'.repeat(review.rating)}
                    ${'<i class="bi bi-star"></i>'.repeat(5 - review.rating)}
                </div>
                <p>${review.text}</p>
            `;
                        reviewList.appendChild(li);
                    });
                }
            }
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
