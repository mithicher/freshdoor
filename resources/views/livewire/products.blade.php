<div>
   <div class="flex flex-wrap md:-mx-4">
        @forelse($products as $index => $product)
            <div class="px-2 md:px-4 w-1/2 md:w-1/4 lg:w-1/5 mb-4 md:mb-8">
                <x-productcard>
                    <x-slot name="title">
                        {{ $product->name }}
                    </x-slot>

                    <x-slot name="image">
                        https://picsum.photos/640/480?random={{ $index }}
                    </x-slot>

                    <x-slot name="price">
                        @currency($product->price)
                    </x-slot>

                    @if($product->discount != 0)
                    <x-slot name="discount">
                        @currency($product->discount)
                    </x-slot>
                    @endif

                    <x-slot name="addToCart">
                        <button 
                            wire:click="addToCart({{ $product->id }})"
                            type="button" 
                            class="shadow-sm px-3 py-1 text-white font-semibold bg-gray-700 hover:bg-gray-800 border border-transparent rounded-lg focus:outline-none focus:shadow-outline"
                        >
                            Buy
                        </button>
                    </x-slot>
                </x-productcard>
            </div>
        @empty
            No products found :(
        @endforelse
    </div>

    <div class="w-full flex justify-center py-6">
        {{ $products->links('partials.tailwindpagination') }}
    </div>
</div>


