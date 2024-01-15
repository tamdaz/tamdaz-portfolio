<section>
	<div class="w-full h-full lg:px-16 justify-center text-center mt-16">
		<div class="grid grid-cols-2 w-full lg:w-[1000px] px-[16px] m-auto">
			<div>
				<h2 class="text-2xl font-bold">Mes expériences professionnelles</h2>
				<x-timeline :periods="$timelines['experience']" />
			</div>
			<div>
				<h2 class="text-2xl font-bold">Mes formations</h2>
				<x-timeline :periods="$timelines['formation']" />
			</div>
		</div>
	</div>
</section>