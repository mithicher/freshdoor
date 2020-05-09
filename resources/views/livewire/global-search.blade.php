<div>
    <div class="flex global-search items-center relative">
        <div class="flex-1">
            <x-searchinput 
                id="search"
                name="search"
                placeholder="I'm looking for..."
            />
        </div>
        <div class="-ml-px w-40">
            <x-selectinput 
                id="category"
                name="categorySelect"
            >
                <option value="all">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
            </x-selectinput>
        </div>

        @if ($search)
            <div class="z-30 absolute w-5 h-5 top-0 left-0 ml-10 bg-white border-l border-t rounded transform rotate-45" style="margin-top: 38px"></div>
            <div class="border border-gray-200 absolute top-0 left-0 bg-white mt-12 py-3 z-20 bg-white shadow-lg rounded-lg max-w-xl overflow-hidden w-full">
                <div wire:loading.remove>
                    @foreach($products as $product)
                        <a href='/products?search={{ $search }}&category[0]={{ $product->category->slug }}' 
                            class="cursor-pointer hover:bg-gray-100 px-4 py-2 flex items-center justify-between w-full {{ $loop->first ? '' : ' border-t border-gray-200'}}">
                            <div class="flex-1">
                                <div class="text-medium text-gray-800">{{ $product->name }}</div>
                                <div class="text-sm text-gray-600">{{ $product->category->name }}</div>
                            </div>
                            <div class="text-right">
                                @if ($product->discount && $product->discount != 0)
                                    <div class="font-medium text-gray-800">@currency($product->discount)</div>
                                @else
                                    <div class="font-medium text-gray-800">@currency($product->price)</div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <div wire:loading class="w-full">
                    @foreach(range(0, 4) as $p)
                        <div class="cursor-pointer hover:bg-gray-100 px-4 py-2 flex items-center justify-between {{ $loop->first ? '' : ' border-t border-gray-200'}}">
                            <div class="flex-1">
                                <div>
                                    <div class="leading-none inline-block h-4 bg-gray-200 rounded-lg text-transparent">{{ str_repeat('_', mt_rand(15, 30)) }}</div>
                                </div>
                                <div>
                                    <div class="leading-none inline-block h-2 bg-gray-200 rounded-lg text-transparent">{{ str_repeat('_', mt_rand(8, 15)) }}</div>
                                </div>
                            </div>
                            <div class="text-right w-32">
                                <span class="leading-none inline-block h-4 bg-gray-200 rounded-lg text-transparent">{{ str_repeat('_', mt_rand(8, 12)) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div> 
            </div>
        @endif
    </div>
</div>