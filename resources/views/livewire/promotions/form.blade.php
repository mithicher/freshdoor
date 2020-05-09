<div>
    <div class="md:max-w-xl md:mx-auto">
        @if (session()->has('message'))
            <x-alert class="mb-4" type="success">
                {{ session('message') }}
            </x-alert>
        @endif

        <x-card class="md:py-12 md:px-16 lg:px-20 my-10">
            <div class="mb-5 font-bold text-gray-800 text-2xl">{{ __('Create Promotions') }}</div>
            
            <form wire:submit.prevent="submit">
                @csrf

                <x-textareainput
                    label="Description"
                    id="description"
                    name="description"
                ></x-textareainput>

                <x-textinput
                    label="Link"
                    id="link"
                    name="link"
                    type="text"
                />

                <div class="flex mb-0 justify-between w-full items-center"> 
                    <x-buttoninput type="submit" name="promotion" wire:loading.class="base-spinner">
                        {{ __('Create promotion') }}
                    </x-buttoninput>
                </div>
            </form>   
        </x-card>
    </div>
</div>
