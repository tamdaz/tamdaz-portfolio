<div class="inline-block relative" id="menu-{{ $id }}">
    <span class="cursor-pointer p-8" id="point-to-{{ $id }}">{{ $name }}</span>
    <nav class="tz-menu hidden animate-dropdown" id="dropdown-{{ $id }}">
        {{ $slot }}
    </nav>
</div>

<script>
    document
        .querySelector('#menu-{{ $id }}')
        .addEventListener('mouseenter', () => document.getElementById('dropdown-{{ $id }}').classList.remove('hidden'))
    ;

    document
        .querySelector('#menu-{{ $id }}')
        .addEventListener('mouseleave', () => document.getElementById('dropdown-{{ $id }}').classList.add('hidden'))
    ;
</script>