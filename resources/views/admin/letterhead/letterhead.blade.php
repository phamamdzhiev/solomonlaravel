<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: DejaVu Sans, serif;
        }

        .small {
            font-size: 10px;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 10px;
            text-align: center;
        }

        td {
            font-weight: bold;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>

<body>
<div>
    <p class="small">Образец ЗХОЖКФ – 182 / Утвърден със Заповед № РД 11-1240 / 19.11.2013 г. на изпълнителния директор
        на БАБХ</p>
    <h5 style="text-align: right">ДО <br/> ДИРЕКТОРА НА ОДБХ <br/> ГР. СОФИЯ</h5>
</div>
<div>
    <h5 style="text-align: center; margin-bottom: 5px;">СПРАВКА Изх.№ {{ \Illuminate\Support\Str::random(6) }}</h5>
    <div style="font-size: 11px">
        <p>по чл. 13, ал. 2 от Наредба № 6 от 8 октомври 2013 г. за изискванията към средствата за официална
            идентификация
            на животните и използването им, условията, реда и контрола по събиране, въвеждане, поддържане използване на
            информацията в Интегрираната информационна система на Българската агенция по безопасност на храните за
            наличните
            средства за идентификация.
        </p>
        <p style="font-weight: bold">
            От д-р Тодор Владимиров Синабов ЕГН 7007245409, управител на Соломон-София ЕООД, гр.София 1202 ул.Княз Борис
            I
            №196, ЕИК BG200056136, Тел.0899811358, Електронна поща solomonsofia@abv.bg
        </p>

        <div style="text-align: center">
            <h4 style="font-size: 14px; font-weight: bold; margin-bottom: 5px">
                УВАЖАЕМИ ГОСПОДИН/ЖО ДИРЕКТОР,
            </h4>
            <p style="font-size: 10px;">Приложено Ви предоставям данни за доставените средства за официална
                идентификация на животните в табличен вид:</p>
        </div>
    </div>
</div>
<div>
    <table>
        <tr>
            <td>№ по ред</td>
            <td>Лице на което са доставени средствата за официална идентификация, ЕГН (за собственици или посочени от
                тях ветеринарни лекари, ветеринарни техници или развъдни организации по чл. 8 от Закона за
                животновъдството)
            </td>
            <td>№ на животно-въдния обект</td>
            <td>Име и фамилия, ЕГН на ветеринарния лекар, който въвежда данните в Интегрираната информационна система на
                БАБХ
            </td>
            <td>От №</td>
            <td>До №</td>
            <td>Брой</td>
            <td>Дата на доставяне</td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
        </tr>

    </table>
    <p style="font-style: italic; font-size: 9px; margin-bottom: 0; text-align: right">Забележка: 1. Справката се подава
        в електронен формат в срок от 2
        работни дни от доставянето на средствата за официална идентификация;</p>
    <p style="font-style: italic; font-size: 9px; margin-bottom: 0; text-align: right">2. Информацията по колона 3 и 4
        не се попълва в случаите на доставени
        идентификационни средства за домашни любимци.</p>
</div>
<div class="clearfix" style="font-size: 12px; margin-top: 25px">
    <div style="float: left">
        <p>гр. София ???</p>
        <p>Дата: <span style="font-weight: bold">{{  \Illuminate\Support\Carbon::today()->format('d.m.Y') }}</span></p>
    </div>
    <div style="float: right">
        <div style="position: relative; z-index: 1">
            <div style="position: relative; z-index: 1">
                <p>С уважение <span style="opacity: 0">.............................</span></p>
                <p style="font-size: 9px">(подпис и печат)</p>
            </div>
            <img
                style="display: block; position: absolute; top:-15px; right: 5px; z-index: -1"
                width="120" src="{{public_path('/storage/pechat.png')}}" alt=""/>
        </div>
    </div>
</div>
<p style="font-size: 11px; font-weight: bold; margin-top: 25px">ВАЖНО:Обхвата се намира на склад за търговия на едро с ВМП Соломон-София
    ЕООД номер 90 ВетИС</p>
</body>
</html>
