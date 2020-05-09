<div>
    <div class="flex flex-wrap md:flex-row -mx-4">
        <div class="w-full md:w-64 px-4">

            {{-- @json($category) --}}
            <x-searchinput 
                id="search"
                name="search"
                placeholder="Search products..."
            />

            <div class="uppercase tracking-wide text-sm font-semibold mb-2 text-gray-700">Categories</div>
            @forelse($categories as $key => $c)
                <label class="block mb-1 flex items-center">
                    <div class="text-teal-600 mr-3">
                        <input
                            id="category.{{ $c->slug }}"
                            type="checkbox"
                            class="form-checkbox focus:outline-none focus:shadow-outline"
                            wire:model="category"
                            value="{{ $c->slug }}"
                            {{ Arr::has($category, $c->slug) ? 'checked' : '' }}
                        >
                    </div>
                    <div class="select-none text-gray-600">{{ $c->name }}</div>
                </label>
            @empty
                No categories found :(
            @endforelse

            {{-- <div class="uppercase tracking-wide text-sm font-semibold mb-2 mt-5 text-gray-700">Price Range</div>
            <label class="block mb-1 flex items-center">
                <div class="text-teal-600 mr-3">
                    <input
                        id="price-1"
                        type="checkbox"
                        class="form-checkbox focus:outline-none focus:shadow-outline"
                        wire:model.lazy="price"
                        value="100"
                    >
                </div>
                <div class="select-none text-gray-600">@currency(100)</div>
            </label>

            <label class="block mb-1 flex items-center">
                <div class="text-teal-600 mr-3">
                    <input
                         id="price-2"
                        type="checkbox"
                        class="form-checkbox focus:outline-none focus:shadow-outline"
                        wire:model.lazy="price"
                        value="300"
                    >
                </div>
                <div class="select-none text-gray-600">@currency(300)</div>
            </label>

            <label class="block mb-1 flex items-center">
                <div class="text-teal-600 mr-3">
                    <input
                         id="price-3"
                        type="checkbox"
                        class="form-checkbox focus:outline-none focus:shadow-outline"
                        wire:model.lazy="price"
                        value="500"
                    >
                </div>
                <div class="select-none text-gray-600">@currency(500)</div>
            </label> --}}

        </div>
        <div class="w-full flex-1 px-4 relative">

            <div wire:loading>
                <div class="flex flex-wrap md:-mx-4">
                    @foreach(range(0, 12) as $p)
                        <div class="px-2 md:px-4 w-1/2 md:w-1/4 mb-4 md:mb-8">
                            <div class="shadow rounded-lg bg-white">
                                <div class="rounded-t-lg h-32 bg-gray-100"></div>
                                <div class="mx-4 mt-3">
                                    <span class="leading-none inline-block h-4 bg-gray-200 rounded-lg text-transparent">{{ str_repeat('_', mt_rand(12, 25)) }}</span>
                                </div>
                                <div class="mx-4">
                                    <span class="leading-none inline-block h-3 bg-gray-200 rounded-lg text-transparent">{{ str_repeat('_', mt_rand(10, 20)) }}</span>
                                </div>
                                <div class="flex items-center justify-between mx-4">
                                    <div class="h-4 w-10 bg-gray-200 rounded-lg mb-3"></div>
                                    <div class="h-8 w-16 bg-gray-200 rounded-lg mb-3"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        <div class="mb-3">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} {{ Str::plural('result', $products->total()) }}</div>
            <div class="flex flex-wrap md:-mx-4">
                {{-- {{ dd($products) }} --}}
                @forelse($products as $index => $product)
                    <div class="px-2 md:px-4 w-1/2 md:w-1/4 mb-4 md:mb-8">
                        <x-productcard>
                            <x-slot name="title">
                                {{ $product->name }}
                            </x-slot>

                            <x-slot name="image">
                                {{ url('theme/products/' . $product->image) }}
                            </x-slot>

                            <x-slot name="price">
                                @currency($product->price)
                            </x-slot>

                            @if($product->discount != 0)
                                <x-slot name="discount">
                                    @currency($product->discount)
                                </x-slot>
                            @endif

                            <x-slot name="category">
                                {{ $product->category->name }}
                            </x-slot>
                            
                            <x-slot name="addToCart">
                                <button 
                                    wire:click.prevent="addToCart({{ $product->id }})"
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
    </div>
</div>


