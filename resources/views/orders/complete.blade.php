<x-layout
	title="Order Completed"
	description="Order Completed"
>
	{{-- Top Bar --}}
    <div class="shadow-sm relative px-4 bg-white py-3">
        <div>
            <div class="flex justify-between items-center">
                <div class="w-1/3">
					<x-link url="/" icon="back">Back</x-link>
                </div>
                <div class="text-gray-800 font-bold md:text-xl w-1/3 text-center">
                    Order Completed
                </div>
                <div class="w-1/3 text-right">
 
                </div>
            </div>
        </div>
    </div>

	<x-centeredcontainer>
		<x-card class="md:w-2/3 mx-auto md:py-16">
			<svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

			<h2 class="text-xl md:text-2xl mb-2 text-gray-800 text-center font-bold">Thank you for your order!</h2>

			<div class="text-gray-600 mb-8 text-center">
				We will call you and notify you when your order is confirmed and shipped.
			</div>

			<div class="text-center">
				<x-linkbutton :url="route('orders.history')" variant="secondary" class="mr-2">Track Order</x-linkbutton>
				<x-linkbutton :url="url('/')">Back to home</x-linkbutton>
			</div>

			<div class="md:max-w-2xl mx-auto">
				@include('partials.helpinfo')
			</div>
		
		</x-card>
	</x-centeredcontainer>
</x-layout>