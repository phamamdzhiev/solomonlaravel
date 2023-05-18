@extends('welcome')

@section('title', 'ЗАЯВКА ЗА СРЕДСТВА ЗА ПЪРВОНАЧАЛНА ИДЕНТИФИКАЦИЯ')

@section('body')
    <style>
        * {
            font-weight: bold;
        }

        strong {
            text-decoration: underline;
            padding: 0 10px;
        }

        p {
            margin-bottom: 8px;
        }

        input, select, textarea {
            border: none;
            background: transparent;
            border-radius: 6px;
            width: 100%;
            pointer-events: none;
            margin: 5px 0;
        }

        @media print {
            * {
                font-size: 12px;
                font-family: Arial, sans-serif;
            }

            strong {
                text-decoration: none;
            }

            #print-btn,
            #message-success {
                display: none;
            }

            header, footer {
                display: none;
            }

            p {
                margin-bottom: 5px;
            }
        }
    </style>
    <div class="container" style="max-width: 1000px; margin: 2rem auto">
        <h1 class="text-center text-2xl font-bold uppercase my-3 text-[#fff] rounded bg-main-green-dark"
            id="message-success">Вашата
            поръчка е изпратена успешно!</h1>
        <h1 class="text-center text-xl font-bold uppercase my-3">ЗАЯВКА ЗА СРЕДСТВА ЗА ПЪРВОНАЧАЛНА ИДЕНТИФИКАЦИЯ</h1>
        <h3 class="text-center text-md font-bold uppercase my-3">
            до Соломон-София ЕООД, София 1202, България, ул. Княз Борис | 196, магазин 1, тел.: 089 981 17 58,
            Email: solomonsofia@abv.bg, www.solomonsofia.com
        </h3>
        <form action="/" method="post">
            <div>
                <p>*Име, фамилия на ветеринарния лекар
                    <strong>{{$data['vet']}}</strong>
                </p>

            </div>
            <div>
                <p>*Област:
                    <strong>{{$data['odbh']}}</strong>
                </p>
            </div>
            <div>
                <p>*Тел:
                    <strong>{{$data['tel']}}</strong>
                </p>
            </div>
            <div>
                <p>*Имейл на вет.лекар или фермера:
                    <strong>{{$data['email']}}</strong>
                </p>
            </div>
            {{--        1--}}
            <div>
                <p>Вид животни:<strong>
                        {{$data['animal']}}
                    </strong></p>
            </div>
            <div>
                <p>*Брой комплекти:
                    <strong>{{$data['number_br']}}</strong>
                </p>
            </div>
            <div>
                <p>*№ на животновъдния обект:
                    <strong>{{$data['no']}}</strong>
                </p>
            </div>
            <div>
                <p>*Населено място на жив.обект:
                    <strong>{{$data['no_city']}}</strong>
                </p>
            </div>
            <div>
                <p>*Име на собственика или фирма:
                    <strong>{{$data['names']}}</strong>
                </p>
            </div>
            <div>
                <p>*ЕГН или Булстат:
                    <strong>{{$data['egn']}}</strong>
                </p>
            </div>
            <div>
                <p>*Телефон за връзка:
                    <strong>{{$data['mobile']}}</strong>
                </p>
            </div>
            <div>
                <p>*Офис на Еконт или адрес за доставка:
                    <strong>{{$data['ekont']}}</strong>
                </p>
            </div>
            <div>
                <p>*Данни за фактура:
                    <strong>{{$data['invoice']}}</strong>
                </p>
            </div>
            {{--        2--}}
            <div>
                <p>Вид животни:<strong>
                        {{$data['animal1']}}
                    </strong></p>
            </div>
            <div>
                <p>*Брой комплекти:
                    <strong>{{$data['number_br1']}}</strong>
                </p>
            </div>
            <div>
                <p>*№ на животновъдния обект:
                    <strong>{{$data['no1']}}</strong>
                </p>
            </div>
            <div>
                <p>*Населено място на жив.обект:
                    <strong>{{$data['no_city1']}}</strong>
                </p>
            </div>
            <div>
                <p>*Име на собственика или фирма:
                    <strong>{{$data['names1']}}</strong>
                </p>
            </div>
            <div>
                <p>*ЕГН или Булстат:
                    <strong>{{$data['egn1']}}</strong>
                </p>
            </div>
            <div>
                <p>*Телефон за връзка:
                    <strong>{{$data['mobile1']}}</strong>
                </p>
            </div>
            <div>
                <p>*Офис на Еконт или адрес за доставка:
                    <strong>{{$data['ekont1']}}</strong>
                </p>
            </div>
            <div>
                <p>*Данни за фактура:
                    <strong>{{$data['invoice1']}}</strong>
                </p>
            </div>
            {{--        3--}}
            <div>
                <p>Вид животни:<strong>
                        {{$data['animal2']}}
                    </strong></p>
            </div>
            <div>
                <p>*Брой комплекти:
                    <strong>{{$data['number_br2']}}</strong>
                </p>
            </div>
            <div>
                <p>*№ на животновъдния обект:
                    <strong>{{$data['no2']}}</strong>
                </p>
            </div>
            <div>
                <p>*Населено място на жив.обект:
                    <strong>{{$data['no_city2']}}</strong>
                </p>
            </div>
            <div>
                <p>*Име на собственика или фирма:
                    <strong>{{$data['names2']}}</strong>
                </p>
            </div>
            <div>
                <p>*ЕГН или Булстат:
                    <strong>{{$data['egn2']}}</strong>
                </p>
            </div>
            <div>
                <p>*Телефон за връзка:
                    <strong>{{$data['mobile2']}}</strong>
                </p>
            </div>
            <div>
                <p>*Офис на Еконт или адрес за доставка:
                    <strong>{{$data['ekont2']}}</strong>
                </p>
            </div>
            <div>
                <p>*Данни за фактура:
                    <strong>{{$data['invoice2']}}</strong>
                </p>
            </div>
            <div class="my-3 text-center">
                <button
                    id="print-btn"
                    type="button"
                    onclick="window.print()"
                    class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 text-xl py-1 my-4">
                    ПРИНТИРАЙ
                </button>
            </div>
        </form>
        <p>*Вид животни: ЕПЖ = едри преживни животни, ДПЖ = дребни преживни животни, СВ = свине, ПЧ = пчели. </p>
        <p>**Един комплект ушни марки = ушни марки за 1 животно.</p>
        <br>
        <p class="my-1">Дата на запознаване и съгласие с Условията за защита на личните данни
            <strong>{{date("Y-m-d H:i:s", strtotime('+3 hours'))}}</strong></p>
        <p class="my-1">Дата: <strong>{{date("Y-m-d H:i:s", strtotime('+3 hours'))}}</strong></p>
    </div>
@endsection
