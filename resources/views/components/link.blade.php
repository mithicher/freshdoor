<a 
	href="{{ $url ?? '#' }}"
	{{
		$attributes->merge([
			'class' => "inline-flex items-center text-gray-600 hover:text-gray-800 transition"
		])
	}}
>
	@if ($icon && $icon == 'back' ?? false)
		<svg class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
	@endif

	@if ($icon && $icon == 'plus' ?? false)
		<svg class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
	@endif

	<div class="ml-1">{{ $slot }}</div>
</a>