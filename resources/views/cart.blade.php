<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop - My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        .cart-container {
            padding: 20px;
        }
        .cart-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .cart-item {
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .cart-item img {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }
        .cart-item .details {
            flex-grow: 1;
        }
        .cart-item .details h3 {
            margin: 0 0 10px 0;
            font-size: 18px;
        }
        .cart-item .price, .cart-item .total-price {
            margin-right: 20px;
            font-size: 16px;
            font-weight: bold;
        }
        .cart-item .quantity {
            display: flex;
            align-items: center;
        }
        .cart-item .quantity input {
            width: 50px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin: 0 5px;
        }
        .cart-item .quantity button {
            padding: 5px 10px;
            border: none;
            background-color: #ccc;
            cursor: pointer;
            border-radius: 3px;
        }
        .cart-item .quantity button:hover {
            background-color: #bbb;
        }
        .cart-item .actions {
            display: flex;
            align-items: center;
        }
        .cart-item .actions button {
            margin-left: 10px;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .cart-item .actions .delete {
            background-color: red;
            color: white;
        }
        .cart-item .actions .checkout {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="p-4 bg-gray-200">
        <div class="container mx-auto flex justify-between items-center">
            <a href="home" class="text-2xl font-bold text-black">EasyShop</a>
            <div class="flex space-x-4 text-black"> 
                <a href="home" class="text-black">Product</a>
                <a href="deliver" class="text-black">Deliver</a>
                <a href="profile" class="text-black"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </nav>
    <div class="cart-container container">
        <h2>My Cart</h2>
        <div class="cart-item">
            <img src="https://via.placeholder.com/100" alt="Nike Dunk Panda">
            <div class="details">
                <h3>Nike Dunk Panda</h3>
                <span class="price" data-price="1250000">Rp 1.250.000</span>
            </div>
            <div class="quantity">
                <button onclick="updateQuantity(-1)">-</button>
                <input type="text" id="quantity" value="1" readonly>
                <button onclick="updateQuantity(1)">+</button>
            </div>
            <div class="total-price" id="total-price">
                Rp 1.250.000
            </div>
            <div class="actions">
                <button class="delete" onclick="deleteItem()">Hapus</button>
                <button class="checkout" onclick="checkout()">Checkout</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
    <script>
        function updateQuantity(change) {
            const quantityInput = document.getElementById('quantity');
            const totalPriceElement = document.getElementById('total-price');
            const priceElement = document.querySelector('.price');
            const price = parseInt(priceElement.getAttribute('data-price'));
            
            let quantity = parseInt(quantityInput.value);
            quantity = Math.max(1, quantity + change);
            quantityInput.value = quantity;
            
            const totalPrice = price * quantity;
            totalPriceElement.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
        }

        function deleteItem() {
            toastr.options = {
                "positionClass": "toast-bottom-center",
                "timeOut": "2000",
            };
            toastr.success('Product berhasil dihapus.');
            setTimeout(() => {
                document.querySelector('.cart-item').remove();
            }, 1000);
        }

        function checkout() {
            window.location.href = 'checkout';
        }
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
