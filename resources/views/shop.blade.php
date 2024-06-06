<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .nav {
            padding: 1rem;
            background: #f8f9fa;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .brand {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            color: #000;
        }

        .nav-links a {
            margin-left: 1rem;
            text-decoration: none;
            color: #000;
        }

        .main-container {
            padding: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: #fff;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            text-align: center;
        }

        .product-image {
            height: 12rem;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .product-image span {
            color: #718096;
            font-size: 1rem;
        }

        .product-info {
            text-align: left;
        }

        .product-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .product-title h2 {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .sale-badge {
            background: #000;
            color: #fff;
            border-radius: 9999px;
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        .rating {
            color: #fbbf24;
            margin-bottom: 0.5rem;
        }

        .price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .old-price {
            text-decoration: line-through;
            color: #718096;
        }

        .new-price {
            color: #1a202c;
            font-weight: bold;
        }

        .add-to-cart {
            background: #4299e1;
            color: #fff;
            padding: 0.5rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
        }

        .add-to-cart:hover {
            background: #3182ce;
        }
    </style>
</head>
<body>
    <nav class="nav">
        <div class="container">
            <a href="index.html" class="brand">EasyShop</a>
            <div class="nav-links">
                <a href="home">Home</a>
                <a href="shop">Shop</a>
                <a href="cart">Cart</a>
                <a href="login-register">Account</a>
                <a href="profile">Profile</a>
            </div>
        </div>
    </nav>
    <main class="main-container">
        <div class="header">
            <h1>Shop in style</h1>
        </div>
        <div class="product-grid">
            <!-- Product Card -->
            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span>450 x 300</span>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <h2>Special Item</h2>
                        <span class="sale-badge">Sale</span>
                    </div>
                    <div class="rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <div class="price">
                        <span class="old-price">$20.00</span>
                        <span class="new-price">$18.00</span>
                    </div>
                    <button class="add-to-cart">Add to cart</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
