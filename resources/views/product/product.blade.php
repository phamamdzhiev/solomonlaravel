@extends('welcome')

@section('title', $product->name . ' |')

@section('body')
    <div class="container mt-10 max-w-[1200px]">
        @if (session('status'))
            <div class="text-center bg-main-green-dark p-3 mb-6 rounded">
                <h1 class="text-[#fff] text-xl">{{session('status')}}</h1>
            </div>
        @endif
        {{--  <div class="flex items-center my-10">--}}
        <div>
            <img width="300px" class="rounded inline-block" src="{{asset('storage/products/' . $product->image_path )}}"
                 alt="{{$product->name}}">
        </div>
        <div class="mt-10">
            <h1 class="text-2xl font-bold text-main-green-dark ">{{$product->name}}</h1>
            @if($product->desc !== '---')
                <h2 class="text-md my-3">{{$product->desc}}</h2>
            @endif
            <h2 class="text-2xl font-semibold">
                @if($product->price === 'Цена при запитване')
                    {{$product->price}}
                @else
                    Цена: {{$product->price}} <small>без ДДС</small>
                @endif
            </h2>
            @if($product->features === 1)
                <a href="https://old.solomonsofia.com/bg/form"
                   class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                    ПОРЪЧАЙ
                </a>
            @else
                <button type="button"
                        id="js-open-modal"
                        class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                    ПОРЪЧАЙ
                </button>
            @endif
        </div>
        {{--  </div>--}}
    </div>
    @push('modal')
        <div id="order-modal-overlay" class="hidden">
            <div id="order-modal"
                 class="w-full max-w-[700px] fixed bg-[#F1F2F2] z-[9000] top-1/2 left-1/2 -translate-x-1/2 p-6 py-3 border shadow-xl rounded-md -translate-y-1/2">
                <div class="header text-center mb-4">
                    <h1 class="text-lg font-bold uppercase text-main-green-dark font-light">Поръчка на <strong
                            class="font-bold">{{$product->name}}</strong></h1>
                </div>
                <div class="body">
                    <form action="{{route('app_order_post')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
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
                                           id="quantity"
                                           name="quantity"/>
                                </div>
                                <div>
                                    <label class="mb-1 text-sm block font-bold" for="message">Адрес (офис на Еконт,
                                        допълнителни
                                        данни)</label>
                                    <textarea name="message" id="message" class="w-full px-3 py-2 border rounded"
                                              rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                            ИЗПРАТИ
                        </button>
                        <button type="button" id="js-close-modal"
                                class="inline-block uppercase rounded bg-[#bbb] font-bold px-6 py-1 my-4">
                            ОТКАЗ
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            var modal = document.getElementById('order-modal-overlay');
            var openModalButton = document.getElementById('js-open-modal');
            var closeModalButton = document.getElementById('js-close-modal');
            var body = document.querySelector('body');

            if (modal != null) {
                openModalButton.addEventListener('click', function () {
                    body.classList.add('no-scrolling');
                    modal.classList.remove('hidden');
                });

                closeModalButton.addEventListener('click', function () {
                    body.classList.remove('no-scrolling');
                    modal.classList.add('hidden');
                });
            }
        </script>
    @endpush
@endsection
