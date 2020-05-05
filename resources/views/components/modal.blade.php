<div x-data="{ open: false }" @close-modal.window="open = false">
	<div class="cursor-pointer" role="button" @click.prevent="open = true">
		{{ $trigger }}
	</div>

	<div class="fixed inset-0 flex h-screen w-full items-center justify-center z-10" x-show="open">
		<div class="absolute inset-0 bg-black opacity-50"></div>

		<div
			class="shadow-md m-5 absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
			@click="open = false"
		>
			<svg class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z"
				/>
			</svg>
		</div>
		
		{{ $slot }}               
	</div>
</div>