<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop - Checkout</title>
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
        .checkout-container {
            padding: 20px;
        }
        .checkout-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 10px;
        }
        .shipping-address {
            margin: 20px 0;
        }
        .shipping-address label {
            font-weight: bold;
        }
        .shipping-address textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }
        .cart-summary {
            margin-top: 20px;
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 15px;
        }
        .cart-summary h3 {
            margin-bottom: 10px;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e0e0f0;
            padding: 10px;
            border-radius: 10px;
        }
        .cart-item img {
            width: 100px;
            height: auto;
        }
        .cart-item .item-details {
            flex-grow: 1;
            margin-left: 15px;
        }
        .cart-item .item-details h5 {
            margin: 0;
        }
        .cart-item .item-quantity,
        .cart-item .item-price {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            width: 100px;
        }
        .cart-item .item-price {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .cart-item .item-price .currency {
            font-size: 12px;
            font-weight: normal;
        }
        .cart-item .item-actions {
            display: flex;
            align-items: center;
        }
        .cart-item .item-actions .btn {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <nav class="p-4 bg-gray-200">
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
    <div class="checkout-container container">
        <div class="checkout-header">
            <h2>Checkout</h2>
            <div class="total-amount">
                <span><i class="fas fa-wallet"></i> Rp 500.000</span>
            </div>
        </div>
        <div class="shipping-address">
            <label for="address">Alamat Pengiriman</label>
            <textarea id="address" rows="3"></textarea>
        </div>
        <div class="cart-summary">
            <h3>Produk yang Dipesan</h3>
            <div class="cart-item">
                <img src="https://via.placeholder.com/100" alt="Nike Dunk Panda">
                <div class="item-details">
                    <h5>Nike Dunk Panda</h5>
                </div>
                <div class="item-quantity">
                    <span>1</span>
                </div>
                <div class="item-price">
                    <span class="currency">Rp</span>
                    <p>1.250.000</p>
                </div>
                <div class="item-actions">
                    <button class="btn btn-danger" onclick="createOrder()">Buat Pesanan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
    <script>
        function createOrder() {
            toastr.options = {
                "positionClass": "toast-bottom-center",
                "timeOut": "2000",
            };
            toastr.success('Pesanan berhasil dibuat.');
        }
    </script>
</body>
</html>
