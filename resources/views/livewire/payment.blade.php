<div>
    <div class="mb-5">
        <label class="font-bold mb-2 text-gray-700 block">Select your payment method</label>

        <p class="mb-6">You can either pay now via online methods or pay locally on arrival.</p>

        <div class="flex flex-col md:flex-row -mx-4 mb-2">
            <div class="md:w-1/2 px-4 mb-4 md:mb-0">
                 <x-radioinput
                    id="online"
                    name="paymentType"
                    value="Online payment"
                    :checked="$paymentType == 'Online payment'"
                >
                    <div class="text-gray-800 font-medium">Online payment</div>
                    <div class="text-gray-600 text-sm">Pay with Credit / Debit Card.</div>
                </x-radioinput>
            </div>        
            <div class="md:w-1/2 px-4">
                <x-radioinput
                    id="cash"
                    name="paymentType"
                    value="Cash on Delivery"
                    :checked="$paymentType == 'Cash on Delivery'"
                >
                    <div class="text-gray-800 font-medium">Cash on Delivery (COD)</div>
                    <div class="text-gray-600 text-sm">Pay locally when your order reaches you!</div>
                </x-radioinput>
            </div>
        </div>
        @error('paymentType')
            <x-formerror :message="$message" />
        @enderror
    </div>

    <div class="flex flex-col md:flex-row -mx-2 mt-10 md:mt-16">
        <div class="md:w-1/3 px-2 mb-4 md:mb-0">
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

        <div class="md:w-1/3 px-2 mb-4 md:mb-0">
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

        <div class="md:w-1/3 px-2 mb-4 md:mb-0">
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