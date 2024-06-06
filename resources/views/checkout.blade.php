<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.html" class="text-2xl font-bold">EasyShop</a>
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
        <h1 class="text-4xl font-bold mb-4">Checkout</h1>
        <div class="checkout-container max-w-md mx-auto">
            <form id="checkout-form">
                <div class="mb-4">
                    <label for="address" class="form-label block mb-2">Shipping Address</label>
                    <input type="text" id="address" class="form-input w-full px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="payment" class="form-label block mb-2">Payment Method</label>
                    <select id="payment" class="form-input w-full px-3 py-2 rounded" required>
                        <option value="">Select Payment Method</option>
                        <option value="credit-card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank-transfer">Bank Transfer</option>
                    </select>
                </div>
                <button type="submit" class="button-primary w-full px-4 py-2 rounded">Place Order</button>
            </form>
        </div>
    </main>
    <script>
        document.getElementById('checkout-form').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Order placed successfully!');
            window.location.href = 'index.html';
        });
    </script>
</body>
</html>
