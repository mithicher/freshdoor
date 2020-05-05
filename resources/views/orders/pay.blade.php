<x-layout
	title="Order Payment"
> 
    {{-- Top Bar --}}
    <div class="shadow-sm relative px-4 bg-white py-2">
        <div>
            <div class="flex justify-between items-center">
                <div class="w-1/3">
                    <x-link url="checkout" icon="back">Back</x-link>
                </div>
                <div class="text-gray-800 font-bold md:text-xl w-1/3 text-center">
                    Pay 
                </div>
                <div class="w-1/3 text-right">
                </div>
            </div>
        </div>
    </div>

    <x-centeredcontainer>
        <div class="md:w-2/3 md:mx-auto">
			<div class="md:max-w-lg mx-auto">

			@if (session()->has('error'))
				<x-alert type="alert" class="mb-5">
					{{ session('error') }}
				</x-alert>
			@endif

			<x-card class="mb-5">
				<form id="payment-form" method="POST" action="{{ route('orders.store') }}">
				@csrf
				<label class="font-bold mb-3 text-gray-700 block">Enter your card details</label>
				<input id="card-holder-name" name="name" type="text" class="mb-3 shadow bg-white appearance-none border rounded-lg w-full py-3 px-3 text-gray-700 placeholder-gray-600 focus:outline-none focus:shadow-outline" placeholder="Name on card" required>
			
				<!-- Stripe Elements Placeholder -->
				<div id="card-element" class="shadow bg-white appearance-none border rounded-lg w-full py-3 px-3 text-gray-700 placeholder-gray-600"></div>
				<div id="card-errors" class="text-red-500 mt-2 text-sm font-medium"></div>

				<button
					id="card-button"
					type="submit"
					class="mt-4 inline-flex items-center justify-center w-full focus:outline-none border border-transparent py-3 px-4 rounded-lg shadow text-center text-white bg-gray-700 hover:bg-gray-800 font-semibold truncate" 
				>
					<span>Pay @currency(Cart::netTotal())</span>
				</button>
				</form>
			</x-card>

			<div class="-mx-2 mt-12">
				<div class="px-2 mb-5">
					<div class="flex">
						<div class="flex-shrink-0 mr-4">
							<svg class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
						</div>
						<div>
							<div class="text-gray-800 font-medium mb-1">Secure Checkout</div>
							<div class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
						</div>
					</div>
				</div>

				<div class="px-2 mb-5">
					<div class="flex">
						<div class="flex-shrink-0 mr-4">
							<svg class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
						</div>
						<div>
							<div class="text-gray-800 font-medium mb-1">Your information is Safe</div>
							<div class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
						</div>
					</div>
				</div>

				<div class="px-2 mb-5">
					<div class="flex">
						<div class="flex-shrink-0 mr-4">
							<svg class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
						</div>
						<div>
							<div class="text-gray-800 font-medium mb-1">24/7 Support</div>
							<div class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
						</div>
					</div>
				</div>
			</div>
			</div>
        </div>

    </x-centeredcontainer>

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
		document.addEventListener("DOMContentLoaded", function () {
			const stripe = Stripe("{{ config('services.stripe.key') }}");
			const elements = stripe.elements();
			// window.livewire.on('callStripe', () => {	
			const cardElement = elements.create('card', {
				style: {
					base: {
						iconColor: '#a0aec0',
						fontFamily: 'inherit',
						fontSize: '16px',
						color: '#718096',
						'::placeholder': {
							color: '#a0aec0',
						}
					}
				},
				// hidePostalCode: false
			});

			cardElement.mount('#card-element');

			const cardError = document.getElementById('card-errors');
			const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');

			cardElement.addEventListener('change', function(event) {
				if (event.error) {
					cardError.textContent = event.error.message;
				} else {
					cardError.textContent = '';
				}
			});

			const form = document.getElementById('payment-form');

			form.addEventListener('submit', async (e) => {
                e.preventDefault();

				cardButton.disabled = true;
				cardButton.classList.add('base-spinner');

				stripe.createToken(cardElement).then( (result) => {
					// Handle result.error or result.token
					if (result.error) {
						// console.log(result.error);
						cardError.textContent = result.error.message;
						cardButton.disabled = false;
						cardButton.classList.remove('base-spinner');
					} else {
						// (result.token);
						const hiddenInput = document.createElement('input');
						hiddenInput.setAttribute('type', 'hidden');
						hiddenInput.setAttribute('name', 'stripeToken');
						hiddenInput.setAttribute('value', result.token.id);
						form.appendChild(hiddenInput);

						// Submit the form
						form.submit();
					}
				});
				return false;
            });
		});
    </script>
@endpush
</x-layout>