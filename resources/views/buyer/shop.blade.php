<x-app-layout>
    <div class="main-content text-center py-20 bg-black text-white">
        <h1 class="text-3xl">Shop in style</h1>
    </div>
    <div class="wrap">
        <div class="search mb-10">
            <input type="text" id="searchTerm" class="searchTerm" placeholder="Search...">
            <button type="submit" class="searchButton" onclick="searchProducts()">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>

    {{-- <div id="productContainer" class="products grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
        <div class="product">
            <img src="{{ asset('images/shoe1.png') }}" alt="Shoe 1">
            <div class="price">Rp 1.250.000</div>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded" onclick="addToCart('Shoe 1', 1250000, '{{ asset('images/shoe1.png') }}')">Add to Cart</button>
        </div>
        <div class="product">
            <img src="{{ asset('images/shoe2.png') }}" alt="Shoe 2">
            <div class="price">Rp 1.350.000</div>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded" onclick="addToCart('Shoe 2', 1350000, '{{ asset('images/shoe2.png') }}')">Add to Cart</button>
        </div>
        <div class="product">
            <img src="{{ asset('images/shoe3.png') }}" alt="nike 3">
            <div class="price">Rp 1.150.000</div>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded" onclick="addToCart('Shoe 3', 1150000, '{{ asset('images/shoe3.png') }}')">Add to Cart</button>
        </div>
        <div class="product">
            <img src="{{ asset('images/shoe4.png') }}" alt="Shoe 4">
            <div class="price">Rp 1.050.000</div>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded" onclick="addToCart('Shoe 4', 1050000, '{{ asset('images/shoe4.png') }}')">Add to Cart</button>
        </div>
    </div> --}}


    {{-- Contoh dummy --}}
    <div id="productContainer"
        class="products grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
        @forelse ($product as $product)
            <div class="product">
                @if ($product->image)
                    <img src="{{ asset('images/shoe1.png') }}" alt="Shoe 1">
                @endif
                <div class="name">{{ $product->name }}</div>
                <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded"
                    onclick="addToCart('Shoe 1', 1250000, '{{ asset('images/shoe1.png') }}')">Add to Cart</button>
            </div>
        @empty
            <h1>kosong</h1>
        @endforelse
        <!-- Add more products as needed -->
    </div>

    <div id="toast-container" style="position: fixed; top: 20px; right: 20px; z-index: 1000;"></div>
</x-app-layout>
