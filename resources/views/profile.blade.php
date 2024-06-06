<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            background-color: #eae7e7;
            font-family: 'Poppins', sans-serif;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 14px;
            padding: 2rem;
            width: 100%;
            max-width: 800px;
            text-align: center;
            justify-content: center;
            margin: 2rem auto; /* Untuk mengatur margin secara otomatis */
        }


        .profile-container h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .profile-container label {
            font-size: 1rem;
            font-weight: 700;
            text-align: left;
            display: block;
            margin-bottom: 0.5rem;
        }

        .profile-container input,
        .profile-container select {
            background-color: #eee;
            border-radius: 10px;
            border: none;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            width: 100%;
            font-size: 1rem;
        }

        .profile-container button {
            background-color: #4bb6b7;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .profile-container button:hover {
            letter-spacing: 1px;
        }

        .profile-container button:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <nav class="p-4 bg-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="home" class="text-2xl font-bold">EasyShop</a>
            <div class="flex space-x-4">
                <a href="home">Home</a>
                <a href="shop">Shop</a>
                <a href="cart">Cart</a>
                <a href="login-register">Account</a>
                <a href="profile">Profile</a>
            </div>
        </div>
    </nav>
    <main class="profile-container">
        <h2 class="text-2xl font-bold mb-4">Profile</h2>
        <div>
            <label for="fullname" class="block font-medium">Full Name</label>
            <input type="text" id="fullname" class="form-input w-full mt-1" disabled>
        </div>
        <div>
            <label for="username" class="block font-medium">Username</label>
            <input type="text" id="username" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" id="email" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4">
            <label for="address" class="block font-medium">Address</label>
            <input type="address" id="address" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4">
            <label for="phone" class="block font-medium">Phone Number</label>
            <input type="tel" id="phone" class="form-input w-full mt-1" disabled>
        </div>
        <button id="edit-profile" class="w-full py-2 rounded mt-4">Edit Profile</button>
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
        });
    </script>
</body>
</html>
