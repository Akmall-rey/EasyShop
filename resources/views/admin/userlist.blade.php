@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User List</h1>
    </div>
    <div id="container" class="container">
        <h1 class="my-4">Manage User Account</h1>
        <div id="input-container" class="mb-4">
            <input type="number" id="id-input" class="form-control d-inline-block w-25 mr-2" placeholder="Enter ID">
            <button id="search-btn" class="btn btn-search btn-custom">Search</button>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="table-body"></tbody>
        </table>
    </div>
@endsection
