@extends('welcome')

@section('title', 'Лазерно надписване на ушни марки')

@section('body')
    <style>
        input {
            display: block;
        }
    </style>
    <div class="container my-6" style="max-width: 1100px; margin-left: auto; margin-right: auto">
        <form action="{{ route('app_formlazer_post') }}" method="post">
            @csrf
            <div>
                <div style="text-align: right">
                    <p> до Соломон - София ЕООД, София 1202
                    </p>
                    <p> ул. Княз Борис I 196, магазин 1
                    </p>
                    <p> тел.: 089 981 17 58 , E-mail: solomonsofia@abv.bg
                    </p>
                    <p>www.solomonsofia.com</p>
                </div>
                <div class=" justify-between align-center mb-2 mt-4" style="width: 300px; margin-left: auto">
                    <label class="font-semibold" for="odbh">Област*</label>
                    <input type="text" class="border rounded px-2 py-1 mb-4" id="odbh" name="odbh" required>
                </div>
            </div>
            <h1 class="text-center text-2xl font-bold uppercase my-6">ЗАЯВКА ЗА ЛАЗЕРНО НАДПИСВАНЕ НА МАРКИ</h1>
            <div class=" align-center">
                <div>
                    <label class="font-semibold" for="vet">Име и фамилия на ветеринарния лекар*</label>
                    <input type="text" class="border rounded px-2 py-1 mb-4" id="vet" name="vet" required>
                </div>
                <div>
                    <label class="font-semibold" for="vet-tel">Тел*</label>
                    <input type="text" class="border rounded px-2 py-1 mb-4" name="vet-tel" required id="vet-tel">
                    <label class="font-semibold" for="mail">Имейл на вет.лекар или фермера*</label>
                    <input type="email" class="border rounded px-2 py-1 mb-4" name="mail" id="mail" required>
                </div>
            </div>
            <hr class="my-6">
            <div class=" mb-6">
                <label class="font-semibold" for="no">№ на животновъдния обект*</label>
                <input type="text" class="border rounded px-2 py-1 mb-4" name="no" required id="no">
                <label class="font-semibold" for="city">Населено място*</label>
                <input type="text" class="border rounded px-2 py-1 mb-4" name="city" required id="city">
            </div>
            <div class=" mb-6">
                <label class="font-semibold" for="names">Име на собственика или фирма*</label>
                <input type="text" class="border rounded px-2 py-1 mb-4" name="names" required id="names">
                <label class="font-semibold" for="egn">ЕГН или Булстат*</label>
                <input type="text" class="border rounded px-2 py-1 mb-4" name="egn" required id="egn">
            </div>
            <div class=" mb-6">
                <label class="font-semibold" for="ekont">Oфис на Еконт или адрес за доставка*</label>
                <textarea name="ekont" class="border rounded px-2 py-1 mb-4 w-full" id="ekont" cols="30" rows="2"
                    required></textarea>
            </div>
            <div class=" mb-6">
                <label class="font-semibold" for="client_mobile">Телефон за контакт*</label>
                <input type="text" class="border rounded px-2 py-1 mb-4" name="client_mobile" required
                    id="client_mobile">
            </div>
            <div class=" mb-6">
                <label class="font-semibold" for="invoice">Данни за фактура</label>
                <textarea name="invoice" class="border rounded px-2 py-1 mb-4 w-full" id="invoice" cols="30" rows="2"></textarea>
            </div>

            <div class=" mb-6" style="max-width: 250px;">
                <label class="font-semibold" for="marka_model">Избор на модел на марка</label>
                <select id="marka_model" name="marka_model" class="border rounded px-2 py-1 mb-4 w-full">
                    <option value="" selected></option>
                    <option>BM200 - 2,90лв.</option>
                    <option>Boss2 - 3,96лв.</option>
                </select>
            </div>

            <div>
                <hr class="my-4">
                <p>Попълнете като примера: BG18 233455 I -за едното ухо, BG18 233455 II-за второто ухо;</p>
                <button type="button" id="js-add-new-row-button"
                    class="inline-block uppercase rounded bg-main-green font-bold text-[#fff] px-6 text-sm py-1 my-4">
                    + Добавяне на ред
                </button>
                <table class="border-spacing-0.5 text-center w-full" id="formlazer">
                    <thead>
                        <tr>
                            <th>Код</th>
                            <th>Номер на марка</th>
                            <th>Римска цифра - пор.№ на заместваща марка</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border"><input type="text" name="field1[]" class="w-full" /></td>
                            <td class="border"><input type="text" name="field2[]" class="w-full" /></td>
                            <td class="border"><input type="text" name="field3[]" class="w-full" /></td>
                        </tr>
                        <tr>
                            <td class="border"><input type="text" name="field1[]" class="w-full" /></td>
                            <td class="border"><input type="text" name="field2[]" class="w-full" /></td>
                            <td class="border"><input type="text" name="field3[]" class="w-full" /></td>
                        </tr>
                        <tr>
                            <td class="border"><input type="text" name="field1[]" class="w-full" /></td>
                            <td class="border"><input type="text" name="field2[]" class="w-full" /></td>
                            <td class="border"><input type="text" name="field3[]" class="w-full" /></td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="mt-10 flex">
                <input type="checkbox" id="deklariram" class="mr-4g" name="confirm_policy" checked>
                <label for="deklariram" class="font-bold"> Декларирам,че заявката е съгласувана с участъковия ветеринарен
                    лекар и отдел
                    Идентификация в ОДБХ.</label>
            </div>
            <div class="text-center">
                <p class="font-bold"><span class="font-light">Дата:</span>
                    {{ date('Y-m-d H:i:s', strtotime('+3 hours')) }}</p>
            </div>
            <div class="my-6 text-center">
                <button
                    class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 text-xl py-1 my-4">
                    Изпрати
                </button>
            </div>
        </form>
    </div>

    <script>
        window.addEventListener('load', function() {
            var addNewButton = document.getElementById('js-add-new-row-button');

            function addNewTableRowHandler() {
                var tableBodyLastTr = document.querySelector('table#formlazer tbody tr:last-child');
                tableBodyLastTr.insertAdjacentHTML('afterend',
                    '<tr><td class="border"><input name="field1[]" class="w-full" type="text" /></td><td class="border"><input name="field2[]" class="w-full" type="text" /></td><td class="border"><input name="field3[]" class="w-full" type="text" /></td></tr>'
                    )
            }

            addNewButton.addEventListener('click', addNewTableRowHandler);
        });
    </script>
@endsection
