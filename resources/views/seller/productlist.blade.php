@extends('seller.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product</h1>
    </div>

    <a href="{{ route('product-list.create') }}" class="btn btn-primary mb-3">Add New Product</a>
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
                @foreach ($product as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>contoh gambar</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="#" class="badge bg-info"><span data-feather="eye"></span></a>
                            <a href="{{ route('product-list.edit', $product->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>                            {{-- myshop/product-list/{{ $product->id }} --}}
                            {{-- /myshop/product-list/{{ $product->id }} --}}
                            <form action="{{ route('product-list.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
@endsection
