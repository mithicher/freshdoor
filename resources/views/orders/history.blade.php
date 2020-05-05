<x-layout
	title="Order History"
>
	{{-- Top Bar --}}
    <div class="shadow-sm relative px-4 bg-white py-3">
        <div>
            <div class="flex justify-between items-center">
                <div class="w-1/3">
					<x-link url="/" icon="back">Back</x-link>
                </div>
                <div class="text-gray-800 font-bold md:text-xl w-1/3 text-center">
                    Order History
                </div>
                <div class="w-1/3 text-right"></div>
            </div>
        </div>
    </div>

	<x-centeredcontainer>
		<x-card class="md:w-2/3 mx-auto text-center md:py-16">
			
			{{-- <div class="rounded-full p-4 w-20 h-20 bg-orange-100 mx-auto mb-4">
				<svg class="h-12 w-12 text-orange-500" viewBox="0 0 20 20" fill="currentColor"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
			</div> --}}

			<div class="mb-4">
				<img src="{{ url('theme/notebook.svg') }}" alt="orders" class="h-64 block mx-auto">
			</div>

			<h2 class="text-lg md:text-xl mb-1 text-gray-800 text-center font-bold">You haven't placed an order yet.</h2>
			<p class="mb-5">Once an order is placed, all notifications can be found here.</p>

			<x-linkbutton :url="url('products')">Start Shopping</x-linkbutton>
		</x-card>
	</x-centeredcontainer>
</x-layout>