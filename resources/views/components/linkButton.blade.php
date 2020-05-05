<a 
	href="{{ $url ?? '' }}" 

	{{ 
		$attributes->merge([
			'class' => 'w-48 inline-block relative shadow bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 text-center rounded-lg truncate leading-loose'
		])
	}}
>
	{{ $slot }}
</a>