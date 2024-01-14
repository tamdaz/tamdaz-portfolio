<div class="tz-card-skill">
    <div
        class="tz-card-skill-details">
        <span class="block text-center font-bold text-3xl">{{ $title }}</span>
        <span class="block text-center">{{ html_entity_decode($description) }}</span>
    </div>
    <img class="hover:opacity-0 transition {{ $hasNoColor === true ? "dark:invert" : null }}" src="{{ $src }}" width="100%" height="100%" alt="img_skill" />
</div>