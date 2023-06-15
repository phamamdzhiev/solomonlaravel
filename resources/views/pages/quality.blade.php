@extends('welcome')

@section('body')
    <style>
        #css-quality-content h1 {
            font-size: 1.75rem;
            color: #1B692E;
            font-weight: bolder;
            margin: 1rem 0 0.5rem 0;
        }

        #css-quality-content h2 {
            font-size: 1.25rem;
            color: #1B692E;
            font-weight: bolder;
            margin: 1rem 0 0.5rem 0;
        }

        #css-quality-content h3 {
            font-size: 1rem;
            color: #1B692E;
            font-weight: bolder;
            margin: 1rem 0 0.5rem 0;
        }

        #css-quality-content p {
            margin-bottom: 1rem;
        }

        #css-quality-content ul {
            font-weight: bold;
            list-style: disc;
            margin: 1rem 0;
        }

        #css-quality-content li {
            margin-bottom: 0.5rem;
        }

    </style>
    @include('includes.banners', ['banner' => 'https://solomonsofia.com/kleshti.png'])
    <div class="container my-10 max-w-[900px] w-full">
        <h1 class="text-4xl font-semibold mb-10 text-main-green-dark">Ушни марки</h1>
        <div>
            @foreach($qualities as $quality)
                <div class="mb-6">
                    @isset($quality->image)
                        <img width="180" class="mb-3" src="{{asset('storage/qualities/' . $quality->image)}}"
                             alt="{{$quality->title}}"/>
                    @endisset
                    <h2 class="text-main-green-dark font-semibold text-xl mb-3">{{$quality->title}}</h2>
                    {!! $quality->description !!}
                </div>
            @endforeach
        </div>
        <div id="css-quality-content">
            {!! \App\Models\PageContent::where('page_id', \App\Http\Controllers\PageController::QUALITY)->first()?->content !!}
        </div>
        {{--        <div class="flex mb-6 flex-col md:flex-row">--}}
        {{--            <div class="mr-8 mb-6">--}}
        {{--                <img width="200" class="shadow-md" src="{{asset('/storage/BOSS_2.jpg')}}" alt="image">--}}
        {{--            </div>--}}
        {{--            <div class="flex-[0_1_100%] md:flex-[0_1_900px]">--}}
        {{--                <h2 class="font-bold text-main-green-dark text-lg mb-2">Q-Flex ушни марки за говеда Q-Flex BOSS 2</h2>--}}
        {{--                <p>--}}
        {{--                    Произведени от гъвкава полиуретанова (TPU) пластмаса с надеждна, дълготрайна издръжливост. Мъжките и--}}
        {{--                    женски части се въртят лесно и се осигурява комфорт на животните и безопасно позициониране. Режещ--}}
        {{--                    пръстен и заключващ механизъм, от твърда пластмаса, осигурява чисто и безопасно рязане. Вентилирани--}}
        {{--                    отвори, плюс фиксирано разстояние между мъжки и женски части, насърчава за по-бързото зарастване.--}}
        {{--                    Дълготрайният, висок контраст на лазерното маркиране допринася за лесно четене. Производство в--}}
        {{--                    съответствие с DIN ISO 9001: 2000.--}}
        {{--                </p>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="flex mb-6 flex-col md:flex-row">--}}
        {{--            <div class="mr-8 mb-6">--}}
        {{--                <img width="200" class="shadow-md" src="{{asset('/storage/marka_ovce.jpg')}}" alt="image">--}}
        {{--            </div>--}}
        {{--            <div class="flex-[0_1_100%] md:flex-[0_1_900px]">--}}
        {{--                <h2 class="font-bold text-main-green-dark text-lg mb-2">Q-Flex ушни марки за овце и кози Q-Flex--}}
        {{--                    CREW</h2>--}}
        {{--                <p>- 28 mm х 28 mm - тегло 3,2 гр - твърд накрайник - висококачествен полиуретан</p>--}}
        {{--                <h2 class="font-bold text-main-green-dark text-lg mb-2 mt-4">Q-Flex E-DISC25 (FDX)</h2>--}}
        {{--                <p>Малка и лека електронна ушна марка за овце и кози - само 26 mm диаметър - ISO 11784/11785 (FDX-B) ---}}
        {{--                    ICAR тествана</p>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <h1 class="text-3xl font-semibold my-10 text-main-green-dark">Q-flex</h1>--}}
        {{--        <div class="flex justify-between mb-10 md:flex-row flex-col">--}}
        {{--            <ul class="list-disc flex-[0_0_49%] font-semibold">--}}
        {{--                <li>Твърда пластмаса</li>--}}
        {{--                <li>Пробивен връх</li>--}}
        {{--                <li>Модерен пробиващ елемент и заключващ пръстен от твърда пластмаса (патент)</li>--}}
        {{--                <li>Проветряващ се връх и фиксирано разстояние между „мъжката“ и „женската“ част, гарантиращи по-бързо--}}
        {{--                    заздравяване--}}
        {{--                </li>--}}
        {{--                <li>Пробивен връх от твърда пластмаса</li>--}}
        {{--                <li>Отличен разрез</li>--}}
        {{--                <li>Висока устойчивост</li>--}}
        {{--                <li>Без окисляване на пробивния връх от твърда пластмаса</li>--}}
        {{--                <li>Фиксирано разстояние между „мъжката“ и „женската“ част, което:--}}
        {{--                    – предпазва от наранявания--}}
        {{--                    – улеснява бързото заздравяване--}}
        {{--                </li>--}}
        {{--                <li>Пластмасови части, които се въртят лесно и едновременно с това са гъвкави и устойчиви</li>--}}
        {{--                <li>Висококачествени материали</li>--}}
        {{--                <li>Голяма устойчивост на износване</li>--}}
        {{--            </ul>--}}
        {{--            <ul class="list-disc flex-[0_0_49%] font-semibold">--}}
        {{--                <li>Висок контраст и устойчиво лазерно маркиране</li>--}}
        {{--                <li>Заключващ пръстен на пробивния връх</li>--}}
        {{--                <li>Отличен разрез от пробивния връх</li>--}}
        {{--                <li>В заключващия пръстен не попадат части от кожата или окосмяването на животното</li>--}}
        {{--                <li>Минимален риск от инфекция</li>--}}
        {{--                <li>По-бързо и по-пълноценно заздравяване</li>--}}
        {{--                <li>Достатъчно разстояние между тялото на пробивната част и покрития връх за прорязаната тъкан</li>--}}
        {{--                <li>Проветряващ се връх</li>--}}
        {{--                <li>Поддържа тъканта суха</li>--}}
        {{--                <li>Минимален риск от замърсяване</li>--}}
        {{--                <li>По-бързо заздравяване на раната</li>--}}
        {{--                <li>Пълен комплект с лазерно маркиране</li>--}}
        {{--                <li>Пълен комплект за всеки отделен размер</li>--}}
        {{--                <li>Устойчиво лазерно маркиране с висок контраст</li>--}}
        {{--                <li>Висока устойчивост срещу износване</li>--}}
        {{--            </ul>--}}
        {{--        </div>--}}
    </div>
@endsection
