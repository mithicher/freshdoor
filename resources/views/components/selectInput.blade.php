<div class="mb-5">	
    @if($label ?? null)
		<label for="{{ $name }}" class="form-label block mb-1 font-semibold text-gray-700">
			{{ $label }}
		</label>
    @endif

    <div class="relative">
		<select
			wire:model="{{ $name }}" 
			name="{{ $name }}" 
			id="{{ $name }}"
			class="form-input form-select transition px-3 py-2 block w-full text-gray-600 bg-white font-sans rounded-lg text-left appearance-none focus:outline-none bg-white shadow-sm border {{ $errors->has($name) ? ' border-red-500 bg-red-100' : ' border-gray-300' }}"
		>
			{{ $slot }}
		</select>
		
		<svg class="absolute top-0 right-0 mt-2 mr-3 w-6 h-6 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
    </div>
</div>