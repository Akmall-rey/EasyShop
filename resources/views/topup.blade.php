<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up - EasyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            background-color: #eae7e7;
            font-family: 'Poppins', sans-serif;
        }

        .topup-container {
            background-color: #ffeaea;
            padding: 2rem;
            width: 100%;
            max-width: 600px;
            margin: 2rem auto;
            text-align: left;
            border-radius: 14px;
        }

        .topup-container h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            text-align: left;
        }

        .topup-container label {
            font-size: 1rem;
            font-weight: 700;
            display: block;
            margin-bottom: 0.5rem;
            text-align: left;
        }

        .topup-container input {
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            width: 100%;
            font-size: 1rem;
        }

        .topup-container button {
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .topup-container .btn-submit {
            background-color: #b6f3b4;
            color: #000;
            margin-top: 1rem;
        }

        .topup-container .btn-submit:hover {
            background-color: #9fe2a1;
        }

        nav {
            background-color: #d3d3d3;
            padding: 1rem;
        }

        nav a {
            color: #000;
        }

        nav .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav .nav-links {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
    </style>
</head>
<body>
    <nav>
        <div class="navbar container mx-auto">
            <a href="home" class="text-2xl font-bold">EasyShop</a>
            <div class="nav-links">
                <a href="home">Home</a>
                <a href="shop">Shop</a>
                <a href="cart" class="text-black"><i class="fas fa-shopping-cart"></i></a>
                <a href="profile" class="text-black"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </nav>
    <main class="topup-container">
        <h2 class="text-2xl font-bold mb-4">Top Up Balance</h2>
        <form id="topup-form">
            <div>
                <label for="amount" class="block font-medium">Amount (Rp)</label>
                <input type="number" id="amount" class="form-input w-full mt-1" required>
            </div>
            <button type="submit" class="w-full py-2 rounded mt-4 btn-submit">Top Up</button>
        </form>
    </main>
    <script>
        document.getElementById('topup-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const amount = parseFloat(document.getElementById('amount').value);
            if (isNaN(amount) || amount <= 0) {
                alert("Please enter a valid amount.");
                return;
            }

            let currentBalance = parseFloat(localStorage.getItem('balance')) || 0;
            
            currentBalance += amount;
            localStorage.setItem('balance', currentBalance);

            alert(`Top-up successful! Your new balance is Rp ${currentBalance.toFixed(2)}`);
            window.location.href = 'profile';
        });
    </script>
</body>
</html>
