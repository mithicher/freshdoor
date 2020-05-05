<div>
    {{-- Show loggedin users addresses if exists --}}
    @if (auth()->user()->hasAddress())
        <div class="flex flex-col md:flex-row -mx-4 mb-5">
            @foreach(auth()->user()->addresses as $address)
                <div class="md:w-1/2 px-4 mb-4 md:mb-0">
                    <x-radioinput
                        id="address-{{ $address->id }}"
                        name="addressId"
                        :value="$address->id"
                        :checked="$addressId == $address->id ? true : false"
                    >
                        <div class="text-gray-800 font-medium">{{ $address->address }}</div>
                        <div class="text-gray-600 text-sm">{{ $address->city }}, {{ $address->pincode }}</div>
                        @if ($address->default == true)
                            <div class="absolute mt-px mr-px top-0 right-0 p-1 px-2 text-xs uppercase bg-gray-200 text-gray-500 font-bold tracking-wide rounded-bl-lg rounded-tr-lg">Default</div>
                        @endif
                    </x-radioinput>
                </div>        
            @endforeach
        </div>

        <x-modal>
            <x-slot name="trigger">
                <x-link class="text-blue-500 font-semibold" icon="plus">New address</x-link>
            </x-slot>

            <x-card class="w-full max-w-xl mx-auto relative z-10 md:px-10">
                <form wire:click.prevent="saveAddress">
                    @csrf
                    <h2 class="text-gray-800 text-xl font-bold mb-4">Add new address</h2>
                    
                    <x-alert type="info" class="mb-5">Your address helps us in delivering your orders with ease.</x-alert>
                    
                    <x-textinput
                        name="address"
                        id="address"
                        placeholder="Flat / House No. / Floor / Building"
                        label="Address"
                    />
                
                    <div class="flex -mx-2 md:-mx-4">
                        <div class="px-2 md:px-4 w-1/3">	
                            <x-textinput
                                name="pincode"
                                id="pincode"
                                placeholder="eg. 780001"
                                label="Pin Code"
                            />
                        </div>

                        <div class="px-2 md:px-4 w-2/3">	
                            <x-textinput
                                name="city"
                                id="city"
                                placeholder="eg. Guwahati"
                                label="City"
                            />
                        </div>
                    </div>

                    <div class="text-right">
                        {{-- <x-buttoninput class="mr-2" variant="secondary" @click="$dispatch('close-modal')">Cancel</x-buttoninput> --}}
                        <x-buttoninput type="submit">Save address</x-buttoninput>
                    </div>
                </form>
            </x-card>
        </x-modal>
    @else
        <x-card class="md:px-10 mb-32">
            <h2 class="text-gray-800 text-xl font-bold mb-4">Address</h2>
            
            <x-alert type="info" class="mb-5">Your address helps us in delivering your orders with ease.</x-alert>
            
            <x-textinput
                name="address"
                id="address"
                placeholder="Flat / House No. / Floor / Building"
                label="Address"
            />
        
            <div class="flex -mx-2 md:-mx-4">
                <div class="px-2 md:px-4 w-1/3 md:w-1/4">	
                    <x-textinput
                        name="pincode"
                        id="pincode"
                        placeholder="eg. 780001"
                        label="Pin Code"
                    />
                </div>

                <div class="px-2 md:px-4 w-2/3 md:w-1/3">	
                    <x-textinput
                        name="city"
                        id="city"
                        placeholder="eg. Guwahati"
                        label="City"
                    />
                </div>
            </div>
        </x-card>
    @endif

    {{-- <div class="fixed bottom-0 left-0 right-0 py-4 md:py-5 bg-white shadow-md">
        <div class="md:max-w-4xl mx-auto px-4">
            <div class="flex justify-between -mx-4">
                <div class="w-1/2 px-4">
                </div>

                <div class="w-1/2 px-4 text-right">
                    <button
                        type="button"
                        wire:click="validateData"
                        class="w-full focus:outline-none border border-transparent py-3 px-4 rounded-lg shadow text-center text-white bg-gray-700 hover:bg-gray-800 font-semibold" 
                    >Continue</button>
                </div>
            </div>
        </div>
    </div> --}}
</div>