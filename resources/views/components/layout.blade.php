<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>

        <meta name="content" description="{{ $description ?? 'Default Meta Description' }}">
        {{ $meta ?? '' }}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <script src="{{ mix('js/app.js') }}" defer></script>
       
		<livewire:styles>
    </head>
    <body class="text-gray-600 font-sans antialiased bg-gray-200 flex flex-col w-full min-h-screen leading-normal">

        @if (!request()->is('checkout') and !request()->is('order-complete') and !request()->is('order-history') and !request()->is('checkout/pay'))
            @include('partials.topnavbar')

            {{-- <div x-data="{
                streams: '',
                fetchPromotionsStream() {
                    const eventSource = new EventSource('/promotions/stream', { withCredentials: true }); 
                    eventSource.addEventListener('message', event => {
                        const data = JSON.parse(event.data);
                        this.streams = data;
                    });
                }
            }" x-init="fetchPromotionsStream">
                <a class="px-4 bg-gray-300 py-3 block" :href="streams.link">
                    <div class="container mx-auto text-center text-gray-600" x-html="streams.description"></div>
                </a>
            </div> --}}
        @endif

        <div class="flex-1">
            {{ $slot }}
        </div>

        @if (! request()->is('checkout') and ! request()->is('cart'))
        <footer class="px-4 py-10 border-t bg-white border-gray-200">
            <img src="{{ url('theme/fd.svg') }}" alt="{{ config('app.name') }}" class="h-20 mb-5 mx-auto object-contain">

            <div class="container mx-auto flex flex-col md:flex-row md:justify-between">
                <div class="text-gray-500 text-sm md:w-1/5">Made with <a href="https://tallstack.dev/" class="text-gray-500 hover:text-gray-600 transition">TALL Stack</a>.</div>
                <div class="md:text-center md:w-3/5">
                    <a href="#" class="text-sm mx-2 text-gray-500 hover:text-gray-600 transition">Contact Us</a>
                    <a href="#" class="text-sm mx-2 text-gray-500 hover:text-gray-600 transition">FAQ</a>
                    <a href="#" class="text-sm mx-2 text-gray-500 hover:text-gray-600 transition">Track Orders</a>
                    <a href="#" class="text-sm mx-2 text-gray-500 hover:text-gray-600 transition">Terms Of Use</a>
                    <a href="#" class="text-sm mx-2 text-gray-500 hover:text-gray-600 transition">Privacy Policy</a>
                </div>
                <div class="text-gray-500 md:w-1/5 text-sm">&copy; 2020 Freshdoor. All rights reserved.</div>
            </div>
        </footer>
        @endif

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                window.livewire.on('productAdded', () => { 
                    window.toasted.show("Product added to cart.");
                });

                window.livewire.on('callStripe', () => { 
                    window.toasted.show("Init STripe");
                });

                window.livewire.on('productRemoved', () => { 
                    window.toasted.show("Product removed from cart.");
                });

                window.livewire.on('couponApplied', () => { 
                    window.toasted.show("Discount coupon applied.");
                });

                 window.livewire.on('discountRemoved', () => { 
                    window.toasted.show("Discount coupon removed.");
                });

                @if(Session::has('message'))
                    window.toasted.show("{{ Session::get('message') }}");
                @endif

                document.querySelectorAll("textarea").forEach(el => {
                    el.style.height = el.setAttribute(
                        "style",
                        "height: " + el.scrollHeight + "px"
                    );
                    el.classList.add("auto");
                    el.addEventListener("input", e => {
                        el.style.height = "auto";
                        el.style.height = el.scrollHeight + "px";
                    });
                });
            });
        </script>
	    <livewire:scripts>
        @stack('scripts')
    </body>
</html>
