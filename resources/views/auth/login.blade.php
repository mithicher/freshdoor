<x-layout title="Login">
    <x-centeredcontainer>  
        <div class="md:max-w-xl md:mx-auto">
            @if (session()->has('message'))
                <x-alert class="mb-4" type="success">
                    {{ session('message') }}
                </x-alert>
            @endif

            <x-card class="md:py-12 md:px-16 lg:px-20 my-10">
                <div class="font-bold text-gray-800 text-2xl">{{ __('Sign In') }}</div>
                <p class="mb-5 text-gray-600">Log in to your account to continue.</p>
    
                <form 
                    method="POST" 
                    action="{{ route('login') }}"
                    onsubmit="login.disabled = true; login.classList.add('base-spinner')"
                >
                    @csrf
    
                    <x-textinput
                        label="Email"
                        id="email"
                        name="email"
                        type="email"
                    />

                    <x-textinput
                        label="Password"
                        id="password"
                        name="password"
                        type="password"
                    />
    
                    <div class="flex mb-0 justify-between w-full items-center"> 
                        <x-buttoninput type="submit" name="login" class="w-40">
                            {{ __('Login') }}
                        </x-buttoninput>

                        @if (Route::has('password.request'))
                            <a class="underline font-medium" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>   
            </x-card>
        </div>
    </x-centeredcontainer>
</x-layout> 
