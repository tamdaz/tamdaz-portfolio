<section>
	<div class="w-full h-screen flex justify-center items-center px-8 lg:px-16 xl:px-32">
		<div class="lg:items-center text-center">
			<h1 class="text-5xl sm:text-6xl font-bold pb-4">Mes compétences</h1>
			<p class="text-xl leading-9 lg:w-2/3 m-auto">
				Grâce à l'autodidacte, j'ai pu acquérir des compétences dans le développement de sites web
				en utilisant des outils ainsi que des langages de programmation que je maitrise.
			</p>
			<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 w-full md:w-3/4 m-auto pt-8">
				@foreach ($skills as $k => $skill)
					<div style="animation-delay: {{ 300 * $k }}ms;" class="intersect:animate-zoom-avatar opacity-0">
						<x-card-skill
							:hasNoColor="$skill['has_no_colors']"
							title="{{ $skill['text_primary'] }}"
							description="{{ $skill['text_secondary'] }}"
							src="{{ $skill->attachment()->first()->url() }}" />
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>