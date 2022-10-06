@extends('welcome')

@section('title', 'ЗАЯВКА ЗА СРЕДСТВА ЗА ПЪРВОНАЧАЛНА ИДЕНТИФИКАЦИЯ')

@section('body')
    <style>
        label {
            display: block;
        }
        input,select,textarea {
            border: 2px solid black;
            border-radius: 6px;
        }
    </style>
    <div class="container" style="max-width: 1000px; margin: 2rem auto">
        <form action="/" method="post">
            <div>
                <label for="vet">*Име, фамилия на ветеринарния лекар</label>
                <input type="text" id="vet" name="vet" required>
            </div>
            <div>
                <label for="odbh">*ОДБХ</label>
                <input type="text" id="odbh" name="odbh" required>
            </div>
            <div>
                <label for="obshtina">*Община</label>
                <input type="text" id="obshtina" name="obshtina" required>
            </div>
            <div>
                <label for="tel">*Тел.</label>
                <input type="text" id="tel" name="tel" required>
            </div>
            <div>
                <label for="email">*E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            {{--        1--}}
            <div>
                <label for="number_br">*Брой комплекти</label>
                <input type="number" min="1" id="number_br" name="number_br" required>
            </div>
            <div>
                <label for="animal">*Вид животни</label>
                <select id="animal" name="animal">
                    <option selected>Избери</option>
                    <option value="ЕПЖ">ЕПЖ</option>
                    <option value="ДПЖ">ДПЖ</option>
                    <option value="ДПЖ (за клане)">ДПЖ (за клане)</option>
                    <option value="СВ зелени">СВ зелени</option>
                </select>
            </div>
            <div>
                <label for="no">*№ на животновъдния обект:</label>
                <input type="number" min="1" id="no" name="no" required>
            </div>
            <div>
                <label for="names">*Трите имена на собственика:</label>
                <input type="text" id="names" name="names" required>
            </div>
            <div>
                <label for="egn">*ЕГН на собственика:</label>
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
            {{--        2--}}
            <div>
                <label for="number_br1">*Брой комплекти</label>
                <input type="number" min="1" id="number_br1" name="number_br1" required>
            </div>
            <div>
                <label for="animal1">*Вид животни</label>
                <select id="animal1" name="animal1">
                    <option selected>Избери</option>
                    <option value="ЕПЖ">ЕПЖ</option>
                    <option value="ДПЖ">ДПЖ</option>
                    <option value="ДПЖ (за клане)">ДПЖ (за клане)</option>
                    <option value="СВ зелени">СВ зелени</option>
                </select>
            </div>
            <div>
                <label for="no1">*№ на животновъдния обект:</label>
                <input type="number" min="1" id="no1" name="no1" required>
            </div>
            <div>
                <label for="names1">*Трите имена на собственика:</label>
                <input type="text" id="names1" name="names1" required>
            </div>
            <div>
                <label for="egn1">*ЕГН на собственика:</label>
                <input type="text" id="egn1" name="egn1" required>
            </div>
            <div>
                <label for="mobile1">*Телефон за връзка:</label>
                <input type="text" id="mobile1" name="mobile1" required>
            </div>
            <div>
                <label for="ekont1">*Офис на Еконт или адрес за доставка</label>
                <textarea name="ekont1" id="ekont1" cols="30" rows="3" required></textarea>
            </div>
            <div>
                <label for="invoice1">Данни за фактура</label>
                <textarea name="invoice1" id="invoice1" cols="30" rows="3"></textarea>
            </div>
            {{--        3--}}
            <div>
                <label for="number_br2">*Брой комплекти</label>
                <input type="number" min="1" id="number_br2" name="number_br2" required>
            </div>
            <div>
                <label for="animal2">*Вид животни</label>
                <select id="animal2" name="animal2">
                    <option selected>Избери</option>
                    <option value="ЕПЖ">ЕПЖ</option>
                    <option value="ДПЖ">ДПЖ</option>
                    <option value="ДПЖ (за клане)">ДПЖ (за клане)</option>
                    <option value="СВ зелени">СВ зелени</option>
                </select>
            </div>
            <div>
                <label for="no2">*№ на животновъдния обект:</label>
                <input type="number" min="1" id="no2" name="no2" required>
            </div>
            <div>
                <label for="names2">*Трите имена на собственика:</label>
                <input type="text" id="names2" name="names2" required>
            </div>
            <div>
                <label for="egn2">*ЕГН на собственика:</label>
                <input type="text" id="egn2" name="egn2" required>
            </div>
            <div>
                <label for="mobile2">*Телефон за връзка:</label>
                <input type="text" id="mobile2" name="mobile2" required>
            </div>
            <div>
                <label for="ekont2">*Офис на Еконт или адрес за доставка</label>
                <textarea name="ekont2" id="ekont2" cols="30" rows="3" required></textarea>
            </div>
            <div>
                <label for="invoice2">Данни за фактура</label>
                <textarea name="invoice2" id="invoice2" cols="30" rows="3"></textarea>
            </div>
        </form>
    </div>
@endsection
