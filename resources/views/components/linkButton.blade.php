@php
if (isset($variant) && $variant === 'secondary') {
	$variantClass = 'bg-white text-gray-600 hover:bg-gray-100 hover:text-gray-700 shadow-sm';
} else {
	$variantClass = 'border-transparent bg-gray-700 hover:bg-gray-800 text-white shadow';
}
@endphp

<a 
	href="{{ $url ?? '' }}" 
	{{ 
		$attributes->merge([
			'class' => 'border w-48 inline-block relative font-bold py-2 px-4 text-center rounded-lg truncate leading-loose transition ' . $variantClass 
		])
	}}
>
	{{ $slot }}
</a>