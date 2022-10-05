@extends('welcome')

@section('title', 'Лазерно надписване на ушни марки')

@section('body')
    <style>
        input {
            display: block;
        }
    </style>
    <div class="container my-6" style="max-width: 1100px; margin-left: auto; margin-right: auto">
        <form action="{{route('app_formlazer_post')}}" method="post">
            @csrf
            <div>
              <div style="text-align: right">
                  <p> до Соломон - София ЕООД, София 1202
                  </p>
                  <p> ул. Княз Борис I 196, магазин 1
                  </p>
                  <p> тел.: 089 981 17 58 , E-mail: office@solomonsofia.com
                  </p>
                  <p>www.solomonsofia.com</p>
              </div>
                <div class=" justify-between align-center mb-2 mt-4" style="width: 300px; margin-left: auto">
                    <label class="font-semibold" for="odbh">ОДБХ*</label>
                    <input type="text" class="border rounded px-2 py-1 mb-4" id="odbh" name="odbh" required>
                </div>
                <div class=" justify-between align-center" style="width: 300px; margin-left: auto">
                    <label class="font-semibold" for="obshtina">Община*</label>
                    <input type="text" class="border rounded px-2 py-1 mb-4" id="obshtina" name="obshtina" required>
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
                <label class="font-semibold" for="names">Три имена на собственика*</label>
                <input type="text" class="border rounded px-2 py-1 mb-4" name="names" required id="names">
                <label class="font-semibold" for="egn">ЕГН*</label>
                <input type="text" class="border rounded px-2 py-1 mb-4" name="egn" required id="egn">
            </div>
            <div class=" mb-6">
                <label class="font-semibold" for="ekont">Oфис на Еконт или адрес за доставка*</label>
                <textarea name="ekont" class="border rounded px-2 py-1 mb-4 w-full" id="ekont" cols="30" rows="2"
                          required></textarea>
            </div>
            <div class=" mb-6">
                <label class="font-semibold" for="mail">Имейл*</label>
                <input type="email" class="border rounded px-2 py-1 mb-4" name="mail" id="mail" required>
                <label class="font-semibold" for="client_mobile">Телефон*</label>
                <input type="text" class="border rounded px-2 py-1 mb-4" name="client_mobile" required id="client_mobile">
            </div>
            <div class=" mb-6">
                <label class="font-semibold" for="invoice">Данни за фактура</label>
                <textarea name="invoice" class="border rounded px-2 py-1 mb-4 w-full" id="invoice" cols="30"
                          rows="2"></textarea>
            </div>
            <div>
                <hr class="my-4">
                <p>Попълнете като примера: BG18 786545 I-за едното ухо, BG18 786545 II-за второто ухо;</p>
                <button type="button"
                        id="js-add-new-row-button"
                        class="inline-block uppercase rounded bg-main-green font-bold text-[#fff] px-6 text-sm py-1 my-4">
                    + Добавяне на ред
                </button>
                <table class="border-spacing-0.5 text-center w-full" id="formlazer">
                    <thead>
                    <tr>
                        <th>BG код</th>
                        <th>Номер на марка</th>
                        <th>Римска цифра - пор.№ на заместваща марка</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border"><input type="text" name="field1[]" class="w-full"/></td>
                        <td class="border"><input type="text" name="field2[]" class="w-full"/></td>
                        <td class="border"><input type="text" name="field3[]" class="w-full"/></td>
                    </tr>
                    <tr>
                        <td class="border"><input type="text" name="field1[]" class="w-full"/></td>
                        <td class="border"><input type="text" name="field2[]" class="w-full"/></td>
                        <td class="border"><input type="text" name="field3[]" class="w-full"/></td>
                    </tr>
                    <tr>
                        <td class="border"><input type="text" name="field1[]" class="w-full"/></td>
                        <td class="border"><input type="text" name="field2[]" class="w-full"/></td>
                        <td class="border"><input type="text" name="field3[]" class="w-full"/></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="mt-10 flex">
                <input type="checkbox" id="deklariram" class="mr-4g" name="confirm_policy" checked>
                <label for="deklariram" class="font-bold"> Декларирам,че заявката е съгласувана с участъковия ветеринарен лекар и отдел
                    Идентификация в ОДБХ.</label>
            </div>
            <div class="text-center">
                <p class="font-bold"><span class="font-light">Дата:</span> {{date('H:i d.m.Y')}}</p>
            </div>
            <div class="my-6 text-center">
                <button
                    class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 text-xl py-1 my-4">
                    Изпрати
                </button>
                <p>Срок за доставка до 3 работни дни. Цена за 1ухо - 2.88лв.с ДДС</p>
            </div>
        </form>
    </div>

    <script>
        window.addEventListener('load', function () {
            var addNewButton = document.getElementById('js-add-new-row-button');

            function addNewTableRowHandler() {
                var tableBodyLastTr = document.querySelector('table#formlazer tbody tr:last-child');
                tableBodyLastTr.insertAdjacentHTML('afterend', '<tr><td class="border"><input name="field1[]" class="w-full" type="text" /></td><td class="border"><input name="field2[]" class="w-full" type="text" /></td><td class="border"><input name="field3[]" class="w-full" type="text" /></td></tr>')
            }

            addNewButton.addEventListener('click', addNewTableRowHandler);
        });
    </script>
@endsection
