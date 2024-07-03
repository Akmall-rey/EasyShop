@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back {{ $yourname }}</h1>
    </div>

    <!-- Card Section -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
        <a href="/admin/user-list" class="col text-decoration-none">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="info d-flex align-items-center gap-3">
                        <i class="fa-solid fa-users fs-4 text-light py-0 my-0"></i>
                        <div class="card-info d-flex flex-column justify-content-center gap-2">
                            <h6 class="text-size text-opacity py-0 my-0">Total Users</h6>
                            <p class="text-size text-color py-0 my-0">{{ $users->count() }}</p>
                        </div>
                    </div>
                    <div class="action text-size text-light fs-4">
                        <i class='bx bx-chevron-right'></i>
                    </div>
                </div>
            </div>
        </a>

        <a href="/admin/product-list" class="col text-decoration-none">
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

        <a href="/admin" class="col text-decoration-none">
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
    
    <!-- Table Section -->
    <div class="overflow-x-auto bg-white p-4 rounded-lg shadow-md mt-6">
        <h2 class="text-xl font-medium mb-4">Recent Orders</h2>
        <table class="table table-striped table-sm mt-5" id="mytable">
            <thead>
                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Address</th>
                    <th style="text-align: center;">Phone</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Total Price</th>
                    <th style="text-align: center;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">{{ $order->name }}</td>
                            <td style="text-align: center;">{{ $order->address }}</td>
                            <td style="text-align: center;">{{ $order->phone }}</td>
                            <td style="text-align: center;">{{ $order->qty}}</td>
                            <td style="text-align: center;">{{ $order->total_price }}</td>
                            <td style="text-align: center;">{{ $order->status }}</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="dashboard.js"></script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
@endsection