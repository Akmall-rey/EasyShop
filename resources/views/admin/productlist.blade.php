@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product List</h1>
    </div>

    <div class="contoh" style="background-color: rgba(230, 230, 230, 0.874); border-radius: 15px; padding: 20px;">
        <table class="table table-striped table-sm mt-5" id="mytable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>contoh gambar</td>
                    <td>nama</td>
                    <td>quantity</td>
                    <td>price</td>
                    <td>actions</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>contoh gambar</td>
                    <td>nama</td>
                    <td>quantity</td>
                    <td>price</td>
                    <td>actions</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>contoh gambar</td>
                    <td>nama</td>
                    <td>quantity</td>
                    <td>price</td>
                    <td>actions</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>contoh gambar</td>
                    <td>nama</td>
                    <td>quantity</td>
                    <td>price</td>
                    <td>actions</td>
                </tr>
                {{-- @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>

    {{-- <div id="container" class="container">
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
    </div> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
@endsection
