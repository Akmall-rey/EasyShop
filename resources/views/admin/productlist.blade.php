@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product List</h1>
    </div>
    <div id="container" class="container">
        <h1 class="my-4">Manage User Product</h1>
        <div id="search-container" class="mb-4">
            <input type="text" id="search-product-id-input" class="form-control d-inline-block w-25 mr-2" placeholder="Enter product ID">
            <button id="search-product-btn" class="btn btn-search btn-custom">Search</button>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="product-table-body"></tbody>
        </table>
    </div>
@endsection
