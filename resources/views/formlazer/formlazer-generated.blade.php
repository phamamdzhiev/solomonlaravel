@extends('welcome')

@section('title', 'Лазерно надписване на ушни марки')

@section('body')
    <style>
        header, footer {
            display: none;
        }

        input, textarea {
            background: transparent;
            pointer-events: none;
            display: block;
            font-weight: bold;
        }
        label {
            color: darkgreen;
        }
    </style>
    <div class="container my-6" style="max-width: 1100px; margin-left: auto; margin-right: auto">
        <form>
            @csrf
            <div>
                <div class=" mb-2 mt-4" style="width: 300px; margin-left: auto">
                    <label  for="odbh">ОДБХ*</label>
                    <input type="text" class="rounded pointer-events-none px-2" id="odbh" value="{{$data['odbh']}}"
                           name="odbh" readonly>
                </div>
                <div class="" style="width: 300px; margin-left: auto">
                    <label  for="obshtina">Община*</label>
                    <input type="text" class=" rounded px-2" id="obshtina" value="{{$data['obshtina']}}" name="obshtina"
                           readonly>
                </div>
            </div>
            <h1 class="text-center text-2xl font-bold uppercase my-6 text-[#fff] rounded bg-main-green-dark">Вашата
                поръчка е изпратена успешно!</h1>
            <h1 class="text-center text-xl font-bold uppercase my-6">ЗАЯВКА ЗА ЛАЗЕРНО НАДПИСВАНЕ НА МАРКИ</h1>
            <div class=" align-center">
                <div>
                    <label  for="vet">Име и фамилия на ветеринарния лекар*</label>
                    <input type="text" class=" rounded px-2" id="vet" value="{{$data['vet']}}" name="vet" readonly>
                </div>
                <div>
                    <label  for="vet-tel">Тел*</label>
                    <input type="text" class=" rounded px-2" name="vet-tel" value="{{$data['vet-tel']}}" readonly
                           id="vet-tel">
                </div>
            </div>
            <hr class="my-6">
            <div>
                <label  for="no">№ на животновъдния обект*</label>
                <input type="text" class=" rounded px-2" name="no" value="{{$data['no']}}" readonly id="no">
                <label  for="city">Населено място*</label>
                <input type="text" class=" rounded px-2" name="city" value="{{$data['city']}}" readonly id="city">
            </div>
            <div>
                <label  for="names">Три имена на собственика*</label>
                <input type="text" class=" rounded px-2" name="names" value="{{$data['names']}}" readonly id="names">
                <label  for="egn">ЕГН*</label>
                <input type="text" class=" rounded px-2" name="egn" value="{{$data['egn']}}" readonly id="egn">
            </div>
            <div class="">
                <label  for="ekont">Oфис на Еконт или адрес за доставка*</label>
                <textarea name="ekont" class=" rounded px-2 w-full" value="{{$data['ekont']}}" id="ekont" cols="30"
                          rows="2" readonly>{{$data['ekont']}}</textarea>
            </div>
            <div class="">
                <label  for="mail">Имейл*</label>
                <input type="email" class=" rounded px-2" value="{{$data['mail']}}" id="mail">
                <label  for="client_mobile">Телефон*</label>
                <input type="text" class=" rounded px-2" value="{{$data['client_mobile']}}" name="client_mobile"
                       readonly id="client_mobile">
            </div>
            <div class="">
                <label  for="invoice">Данни за фактура*</label>
                <textarea name="invoice" class=" rounded px-2 w-full" id="invoice" readonly cols="30"
                          rows="2">{{$data['invoice']}}</textarea>
            </div>
            <div>
                <p>Попълнете като примера: BG18 786545 I-за едното ухо, BG18 786545 II-за второто ухо;</p>
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
                    <tr class="border">
                        @foreach($data['field1'] as $f1)
                            <td class=""><input readonly value="{{$f1}}" type="text" class="w-full text-center"/></td>
                        @endforeach
                    </tr>
                    <tr class="border">
                        @foreach($data['field2'] as $f2)
                            <td class=""><input readonly value="{{$f2}}" type="text" class="w-full text-center"/></td>
                        @endforeach
                    </tr>
                    <tr class="border">

                        @foreach($data['field3'] as $f3)
                            <td class=""><input readonly value="{{$f3}}" type="text" class="w-full text-center"/></td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="my-6 text-center">
                <button
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
