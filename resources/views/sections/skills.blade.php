<section>
	<div class="w-full h-screen flex justify-center items-center px-8 lg:px-16 xl:px-32">
		<div class="lg:items-center text-center">
			<h1 class="text-2xl sm:text-6xl font-bold pb-4">Mes compétences</h1>
			<p class="text-xl leading-9">
				Grâce à l'autodidacte, j'ai pu acquérir mes compétences dans le développement de sites web
				avec des outils indispensables.
			</p>
			<div class="grid grid-cols-2 sm:grid-cols-5 gap-4 w-full md:w-3/4 m-auto pt-8">
				@foreach ($skills as $k => $skill)
					<div style="animation-delay: {{ 300 * $k }}ms;" class="intersect:animate-zoom-avatar opacity-0">
						<x-card-skill
							title="{{ $skill['text_primary'] }}"
							description="{{ $skill['text_secondary'] }}"
							src="{{ $skill->attachment()->first()->url() }}" />
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>