@extends('welcome')

@section('body')
    @include('includes.banners', ['banner' => 'https://solomonsofia.com/kleshti.png'])
    <div class="container my-10 max-w-[900px] w-full">
        <h1 class="mb-6 text-4xl font-bold text-main-green-dark">Партньори</h1>
        <div class="mb-10">
            <a href="https://vkasis.com/" target="_blank">
                <img class="py-6" src="{{asset('/storage/kasis.png')}}" alt="Kasis Logo">
            </a>
            <a href="https://vkasis.com/" target="_blank">
                <h4 class="font-bold text-main-green-dark underline">
                    Ветеринарномедицински продукти -Възраждане-Касис
                    ООД
                </h4>
            </a>
            <p class="text-main-green-dark">Фирма АГРИТОП започва дейността си през 2002 г. с тясна насоченост към
                животновъдния сектор в България.
                Екипът ни е последователен в развитието си и се придържа към най-новите тенденции на модерното и
                ефективно животновъдство. Ние предлагаме доказано работещи и ефективни технологични решения, които
                прилагаме успешно.</p>
        </div>
        <div class="mb-10">
            <a href="https://agritop.bg/bg/" target="_blank">
                <img class="py-6" src="{{asset('/storage/agrito.png')}}" alt="Agritop Logo">
            </a>
            <a href="https://agritop.bg/bg/" target="_blank">
                <h4 class="font-bold text-main-green-dark underline">Tехнологични решения за животновъдния и земеделския
                    сектор</h4>
            </a>
            <p class="text-main-green-dark">Фирмата дистрибутира ветеринарно-медицински продукти, добавки за
                фуражопроизводството,храни и аксесоари
                за домашни любимци ,инструменти и медицински консумативи както за ветеринарната така и за хуманната
                медицина.</p>
        </div>
    </div>
@endsection
