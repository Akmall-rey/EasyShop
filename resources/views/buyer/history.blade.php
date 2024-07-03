<style>
    /* Style for the star rating */
    #starRating {
        text-align: center;
    }

    #starRating .fa-star {
        font-size: 2em;
        color: gold;
        cursor: pointer;
        margin: 0 5px;
        transition: transform 0.3s, color 0.3s;
    }

    #starRating .fa-star:hover {
        transform: scale(1.2);
        color: #ffcc00;
    }

    .cart-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #f8f8f8;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s, transform 0.3s;
    }

    .cart-item:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
    }

    .cart-item img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
    }

    .cart-item .details {
        flex: 1;
        margin-left: 20px;
    }

    .cart-item .details h3 {
        margin-bottom: 5px;
        font-size: 1.2em;
    }

    .cart-item .price,
    .cart-item .total-price,
    .cart-item .status-pengiriman {
        font-size: 1.1em;
        font-weight: bold;
    }

    .cart-item .actions .btn {
        font-size: 0.9em;
        padding: 5px 10px;
        transition: background-color 0.3s, color 0.3s;
    }

    .cart-item .actions .btn:hover {
        background-color: #ffcc00;
        color: white;
    }

    .modal-body {
        padding: 20px;
    }
</style>

<x-app-layout>

    <div class="cart-container container mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6">History</h2>
        {{-- iterasi --}}
        @foreach ($orders as $order)
            @if ($order->status == 'Paid')
                <div class="cart-item">
                    <img src="https://via.placeholder.com/100" alt="Product Image">
                    <div class="details">
                        <h3>{{ $order->name }}</h3>
                        <span class="price">Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="total-price">Rp{{ number_format($order->total_price, 0, ',', '.') }}</div>
                    <div class="status-pengiriman">Done</div>
                    <div class="actions">
                        <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#ratingModal">Nilai</button>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingModalLabel">Beri Penilaian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reviewForm">
                        <div class="form-group mb-3">
                            <label for="reviewText">Your Review</label>
                            <textarea class="form-control" id="reviewText" rows="3" required></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="rating">Penilaian</label>
                            <div id="starRating">
                                <i class="far fa-star" data-value="1"></i>
                                <i class="far fa-star" data-value="2"></i>
                                <i class="far fa-star" data-value="3"></i>
                                <i class="far fa-star" data-value="4"></i>
                                <i class="far fa-star" data-value="5"></i>
                            </div>
                        </div>
                        <input type="hidden" id="reviewRating" name="reviewRating" value="0">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('#starRating .fa-star').forEach(function (star) {
            star.addEventListener('click', function () {
                const value = this.getAttribute('data-value');
                const stars = document.querySelectorAll('#starRating .fa-star');
                stars.forEach(function (s, index) {
                    s.classList.toggle('fas', index < value);
                    s.classList.toggle('far', index >= value);
                });
                document.getElementById('reviewRating').value = value;
            });
        });

        document.getElementById('reviewForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const reviewText = document.getElementById('reviewText').value;
            const reviewRating = document.querySelectorAll('#starRating .fas').length;
            const review = {
                text: reviewText,
                rating: reviewRating
            };

            let reviews = JSON.parse(localStorage.getItem('reviews')) || {};
            if (!reviews['Nike Dunk Panda']) {
                reviews['Nike Dunk Panda'] = [];
            }
            reviews['Nike Dunk Panda'].push(review);
            localStorage.setItem('reviews', JSON.stringify(reviews));

            alert('Review submitted successfully!');
            new bootstrap.Modal(document.getElementById('ratingModal')).hide();
        });
    </script>
</x-app-layout>
