<x-app-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="success-container container mt-n5">
            <div class="success-header text-center my-5">
                <div class="icon-container mb-4">
                    <img src="assets/img/checked.png" alt="success" class="icon-size">
                </div>
                <h2 class="display-4">Payment Successful</h2>
                <p class="lead">Thank you for your purchase! Your transaction has been completed successfully.</p>
                <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg mt-4">Continue Shopping</a>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .success-container {
        background: #f8f9fa;
        padding: 3rem;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .icon-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .icon-size {
        width: 64px;
        height: 64px;
    }
    .success-header {
        text-align: center;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    .d-flex {
        display: flex;
    }
    .justify-content-center {
        justify-content: center;
    }
    .align-items-center {
        align-items: center;
    }
    .min-vh-100 {
        min-height: 100vh;
    }
    .mt-n5 {
        margin-top: -3rem;
    }
</style>
