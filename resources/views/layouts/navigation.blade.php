<nav x-data="{ open: false }" class="bg-[#d3d3d3] border-b border-gray-100">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-dark text-decoration-none">EasyShop</a>
        @auth
            <div class="flex space-x-4">
                <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="/"
                    class="text-decoration-none text-dark py-2">Home</a>
                <a class="nav-link {{ Request::is('/shop*') ? 'active' : '' }}" href="/shop"
                    class="text-decoration-none text-dark py-2">Shop</a>
                <a class="nav-link {{ Request::is('/history*') ? 'active' : '' }}" href="/history"
                    class="text-decoration-none text-dark py-2">History</a>
                <a type="button" class="btn bg-transparent no-outline" href="/cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                        class="badge badge-danger">{{ count((array) session('cart')) }}</span>
                </a>


                {{-- <a href="/cart" class="text-decoration-none text-dark py-2"><i class="fas fa-shopping-cart"></i></a> --}}
                {{-- Settings Dropdown --}}
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-decoration-none">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('seller.index')" class="text-decoration-none">
                                {{ __('Go to My Shop') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" class="text-decoration-none"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        @else
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class=" ms-auto text-decoration-none text-dark py-2">Login</a>
                <a href="{{ route('register') }}" class="text-decoration-none text-dark py-2 ml-5">Register</a>
            </div>
            @endif
        </div>
    </nav>
