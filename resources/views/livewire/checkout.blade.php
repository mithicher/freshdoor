<div>
     {{-- Top Bar --}}
    <div class="shadow-sm relative px-4 bg-white py-2">
        <div>
            <div class="flex justify-between items-center">
                <div class="w-1/3">
                    <x-link url="/" icon="back">Back</x-link>
                </div>
                <div class="text-gray-800 font-bold md:text-xl w-1/3 text-center">
                    Checkout
                </div>
                <div class="w-1/3 text-right">
                    @livewire('cart-counter')
                </div>
            </div>
        </div>
    </div>

    {{-- Progress Indicator --}}
    <div class="shadow-sm px-4 bg-gray-100 py-4 md:py-6">
        <div class="md:max-w-4xl md:mx-auto">
            <div class="flex items-center justify-around">
                <div>
                    <div class="font-semibold text-gray-700 mx-auto w-6 h-6 text-sm md:text-base md:w-8 md:h-8 pt-px md:p-1 text-center rounded-full mb-1 
                    {{ $step == 1 || $step == 2 || $step == 3 ? 'bg-green-500' : '' }}">
                        @if ($step == 2 or $step == 3)
                            <svg class="w-5 h-5 md:w-6 md:h-6 text-white mx-auto" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        @else
                            1
                        @endif
                    </div>
                    <div class="text-gray-600 uppercase tracking-wide text-xs font-semibold">Shipping</div>
                </div>
                <div class="mx-2 w-full bg-gray-300 rounded-full mr-2 md:w-64">
                    <div class="rounded-full text-xs leading-none h-2 text-center text-white {{ $step == 2 || $step == 3 ? 'bg-green-500' : '' }}"></div>
                </div>
                <div>
                    <div 
                        class="font-semibold text-gray-700 mx-auto w-6 h-6 text-sm md:text-base md:w-8 md:h-8 pt-px md:p-1 text-center rounded-full bg-gray-300 mb-1 {{ $step == 2 || $step == 3 ? 'bg-green-500' : ''}}"
                    >
                        @if ($step == 3)
                            <svg class="w-5 h-5 md:w-6 md:h-6 text-white mx-auto" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        @else
                            2
                        @endif
                    </div>
                    <div class="text-gray-600 uppercase tracking-wide text-xs font-semibold">Confirm</div>
                </div>
                <div class="mx-2 w-full bg-gray-300 rounded-full mr-2 md:w-64">
                    <div class="rounded-full text-xs leading-none h-2 text-center text-white {{ $step == 3 ? 'bg-green-500' : '' }}"></div>
                </div>
                <div>
                    <div 
                        class="font-semibold text-gray-700 mx-auto w-6 h-6 text-sm md:text-base md:w-8 md:h-8 pt-px md:p-1 text-center rounded-full bg-gray-300 mb-1 {{ $step == 3 ? 'bg-green-500' : '' }}"
                    >3</div>
                    <div class="text-gray-600 uppercase tracking-wide text-xs font-semibold">Payment</div>
                </div>
            </div>
        </div>
    </div>
    
    <x-centeredcontainer>
        <div class="md:3/4 lg:w-2/3 md:mx-auto">

            <div class="border-b-2 py-4 mb-8">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex-1">
                        @if ($step === 1)
                            <div class="text-lg md:text-xl font-bold text-gray-700 leading-tight">Shipping Info</div>
                        @endif
                        
                        @if ($step === 2)
                            <div class="text-lg md:text-xl font-bold text-gray-700 leading-tight">Confirm</div>
                        @endif

                        @if ($step === 3)
                            <div class="text-lg md:text-xl font-bold text-gray-700 leading-tight">Payment</div>
                        @endif
                    </div>

                    <div class="w-64 text-right uppercase tracking-wide text-xs font-bold text-gray-500 leading-tight">
                        Step: {{ $step }} of 3
                    </div>
                </div>
            </div>
            
            @if ($step == 1)
                <livewire:shipping :key="'step1'" />
            @endif

            @if ($step == 2)
                <livewire:cart-summary :key="'step2'" />
            @endif

            @if ($step == 3)
                <livewire:payment :key="'step3'" />
            @endif

        </div>
    </x-centeredcontainer>

    <div class="fixed bottom-0 left-0 right-0 py-4 md:py-5 bg-white shadow-md border-t border-gray-200">
        <div class="md:max-w-4xl mx-auto px-4">
            <div class="flex justify-between -mx-4">
                <div class="w-1/2 px-4">
                    @if ($step > 1)
                        <button
                            wire:click="goToPreviousStep"
                            class="w-full focus:outline-none py-3 px-4 rounded-lg shadow text-center text-gray-600 bg-white hover:bg-gray-100 font-semibold border" 
                        >Back</button>
                    @endif
                </div>

                <div class="w-1/2 px-4 text-right">
                    @if ($step < 3)
                        <button
                            type="button"
                            wire:click="$emit('validateForm', {{ $step }})"
                            class="w-full focus:outline-none border border-transparent py-3 px-4 rounded-lg shadow text-center text-white bg-gray-700 hover:bg-gray-800 font-semibold" 
                        >Continue</button>
                    @endif
                    
                    @if ($step === 3)
                        <button
                            type="button"
                            wire:click="$emit('validateForm', {{ $step }})"
                            class="inline-flex items-center justify-center w-full focus:outline-none border border-transparent py-3 px-4 rounded-lg shadow text-center text-white bg-gray-700 hover:bg-gray-800 font-semibold truncate" 
                        >
                            Complete Order
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

