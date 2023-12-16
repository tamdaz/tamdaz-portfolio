@php
    $json = json_decode(str_replace('&quot;', '"', str_replace('&#039;', '\'', $periods)), false, 512, JSON_UNESCAPED_UNICODE);
@endphp

@vite('resources/js/observer.js')

<div class="m-auto my-8 overflow-x-hidden md:overflow-x-visible">
    @foreach ($json as $k => $v)
        <div class="flex flex-row m-auto h-[250px] relative">
            <div class="hidden md:block {{ $k % 2 !== 0 ? 'md:invisible' : null }} -translate-x-full intersect:translate-x-0 duration-1000 transition ease-out border dark:border-neutral-700 dark:bg-black md:flex-1 rounded-xl p-4 my-4 h-fit -z-20">
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
                <div class="absolute m-auto left-0 right-0 bottom-0 w-[100px] h-[150px] z-10 bg-gradient-to-b from-transparent to-white dark:to-neutral-900"></div>
            @endif

            <div class="md:block w-full {{ $k % 2 === 0 ? 'md:invisible' : null }} translate-x-full intersect:translate-x-0 duration-1000 transition ease-out border dark:border-neutral-700 dark:bg-black md:flex-1 rounded-xl p-4 my-4 h-fit -z-20">
                <span class="font-bold text-3xl">{{ date('j/m/Y', strtotime($v->date_start)) . ' - ' . date('j/m/Y', strtotime($v->date_end)) }}</span>
                <p class="mt-1">{{ $v->description }}</p>
            </div>
        </div>
    @endforeach
</div>
