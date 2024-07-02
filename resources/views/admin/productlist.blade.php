@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product List</h1>
    </div>

    <div>
        <table class="table table-striped table-sm mt-5" id="mytable">
            <thead>
                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Image</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;" >Quantity</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $product)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td style="text-align: center;">
                            <img src="{{ asset('storage/images/'.$product->image) }}" alt="image" style="max-height: 50px; overflow:hidden;">
                        </td>
                        <td style="text-align: center;">{{ $product->name }}</td>
                        <td style="text-align: center;">{{ $product->stock }}</td>
                        <td style="text-align: center;">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('admin.product-list.edit', $product->id) }}" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="{{ route('admin.product-list.destroy', $product->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure?')">
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
