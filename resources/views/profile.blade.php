<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            background-color: #eae7e7;
            font-family: 'Poppins', sans-serif;
        }

        .profile-container {
            background-color: #ffeaea;
            padding: 2rem;
            width: 100%;
            max-width: 800px;
            margin: 2rem auto;
            text-align: left;
        }

        .profile-container h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            text-align: left;
        }

        .profile-container label {
            font-size: 1rem;
            font-weight: 700;
            display: block;
            margin-bottom: 0.5rem;
            text-align: left;
        }

        .profile-container input {
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            width: 100%;
            font-size: 1rem;
        }

        .profile-container button {
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .profile-container .btn-save {
            background-color: #b6f3b4;
            color: #000;
        }

        .profile-container .btn-logout {
            background-color: #ff6666;
            color: #fff;
        }

        .profile-container .btn-seller {
            background-color: #000;
            color: #fff;
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

        .wallet-info {
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }

        .wallet-info i {
            margin-right: 0.5rem;
        }

        .wallet-info button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            margin-left: 0.5rem;
            color: #000;
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
                <div class="wallet-info">
                    <i class="fas fa-wallet"></i>
                    <span>Rp 500.000</span>
                    <button onclick="location.href='topup'"><i class="fas fa-plus-circle"></i></button>
                </div>
            </div>
        </div>
    </nav>
    <main class="profile-container">
        <h2 class="text-2xl font-bold mb-4">My Profile</h2>
        <div>
            <label for="username" class="block font-medium">Username</label>
            <input type="text" id="username" class="form-input w-full mt-1" disabled>
        </div>
        <div>
            <label for="fullname" class="block font-medium">Nama</label>
            <input type="text" id="fullname" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" id="email" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4">
            <label for="phone" class="block font-medium">Nomor Telepon</label>
            <input type="tel" id="phone" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4">
            <label for="address" class="block font-medium">Alamat</label>
            <input type="text" id="address" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4 flex">
            <button id="to-seller-page" class="w-full py-2 rounded mt-4 btn-seller">To Seller Page</button>
            <button id="edit-profile" class="w-full py-2 rounded mt-4 btn-save ml-4">Save</button>
        </div>
        <button id="logout" class="w-full py-2 rounded mt-4 btn-logout">Log out</button>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fullName = localStorage.getItem('fullName');
            const username = localStorage.getItem('username');
            const email = localStorage.getItem('email');
            const address = localStorage.getItem('address');
            const phoneNumber = localStorage.getItem('phoneNumber');

            document.getElementById('fullname').value = fullName;
            document.getElementById('username').value = username;
            document.getElementById('email').value = email;
            document.getElementById('address').value = address;
            document.getElementById('phone').value = phoneNumber;

            document.getElementById('edit-profile').addEventListener('click', function() {
                document.getElementById('fullname').removeAttribute('disabled');
                document.getElementById('username').removeAttribute('disabled');
                document.getElementById('email').removeAttribute('disabled');
                document.getElementById('address').removeAttribute('disabled');
                document.getElementById('phone').removeAttribute('disabled');

                document.getElementById('edit-profile').textContent = 'Save Changes';
                document.getElementById('edit-profile').removeEventListener('click', editProfile);

                document.getElementById('edit-profile').addEventListener('click', saveChanges);
            });

            function saveChanges() {
                const updatedFullName = document.getElementById('fullname').value;
                const updatedUserName = document.getElementById('username').value;
                const updatedEmail = document.getElementById('email').value;
                const updatedAddress = document.getElementById('address').value;
                const updatedPhoneNumber = document.getElementById('phone').value;

                localStorage.setItem('fullName', updatedFullName);
                localStorage.setItem('username', updatedUserName);
                localStorage.setItem('email', updatedEmail);
                localStorage.setItem('address', updatedAddress);
                localStorage.setItem('phoneNumber', updatedPhoneNumber);

                document.getElementById('fullname').setAttribute('disabled', true);
                document.getElementById('username').setAttribute('disabled', true);
                document.getElementById('email').setAttribute('disabled', true);
                document.getElementById('address').setAttribute('disabled', true);
                document.getElementById('phone').setAttribute('disabled', true);

                document.getElementById('edit-profile').textContent = 'Edit Profile';
                document.getElementById('edit-profile').removeEventListener('click', saveChanges);

                document.getElementById('edit-profile').addEventListener('click', editProfile);
            }

            function editProfile() {
                document.getElementById('fullname').removeAttribute('disabled');
                document.getElementById('username').removeAttribute('disabled');
                document.getElementById('email').removeAttribute('disabled');
                document.getElementById('address').removeAttribute('disabled');
                document.getElementById('phone').removeAttribute('disabled');

                document.getElementById('edit-profile').textContent = 'Save Changes';
                document.getElementById('edit-profile').removeEventListener('click', editProfile);

                document.getElementById('edit-profile').addEventListener('click', saveChanges);
            }

            document.getElementById('logout').addEventListener('click', function() {
                window.location.href = 'login_register';
            });

            document.getElementById('to-seller-page').addEventListener('click', function() {
                window.location.href = 'seller';
            });
        });
    </script>
</body>
</html>
