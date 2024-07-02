@extends('seller.layouts.main')

@section('container')
    <div class="flex justify-between items-center pt-3 pb-2 mb-3 border-b border-gray-300">
        <h1 class="text-2xl font-semibold">Welcome Back {{ $yourname }}</h1>
    </div>
    
    <!-- Card Section -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">

        <a href="/myshop/order-list" class="col text-decoration-none">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="info d-flex align-items-center gap-3">
                        <i class="bx bxs-box fs-3 text-light py-0 my-0"></i>
                        <div class="card-info d-flex flex-column justify-content-center gap-2">
                            <h6 class="text-size text-opacity py-0 my-0">Total Products</h6>
                            <p class="text-size text-color py-0 my-0">{{ $products->count() }}</p>
                        </div>
                    </div>
                    <div class="action text-size text-light fs-4">
                        <i class='bx bx-chevron-right'></i>
                    </div>
                </div>
            </div>
        </a>

        <a href="/myshop/product-list" class="col text-decoration-none">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="info d-flex align-items-center gap-3">
                        <i class="fa-solid fa-cart-shopping fs-4 text-light py-0 my-0"></i>
                        <div class="card-info d-flex flex-column justify-content-center gap-2">
                            <h6 class="text-size text-opacity py-0 my-0">Total Orders</h6>
                            <p class="text-size text-color py-0 my-0">{{ $orders->count() }}</p>
                        </div>
                    </div>
                    <div class="action text-size text-light fs-4">
                        <i class='bx bx-chevron-right'></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Chart Section -->
    <div class="flex justify-center my-6">
        <canvas class="w-full max-w-4xl" id="myChart" width="1800" height="480"></canvas>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
@endsection
