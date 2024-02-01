<div>
	<label>
		Catégorie:
		<select name="category" class="w-full" wire:model.live="category">
			<option value="0">Tous les catégories</option>
			@if(count($categories) !== 0)
				@if (!empty($categories))
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				@endif
			@endif
		</select>
	</label>
	<div class="tz-list">
		@forelse($reports as $report)
			<a href="{{ $report->file->url }}" class="tz-list-item">
				<div>
					<h2 class="text-2xl font-bold">{{ $report->title }}</h2>
					<p>Créé le {{ \Carbon\Carbon::parse($report->file_created_at)->translatedFormat('d F Y') }}</p>
					<span class="inline-block bg-green-700 px-4 py-1 rounded-full mt-2 text-white">
						{{ $report->category->name }}
					</span>
				</div>
			</a>
		@empty
			<h2 class="text-center italic text-2xl my-8 grid-cols-2">
				Pas de comptes-rendus publiés pour le moment...
			</h2>
		@endforelse
	</div>
	<div class="mt-4">
		{{ $reports->links() }}
	</div>
</div>
