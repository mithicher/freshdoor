<x-layout
	title="Payment"
>
     {{-- Top Bar --}}
    <div class="shadow-sm relative px-4 bg-white py-2">
        <div>
            <div class="flex justify-between items-center">
                <div class="w-1/3">
                    <x-link url="/" icon="back">Back</x-link>
                </div>
                <div class="text-gray-800 font-bold md:text-xl w-1/3 text-center">
                    Payment
                </div>
                <div class="w-1/3 text-right">
                    @livewire('cart-counter')
                </div>
            </div>
        </div>
    </div>

    
    <x-centeredcontainer>
        <div class="md:w-2/3 md:mx-auto">

            <div class="border-b-2 py-4 mb-8">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex-1">
                         
                            <div class="text-lg md:text-xl font-bold text-gray-700 leading-tight">Shipping Info</div>
                       
                            <div class="text-lg md:text-xl font-bold text-gray-700 leading-tight">Payment</div>
                       
                            <div class="text-lg md:text-xl font-bold text-gray-700 leading-tight">Confirm &amp; Pay</div>
                        
                    </div>

                    <div class="w-64 text-right uppercase tracking-wide text-xs font-bold text-gray-500 leading-tight">
                        Step: 2 of 3
                    </div>
                </div>
            </div>
        
            <livewire:payment :key="'step2'" />
        </div>
    </x-centeredcontainer>

	@push('scripts')
		<script src="https://js.stripe.com/v3/"></script>
		<script>
			const stripe = Stripe('pk_test_iWW6sxFwGZP8QyTvi6gOYvem00eVlWcPUm');
			console.log('Stripe');

			const elements = stripe.elements();
			const cardElement = elements.create('card', {
				style: {
					base: {
						iconColor: '#a0aec0',
						fontFamily: 'inherit',
						fontSize: '16px',
						color: '#718096',
						':-webkit-autofill': {
							color: '#fce883',
						},
						'::placeholder': {
							color: '#a0aec0',
						}
					}
				}
			});

			cardElement.mount('#card-element');

			const cardError = document.getElementById('card-errors');
			cardElement.addEventListener('change', function(event) {
				if (event.error) {
					cardError.textContent = event.error.message;
				} else {
					cardError.textContent = '';
				}
			});
		</script>
	@endpush
</x-layout>
 