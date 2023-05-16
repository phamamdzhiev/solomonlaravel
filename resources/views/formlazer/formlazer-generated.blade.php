@extends('welcome')

@section('title', 'Лазерно надписване на ушни марки')

@section('body')
    <style>
        * {
            font-weight: bold !important;
        }

        input, textarea {
            background: transparent;
            pointer-events: none;
            display: block;
            font-weight: bold;
            width: 100%;
        }

        strong {
            text-decoration: underline;
        }

        label {
            color: darkgreen;
            text-decoration: underline;
        }

        tr, td, th {
            border: 2px solid black;
        }

        @media print {
            #print-btn,
            #message-success {
                display: none;
            }

            header, footer {
                display: none;
            }
        }
    </style>
    <div class="container my-3" style="max-width: 1100px; margin-left: auto; margin-right: auto">
        <form>
            @csrf
            <div>
                <div class=" mb-2 mt-4" style="width: 300px; margin-left: auto">
                    <label for="odbh">Област*</label>
                    <input type="text" class="rounded pointer-events-none px-2" id="odbh" value="{{$data->odbh}}"
                           name="odbh" readonly>
                </div>
            </div>
            <h1 class="text-center text-2xl font-bold uppercase my-3 text-[#fff] rounded bg-main-green-dark" id="message-success">Вашата
                поръчка е изпратена успешно!</h1>
            <h1 class="text-center text-xl font-bold uppercase my-3">ЗАЯВКА ЗА ЛАЗЕРНО НАДПИСВАНЕ НА МАРКИ</h1>
            <h3 class="text-center text-md font-bold uppercase my-3">
                до Соломон-София ЕООД, София 1202, България, ул. Княз Борис | 196, магазин 1, тел.: 089 981 17 58,
                Email: solomonsofia@abv.bg, www.solomonsofia.com
            </h3>
            <div class=" align-center">
                <div>
                    <label for="vet">Име и фамилия на ветеринарния лекар*</label>
                    <input type="text" class=" rounded px-2" id="vet" value="{{$data->vet}}" name="vet" readonly>
                </div>
                <div>
                    <label for="vet-tel">Тел*</label>
                    <input type="text" class=" rounded px-2" name="vet-tel" value="{{ $data->{'vet_tel'} }}" readonly
                           id="vet-tel">
                </div>
            </div>
            <hr class="my-3">
            <div style="display: grid; grid-template-columns: 1fr 1fr">
                <div>
                    <label for="no">№ на животновъдния обект*</label>
                    <input type="text" class=" rounded px-2" name="no" value="{{$data->no}}" readonly id="no">
                    <label for="city">Населено място*</label>
                    <input type="text" class=" rounded px-2" name="city" value="{{$data->city}}" readonly id="city">
                </div>
                <div>
                    <label for="names">Име на собственика или фирма*</label>
                    <input type="text" class=" rounded px-2" name="names" value="{{$data->names}}" readonly id="names">
                    <label for="egn">ЕГН*</label>
                    <input type="text" class=" rounded px-2" name="egn" value="{{$data->egn}}" readonly id="egn">
                </div>
                <div class="">
                    <label for="ekont">Oфис на Еконт или адрес за доставка*</label>
                    <textarea name="ekont" class=" rounded px-2 w-full" value="{{$data->ekont}}" id="ekont" cols="30"
                              rows="2" readonly>{{$data->client_mobile}}</textarea>
                </div>
                <div class="">
                    <label for="mail">Имейл на вет.лекар или фермера*</label>
                    <input type="email" class=" rounded px-2" value="{{$data->mail}}" id="mail">
                    <label for="client_mobile">Телефон*</label>
                    <input type="text" class=" rounded px-2" value="{{$data->client_mobile}}" name="client_mobile"
                           readonly id="client_mobile">
                </div>
                <div class="">
                    <label for="invoice">Данни за фактура*</label>
                    <textarea name="invoice" class=" rounded px-2 w-full" id="invoice" readonly cols="30"
                              rows="2">{{$data->invoice ?? '---'}}</textarea>
                </div>

            </div>
            <div>
                <p>Попълнете като примера: BG18 233455 I-за едното ухо, BG18 233455 II-за второто ухо;</p>
                <hr class="my-4">

                <table class="-spacing-0.5 text-center w-full" id="formlazer">
                    <thead>
                    <tr>
                        <th>BG код</th>
                        <th>Номер на марка</th>
                        <th>Римска цифра - пор.№ на заместваща марка</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(json_decode($data->field1) as $key => $f1)
                        @if (is_null($f1))
                            @continue
                        @endif
                        <tr>
                            <td class=""><input readonly value="{{json_decode($data['field1'])[$key]}}" type="text"
                                                class="w-full text-center"/></td>
                            <td class=""><input readonly value="{{json_decode($data['field2'])[$key]}}" type="text"
                                                class="w-full text-center"/>
                            </td>
                            <td class=""><input readonly value="{{json_decode($data['field3'])[$key]}}" type="text"
                                                class="w-full text-center"/>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p class="my-1">Дата на запознаване и съгласие с Условията за защита на личните данни
                    <strong>{{date("Y-m-d H:i:s", strtotime('+3 hours'))}}</strong></p>
                <p class="my-1">Дата: <strong>{{date("Y-m-d H:i:s", strtotime('+3 hours'))}}</strong></p>
                <p class="my-1">Декларирам,че заявката е съгласувана с участъковия ветеринарен лекар и отдел
                    Идентификация в ОДБХ.</p>
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
    </div>

    <script>

    </script>
@endsection
