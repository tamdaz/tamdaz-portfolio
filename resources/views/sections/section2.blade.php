<section>
	<div class="w-full h-screen lg:grid lg:grid-cols-2 px-8 lg:px-16 xl:px-32 flex flex-col justify-center">
		<div class="flex flex-col justify-center items-center lg:items-center text-center lg:w-full lg:h-full">
			<h1 class="text-6xl font-bold pb-4">Présentation</h1>
			<p class="text-xl leading-9">
				Actuellement en première année de BTS SIO (Services Informatiques aux Organisations),
				je me suis spécialisé dans le développement web en autodidacte.
			</p>
			<div class="mt-4">
				<x-button route="/docs/Tamda Zohir - CV.pdf" type="contained">Télécharger mon CV</x-button>
			</div>
		</div>
		<div class="flex py-8 lg:flex-col justify-center items-center">
			<img class="animate-zoom-avatar" src="{{ Vite::asset('resources/img/home/code.svg') }}" width="400px" alt="code" />
		</div>
	</div>
</section>