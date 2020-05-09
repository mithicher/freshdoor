@php
if (isset($variant) && $variant === 'secondary') {
	$variantClass = 'bg-white text-gray-600 hover:bg-gray-100 hover:text-gray-700';
} else {
	$variantClass = 'bg-gray-700 hover:bg-gray-800 text-white';
}
@endphp

<button
	type="{{ $type ?? 'button' }}"
	name="{{ $name ?? '' }}"
	{{ 
		$attributes->merge([
			'class' => 'transition inline-block relative shadow border border transparent font-bold py-2 px-4 text-center rounded-lg truncate leading-loose focus:outline-none focus:shadow-outline leading-tight ' . $variantClass
		])
	}}
>
	{{ $slot }}
</button>