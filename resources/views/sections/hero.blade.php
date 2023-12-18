<section class="relative">
	<div class="bg-home bg-white dark:bg-neutral-900 absolute -z-10 w-screen h-[900px] lg:h-screen"></div>
	<div class="w-full h-[900px] lg:h-screen lg:grid lg:grid-cols-2 lg:px-16 xl:px-32 select-none flex flex-col justify-center">
		<div class="flex flex-col justify-center items-center lg:items-start lg:w-full lg:h-full">
			<div class="text-4xl sm:text-7xl">
				<div id="typed_name">
					<p>{{ $profile['name'] }}</p>
				</div>
				<span class="font-bold inline" id="name"></span>
			</div>
			<div class="text-xl sm:text-3xl">
				<p class="inline-block my-3" id="desc"></p>
			</div>
		</div>
		<div class="flex py-8 lg:flex-col justify-center items-center animate-zoom-avatar" style="perspective: 25pc">
			<img
				class="transition-transform duration-75 rounded-full border-8 border-black m-auto w-[250px] lg:w-[350px] xl:w-[400px]"
				src="{{ $profile->attachment()->first()->url() }}" id="img_profile" alt="img_profile" />
		</div>
	</div>
	<div class="absolute bottom-10 sm:text-xl w-full text-center animate-pulse">
		&#8595; Molette vers le bas pour descendre
	</div>
	@if(App::isLocal() && App::hasDebugModeEnabled())
		<div class="absolute top-24 left-0 right-0 w-1/2 m-auto animate-zoom invisible lg:visible">
			<x-alert
				type="warn"
				primary="Site portfolio en développement"
				secondary="Pour le moment, le site portfolio est en cours de développement, il sera bientôt opérationnel."
			/>
		</div>
	@endif
</section>