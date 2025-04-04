<style>
    .border {
        border: 2px solid black;
    }
    * {
        font-weight: bold!important;
    }
</style>
<h1 class="text-center text-xl font-bold uppercase my-3">ЗАЯВКА ЗА ЛАЗЕРНО НАДПИСВАНЕ НА МАРКИ</h1>
<h3 class="text-center text-md font-bold uppercase my-3">
    до Соломон-София ЕООД, София 1202, България, ул. Княз Борис | 196, магазин 1, тел.: 089 981 17 58,
    Email: solomonsofia@abv.bg, www.solomonsofia.com
</h3>
<ul>
    <li>Област: <strong>{{$data['odbh']}}</strong></li>
    <li>Име и фамилия на ветеринарния лекар: <strong>{{$data['vet']}}</strong></li>
    <li>Тел. на ветеринарния лекар: <strong>{{$data['vet_tel']}}</strong></li>
    <li>№ на животновъдния обект: <strong>{{$data['no']}}</strong></li>
    <li>Населено място: <strong>{{$data['city']}}</strong></li>
    <li>Три имена на собственика: <strong>{{$data['names']}}</strong></li>
    <li>ЕГН/Булстат: <strong>{{$data['egn']}}</strong></li>
    <li>Адрес за доставка: <strong>{{$data['ekont']}}</strong></li>
    <li>Имейл: <strong>{{$data['mail']}}</strong></li>
    <li>Телефон за контакт: <strong>{{$data['client_mobile']}}</strong></li>
    <li>Данни за фактура: <strong>{{$data['invoice'] ?? 'Не са посочени'}}</strong></li>
    <li>Модел на марка: <strong>{{$data['marka_model'] ?? 'Не е посочено'}}</strong></li>
    <table style="text-align: center">
        <thead>
        <tr>
            <th>Код</th>
            <th>Номер на марка</th>
            <th>Римска цифра - пор.№ на заместваща марка</th>
        </tr>
        </thead>
        <tbody>
        @foreach(json_decode($data->field1) as $key => $f1)
            @if (is_null($f1))
                @continue
            @endif
            <tr class="border">
                <td class="border">{{json_decode($data['field1'])[$key]}}</td>
                <td class="border">{{json_decode($data['field2'])[$key]}}</td>
                <td class="border">{{json_decode($data['field3'])[$key]}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br/>
    <p class="my-2">Дата на запознаване и съгласие с Условията за защита на личните данни <strong>{{date("Y-m-d H:i:s", strtotime('+3 hours'))}}</strong></p>
    <p class="my-2">Дата: <strong>{{date("Y-m-d H:i:s", strtotime('+3 hours'))}}</strong></p>
    <p class="my-2">Декларирам,че заявката е съгласувана с участъковия ветеринарен лекар и отдел Идентификация в ОДБХ.</p>
</ul>
