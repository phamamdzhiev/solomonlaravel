@extends('welcome')

@section('title', 'Начало |')

@section('body')
    @include('includes.banners', ['banner' => 'https://solomonsofia.com/cow.png'])
    <div id="_featured_products" class="max-w-[800px] mx-auto my-8 w-full">
        <div id="_featured_products_heading" class="my-10 px-3">
            <h1 class="text-main-green-dark font-bold md:text-left text-center">
                <span class="text-[26px] block">100% Немско качество</span>
                <span class="text-[26px] block">Ушни марки GEPE поставете и за проблеми забравете</span>
            </h1>
        </div>
        <div class="grid md:grid-cols-3 grid-cols-1 px-3 auto-cols-fr gap-x-3 gap-y-8 justify-center">
            @each('includes.product', $featuredProducts, 'product')

            {{-- Static Products --}}
            <div class="border rounded-md border-[#94A3B8] hover:shadow-md">
                <div class="p-3 text-center flex flex-col justify-between h-full">
                    <a target="_blank" href="https://vkasis.com/partner-products?vendor=18&param=15">
                        <img class="mx-auto" src="{{asset('storage/products/animals.jpg')}}" alt="Static Product"/>
                    </a>
                    <h2 class="uppercase underline text-main-green-dark font-bold my-3 text-[1.175rem]">
                        <a href="/">
                            Инструменти
                        </a>
                    </h2>
                    <a target="_blank" href="https://vkasis.com/partner-products?vendor=18&param=15"
                       class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                        РАЗГЛЕДАЙ
                    </a>
                </div>
            </div>
            {{-- END Static Products --}}
        </div>
    </div>

    <div class="max-w-[500px] mx-auto text-center font-bold my-10 text-xl px-3">
        <span class="block">Всички ушни марки са регистрирани в БАБХ</span>
        <span class="block">Отстъпка за количество за нови ушни марки за ЕПЖ и ел.ДПЖ:</span>
        <span class="block">50бр. - 5%</span>
        <span class="block">100бр. - 10%</span>
        <span class="block">300бр. - 15%</span>
        <span class="block">за вет.лекари -10%т.о.</span>
        <span class="block">Тел.номер с Viber 0899 811 358</span>
    </div>

    <div class="bg-main-green-dark p-4 text-center">
        <a href="{{route('app_formlazer')}}">
            <h2 class="text-xl text-[#fff]">Заявка за лазерно надписване на дубликати >> Доставка от 1 до 3 дни</h2>
        </a>
    </div>

    <div
        class="grid px-3 md:grid-cols-5 grid-cols-1 auto-cols-fr gap-x-3 gap-y-8 justify-center max-w-[1200px] mx-auto my-10">
        @each('includes.product', $products, 'product', 'Няма добавени продукти')
    </div>
@endsection
