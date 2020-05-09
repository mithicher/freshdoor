<div>
    <div class="font-bold text-gray-800 text-2xl">{{ __('Verification - Step 2') }}</div>
    <p class="mb-5 text-gray-600">An email has been sent with a verification code to your email address. Please enter the 6-digit code and complete the registration process.</p>

    @if (session()->has('error'))
        <x-alert class="mb-4" type="alert" >
            {{ session('error') }}
        </x-alert>
    @endif

    @if (session()->has('message'))
        <x-alert class="mb-4">
            {{ session('message') }}
        </x-alert>
    @endif

    <x-textinput
        label="Enter verification code"
        id="code"
        name="code"
        type="text"
    />

    <div class="flex justify-between items-center -mt-2 mb-4">
        <a href="#" class="inline-block underline hover:text-blue-500" wire:click.prevent="resendCode" wire:loading.class="cursor-not-allowed">Resend Code</a>
        <div wire:loading wire:target="resendCode" class="text-sm">Resending...</div>
    </div>
    <div class="flex w-full">
        <x-buttoninput class="w-1/3 mx-auto mr-2" variant="secondary" wire:click="previousStep">
            {{ __('Go Back') }}
        </x-buttoninput>
        <x-buttoninput class="w-2/3 mx-auto" wire:click="submit" wire:loading.class="base-spinner">
            {{ __('Complete Registration') }}
        </x-buttoninput>
    </div>
</div>
