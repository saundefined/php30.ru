@extends('_layouts.main')

@section('body')
    <section class="pt-20 pb-16 sm:pt-32 sm:pb-24">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold sm:text-4xl lg:text-[40px] text-center">Что такое PHP?</h2>
            <div class="mt-6 text-lg text-gray-600 text-center flex gap-2 flex-col">
                <p>В этом году PHP исполняется 30 лет, за это время проект вырос из набора скриптов для домашних страниц
                    до языка программирования на котором работает 80% сайтов.</p>
                <p>Кажется, что современный PHP уже перерос Personal Home Page Tools и пора подумать над новым значением
                    акронима.</p>
            </div>

            <div class="mt-8 text-center">
                <a href="https://forms.gle/X2uw61xAxhX88uiQ6" target="_blank" rel="noopener noreferrer"
                   class="rounded-3xl bg-[#4F5B93] px-6 py-4 text-sm font-semibold text-white shadow-xs hover:bg-[#793862]">
                    Прислать свой вариант</a>
            </div>
        </div>
        @if($acronyms->count() > 0)
            <div class="mx-auto max-w-7xl">
                <div class="relative mt-16 grid max-h-[150vh] grid-cols-1 items-start gap-8 overflow-hidden px-4 sm:mt-20 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($acronyms->split(3) as $column)
                        <div class="animate-marquee space-y-8 py-4"
                             style="--marquee-duration: {{ $column->count() * 1000 }}ms;">
                            @foreach ($column as $acronym)
                                <figure class="animate-fade-in rounded-3xl bg-white p-6 opacity-0 shadow-md shadow-gray-900/5"
                                        style="animation-delay: {{ collect(['0s', '0.1s', '0.2s', '0.3s', '0.4s', '0.5s'])->random() }};">
                                    <blockquote class="text-gray-900">
                                        <p class="mt-4 text-lg/6 font-semibold before:content-['“'] after:content-['”']">{!! $acronym->getText() !!}</p>
                                    </blockquote>
                                    <figcaption
                                            class="mt-3 text-sm text-gray-600 before:content-['–_']">{{ $acronym->author }}</figcaption>
                                </figure>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="pointer-events-none absolute inset-x-0 top-0 h-32 bg-linear-to-b from-gray-50"></div>
                    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-linear-to-t from-gray-50"></div>
                </div>
            </div>
        @endif
    </section>

    @if($stories->count() > 0)
        <section class="bg-white py-24">
            <div class="mx-auto w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="mx-auto flow-root max-w-2xl lg:mx-0 lg:max-w-none">
                    <div class="-mt-8 sm:-mx-4 sm:columns-2 sm:text-[0] lg:columns-3">
                        @foreach($stories as $story)
                            <div class="pt-8 sm:inline-block sm:w-full sm:px-4">
                                <figure class="relative isolate rounded-2xl bg-gray-50 p-8 text-sm/6">
                                    <svg viewBox="0 0 162 128" fill="none" class="absolute top-2 left-2 -z-10 h-16 stroke-[#d3d3d3]">
                                        <path id="b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb" d="M65.5697 118.507L65.8918 118.89C68.9503 116.314 71.367 113.253 73.1386 109.71C74.9162 106.155 75.8027 102.28 75.8027 98.0919C75.8027 94.237 75.16 90.6155 73.8708 87.2314C72.5851 83.8565 70.8137 80.9533 68.553 78.5292C66.4529 76.1079 63.9476 74.2482 61.0407 72.9536C58.2795 71.4949 55.276 70.767 52.0386 70.767C48.9935 70.767 46.4686 71.1668 44.4872 71.9924L44.4799 71.9955L44.4726 71.9988C42.7101 72.7999 41.1035 73.6831 39.6544 74.6492C38.2407 75.5916 36.8279 76.455 35.4159 77.2394L35.4047 77.2457L35.3938 77.2525C34.2318 77.9787 32.6713 78.3634 30.6736 78.3634C29.0405 78.3634 27.5131 77.2868 26.1274 74.8257C24.7483 72.2185 24.0519 69.2166 24.0519 65.8071C24.0519 60.0311 25.3782 54.4081 28.0373 48.9335C30.703 43.4454 34.3114 38.345 38.8667 33.6325C43.5812 28.761 49.0045 24.5159 55.1389 20.8979C60.1667 18.0071 65.4966 15.6179 71.1291 13.7305C73.8626 12.8145 75.8027 10.2968 75.8027 7.38572C75.8027 3.6497 72.6341 0.62247 68.8814 1.1527C61.1635 2.2432 53.7398 4.41426 46.6119 7.66522C37.5369 11.6459 29.5729 17.0612 22.7236 23.9105C16.0322 30.6019 10.618 38.4859 6.47981 47.558L6.47976 47.558L6.47682 47.5647C2.4901 56.6544 0.5 66.6148 0.5 77.4391C0.5 84.2996 1.61702 90.7679 3.85425 96.8404L3.8558 96.8445C6.08991 102.749 9.12394 108.02 12.959 112.654L12.959 112.654L12.9646 112.661C16.8027 117.138 21.2829 120.739 26.4034 123.459L26.4033 123.459L26.4144 123.465C31.5505 126.033 37.0873 127.316 43.0178 127.316C47.5035 127.316 51.6783 126.595 55.5376 125.148L55.5376 125.148L55.5477 125.144C59.5516 123.542 63.0052 121.456 65.9019 118.881L65.5697 118.507Z" />
                                        <use href="#b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb" x="86" />
                                    </svg>
                                    <blockquote class="text-gray-900">
                                        {!! $story->getContent() !!}
                                    </blockquote>
                                    <figcaption class="mt-6 flex items-center gap-x-4">
                                        <div class="font-semibold text-gray-900 before:content-['–_']">{{ $story->author }}</div>
                                </figcaption>
                            </figure>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($friends->count() > 0)
        <section class="bg-gradient-to-r from-gray-100 to-white py-24">
            <div class="mx-auto w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($friends as $friend)
                        <a href="{{ $friend->url }}" target="_blank" rel="noopener noreferrer"
                           class="group relative bg-white rounded-lg shadow-card border border-gray-100 p-8 w-full shrink-0 lg:p-12">
                            <img src="{{ $friend->image }}" alt="{{ $friend->title }}"
                                 class="h-10 object-contain object-left-top transition group-hover:opacity-80"
                                 loading="lazy">
                            <div class="mt-6">
                                <div class="font-medium text-gray-600 group-hover:opacity-80">{{ $friend->title }}</div>
                                <div class="mt-2 text-gray-600 group-hover:opacity-80">{{ $friend->getText() }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
