@extends('seller.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order</h1>
    </div>
    <div>
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
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    {{-- @if ($order->status == 'Paid') --}}
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">{{ $order->name }}</td>
                            <td style="text-align: center;">{{ $order->address }}</td>
                            <td style="text-align: center;">{{ $order->phone }}</td>
                            <td style="text-align: center;">{{ $order->qty}}</td>
                            <td style="text-align: center;">{{ $order->total_price }}</td>
                            <td style="text-align: center;">{{ $order->status }}</td>
                            <td style="text-align: center;">
                                <a href="#" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="#" method="POST"
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
                    {{-- @endif --}}
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
