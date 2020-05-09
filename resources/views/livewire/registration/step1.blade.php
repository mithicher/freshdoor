<div>
    <div class="font-bold text-gray-800 text-2xl">{{ __('Create an account - Step 1') }}</div>
    <p class="mb-5 text-gray-600">Already have an account. Click <a href="#" class="underline">here</a> to login.</p>
    
    @if (session()->has('error'))
        <x-alert class="mb-4" type="alert">
            {{ session('error') }}
        </x-alert>
    @endif

    <x-textinput
        label="Name"
        id="name"
        name="name"
        type="name"
    />

    <x-textinput
        label="Email"
        id="email"
        name="email"
        type="email"
    />

    <div class="relative" x-data="{ togglePassword: false }">
        <div x-show="!togglePassword">
            <x-textinput
                label="Password"
                id="password"
                name="password"
                type="password"
            />
        </div>
        <div x-show="togglePassword">
            <x-textinput
                label="Password"
                id="password"
                name="password"
                type="text"
            />
        </div>

        <div class="absolute top-0 right-0 text-sm font-medium px-3 cursor-pointer" x-on:click.prevent="togglePassword = !togglePassword">
            <span x-show="togglePassword">Hide</span>
            <span x-show="!togglePassword">Show</span>
        </div>
    </div>
    
    {{-- 
    <x-textinput
        label="Confirm Password"
        id="password-confirm"
        name="password_confirmation"
        type="password"
    /> --}}

    <div class="text-center"> 
        <x-buttoninput class="w-full mx-auto block" wire:click="submit" wire:loading.class="base-spinner">
            {{ __('Next') }}
        </x-buttoninput>
    </div>
</div>
