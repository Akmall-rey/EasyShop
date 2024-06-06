<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .promotion-section {
            display: flex;
            flex-direction: column;
            background-color: #f3f4f6;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            margin-top: 2rem;
            margin-bottom: 2rem;
            justify-content: center;
            align-items: center;
        }
        .promotion-section img {
            width: 100%;
            height: auto;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .promotion-content {
            padding-left: 2rem;
            flex: 1;
        }
        .promotion-content h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .promotion-content {
            padding-left: 2rem;
            max-width: 600px; 
        }
        .promotion-content a {
            display: inline-block;
            background-color: #4bb6b7;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        .promotion-content a:hover {
            background-color: #4bb6b7;
        }
        @media (min-width: 1024px) {
            .promotion-section {
                flex-direction: row;
            }
            .promotion-section img {
                width: 50%;
            }
            .promotion-content {
                padding-left: 2rem;
                width: 50%;
            }
        }
    </style>
</head>
<body>
    <nav class="p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.html" class="text-2xl font-bold">EasyShop</a>
            <div class="flex space-x-4">
                <a href="home">Home</a>
                <a href="shop">Shop</a>
                <a href="cart">Cart</a>
                <a href="login-register">Account</a>
                <a href="profile">Profile</a>
            </div>
        </div>
    </nav>
    <section class="promotion-section">
        <img src="https://via.placeholder.com/600x400" alt="Promotional Image">
        <div class="promotion-content">
            <h2>Special Promotion</h2>
            <p>Discover our latest collection of exclusive items. Shop now and enjoy limited-time discounts on selected products. Don't miss out on these fantastic deals!</p>
            <a href="shop.html">Shop Now</a>
        </div>
    </section>
</body>
</html>
