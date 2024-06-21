@extends('layouts.main')

@section('container')
    <div class="cart-container container">
        <h2>My Cart</h2>
        <div class="cart-item">
            <img src="https://via.placeholder.com/100" alt="Nike Dunk Panda">
            <div class="details">
                <h3>Nike Dunk Panda</h3>
                <span class="price" data-price="1250000">Rp 1.250.000</span>
            </div>
            <div class="quantity">
                <button onclick="updateQuantity(-1)">-</button>
                <input type="text" id="quantity" value="1" readonly>
                <button onclick="updateQuantity(1)">+</button>
            </div>
            <div class="total-price" id="total-price">
                Rp 1.250.000
            </div>
            <div class="actions">
                <button class="delete" onclick="deleteItem()">Hapus</button>
                <a href="/checkout" class="ml-3 btn btn-dark">Checkout</a>
                {{-- <button class="checkout" onclick="/checkout">Checkout</button> --}}
            </div>
        </div>
    </div>
@endsection
