@php
    $json = json_decode(str_replace('&quot;', '"', str_replace('&#039;', '\'', $periods)), false, 512, JSON_UNESCAPED_UNICODE);
@endphp

@vite('resources/js/observer.js')

<div class="tz-timeline">
    @foreach ($json as $k => $v)
        <div class="flex flex-row m-auto h-[250px] relative">
            <div class="tz-card-timeline -translate-x-full intersect:translate-x-0 {{ $k % 2 !== 0 ? 'md:invisible' : null }}">
                <span class="font-bold text-3xl">{{ date('j/m/Y', strtotime($v->date_start)) . ' - ' . date('j/m/Y', strtotime($v->date_end)) }}</span>
                <p class="mt-1">{{ $v->description }}</p>
            </div>

            {{-- Line SVG --}}
            <svg class="flex-none stroke-green-500" width="50px">
                @if ($k === count($json) - 1)
                    <line
                        class="-translate-y-full animate-line"
                        x1="25" y1="0" x2="25" y2="100%"
                        style="stroke-width: 4px; animation-delay: {{ 750 * $k }}ms" />
                @else
                    <line
                        class="-translate-y-full animate-line"
                        x1="25" y1="0" x2="25" y2="100%"
                        style="stroke-width: 4px; animation-delay: {{ 750 * $k }}ms" />
                @endif
                <circle
                    class="-translate-y-full animate-point origin-[25px_28%]"
                    cx="25" cy="28%" r="12" stroke="white"
                    style="stroke-width: 4px; animation-delay: {{ 750 * $k + 250 }}ms" />
            </svg>

            {{-- Linear gradient to hide last line --}}
            @if ($k === count($json) - 1)
                <div class="tz-timeline-line-gradient"></div>
            @endif

            <div class="tz-card-timeline {{ $k % 2 === 0 ? 'md:invisible' : null }} translate-x-full intersect:translate-x-0">
                <span class="font-bold text-3xl">{{ date('j/m/Y', strtotime($v->date_start)) . ' - ' . date('j/m/Y', strtotime($v->date_end)) }}</span>
                <p class="mt-1">{{ $v->description }}</p>
            </div>
        </div>
    @endforeach
</div>
