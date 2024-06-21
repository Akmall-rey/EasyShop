@extends('layouts.main')

@section('container')
    <div class="main-content text-center py-20 bg-black text-white">
        <h1 class="text-3xl">Shop in style</h1>
    </div>
    <div class="search-bar flex justify-center mt-4 mb-8">
        <input type="text" plahocelder="Search..." class="w-1/3 p-2 border border-gray-300 rounded-lg">
    </div>
    <div class="products flex justify-center py-20">
        <div class="product border p-4 mx-2 text-center">
            <img src="shoe1.png" alt="Shoe 1" class="mb-4">
            <div class="price font-bold">Rp 1.250.000</div>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Add to Cart</button>
        </div>
        <div class="product border p-4 mx-2 text-center">
            <img src="shoe2.png" alt="Shoe 2" class="mb-4">
            <div class="price font-bold">Rp 1.250.000</div>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Add to Cart</button>
        </div>
    </div>
@endsection
