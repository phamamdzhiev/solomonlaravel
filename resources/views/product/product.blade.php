@extends('welcome')

@section('title', $product->name . ' |')

@section('body')
    <div class="container mt-10 max-w-[1200px]">
        @if (session('status'))
            <div class="text-center bg-main-green-dark p-3 mb-6 rounded">
                <h1 class="text-[#fff] font-semibold text-2xl">{{ session('status') }}</h1>
            </div>
        @endif
        {{--  <div class="flex items-center my-10"> --}}
        <div>
            <img width="300px" class="rounded inline-block"
                 src="{{ asset('storage/products/' . $product->image_path) }}"
                 alt="{{ $product->name }}">
        </div>
        <div class="mt-10">
            <h1 class="text-2xl font-bold text-main-green-dark ">{{ $product->name }}</h1>
            @if ($product->desc !== '---')
                <h2 class="text-md my-3">{{ $product->desc }}</h2>
            @endif
            <h2 class="text-2xl font-semibold">
                @if ($product->price === 'Цена при запитване')
                    {{ $product->price }}
                @else
                    Цена: {{ $product->price }}
                @endif
            </h2>
            @php
                if ($product->can_order == 0) {
                    $url = route('app_contacts');
                    $useButton = false;
                } elseif ($product->features == 1) {
                    $url = route('app_formorder');
                    $useButton = false;
                } elseif ($product->name === 'Паднали марки за ЕПЖ') {
                    $url = route('app_formlazer');
                    $useButton = false;
                } else {
                    $useButton = true;
                }
            @endphp

            @if (!$useButton)
                <a href="{{ $url }}"
                   class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                    {{ $product->can_order == 0 ? 'ЗАПИТВАНЕ' : 'ПОРЪЧАЙ' }}
                </a>
            @else
                <button type="button"
                        data-modal="modal-{{ $product->id }}"
                        class="js-open-modal inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                    ПОРЪЧАЙ
                </button>
            @endif
        </div>
        {{--  </div> --}}
    </div>
    @push('modal')
        <div class="order-modal-overlay hidden"
             id="modal-{{ $product->id }}">
            <div id="order-modal"
                 class="w-full max-w-[700px] fixed bg-[#F1F2F2] z-[9000] top-1/2 left-1/2 -translate-x-1/2 p-6 py-3 border shadow-xl rounded-md -translate-y-1/2">
                <div class="header text-center mb-4">
                    <h1 class="text-lg uppercase text-main-green-dark font-light">Поръчка на <strong
                            class="font-bold">{{ $product->name }}</strong></h1>
                </div>
                <div class="body">
                    <form action="{{ route('app_order_post') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_name" value="{{ $product->name }}">
                        <div class="flex justify-between md:flex-row flex-col">
                            <div class="pr-0 md:pr-3 w-full mb-4 md:mb-0 ">
                                <div class="mb-4">
                                    <label class="mb-1 text-sm block font-bold" for="name">Име:</label>
                                    <input required type="text" class="w-full px-3 py-2 border rounded" id="name"
                                           name="name"/>
                                </div>
                                <div class="mb-4">
                                    <label class="mb-1 text-sm block font-bold" for="mobile">Мобилен:</label>
                                    <input required type="text" class="w-full px-3 py-2 border rounded" id="mobile"
                                           name="mobile"/>
                                </div>
                                <div>
                                    <label class="mb-1 text-sm block font-bold" for="email">Имейл:</label>
                                    <input required type="email" class="w-full px-3 py-2 border rounded" id="email"
                                           name="email"/>
                                </div>
                            </div>
                            <div class="pl-0 md:pl-3 w-full">
                                <div class="mb-4">
                                    <label class="mb-1 text-sm block font-bold" for="quantity">Количество</label>
                                    <input required type="number" min="1" class="w-full px-3 py-2 border rounded"
                                           id="quantity" name="quantity"/>
                                </div>
                                <div>
                                    <label class="mb-1 text-sm block font-bold" for="message">Адрес (офис на Еконт,
                                        допълнителни
                                        данни)</label>
                                    <textarea name="message" id="message" class="w-full px-3 py-2 border rounded"
                                              rows="4"></textarea>
                                </div>
                                <div>
                                    <input type="checkbox" id="policy" checked/>
                                    <label for="policy" class="font-bold">Съгласявам се с <a
                                            href="{{ route('app_policy') }}"
                                            class="text-main-green-dark uppercase" target="_blank">общите
                                            условия</a></label>
                                </div>
                            </div>
                        </div>
                        <button type="button"
                                class="js-open-modal inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                            ПОРЪЧАЙ
                        </button>
                        <button type="button"
                                class="js-close-modal inline-block uppercase rounded bg-[#bbb] font-bold px-6 py-1 my-4">
                            ОТКАЗ
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('click', function(e) {

                // OPEN
                var openBtn = e.target.closest('.js-open-modal');
                if (openBtn) {
                    var modalId = openBtn.dataset.modal;
                    var modal = document.getElementById(modalId);

                    if (modal) {
                        // document.body.classList.add('no-scrolling');
                        modal.classList.remove('hidden');
                    }
                }

                // CLOSE
                var closeBtn = e.target.closest('.js-close-modal');
                if (closeBtn) {
                    var modal = closeBtn.closest('.order-modal-overlay');

                    if (modal) {
                        // document.body.classList.remove('no-scrolling');
                        modal.classList.add('hidden');
                    }
                }

            });
        </script>
    @endpush
@endsection
