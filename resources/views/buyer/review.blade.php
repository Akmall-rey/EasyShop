<style>
    #starRating {
        text-align: center;
    }

    #starRating .fa-star {
        font-size: 2em;
        color: gold;
        cursor: pointer;
        margin: 0 5px;
    }
</style>

<x-app-layout>
    <div class="container">
        <h2>Riwayat Pemesanan</h2>
        <div class="cart-item">
            <img src="https://via.placeholder.com/100" alt="Nike Dunk Panda">
            <div class="details">
                <h3>Nike Dunk Panda</h3>
                <span class="price" data-price="1250000">Rp 1.250.000</span>
            </div>
            <div class="total-price" id="total-price">Rp 1.250.000</div>
            <div class="status-pengiriman" id="status-pengiriman">Proccess/Shipping/Done</div>
            <div class="actions">
                <button class="btn btn-danger" type="button" data-toggle="modal"
                    data-target="#ratingModal">Nilai</button>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingModalLabel">Beri Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reviewForm">
                        <div class="form-group">
                            <label for="reviewText">Your Review</label>
                            <textarea class="form-control" id="reviewText" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rating">Penilaian</label>
                            <div id="starRating">
                                <i class="far fa-star" data-value="1"></i>
                                <i class="far fa-star" data-value="2"></i>
                                <i class="far fa-star" data-value="3"></i>
                                <i class="far fa-star" data-value="4"></i>
                                <i class="far fa-star" data-value="5"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    <script>
        // Handle star rating selection
        document.querySelectorAll('#starRating .fa-star').forEach(function(star) {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                const stars = document.querySelectorAll('#starRating .fa-star');
                stars.forEach(function(s, index) {
                    s.classList.toggle('fas', index < value);
                    s.classList.toggle('far', index >= value);
                });
                document.getElementById('reviewRating').value = value;
            });
        });

        // Handle form submission
        document.getElementById('reviewForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const reviewText = document.getElementById('reviewText').value;
            const reviewRating = document.querySelector('#starRating .fas').length;
            const review = {
                text: reviewText,
                rating: reviewRating
            };

            // Store the review (for demo purposes, we'll use localStorage)
            let reviews = JSON.parse(localStorage.getItem('reviews')) || {};
            if (!reviews['Nike Dunk Panda']) {
                reviews['Nike Dunk Panda'] = [];
            }
            reviews['Nike Dunk Panda'].push(review);
            localStorage.setItem('reviews', JSON.stringify(reviews));

            alert('Review submitted successfully!');
            $('#ratingModal').modal('hide');
        });
    </script>
</x-app-layout>
