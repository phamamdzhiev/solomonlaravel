<style>
    .border {
        border: 2px solid black;
    }
</style>
<h1>НОВА ЗАЯВКА ЗА ЛАЗЕРНО НАДПИСВАНЕ</h1>
<ul>
    <li>ОДБХ: <strong>{{$data['odbh']}}</strong></li>
    <li>Община: <strong>{{$data['obshtina']}}</strong></li>
    <li>Име и фамилия на ветеринарния лекар: <strong>{{$data['vet']}}</strong></li>
    <li>Тел. на ветеринарния лекар: <strong>{{$data['vet-tel']}}</strong></li>
    <li>№ на животновъдния обект: <strong>{{$data['no']}}</strong></li>
    <li>Населено място: <strong>{{$data['city']}}</strong></li>
    <li>Три имена на собственика: <strong>{{$data['names']}}</strong></li>
    <li>ЕГН: <strong>{{$data['egn']}}</strong></li>
    <li>Адрес за доставка: <strong>{{$data['ekont']}}</strong></li>
    <li>Имейл: <strong>{{$data['mail']}}</strong></li>
    <li>Телефон: <strong>{{$data['client_mobile']}}</strong></li>
    <li>Данни за фактура: <strong>{{$data['invoice'] ?? 'Не са посочени'}}</strong></li>
    <table style="text-align: center">
        <thead>
        <tr>
            <th>BG код</th>
            <th>Номер на марка</th>
            <th>Римска цифра - пор.№ на заместваща марка</th>
        </tr>
        </thead>
        <tbody>
        <tr class="border">
            @foreach($data['field1'] as $f1)
                <td class="border">{{$f1}}</td>
            @endforeach
        </tr>
        <tr class="border">
            @foreach($data['field2'] as $f2)
                <td class="border">{{$f2}}</td>
            @endforeach
        </tr>
        <tr class="border">

            @foreach($data['field3'] as $f3)
                <td class="border">{{$f3}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>
</ul>
