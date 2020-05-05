<x-layout 
    title="Welcome Page"
    description="Meta Description"
>
    {{-- <section class="flex justify-center items-center flex-col text-center w-full overflow-hidden bg-cover bg-center bg-no-repeat" role="img" aria-label="Image Description" style="height: 420px; background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 0%, rgba(0,0,0,0.65) 100%), url('shopping-1232944_1280.jpg');"
    >
        <h1 style="font-size: 6vmin;line-height: 1;text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.8);"
            class="font-semibold text-white leading-tight mb-8">
            Bring the store to your door <br>
            Stay Home - We'll Deliver
        </h1>
         
        <a href="#" class="transition bg-green-700 hover:bg-green-800 rounded-lg shadow text-white py-3 px-4 inline-block font-bold leading-normal">Start Shopping</a>
    </section> --}}

    <section class="bg-orange-200 flex items-center px-4 overflow-hidden">
        <div class="w-1/2 relative py-10">
            <img src="{{ url('theme/home.svg') }}" alt="freshdoor" class="max-w-lg mx-auto">
            <div class="absolute bottom-0 w-full">
                <img src="{{ url('theme/plant.svg') }}" alt="freshdoor">
            </div>
        </div>
        <div>
            {{-- <h1 style="font-size: 5vmin"
                class="font-bold text-gray-800 leading-tight mb-8 tracking-tight">
                Bring the store to your door <br>
                Stay Home - We'll Deliver
            </h1> --}}
             <h1 style="font-size: 6vmin"
                class="font-bold text-gray-800 leading-none mb-8 tracking-tight">
                <span class="block">Discover amazing</span> 
                <span class="block">local stores online and get</span>
                fresh supplies.
            </h1>
            <a href="#" class="transition bg-green-700 hover:bg-green-800 rounded-lg shadow text-white py-3 px-4 inline-block font-bold leading-normal">Go Start Shopping</a>

            <div class="flex mt-6 items-center">
                <div class="text-orange-500 font-medium">Free Shipping</div>
                <div class="mx-4 h-2 w-2 leading-none rounded-full bg-orange-300"></div>
                <div class="text-orange-500 font-medium">Cash on Delivery</div>
                <div class="mx-4 h-2 w-2 leading-none rounded-full bg-orange-300"></div>
                <div class="text-orange-500 font-medium">100% Organic Products</div>
            </div>
        </div>
    </section>

    <x-centeredcontainer>
        <div class="flex -mx-4">
            <div class="w-1/3 px-4">
                <div class="h-64 w-full bg-gray-300 rounded-lg"></div>
            </div>
            <div class="w-1/3 px-4">
                <div class="h-64 w-full bg-gray-300 rounded-lg"></div>
            </div>
            <div class="w-1/3 px-4">
                <div class="h-64 w-full bg-gray-300 rounded-lg"></div>
            </div>
        </div>
    </x-centeredcontainer>
    

    <div class="container mx-auto py-5">
       
        {{-- <x-alert
            type="alert"
            title="Information"
        >
            Something not ideal might be happening.
        </x-alert>     --}}
    </div>

</x-layout>