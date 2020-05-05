<div>
    <x-card class="mb-4">
        <h2 class="text-gray-800 text-lg font-bold mb-2">Shipping Info</h2>

        <div class="text-gray-600">
            <div>{{ $address }}</div>
            <span> {{ $city }}</span>
            <span> {{ $pincode }}</span>
        </div>
    </x-card>

    {{-- <x-card class="mb-4">
        <h2 class="text-gray-800 text-lg font-bold mb-2">Payment Method</h2>

        <div class="text-gray-600">{{ $paymentType }}</div>
    </x-card> --}}

    <x-card class="mb-20 md:mb-32">
        <h2 class="text-gray-800 text-lg font-bold mb-2">Order Summary</h2>

        @if(count($cart['products']) > 0)
            @foreach($cart['products'] as $product)
                <div class="flex mb-2 py-2 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
                    {{-- Product Image --}}
                    <div class="flex-shrink-0 w-16 h-16 rounded-lg bg-gray-200 mr-4"></div>

                    {{-- Product Details --}}
                    <div class="flex-1 flex flex-col md:flex-row">  
                        <div>
                            <div class="truncate md:text-lg font-medium text-gray-700 md:w-64">
                                {{ $product['name'] }}
                            </div>
                            <div class="text-sm text-gray-600 leading-none">
                                @currency($product['price'])
                                <span class="px-1 text-base">&times;</span>
                                {{ $product['quantity'] }}
                            </div>
                        </div> 
                        
                        {{-- Product Price, Quantity, Remove --}}
                        <div class="mt-3 md:mt-0 flex justify-between items-center w-full">
    
                            <div class="w-1/2 text-sm md:text-base md:text-right">
                                {{-- <div class="uppercase tracking-wide text-xs font-medium leading-none">Sub Total</div> --}}
                                <div class="font-bold text-gray-700">
                                    @currency($product['price'] * $product['quantity'])
                                </div>
                            </div>

                            <div class="w-1/2 text-right">
                                <a href="#" wire:click.prevent="removeFromCart({{ $product['id'] }})" class="text-gray-500 hover:text-red-400 bg-white inline-flex px-2 py-1 border shadow-sm rounded-md text-sm items-center">
                                    <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    Remove
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="flex flex-col md:flex-row w-full justify-end mt-5">
                {{-- Discount Form --}}
                {{-- <div class="mb-4 bg-gray-100 items-center rounded-lg px-4 py-3 text-gray-600 justify-between">
                    <div class="mb-4">
                        <div class="text-gray-800 font-bold">Have discount code?</div>
                        <p class="text-gray-600 text-sm">Please enter your coupon code and hit apply.</p>
                    </div>
                    <div class="flex items-center -mb-2">
                        <x-textinput
                            wire:model="discount"
                            name="discount"
                            id="discount"
                            placeholder="Enter coupon code"
                        />
                        <button
                            wire:loading.class="cursor-not-allowed base-spinner"
                            wire:click="addDiscount"
                            class="ml-2 -mt-5 focus:outline-none border border-transparent py-2 px-3 rounded-lg shadow text-center text-white bg-gray-700 hover:bg-gray-800 font-semibold truncate leading-snug" 
                        >Apply</button>
                    </div>

                </div> --}}
                
                {{-- Total Amount --}}
                <div>
                    <div class="flex w-full justify-end items-center border-b border-gray-200">
                        <div class="text-right py-2 px-4 w-32">
                            <div class="text-gray-600">Sub Total</div>
                        </div>
                        <div class="text-right py-2 px-4 w-32">
                            <div class="text-gray-600">@currency($cartTotal)</div>
                        </div>
                    </div>
                    <div class="flex w-full justify-end items-center border-b border-gray-200">
                        <div class="text-right py-2 px-4 w-32">
                            <div class="text-gray-600">Shipping</div>
                        </div>
                        <div class="text-right py-2 px-4 w-32">
                            <div class="text-gray-600">@currency(0)</div>
                        </div>
                    </div>
                    <div class="flex w-full justify-end items-center border-b border-gray-200">
                        <div class="text-right py-2 px-4 w-32">
                            <div class="text-gray-600">Discount</div>
                        </div>
                        <div class="text-right py-2 px-4 w-32">
                            <div class="text-gray-600">@currency($discountAmount)</div>

                            @if ($discountAmount > 0)
                                <a href="#" wire:click.prevent="removeDiscount" class="text-gray-500 text-sm leading-tight underline">Remove</a>
                            @endif
                        </div>
                    </div>
                    <div class="flex w-full justify-end items-center">
                        <div class="text-right py-2 px-4">
                            <div class="text-gray-600">Total</div>
                        </div>
                        <div class="text-right py-2 px-4 w-32">
                            <div class="text-gray-800 text-lg md:text-xl font-bold">@currency($netTotal)</div>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </x-card>
</div>
