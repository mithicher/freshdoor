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
		<livewire:orders.history />
	</x-centeredcontainer>
</x-layout>