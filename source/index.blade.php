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
                <div class="mx-auto grid max-w-2xl grid-cols-1 lg:mx-0 lg:max-w-none lg:grid-cols-2 gap-y-20">
                    @foreach($stories as $story)
                        <div class="{{ $loop->even ? 'flex flex-col border-t border-gray-900/10 pt-10 sm:pt-16 lg:border-t-0 lg:border-l lg:pt-0 lg:pl-8 xl:pl-20':'flex flex-col pb-10 sm:pb-16 lg:pr-8 lg:pb-0 xl:pr-20' }}">
                            <figure class="flex flex-auto flex-col justify-between">
                                <blockquote class="text-lg/8 text-gray-900">
                                    {!! $story->getContent() !!}
                                </blockquote>
                                <figcaption class="mt-4 flex items-center gap-x-6">
                                    @if($story->image)
                                        <img class="size-14 rounded-full bg-gray-50" src="{{ $story->image }}"
                                             alt="{{ $story->author }}">
                                    @endif
                                    <div class="text-base">
                                        <div class="font-semibold text-gray-900 before:content-['–_']">{{ $story->author }}</div>
                                        @if($story->job)
                                            <div class="mt-1 text-gray-500">{{ $story->job }}</div>
                                        @endif
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
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
