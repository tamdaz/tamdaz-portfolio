<section class="relative">
	<div class="bg-home bg-white dark:bg-neutral-900 absolute -z-10 w-screen h-[900px] lg:h-screen"></div>
	<div class="w-full h-[900px] lg:h-screen lg:grid lg:grid-cols-2 select-none flex flex-col justify-center">
		<div class="flex flex-col justify-center items-center lg:items-start lg:w-full lg:h-full lg:pl-16 xl:pl-32">
			<div class="text-4xl sm:text-7xl">
				<div id="typed_name">
					<h1>Tamda Zohir</h1>
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
				src="/img/profile.jpg" id="img_profile" alt="img_profile" />
		</div>
	</div>
	<div class="absolute hidden lg:block bottom-10 sm:text-xl w-full text-center animate-pulse">
		&#8595; Molette vers le bas pour descendre
	</div>
	<div class="absolute block lg:hidden bottom-10 sm:text-xl w-full text-center animate-pulse">
		&#8595; Glisser vers le haut pour descendre
	</div>

	<div class="absolute top-24 left-0 right-0 w-1/2 m-auto animate-zoom invisible lg:visible">
		@if($maintenance->start_maintenance->diffInHours() <= 10)
			<x-alert
				type="warn"
				primary="Maintenance {{ $maintenance->start_maintenance->diffForHumans(null) }}."
				secondary="{{ $maintenance->message }}"
			/>
		@else
			<x-alert
				type="warning"
				primary="Site portfolio non finalisé"
				secondary="Actuellement, ce site portfolio est en train d'être amélioré,
				il ne s'agit pas encore d'une version finale."
			/>
		@endif
	</div>
</section>