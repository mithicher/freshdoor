<div class="mb-5">
	<div class="relative">
		<label
			wire:target="{{ $name . Str::random(8) }}"
			class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-6 shadow-sm border border-transparent {{ $errors->has($name) ? ' border-red-500 ' : '' }} {{ ($checked ?? false) ? ' border-gray-400' : 'border-gray-400' }}">
			<div class="text-teal-600 mr-3">
				<input 
					id="{{ $name . Str::random(8) }}"
					type="radio" 
					wire:model="{{ $name }}" 
					value="{{ old($name, $value ?? '') }}" 
					class="form-radio focus:outline-none focus:shadow-outline"
					{{ ($required ?? false) ? 'required' : '' }}
					{{ ($checked ?? false) ? '' : 'checked' }}
				/>
			</div>
			<div class="select-none text-gray-700">{{ $slot }}</div>
		</label>

		{{-- @error($name)
			<div>
				<svg class="absolute text-red-600 fill-current w-6 h-6" style="top: 12px; right: 12px"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path
						d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
				</svg>
				<span class="text-red-600 mt-2 text-sm block">{{ $message }}</span>
			</div>
		@enderror --}}
	</div>
</div>