<div class="bg-white shadow-sm px-4 py-1 md:py-0">
    <div class="md:max-w-screen-xl md:mx-auto">
        <div class="md:flex items-center justify-between bg-white" x-data="{ sidebarOpen: false }"
            @keydown.window.escape="sidebarOpen = false">
            <div class="flex flex-col">
                <div class="flex flex-wrap justify-between md:flex-none items-center">
                    <div>
                        <button x-on:click="sidebarOpen = true"
                            class="focus:outline-none inline-block inline-flex items-center justify-center w-8 py-2 rounded-full mr-3 cursor-pointer md:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 w-8 h-8" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <line x1="4" y1="6" x2="20" y2="6"></line>
                                <line x1="4" y1="12" x2="20" y2="12"></line>
                                <line x1="4" y1="18" x2="20" y2="18"></line>
                            </svg>
                        </button>
        
                        <a href="/" class="inline-flex items-center md:w-32">
                            <img src="{{ url('theme/fd.svg') }}" alt="{{ config('app.name') }}"
                                class="h-10 md:h-12 object-contain">
                        </a>
                    </div>
        
                    <div class="md:hidden flex items-center">
                        @guest
                        <a class="-mt-px cursor-pointer mr-2" href="{{ url('login') }}">
                            <svg class="w-8 h-8 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        @endguest
                        @livewire('cart-counter')
                    </div>
                </div>
            </div>
        
            {{-- Off-canvas menu for mobile --}}
            <div class="md:hidden">
                <div @click="sidebarOpen = false"
                    class="fixed inset-0 z-30 bg-gray-600 opacity-0 pointer-events-none transition-opacity ease-linear duration-300"
                    :class="{'opacity-75 pointer-events-auto': sidebarOpen, 'opacity-0 pointer-events-none': !sidebarOpen}">
                </div>
        
                <div class="fixed inset-y-0 left-0 flex flex-col z-40 max-w-xs w-full bg-gray-800 transform ease-in-out duration-300 -translate-x-full"
                    :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
        
                    {{-- <div class="absolute top-0 right-0 -mr-14 p-1">
                        <button x-show="sidebarOpen" @click="sidebarOpen = false" class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600">
                        <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        </button>
                    </div> --}}
        
                    <div class="flex-shrink-0 flex items-center px-4 py-1 bg-gray-900">
                        @auth
                        <div class="text-gray-200 block truncate h-12 inline-flex items-center">Hi,
                            {{ Str::title(auth()->user()->name) }}</div>
                        @else
                        <img src="{{ url('theme/fd-i.svg') }}" alt="{{ config('app.name') }}"
                            class="h-12 w-auto object-contain">
                        @endauth
                    </div>
                    <div class="flex-1 h-0 overflow-y-auto">
                        <nav class="px-2 py-4">
                            <a href="#"
                                class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white bg-gray-900 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="mr-4 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150"
                                    stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6" />
                                </svg>
                                Home
                            </a>
                            <a href="#"
                                class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                    </path>
                                </svg>
                                Products
                            </a>
                            <a href="#"
                                class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-shopping-bag">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                                Cart
                            </a>
                            <a href="#"
                                class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                                Categories
                            </a>
                            @auth
                            <a href="#"
                                class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                                Orders
                            </a>
                            <a href="#"
                                class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Track Order
                            </a>
                            @endauth
                        </nav>
                    </div>
        
                    @auth
                    <div class="flex-shrink-0 flex items-center h-12 px-4 py-2 bg-gray-800 w-full border-t"
                        style="border-color: rgba(255, 255, 255, 0.05)">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-64 px-2 py-2 text-gray-400 font-medium block cursor-pointer text-left focus:outline-none">
                                <svg class="mr-4 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Logout</button>
                        </form>
                    </div>
                    @endauth
        
                </div>
            </div>
        
        
            {{-- Large Screen Menu --}}
            <div class="hidden md:flex md:flex-1 items-center">
                <div class="w-full max-w-xl mr-16 -mb-5">
                    <livewire:global-search />
                </div>
            </div>
            <div class="hidden md:flex items-center">
                <a href="/"
                    class="px-2 mr-5 py-6 inline-block font-medium hover:text-blue-600 {{request()->is('/') ? 'active text-blue-600' : 'text-gray-500'}}">Home</a>
                <a href="/products"
                    class="px-2 mr-5 py-6 inline-block font-medium hover:text-blue-600 {{request()->is('products') ? 'active text-blue-600' : 'text-gray-500'}}">Products</a>
                {{-- <a href="/cart"
                    class="px-2 mr-5 py-6 inline-block font-medium hover:text-blue-600 {{request()->is('cart') ? 'active text-blue-600' : 'text-gray-500'}}">Cart</a> --}}
        
                {{-- <div @click.away="flyoutMenuOpen = false" x-data="{ flyoutMenuOpen: false }" class="relative">
                    <button type="button" @click="flyoutMenuOpen = !flyoutMenuOpen"
                        class="px-2 py-6 inline-flex items-center font-medium hover:text-blue-600 text-base font-medium text-gray-500 focus:outline-none focus:text-blue-600">
                        <span>Categories</span>
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
        
                    <div x-show="flyoutMenuOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
                        class="z-40 absolute -ml-4 -mt-2 transform lg:ml-0 lg:left-1/2 lg:-translate-x-1/2 max-w-3xl">
                        <div class="rounded-lg shadow-lg">
                            <div class="rounded-lg shadow-xs overflow-hidden">
                                <div class="z-20 relative bg-white p-8 flex -mx-4">
        
                                    <div class="w-64 flex-1 px-4">
                                        <a href="#" class="block space-y-1 max-w-full mb-2">Branded Foods</a>
                                        <a href="#" class="block space-y-1 max-w-full mb-2">Households</a>
                                        <a href="#" class="block space-y-1 max-w-full mb-2">Veggies & Fruits</a>
                                        <a href="#" class="block space-y-1 max-w-full mb-2">Bread & Bakery</a>
                                    </div>
                                    <div class="w-64 flex-1 px-4">
                                        <div class="w-full bg-gray-300 rounded-lg overflow-hidden relative">
                                            <img src="{{ url('theme/offer/2.jpg') }}" alt=""
                                                class="opacity-75 object-cover h-40 w-full">
        
                                            <div
                                                class="absolute block bottom-0 md:top-0 right-0 w-20 h-20 md:w-24 md:h-24 mt-5 mr-5 mb-5 rounded-full items-center justify-between border-2 border-green-600 bg-gray-100 inline-flex">
                                                <div class="flex-1 text-center leading-none">
                                                    <div class="text-green-600 text-sm">Everyday</div>
                                                    <div class="text-gray-800 font-bold text-xl md:text-2xl tracking-tight">10%
                                                    </div>
                                                    <div class="text-green-600 text-xs">sale</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  --}}
        
                <div class="mr-2">
                    @livewire('cart-counter')
                </div>
        
                @auth
                <div class="relative" x-data="{ open: false }" x-cloak>
                    <button type="button"
                        class="inline-flex items-center justify-center mt-2 hover:shadow rounded-full focus:outline-none focus:shadow-outline"
                        @click="open = true">
                        {{-- <span class="focus:outline-none block h-8 w-8 overflow-hidden rounded-full shadow-inner focus:shadow-outline"> --}}
                        {{-- <img src="{{ auth()->user()->photo_url }}" alt="avatar" class="h-full w-full object-cover">
                        --}}
                        <img class="inline-block h-8 w-8 rounded-full text-white shadow-solid"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="" />
                        {{-- </span> --}}
                    </button>
                    <div class="mt-1 block absolute z-40 right-0" x-show="open" @click.away="open = false"
                        x-transition:enter="ease-out transition-slow" x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in transition-slow"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
        
                        <div class="bg-white xl:border rounded-lg w-48 py-1 shadow-xl">
                            <div class="px-4 py-1">
                                <span class="text-gray-800 block truncate">Hi,
                                    {{ Str::title(auth()->user()->name) }}</span>
                            </div>
                            <div class="border-t my-1"></div>
                            <a href="/order-history"
                                class="px-4 py-1 block font-medium hover:bg-gray-100 hover:text-blue-600 {{request()->is('orders') ? 'active text-blue-600' : 'text-gray-600'}}">Orders</a>
                            <a href="/track-orders"
                                class="px-4 py-1 block font-medium hover:bg-gray-100 hover:text-blue-600 {{request()->is('track-orders') ? 'active text-blue-600' : 'text-gray-600'}}">Track
                                Orders</a>
        
                            <a href="#"
                                class="font-medium block px-4 py-1 text-gray-600 hover:bg-gray-100 hover:text-blue-600">Settings</a>
                            <a href="#" class="font-medium block px-4 py-1 text-gray-600 hover:bg-gray-100 hover:text-blue-600">Help
                                &amp;
                                Feedback</a>
                            <div class="border-t my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full px-4 py-1 font-medium text-gray-600 hover:bg-gray-100 hover:text-blue-600 cursor-pointer text-left">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="flex overflow-hidden">
                    <a href="/login"
                        class="px-2 py-6 inline-block font-medium text-gray-500 hover:text-blue-600 mr-5">Login</a>
                    <a href="/signup" class="px-2 py-6 inline-block font-medium text-gray-500 hover:text-blue-600">Sign
                        up</a>
                </div>
                @endauth
                
            </div>
        </div>
    </div>
</div>