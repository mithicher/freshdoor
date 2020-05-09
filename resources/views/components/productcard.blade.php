<div
	class="bg-white shadow rounded-lg overflow-hidden"
>
	<a 
		class="h-32 mb-3 block" 
		href="{{ $to ?? '#' }}"
	>
		<img src="{{ $image ?? '' }}" alt="product image" class="object-contain h-32 w-full">
	</a>

	<a 
		href="{{ $to ?? '#'}}"
		class="px-4 mb-1 block leading-tight font-medium truncate text-gray-700"
		title="{{ $title }}"
	>{{ $title }}</a>

	<div class="text-xs text-gray-600 px-4">{{ $category }}</div>
	 
	<div class="flex justify-between items-center px-4 py-2">
		<div>
			@if ($discount ?? false)
				<span class="text-gray-800 font-medium">{{ $discount ?? '0.00' }}</span>
				<span class="text-sm text-gray-500 line-through">{{ $price ?? '0.00' }}</span>
			@else
				<span class="text-gray-800 font-medium">{{ $price ?? '0.00' }}</span>
			@endif

		</div>
		<div>
			{{ $addToCart }}
		</div>
	</div>
</div>