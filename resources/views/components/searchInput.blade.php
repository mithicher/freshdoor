<div class="mb-5">	
    @if($label ?? null)
		<label for="{{ $name }}" class="form-label block mb-1 font-semibold text-gray-700">
			{{ $label }}
		</label>
    @endif

    <div class="relative">
        <input
			wire:model="{{ $name }}"
			id="{{ $name }}" 
			autocomplete="off"
        	type="{{ $type ?? 'text' }}"
            class="pl-12 form-input form-search transition px-3 py-2 block w-full text-gray-800 bg-white font-sans rounded-lg text-left appearance-none focus:outline-none bg-white shadow-sm border {{ $errors->has($name) ? ' border-red-500 bg-red-100' : ' border-gray-300' }}"
            name="{{ $name }}" 
			placeholder="{{ $placeholder ?? '' }}"
            value="{{ old($name, $value ?? '') }}"
			{{ ($required ?? false) ? 'required' : '' }}
		>	

		{{-- Search Icon --}}
		<svg class="absolute top-0 left-0 mt-2 ml-3 w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>

		@error($name)
			<div>
				<svg class="absolute text-red-600 fill-current w-5 h-5" style="top: 12px; right: 12px"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path
						d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
				</svg>
				<div class="text-red-600 mt-2 text-sm block leading-tight">{{ $message }}</div>
			</div>
		@enderror
    </div>
</div>