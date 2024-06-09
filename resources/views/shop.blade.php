<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .promotion-section {
            display: flex;
            flex-direction: column;
            background-color: #000000;
            padding: 2rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            margin-top: 2rem;
            margin-bottom: 2rem;
            justify-content: center;
            align-items: center;
        }
        .promotion-section img {
            width: 20%; 
            height: auto;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .promotion-content {
            padding-left: 2rem;
            flex: 1;
            color: #fff;
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
            background-color: #49d2eb;
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
                width: 30%; 
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
            <a href="home" class="text-2xl font-bold text-black">EasyShop</a>
            <div class="flex space-x-4 text-black"> 
                <a href="home" class="text-black">Home</a>
                <a href="shop" class="text-black">Shop</a>
                <a href="cart" class="text-black"><i class="fas fa-shopping-cart"></i></a>
                <a href="profile" class="text-black"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </nav>
    <div class="main-content text-center py-20 bg-black text-white">
        <h1 class="text-3xl">Shop in style</h1>
    </div>
    <div class="search-bar flex justify-center mt-4 mb-8">
        <input type="text" plahocelder="Search..." class="w-1/3 p-2 border border-gray-300 rounded-lg">
    </div>
    <div class="products flex justify-center py-20">
        <div class="product border p-4 mx-2 text-center">
            <img src="shoe1.png" alt="Shoe 1" class="mb-4">
            <div class="price font-bold">Rp 1.250.000</div>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Add to Cart</button>
        </div>
        <div class="product border p-4 mx-2 text-center">
            <img src="shoe2.png" alt="Shoe 2" class="mb-4">
            <div class="price font-bold">Rp 1.250.000</div>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Add to Cart</button>
        </div>
    </div>
</body>
</html>
