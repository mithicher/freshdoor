<div class="md:flex items-center justify-between bg-white shadow-sm px-4">
    <div class="flex flex-col" x-data="{ open: false }">
        <div class="flex flex-wrap justify-between md:flex-none items-center">
            <a href="/" class="inline-flex items-center">
                {{-- {{ $brand ?? config('app.name') }} --}}
                <img src="{{ url('theme/fd.svg') }}" alt="{{ config('app.name') }}" class="h-12 object-contain">
            </a>
            <button @click="open = true"
                class="inline-block inline-flex items-center justify-center w-8 py-3 rounded-full mr-2 cursor-pointer md:hidden">
                <svg class="fill-current text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z" />
                </svg>
            </button>
        </div>
        <div class="block md:hidden" x-show="open" @click.away="open = false"
            x-transition:enter="ease-out transition-slow" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in transition-slow"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Home</a>
            <a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Products</a>
            <a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">My Orders</a>
            <a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Categories</a>
            <a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Track Orders</a>
            <a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Login</a>
        </div>
    </div>
    <div class="hidden md:block">
        
        <a href="/"
            class="px-2 mr-5 py-6 inline-block font-medium hover:text-blue-600 {{request()->is('/') ? 'active text-blue-600' : 'text-gray-500'}}">Home</a>
        <a href="/products"
            class="px-2 mr-5 py-6 inline-block font-medium hover:text-blue-600 {{request()->is('products') ? 'active text-blue-600' : 'text-gray-500'}}">Products</a>
        <a href="/cart"
            class="px-2 mr-5 py-6 inline-block font-medium hover:text-blue-600 {{request()->is('cart') ? 'active text-blue-600' : 'text-gray-500'}}">Cart</a>
        <a href="/categories"
            class="px-2 py-6 inline-block font-medium hover:text-blue-600">Categories</a>
         
    </div>
    <div class="hidden md:block">
        <div class="flex items-center">
            <div class="mr-2">
                @livewire('cart-counter')
            </div>

            @auth
                <div class="relative" x-data="{ open: false }" x-cloak>
                    <button type="button" class="inline-flex items-center justify-center mt-2 hover:shadow rounded-full focus:outline-none focus:shadow-outline"
                        @click="open = true">
                        {{-- <span class="focus:outline-none block h-8 w-8 overflow-hidden rounded-full shadow-inner focus:shadow-outline"> --}}
                            {{-- <img src="{{ auth()->user()->photo_url }}" alt="avatar" class="h-full w-full object-cover"> --}}
                            <img class="inline-block h-8 w-8 rounded-full text-white shadow-solid" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
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
                            
                            <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600">Settings</a>
                            <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600">Help &amp;
                                Feedback</a>
                            <div class="border-t my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600 cursor-pointer text-left">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex overflow-hidden">
                    <a href="/login"
            class="px-2 py-6 inline-block font-medium hover:text-blue-600 mr-5">Login</a>
                    <a href="/register"
            class="px-2 py-6 inline-block font-medium hover:text-blue-600">Sign up</a>
                </div>
            @endauth
        </div>
    </div>
</div>