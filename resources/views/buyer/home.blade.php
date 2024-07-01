<x-app-layout>
    <section class="promotion-section">
        @if ($randomProduct->image)
            <img style="max-height: 800px; overflow:hidden;" src="{{ asset('storage/images/' . $randomProduct->image) }}"
                alt="Promotional Image">
        @else
            <img src="https://picsum.photos/seed/{{ $randomProduct->name }}/1000/800" class="card-img-top"
                alt="{{ $randomProduct->name }}">
        @endif
        <div class="promotion-content">
            <h2>Special Promotion</h2>
            <p>Discover our latest collection of exclusive items. Shop now and enjoy limited-time discounts on selected
                products. Don't miss out on these fantastic deals!</p>
            @auth()
                <a href="shop">Shop Now!</a>
            @else
                <a href="/login">Shop Now!</a>
                @endif
            </div>
        </section>

        <!-- Products Section -->
        <section class="products-section py-10 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold mb-6 text-center">Featured Products</h2>
                <div id="productContainer"
                    class="products grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Contoh Product -->
                    @forelse ($product as $product)
                        <div class="product bg-white p-4 rounded shadow">
                            @if ($product->image)
                                <div style="max-height: 350px; overflow:hidden;">
                                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="image"
                                        style="max-height: 700px; overflow:hidden;">
                                </div>
                            @else
                                <img src="https://picsum.photos/seed/{{ $product->name }}/1200/700" class="card-img-top"
                                    alt="{{ $product->name }}">
                            @endif
                            <div class="name font-bold">{{ $product->name }}</div>
                            <div class="price text-gray-600">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                            @auth()
                                <a class="btn btn-primary" href="shop">Buy Now!</a>
                            @else
                                <a class="btn btn-primary" href="/login">Buy Now!</a>
                            @endif
                        {{-- <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded"
                            onclick="addToCart('Product 1', 1250000, 'path/to/product1.jpg')">Add to Cart</button> --}}
                    </div>
                @empty
                    <h1>Kosong</h1>
                    @endforelse

                </div>
                </div>
            </section>

            <!-- Footer Section -->
            <footer class="bg-black text-white py-6">
                <div class="container mx-auto px-4 text-center">
                    <p>&copy; 2024 EasyShop. All rights reserved.</p>
                    <p>Contact us: <a href="mailto:easyshop@gmail.com" class="text-blue-400">easyshop@gmail.com</a></p>
                </div>
            </footer>
        </x-app-layout>
