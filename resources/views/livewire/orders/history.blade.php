<div>
    @if (auth()->user()->orders()->exists())
        <div class="w-full md:max-w-4xl mx-auto px-2 pb-4 sm:px-6">
            <div class="flex">
                <div class="flex-1">
                    <x-searchinput 
                        id="search"
                        name="search"
                        placeholder="Search orders..."
                    />
                </div>
                <div class="ml-4 w-40">
                    <x-selectinput 
                        id="status"
                        name="status"
                    >
                        <option value="all">All status</option>
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="shipped">Shipped</option>
                        <option value="completed">Completed</option>
                    </x-selectinput>
                </div>
            </div>

            @if ($orders->isNotEmpty())
                <div class="bg-white shadow overflow-hidden rounded-lg">
                    <ul>
                        @foreach($orders as $order)
                        <li class="border-gray-200 {{ $loop->first ? '' : ' border-t' }}">
                            <a href="#"
                                class="block hover:bg-gray-100 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="flex-1 flex items-center justify-start px-4 -mx-4">
                                        <div class="md:w-40 flex-1">
                                            <div class="md:text-lg font-medium text-gray-800 truncate">#{{ $order->orderno }}
                                            </div>
                                            <div class="text-sm truncate text-gray-500">
                                               {{ $order->created_at->format('j M Y') }} / {{ $order->payment }}
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            @if ($order->status == 'completed')
                                            <span class="inline-block px-2 text-xs md:px-3 md:leading-loose md:text-sm uppercase tracking-wide font-medium bg-green-200 text-green-800 rounded-full">{{ $order->status }}
                                            </span>
                                            @elseif ($order->status == 'confirmed')
                                            <span class="inline-block px-2 text-xs md:px-3 md:leading-loose md:text-sm uppercase tracking-wide font-medium bg-blue-200 text-blue-800 rounded-full">{{ $order->status }}
                                            </span>
                                            @else
                                            <span class="inline-block px-2 text-xs md:px-3 md:leading-loose md:text-sm uppercase tracking-wide font-medium bg-orange-200 text-orange-800 rounded-full">{{ $order->status }}
                                            </span>
                                            @endif
                                        </div>
                                        <div class="w-32 text-right pr-5 md:pr-10">
                                            <span class="text-gray-800 md:text-lg font-medium">@currency($order->net_total)</span>
                                            <div class="text-sm text-gray-500">{{ count($order->products) }} {{ Str::plural('item', count($order->products)) }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            @else
                No orders found
            @endif
        </div>
    @else
        <x-card class="md:w-2/3 mx-auto text-center md:py-16">
            <div class="mb-4">
                <img src="{{ url('theme/notebook.svg') }}" alt="orders" class="h-64 block mx-auto">
            </div>

            <h2 class="text-lg md:text-xl mb-1 text-gray-800 text-center font-bold">You haven't placed an order yet.</h2>
            <p class="mb-5">Once an order is placed, all notifications can be found here.</p>

            <x-linkbutton :url="url('products')">Start Shopping</x-linkbutton>
        </x-card>
    @endif
</div>