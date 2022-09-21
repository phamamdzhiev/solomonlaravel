@extends('welcome')

@section('body')
    @include('includes.banners', ['banner' => 'https://solomonsofia.com/cow.png'])
    <div class="container my-10 max-w-[1200px] w-full">
        <h1 class="text-4xl font-semibold mb-10 text-main-green-dark">Контакти</h1>
        <div id="_contacts_form">
            <form action="/" method="post">
                <div class="flex items-stretch">
                    <div class="mr-4 flex-[0_1_350px]">
                        <div class="mb-3">
                            <input class="py-3 px-4 border rounded-md w-full" type="text" name="name" id="name"
                                   placeholder="Име" required/>
                        </div>
                        <div class="mb-3">
                            <input class="py-3 px-4 border rounded-md w-full" type="text" name="mobile" id="mobile"
                                   placeholder="Мобилен" required/>
                        </div>
                        <div class="mb-3">
                            <input class="py-3 px-4 border rounded-md w-full" type="email" name="email" id="email"
                                   placeholder="Имейл"/>
                        </div>
                    </div>
                    <div>
                        <textarea class="py-3 px-4 border rounded-md w-full" name="message" id="message" cols="50"
                                  rows="6"
                                  placeholder="Съобщение" required></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="rounded bg-main-green-dark px-8 uppercase text-[#fff] font-bold py-3">
                        Изпрати
                    </button>
                </div>
            </form>
        </div>
        <ul class="flex flex-col md:flex-row w-full justify-between my-10">
            <li class="font-semibold">
                <span class="block">Соломон-София ЕООД</span>
                <span class="block">София 1202 България</span>
            </li>
            <li class="font-semibold">
                <span class="block">ул. Княз Борис I 196, магазин 1</span>
                <span class="block">тел.: 0899 811 758</span>
            </li>
            <li class="font-semibold">
                <span class="block">E-mail:</span>
                <span class="block">solomonsofia@abv.bg</span>
            </li>
        </ul>
        <div class="flex">
            <img class="mr-6" src="{{asset('/storage/office.png')}}" alt="Office image">
            <div class="">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5863.774604416783!2d23.322277!3d42.706107!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40aa8560ba68d3ad%3A0x62fb335718d2b610!2sul.%20%22Knyaz%20Boris%20I%22%20196%2C%201202%20Sofia%20Center%2C%20Sofia!5e0!3m2!1sen!2sbg!4v1597786265937!5m2!1sen!2sbg" width="462" height="303" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
@endsection
