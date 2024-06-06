<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins");

        * {
            box-sizing: border-box;
        }

        body {
            display: flex;
            background-color: #eae7e7;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: "Poppins", sans-serif;
            overflow: hidden;
            height: 100vh;
        }

        h1 {
            font-weight: 700;
            letter-spacing: -1.5px;
            margin: 0;
            margin-bottom: 15px;
        }

        h1.title {
            font-size: 45px;
            line-height: 45px;
            margin: 0;
            text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
            text-shadow: 0 0 10px rgb(16, 64, 74, 0.5);
        }

        span {
            font-size: 14px;
            margin-top: 25px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
            transition: 0.3 ease-in-out;
        }

        a:hover {
            color: #4bb6b7;
        }

        .content {
            display: flex;
            width: 100%;
            height: 50px;
            align-items: center;
            justify-content: space-around;
        }

        .content input {
            accent-color: #333;
            width: 12px;
            height: 12px;
        }

        button {
            position: relative;
            border-radius: 20px;
            border: 1px solid #4bb6b7;
            background-color: #4bb6b7;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            margin: 10px;
            padding: 12px 80px;
            letter-spacing: 1px;
            text-transform: capitalize;
            transition: 0.3 ease-in-out;
        }

        button:hover {
            letter-spacing: 3px;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid #fff;
            color: #fff;
        }

        button.ghost i{
            position: absolute;
            opacity: 0;
            transition: 0.3 ease-in-out;
        }

        button.ghost i.register {
            right: 70px;
        }

        button.ghost i.login {
            left: 70px;
        }

        button.ghost:hover i.register {
            right: 40px;
            opacity: 1;
        }

        button.ghost:hover i.login {
            left: 40px;
            opacity: 1;
        }

        form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input, select {
            background-color: #eee;
            border-radius: 10px;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 500px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .login-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .login-container {
            transform: translateX(100%);
        }

        .register-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .register-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {
            0%,
            49.99% {
                opacity: 0;
                z-index: 1; 
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translate(-100%);
        }

        .overlay {
            background-color: #4bb6b7;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background: linear-gradient(
                to top,
                rgba(46, 94, 109, 0.4) 40%,
                rgba(46, 94, 109, 0)
            );
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        /* Toast Notification */
        .toast {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 10px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
            transition: visibility 0.5s, opacity 0.5s ease;
            opacity: 0;
        }

        .toast.show {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container register-container">
            <form id="registerForm" action="#">
                <h1>Register</h1>
                <input type="text" placeholder="Full Name" required>
                <input type="text" placeholder="Username" required>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <input type="tel" placeholder="Phone Number" required>
                <button type="submit">Register</button>
            </form>
        </div>

        <div class="form-container login-container">
            <form id="loginForm" action="#">
                <h1>Login</h1>
                <input type="username" placeholder="Username" required>
                <input type="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">EasyShop</h1>
                    <p>If you have an account, login here</p>
                    <button class="ghost" id="login">Login
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">EasyShop</h1>
                    <p>If you don't have an account, register here</p>
                    <button class="ghost" id="register">Register
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="toast" class="toast"></div>

    <script>
        const registerButton = document.getElementById("register");
        const loginButton = document.getElementById("login");
        const container = document.getElementById("container");
        const toast = document.getElementById("toast");

        function showToast(message) {
            toast.innerText = message;
            toast.classList.add("show");
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        }

        registerButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });

        loginButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });

        document.getElementById("registerForm").addEventListener("submit", (event) => {
            event.preventDefault();
            showToast("Registration successful!");
            container.classList.remove("right-panel-active");
        });

        document.getElementById("loginForm").addEventListener("submit", (event) => {
            event.preventDefault();
            showToast("Login successful!");
            setTimeout(() => {
                window.location.href = "index.html";
            }, 3000);
        });
    </script>
</body>
</html>