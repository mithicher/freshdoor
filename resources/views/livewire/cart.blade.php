<div>
    {{-- {{ session()->remove('cart') }} --}}
    {{-- {{ dd($cart['products'][0]['name']) }}  --}}
    <div class="w-full md:w-2/3 md:mx-auto pb-24">
        <div>
            @if(count($cart['products']) > 0)
                <h2 class="font-bold text-gray-700 mb-4 text-2xl ml-4 md:ml-0">Your cart</h2>
                {{-- <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-3 px-6 bg-grey-lightest font-bold uppercase text-xs tracking-wide text-gray-500 border-b border-gray-200">Product Name</th>
                            <th class="hidden md:table-cell py-3 px-6 bg-grey-lightest font-bold uppercase text-xs tracking-wide text-gray-500 border-b border-gray-200 text-right">Subtotal</th>

                            <th class="py-3 px-6 bg-grey-lightest font-bold uppercase text-xs tracking-wide text-gray-500 border-b border-gray-200 text-center md:w-20">Quantity</th>
                            
                            <th class="py-3 px-6 bg-grey-lightest font-bold uppercase text-xs tracking-wide text-gray-500 border-b border-gray-200 md:w-24"></th>
                        </tr>
                    </thead>
                       </table> --}}
                        @foreach($cart['products'] as $product)

                            <div class="flex shadow bg-white md:rounded-lg mb-1 md:mb-2 px-6 py-4">
                                
                                {{-- Product Image --}}
                                <div class="flex-shrink-0 w-16 h-16 rounded-lg bg-gray-200 mr-4"></div>

                                {{-- Product Details --}}
                                <div class="flex-1 flex flex-col md:flex-row">  
                                    <div class="flex">
                                        <div class="flex-1">
                                            <div class="truncate md:text-lg font-medium text-gray-700 md:w-64">
                                                {{ $product['name'] }}
                                            </div>
                                            <div class="text-sm text-gray-600 leading-none">
                                                @currency($product['price'])
                                                <span class="px-1 text-base">&times;</span>
                                                {{ $product['quantity'] }}
                                            </div>
                                        </div>    
                                        <div class="block md:hidden w-1/4 text-right">
                                            <a href="#" wire:click.prevent="removeFromCart({{ $product['id'] }})" class="text-gray-500 hover:text-red-400 p-1 w-8 h-8 rounded-full bg-gray-100 inline-block">
                                                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </a>
                                        </div>
                                    </div> 
                                    
                                    {{-- Product Price, Quantity, Remove --}}
                                    <div class="mt-2 md:mt-0 w-full flex justify-between items-center">
                                        <div class="w-1/4">
                                            @currency($product['price'])
                                        </div>
                                        
                                        <div class="w-1/4">
                                            <div class="flex w-full items-center">
                                                @if ($product['quantity'] > 1)
                                                    <a 
                                                        class="inline-block w-8 h-8 p-1 rounded-md bg-gray-200 text-center"
                                                        href="#" 
                                                        wire:click.prevent="decrementQuantity({{ $product['id'] }})">
                                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>    
                                                    </a>
                                                @else 
                                                    <span class="inline-block w-8 h-8 p-1 rounded-md bg-gray-200 text-center cursor-not-allowed opacity-50">
                                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                    </span>
                                                @endif

                                                <div class="inline-block px-2 w-10 text-center">
                                                    {{ $product['quantity'] }}
                                                </div>
                                                    
                                                <a 
                                                    class="inline-block w-8 h-8 p-1 rounded-md bg-gray-200 text-center"
                                                    href="#" wire:click.prevent="incrementQuantity({{ $product['id'] }})">
                                                    <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                </a>
                                            </div> 
                                        </div>
                                        
                                        <div class="w-1/4 text-right font-bold text-gray-700">
                                            @currency($product['price'] * $product['quantity'])
                                        </div>

                                        <div class="hidden md:block w-1/4 text-right">
                                            <a href="#" wire:click.prevent="removeFromCart({{ $product['id'] }})" class="text-gray-500 hover:text-red-400 p-1 w-8 h-8 rounded-full bg-gray-100 inline-block">
                                                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <div class="truncate md:w-40">
                                        {{ $product['name'] }}
                                    </div>
                                    <div class="text-sm text-gray-600 leading-none">
                                        @currency($product['price'])
                                        <span class="px-1 text-base">&times;</span>
                                        {{ $product['quantity'] }}
                                    </div>
                                </td>

                                <td class="hidden md:table-cell py-4 px-6 border-b border-grey-light text-right">@currency($product['price'] * $product['quantity'])
                                </td>

                                
                                 <td class="py-4 px-6 border-b border-grey-light">
                                    <div class="flex items-center">
                                        @if ($product['quantity'] > 1)
                                            <a 
                                                class="inline-block w-8 h-8 p-1 rounded-md bg-gray-200 text-center"
                                                href="#" 
                                                wire:click.prevent="decrementQuantity({{ $product['id'] }})">
                                                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>    
                                            </a>
                                        @else 
                                            <span class="inline-block w-8 h-8 p-1 rounded-md bg-gray-200 text-center cursor-not-allowed opacity-50">
                                                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                            </span>
                                        @endif

                                        <div class="inline-block px-2 w-10 text-center">
                                            {{ $product['quantity'] }}
                                        </div>
                                            
                                        <a 
                                            class="inline-block w-8 h-8 p-1 rounded-md bg-gray-200 text-center"
                                            href="#" wire:click.prevent="incrementQuantity({{ $product['id'] }})">
                                            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </a>
                                    </div> 
                                </td>

                             
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="#" wire:click.prevent="removeFromCart({{ $product['id'] }})" class="text-gray-500 hover:text-red-400 p-1 w-8 h-8 rounded-full bg-gray-100 inline-block">
                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </a>
                                </td>
                            </tr> --}}
                        @endforeach

                        {{-- <tr class="hover:bg-grey-lighter">
                            <td colspan="3" class="text-right py-4 px-6 border-b border-grey-light">
                                <div class="font-bold text-gray-800">Total</div>
                            </td>
                            <td class="text-right py-4 px-6 border-b border-grey-light">
                                @php
                                    $total = collect($cart['products'])->sum('price') * collect($cart['products'])->sum('quantity');   
                                @endphp
                                @currency($total)
                            </td>
                        </tr>
                    </tbody> --}}
             
                {{-- <div class="flex flex-col md:flex-row items-center justify-between w-full p-6">
                    <button
                        class="shadow-sm px-4 py-2 text-gray-800 font-semibold bg-white hover:bg-gray-100 border rounded-lg focus:outline-none focus:shadow-outline"
                    >
                        Add Coupon
                    </button>
                    <button wire:click="checkout()" class="shadow bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                        Checkout
                    </button>
                </div> --}}
            @else
                <x-card class="my-10 text-center py-16 mx-4">
                    {{-- <div class="rounded-full p-4 w-20 h-20 bg-orange-100 mx-auto mb-4">
                        <svg  class="h-12 w-12 text-orange-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    </div> --}}
                    <div>
                        <img src="{{ url('theme/empty-cart.svg') }}" alt="empty-cart" class="h-64 block mx-auto">
                    </div>

                    <div class="text-lg text-center mb-6">Hey! your shopping bag is empty.</div>

                    <x-linkbutton :url="url('products')">Let's fill the bag</x-linkbutton>
                </x-card>
            @endif
        </div>
    </div>

    @if(count($cart['products']) > 0)
        <div class="fixed border-t border-gray-200 bottom-0 left-0 right-0 shadow-lg px-4 bg-white py-4 md:py-5">
            <div class="md:max-w-4xl md:mx-auto">
                <div class="flex justify-between md:mx-5">
                    <div>
                        <div class="text-gray-600">
                            Sub Total:
                        </div>
                        <div class="text-xl md:text-2xl font-semibold text-gray-800 leading-none">
                            @currency($cartTotal)
                        </div>
                    </div>
                    <div>
                        {{-- <button wire:click="checkout()" class="shadow bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg">
                        Continue to Checkout
                        </button> --}}

                        <a href="{{ url('checkout') }}" class="inline-block shadow bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg">
                        Continue to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>