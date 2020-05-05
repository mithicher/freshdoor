@php
	$variants = [
		"info" => "bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4",
		"alert" => "bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4",
		"success" => "bg-green-100 border-l-4 border-green-500 text-green-700 p-4"
	];
@endphp

<div 
	role="alert"
	{{
		$attributes->merge([
			'class' => 'flex ' . $variants[$type ?? 'info']
		])
	}}
>
	<div class="flex-shrink-0 mr-4">
		@if ( isset($type) && $type === "success")
			<svg class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
		@elseif (isset($type) && $type === "alert")
			<svg class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
		@else
			<svg class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
		@endif		
	</div>

	<p>{{ $slot }}</p>
</div>