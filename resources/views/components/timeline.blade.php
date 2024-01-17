@vite('resources/js/observer.js')

<div class="tz-timeline">
    @foreach ($periods as $k => $v)
        <div class="flex flex-row m-auto h-[120px] transition-all">
            {{-- Line SVG --}}
            <svg class="flex-none stroke-green-500" width="50px">
                @if ($k === count($periods) - 1)
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
                    class="-translate-y-full animate-point origin-[25px_50%]"
                    cx="25" cy="50%" r="12" stroke="white"
                    style="stroke-width: 4px; animation-delay: {{ 750 * $k + 250 }}ms" />
            </svg>

            {{-- Linear gradient to hide last line --}}
            <div class="tz-timeline-line-gradient"></div>

            <div class="tz-timeline-details">
                <span class="font-bold text-xl">{{ $v['date_start'] . " - " . $v['date_end'] }}</span>
                <p class="mt-1">{{ $v['description'] }}</p>
            </div>
        </div>
    @endforeach
</div>
