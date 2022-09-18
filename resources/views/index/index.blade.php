@extends('welcome')

@section('title', 'Начало |')

@section('body')
    @include('includes.banners')
    <div id="_featured_products" class="max-w-[800px] mx-auto my-8 w-full">
        <div id="_featured_products_heading" class="my-10">
            <h1 class="text-main-green-dark font-bold">
                <span class="text-[26px] block">100% Немско качество</span>
                <span class="text-[26px] block">Ушни марки GEPE поставете и за проблеми забравете</span>
            </h1>
        </div>
        <div class="grid grid-cols-3 auto-cols-fr gap-x-3 gap-y-8 justify-center">
            @forelse($featuredProducts as $product)
                @include('includes.product', ['product' => $product])
            @empty
                <h1 class="text-center text-2xl">
                    Няма довабени продукти!
                </h1>
            @endforelse
        </div>
    </div>

    <div class="max-w-[500px] mx-auto text-center font-bold my-10 text-xl">
        <span class="block">Всички ушни марки са регистрирани в БАБХ</span>
        <span class="block">Отстъпка за количество за нови ушни марки за ЕПЖ и ел.ДПЖ:</span>
        <span class="block">50бр. - 5%</span>
        <span class="block">100бр. - 10%</span>
        <span class="block">300бр. - 15%</span>
        <span class="block">за вет.лекари -10%т.о.</span>
        <span class="block">Тел.номер с Viber 0899 811 358</span>
    </div>

    <div class="bg-main-green-dark p-4 text-center">
        <h2 class="text-xl text-[#fff]">Заявка за лазерно надписване на дубликати >> Доставка от 1 до 3 дни</h2>
    </div>

    <div class="grid grid-cols-5 auto-cols-fr gap-x-3 gap-y-8 justify-center max-w-[1200px] mx-auto my-10">
{{--        @include('includes.product')--}}
{{--        @include('includes.product')--}}
{{--        @include('includes.product')--}}
{{--        @include('includes.product')--}}
{{--        @include('includes.product')--}}
{{--        @include('includes.product')--}}
{{--        @include('includes.product')--}}
{{--        @include('includes.product')--}}
{{--        @include('includes.product')--}}
{{--        @include('includes.product')--}}
    </div>
@endsection
