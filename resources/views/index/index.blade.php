@extends('welcome')

@section('title', 'Начало |')

@section('body')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @include('includes.banners', ['banner' => 'https://solomonsofia.com/cow.png'])
    @if (session('status'))
        <div class="text-center bg-main-green-dark p-3 mb-6 rounded">
            <h1 class="text-[#fff] font-semibold text-2xl">{{ session('status') }}</h1>
        </div>
    @endif
    @if (session('error'))
        <div class="text-center bg-red-500 p-3 mb-6 rounded">
            <h1 class="text-[#fff] font-semibold text-2xl">{{ session('error') }}</h1>
        </div>
    @endif

    @php
        $phoneClass = 'flex items-center gap-[12px] bg-main-green-dark text-white rounded-[6px] px-[12px] py-[5px] text-[17px] md:text-[20px] max-w-max font-semibold';

        $phoneIcon = '<svg style="animation: tilt-shaking 1s linear infinite" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-[17px] md:h-[20px]">
                                                    <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                                                </svg>';
    @endphp

    <div id="_featured_products" class="max-w-[800px] mx-auto my-8 w-full">
        <h2 class="text-xl md:text-2xl px-3 font-bold text-main-green-dark">ВИСОКО КАЧЕСТВО НА ДОБРА ЦЕНА</h2>
        <div class="flex items-center gap-[15px] px-3 mt-10 mb-8">
            {{-- mobile --}}
            <div class="relative max-w-max">
                <p class="absolute font-[12px] md:font-[13px] -top-[20px] font-semibold">Телефон:</p>
                <div class="{{ $phoneClass }}">
                    {!! $phoneIcon !!}
                    <a href="tel:0899811758">
                        0899 811 758
                    </a>
                </div>
            </div>
            {{-- viber --}}
            <div class="relative max-w-max">
                <p class="absolute font-[12px] md:font-[13px] -top-[20px] font-semibold">Вайбър:</p>
                <div class="{{ $phoneClass }}">
                    {!! $phoneIcon !!}
                    <a href="viber://chat?number=%2B359899811358">
                        0899 811 358
                    </a>
                </div>
            </div>
        </div>
        <div id="_featured_products_heading"
            class="hidden my-10 px-3 text-main-green-dark font-bold md:text-left text-center text-[26px]">
            {{-- {!! \App\Models\PageContent::where('page_id',
            \App\Http\Controllers\PageController::INTRO)->first()?->content !!} --}}
        </div>
        <div class="grid md:grid-cols-3 grid-cols-1 px-3 auto-cols-fr gap-x-3 gap-y-8 justify-center">
            @each('includes.product', $featuredProducts, 'product')
        </div>
    </div>
    <div class="text-center text-xl max-w-[500px] mx-auto my-10 px-3">
        {!! \App\Models\PageContent::where('page_id', \App\Http\Controllers\PageController::HOME)->first()?->content !!}
    </div>

    <?php $greenLine = \App\Models\PageContent::where('page_id', \App\Http\Controllers\PageController::GREEN_LINE)->first(); ?>

    <div class="bg-main-green-dark p-4 text-center" @if (!$greenLine?->is_active) style="pointer-events: none" @endif>
        <a href="{{ route('app_formlazer') }}">
            <h2 class="text-xl text-[#fff]">
                {!! $greenLine?->content !!}
            </h2>
        </a>
    </div>

    <div
        class="grid px-3 md:grid-cols-5 grid-cols-1 auto-cols-fr gap-x-3 gap-y-8 justify-center max-w-[1200px] mx-auto my-10">
        @foreach ($products as $product)
            <div class="border rounded-md border-[#94A3B8] hover:shadow-md">
                <div class="p-3 text-center flex flex-col justify-between h-full">
                    <a href="{{ route('app_product', $product->id) }}">
                        <img class="mx-auto h-[205px]" src="{{ asset('storage/products/' . $product->image_path) }}"
                            alt="Product" />
                    </a>
                    <h2 class="uppercase underline text-main-green-dark font-bold my-3 text-[1.175rem]">
                        <a href="{{ route('app_product', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h2>
                    @if ($product->desc !== '---')
                        <p class="leading-4 mb-5">
                            {{ $product->desc }}
                        </p>
                    @endif
                    <p class="mb-2 font-semibold text-xl">
                        @if ($product->price === 'Цена при запитване')
                            {{ $product->price }}
                        @else
                            Цена: {{ $product->price }}
                        @endif
                    </p>
                    @if ($product->name === 'Паднали марки за ЕПЖ')
                        <a href="{{ route('app_formlazer') }}"
                            class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                            ПОРЪЧАЙ
                        </a>
                    @else
                        @if ($product->can_order == 0)
                            <a href="{{ route('app_contacts') }}"
                                class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                                ЗАПИТВАНЕ
                            </a>
                        @else
                            <button type="button" data-trigger-modal-id="{{ $product->id }}"
                                class="js-open-modal inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                                ПОРЪЧАЙ
                            </button>
                        @endif
                    @endif
                </div>
                <div data-modal-id="{{ $product->id }}" class="hidden order-modal-overlay">
                    <div id="order-modal"
                        class="w-full max-w-[700px] fixed bg-[#F1F2F2] z-[9000] top-1/2 left-1/2 -translate-x-1/2 p-6 py-3 border shadow-xl rounded-md -translate-y-1/2">
                        <div class="header text-center mb-4">
                            <h1 class="text-lg font-bold uppercase text-main-green-dark">Поръчка на <strong
                                    class="font-bold">{{ $product->name }}</strong></h1>
                        </div>
                        <div class="body">
                            <form action="{{ route('app_order_post') }}" method="post">
                                @csrf
                                {{-- <x-honeypot />--}}
                                <input type="hidden" name="product_name" value="{{ $product->name }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="flex justify-between md:flex-row flex-col">
                                    <div class="pr-0 md:pr-3 w-full mb-4 md:mb-0 ">
                                        <div class="mb-4">
                                            <label class="mb-1 text-sm block font-bold" for="name">Име:</label>
                                            <input required type="text" class="w-full px-3 py-2 border rounded" id="name"
                                                name="name" />
                                        </div>
                                        <div class="mb-4">
                                            <label class="mb-1 text-sm block font-bold" for="mobile">Тел:</label>
                                            <input required type="text" class="w-full px-3 py-2 border rounded" id="mobile"
                                                name="mobile" />
                                        </div>
                                        <div>
                                            <label class="mb-1 text-sm block font-bold" for="email">Имейл:</label>
                                            <input required type="email" class="w-full px-3 py-2 border rounded" id="email"
                                                name="email" />
                                        </div>
                                    </div>
                                    <div class="pl-0 md:pl-3 w-full">
                                        <div class="mb-4">
                                            <label class="mb-1 text-sm block font-bold" for="quantity">Количество</label>
                                            <input required type="number" min="1" class="w-full px-3 py-2 border rounded"
                                                id="quantity" name="quantity" />
                                        </div>
                                        <div>
                                            <label class="mb-1 text-sm block font-bold" for="message">Адрес (офис на
                                                Еконт,
                                                допълнителни
                                                данни)</label>
                                            <textarea name="message" id="message" class="w-full px-3 py-2 border rounded"
                                                rows="4"></textarea>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="policy" checked />
                                            <label for="policy" class="font-bold">Съгласявам се с <a
                                                    href="{{ route('app_policy') }}" class="text-main-green-dark uppercase"
                                                    target="_blank">общите
                                                    условия</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LfpDJ8pAAAAABOPQh5CBmwGtddhui5z6XU5_mCT"></div>
                                <button
                                    class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                                    ИЗПРАТИ
                                </button>
                                <button type="button"
                                    class="inline-block js-close-modal uppercase rounded bg-[#bbb] font-bold px-6 py-1 my-4">
                                    ОТКАЗ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        var modals = document.querySelectorAll('.order-modal-overlay');
        var openModalButtons = document.querySelectorAll('.js-open-modal');
        var closeModalButtons = document.querySelectorAll('.js-close-modal');
        var body = document.body;

        if (modals.length > 0) {

            // OPEN
            for (var i = 0; i < openModalButtons.length; i++) {
                openModalButtons[i].addEventListener('click', function (e) {

                    var buttonDataId = this.getAttribute('data-trigger-modal-id');
                    body.classList.add('no-scrolling');

                    for (var j = 0; j < modals.length; j++) {
                        var modalDataId = modals[j].getAttribute('data-modal-id');

                        if (buttonDataId === modalDataId) {
                            modals[j].classList.remove('hidden');
                        }
                    }
                });
            }

            // CLOSE
            for (var k = 0; k < closeModalButtons.length; k++) {
                closeModalButtons[k].addEventListener('click', function () {

                    body.classList.remove('no-scrolling');

                    for (var o = 0; o < modals.length; o++) {
                        modals[o].classList.add('hidden');
                    }
                });
            }

        }
    </script>
@endsection
