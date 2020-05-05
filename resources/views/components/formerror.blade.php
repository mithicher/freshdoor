{{-- <div class="-mt-3 mb-2">
	<svg class="absolute text-red-600 fill-current w-6 h-6" style="top: 40px; right: 12px"
		xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
		<path
			d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
	</svg>
	<span class="text-red-600 text-sm block" x-text="{{ $errormessage }}"></span>
</div> --}}
<div class="flex items-center">
	<svg class="text-red-600 fill-current w-6 h-6 mr-2"
		xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
		<path
			d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
	</svg>
	<span class="text-red-600 text-sm block">{{ $message }}</span>
</div>