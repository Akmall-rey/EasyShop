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
    </style>
</head>
<body>
    <nav class="p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="home" class="text-2xl font-bold">EasyShop</a>
            <div class="flex space-x-4">
                <a href="index">Home</a>
                <a href="shop">Shop</a>
                <a href="cart">Cart</a>
                <a href="login-register">Account</a>
                <a href="profile">Profile</a>
            </div>
        </div>
    </nav>
    <main class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-4">Cart</h1>
        <div id="cart-items" class="max-w-md mx-auto"></div>
        <div id="cart-total" class="text-lg font-bold mt-4"></div>
        <button id="checkout-button" class="button-primary mt-4 hidden" onclick="checkout()">Checkout</button>
    </main>
    <script>
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';
            
            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
            } else {
                cart.forEach((item, index) => {
                    cartItemsContainer.innerHTML += `
                        <div class="cart-item p-4 border-b flex justify-between">
                            <div>
                                <h2 class="text-xl">${item.name}</h2>
                                <p class="text-gray-700">$${item.price.toFixed(2)}</p>
                            </div>
                            <button onclick="removeFromCart(${index})" class="button-primary">Remove</button>
                        </div>
                    `;
                });
                document.getElementById('checkout-button').classList.remove('hidden');
            }
            
            updateTotal();
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
        }

        function updateTotal() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let total = cart.reduce((sum, item) => sum + item.price, 0);
            document.getElementById('cart-total').innerText = `Total: $${total.toFixed(2)}`;
        }

        function checkout() {
            alert('Proceeding to checkout...');
            localStorage.removeItem('cart');
            window.location.href = 'checkout.html';
        }

        window.onload = loadCart;
    </script>
</body>
</html>
