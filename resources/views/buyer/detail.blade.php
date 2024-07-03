<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/css/detail.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
</head>
<body>

<!-- Shop Items -->
<div class="container my-5">
    <div id="productContainer" class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 product-card" data-name="Nike Dunk Panda" data-price="1250000" data-description="Description of Nike Dunk Panda" data-image="https://via.placeholder.com/600x700" data-rating="4.5">
                <img src="https://via.placeholder.com/600x700" class="card-img-top" alt="Nike Dunk Panda">
                <div class="card-body">
                    <h5 class="card-title">Nike Dunk Panda</h5>
                    <p class="card-text">Rp 1.250.000</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary view-details">View Details</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product Detail -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productDetailModalLabel">Product Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6">
                            <img id="productImage" class="card-img-top mb-5 mb-md-0" src="" alt="Product Image" />
                        </div>
                        <div class="col-md-6">
                            <h1 class="display-5 fw-bolder" id="productName">Product Name</h1>
                            <div class="fs-5 mb-5">
                                <span id="productPrice">Rp 0</span>
                            </div>
                            <p class="lead" id="productDescription">Product Description</p>
                            <div class="rating mb-3" id="productRating">
                            </div>
                            <div class="d-flex">
                                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>Customer Reviews</h3>
                    <ul class="review-list" id="reviewList">
                    </ul>
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
    document.addEventListener('DOMContentLoaded', function () {
        const productCards = document.querySelectorAll('.product-card');
        const modal = new bootstrap.Modal(document.getElementById('productDetailModal'));
        const reviewList = document.getElementById('reviewList');
        let currentProduct;

        productCards.forEach(card => {
            card.querySelector('.view-details').addEventListener('click', () => {
                const name = card.getAttribute('data-name');
                const price = card.getAttribute('data-price');
                const description = card.getAttribute('data-description');
                const image = card.getAttribute('data-image');
                const rating = card.getAttribute('data-rating');

                document.getElementById('productName').textContent = name;
                document.getElementById('productPrice').textContent = `Rp ${price}`;
                document.getElementById('productDescription').textContent = description;
                document.getElementById('productImage').src = image;
                
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
                currentProduct = name;
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
</script>
</body>
</html>
