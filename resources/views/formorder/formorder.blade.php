@extends('welcome')

@section('title', 'ЗАЯВКА ЗА СРЕДСТВА ЗА ПЪРВОНАЧАЛНА ИДЕНТИФИКАЦИЯ')

@section('body')
    <style>
        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"], select {
            padding: 5px;
        }

        hr {
            margin: 1rem auto 2rem 0;
            width: 100%;
            max-width: 350px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"], select, textarea {
            border: 2px solid black;
            border-radius: 6px;
            width: 100%;
            max-width: 350px;
            margin-bottom: 1rem;
        }
    </style>
    <div class="container" style="max-width: 1000px; margin: 2rem auto">
        <form action="{{route('app_formorder')}}" method="post">
            <div style="text-align: right">
                <p> до Соломон - София ЕООД, София 1202
                </p>
                <p> ул. Княз Борис I 196, магазин 1
                </p>
                <p> тел.: 089 981 17 58 , E-mail: solomonsofia@abv.bg
                </p>
                <p>www.solomonsofia.com</p>
            </div>
            @csrf

            <div>
                <label for="vet">*Име, фамилия на ветеринарния лекар</label>
                <input type="text" id="vet" name="vet" required>
            </div>
            <div>
                <label for="odbh">*Област</label>
                <input type="text" id="odbh" name="odbh" required>
            </div>
{{--            <div>--}}
{{--                <label for="obshtina">*Община</label>--}}
{{--                <input type="text" id="obshtina" name="obshtina" required>--}}
{{--            </div>--}}
            <div>
                <label for="tel">*Тел.</label>
                <input type="text" id="tel" name="tel" required>
            </div>
            <div>
                <label for="email">*Имейл на вет.лекар или фермера</label>
                <input type="email" id="email" name="email" required>
            </div>
            <h1 class="text-center text-2xl font-bold uppercase my-6">
                ЗАЯВКА ЗА СРЕДСТВА ЗА ПЪРВОНАЧАЛНА ИДЕНТИФИКАЦИЯ
            </h1>

            {{--        1--}}
            <div>
                <label for="animal">*Вид животни</label>
                <select id="animal" name="animal">
                    <option selected>Избери</option>
                    <option value="ЕПЖ">ЕПЖ</option>
                    <option value="ДПЖ">ДПЖ</option>
                    <option value="ДПЖ (за клане)">ДПЖ (за клане)</option>
                    <option value="СВ групови/зелени/">СВ групови/зелени/</option>
                    <option value="СВ индивидуални/жълти/">СВ индивидуални/жълти/</option>
                    <option value="Табелки ПЧ">Табелки ПЧ</option>
                </select>
            </div>
            <div>
                <label for="number_br">*Брой комплекти</label>
                <input type="number" min="1" id="number_br" name="number_br" required>
            </div>
            <div>
                <label for="no">*№ на животновъдния обект:</label>
                <input type="text" min="1" id="no" name="no" required>
            </div>
            <div>
                <label for="no">*Населено място на жив.обект:</label>
                <input type="text" min="1" id="no" name="no_city" required>
            </div>
            <div>
                <label for="names">*Име на собственика или фирма:</label>
                <input type="text" id="names" name="names" required>
            </div>
            <div>
                <label for="egn">*ЕГН или Булстат:</label>
                <input type="text" id="egn" name="egn" required>
            </div>
            <div>
                <label for="mobile">*Телефон за връзка:</label>
                <input type="text" id="mobile" name="mobile" required>
            </div>
            <div>
                <label for="ekont">*Офис на Еконт или адрес за доставка</label>
                <textarea name="ekont" id="ekont" cols="30" rows="3" required></textarea>
            </div>
            <div>
                <label for="invoice">Данни за фактура</label>
                <textarea name="invoice" id="invoice" cols="30" rows="3"></textarea>
            </div>
            <hr>
            {{--        2--}}
            <div>
                <label for="animal1">Вид животни</label>
                <select id="animal1" name="animal1" required>
                    <option selected>Избери</option>
                    <option value="ЕПЖ">ЕПЖ</option>
                    <option value="ДПЖ">ДПЖ</option>
                    <option value="ДПЖ (за клане)">ДПЖ (за клане)</option>
                    <option value="СВ групови/зелени/">СВ групови/зелени/</option>
                    <option value="СВ индивидуални/жълти/">СВ индивидуални/жълти/</option>
                    <option value="Табелки ПЧ">Табелки ПЧ</option>
                </select>
            </div>
            <div>
                <label for="number_br1">Брой комплекти</label>
                <input type="number" min="1" id="number_br1" name="number_br1">
            </div>
            <div>
                <label for="no1">№ на животновъдния обект:</label>
                <input type="text" id="no1" name="no1">
            </div>
            <div>
                <label for="no">*Населено място на жив.обект:</label>
                <input type="text" min="1" id="no" name="no_city1" required>
            </div>
            <div>
                <label for="names1">Име на собственика или фирма:</label>
                <input type="text" id="names1" name="names1">
            </div>
            <div>
                <label for="egn1">ЕГН или Булстат:</label>
                <input type="text" id="egn1" name="egn1">
            </div>
            <div>
                <label for="mobile1">Телефон за връзка:</label>
                <input type="text" id="mobile1" name="mobile1">
            </div>
            <div>
                <label for="ekont1">Офис на Еконт или адрес за доставка</label>
                <textarea name="ekont1" id="ekont1" cols="30" rows="3"></textarea>
            </div>
            <div>
                <label for="invoice1">Данни за фактура</label>
                <textarea name="invoice1" id="invoice1" cols="30" rows="3"></textarea>
            </div>
            {{--        3--}}
            <hr>
            <div>
                <label for="animal2">Вид животни</label>
                <select id="animal2" name="animal2">
                    <option selected>Избери</option>
                    <option value="ЕПЖ">ЕПЖ</option>
                    <option value="ДПЖ">ДПЖ</option>
                    <option value="ДПЖ (за клане)">ДПЖ (за клане)</option>
                    <option value="СВ групови/зелени/">СВ групови/зелени/</option>
                    <option value="СВ индивидуални/жълти/">СВ индивидуални/жълти/</option>
                    <option value="Табелки ПЧ">Табелки ПЧ</option>
                </select>
            </div>
            <div>
                <label for="number_br2">Брой комплекти</label>
                <input type="number" min="1" id="number_br2" name="number_br2">
            </div>
            <div>
                <label for="no2">№ на животновъдния обект:</label>
                <input type="text" id="no2" name="no2">
            </div>
            <div>
                <label for="no">*Населено място на жив.обект:</label>
                <input type="text" min="1" id="no" name="no_city2" required>
            </div>
            <div>
                <label for="names2">Име на собственика или фирма:</label>
                <input type="text" id="names2" name="names2">
            </div>
            <div>
                <label for="egn2">ЕГН или Булстат:</label>
                <input type="text" id="egn2" name="egn2">
            </div>
            <div>
                <label for="mobile2">Телефон за връзка:</label>
                <input type="text" id="mobile2" name="mobile2">
            </div>
            <div>
                <label for="ekont2">Офис на Еконт или адрес за доставка</label>
                <textarea name="ekont2" id="ekont2" cols="30" rows="3"></textarea>
            </div>
            <div>
                <label for="invoice2">Данни за фактура</label>
                <textarea name="invoice2" id="invoice2" cols="30" rows="3"></textarea>
            </div>

            <div class="flex">
                <input type="checkbox"  id="deklariram" name="confirm_policy" checked>
                <label for="deklariram" style="margin-left: 1rem;" class="font-bold">
                    Декларирам,че заявката е съгласувана с участъковия ветеринарен лекар и отдел
                    Идентификация в ОДБХ.</label>
            </div>

            <div>
                <button
                    class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 text-xl py-1 my-4">
                    Изпрати
                </button>
            </div>
            <div>
                <p>
                    *Вид животни: ЕПЖ = едри преживни животни, ДПЖ = дребни преживни животни, СВ = свине, ПЧ-пчели.
                </p>
                <p>
                    **Един комплект ушни марки = ушни марки за 1 животно.
                </p>
                <p>
                    ***минимално количество за поръчка - 10бр. ушни марки на животновъден обект.
                </p>
            </div>
        </form>
    </div>
@endsection
