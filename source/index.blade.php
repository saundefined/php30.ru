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
    </section>
    <section>
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
                                    <svg aria-hidden="true" width="105" height="78"
                                         class="absolute top-6 left-6 fill-[#f1f5f9]">
                                        <path d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"></path>
                                    </svg>
                                    <blockquote class="relative text-gray-900 overflow-hidden">
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
