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
    <body class="text-gray-600 font-sans antialiased bg-gray-200">

        @if (!request()->is('checkout') and !request()->is('order-complete') and !request()->is('order-history') and !request()->is('checkout/pay'))
            @include('partials.topnavbar')

            <div class="px-4 bg-gray-300 py-3">
                <div class="container mx-auto text-center text-gray-600">
                    Sale! Hurry upto 50% off on fresh vegetables. <a href="#" class="font-medium underline text-gray-700">Shop Now</a>.
                </div>
            </div>
        @endif

        {{ $slot }}

        <footer class="px-4 py-10 border-t">
            <img src="{{ url('theme/fd.svg') }}" alt="{{ config('app.name') }}" class="h-20 mb-5 mx-auto object-contain">

            <div class="container mx-auto">

            </div>
        </footer>

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
            });
        </script>
	    <livewire:scripts>
        @stack('scripts')
    </body>
</html>
