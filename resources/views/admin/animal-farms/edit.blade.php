@extends('welcome')

@section('title', 'Админ Панел | Създаване нa Животновъдни обекти')

@section('body')
    <div class="container my-6">
        <h1 class="mb-6 text-center font-semibold text-xl">Редактиране на жив.обект</h1>
        <form action="{{ route('animal-farms.update', $animalFarm) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block mb-1" for="owner">Лице (Име, Егн (БУЛСТАТ) или/и Двете):</label>
                <input class="p-3" type="text" name="owner" value="{{$animalFarm->owner}}" required>
            </div>
            <div class="mb-3"><label class="block mb-1" for="farm_number">Жив. обект №:</label>
                <input class="p-3" type="text" name="farm_number" value="{{$animalFarm->farm_number}}" required></div>
            <div class="mb-3"><label class="block mb-1" for="region">Област:</label>
                <select name="region" class="p-3" id="region">
                    <option @selected($animalFarm->region === 'Благоевград') value="Благоевград">Благоевград</option>
                    <option @selected($animalFarm->region === 'Бургас') value="Бургас">Бургас</option>
                    <option @selected($animalFarm->region === 'Варна') value="Варна">Варна</option>
                    <option @selected($animalFarm->region === 'Велико Търново') value="Велико Търново">Велико Търново
                    </option>
                    <option @selected($animalFarm->region === 'Видин') value="Видин">Видин</option>
                    <option @selected($animalFarm->region === 'Враца') value="Враца">Враца</option>
                    <option @selected($animalFarm->region === 'Габрово') value="Габрово">Габрово</option>
                    <option @selected($animalFarm->region === 'Добрич') value="Добрич">Добрич</option>
                    <option @selected($animalFarm->region === 'Кърджали') value="Кърджали">Кърджали</option>
                    <option @selected($animalFarm->region === 'Кюстендил') value="Кюстендил">Кюстендил</option>
                    <option @selected($animalFarm->region === 'Ловеч') value="Ловеч">Ловеч</option>
                    <option @selected($animalFarm->region === 'Монтана') value="Монтана">Монтана</option>
                    <option @selected($animalFarm->region === 'Пазарджик') value="Пазарджик">Пазарджик</option>
                    <option @selected($animalFarm->region === 'Перник') value="Перник">Перник</option>
                    <option @selected($animalFarm->region === 'Плевен') value="Плевен">Плевен</option>
                    <option @selected($animalFarm->region === 'Пловдив') value="Пловдив">Пловдив</option>
                    <option @selected($animalFarm->region === 'Разград') value="Разград">Разград</option>
                    <option @selected($animalFarm->region === 'Русе') value="Русе">Русе</option>
                    <option @selected($animalFarm->region === 'Силистра') value="Силистра">Силистра</option>
                    <option @selected($animalFarm->region === 'Сливен') value="Сливен">Сливен</option>
                    <option @selected($animalFarm->region === 'Смолян') value="Смолян">Смолян</option>
                    <option @selected($animalFarm->region === 'София') value="София">София</option>
                    <option @selected($animalFarm->region === 'Стара Загора') value="Стара Загора">Стара Загора</option>
                    <option @selected($animalFarm->region === 'Търговище') value="Търговище">Търговище</option>
                    <option @selected($animalFarm->region === 'Хасково') value="Хасково">Хасково</option>
                    <option @selected($animalFarm->region === 'Шумен') value="Шумен">Шумен</option>
                    <option @selected($animalFarm->region === 'Ямбол') value="Ямбол">Ямбол</option>
                </select>
            </div>
            <div class="mb-3"><label class="block mb-1" for="city">Населено място:</label>
                <input class="p-3" type="text" name="city" value="{{$animalFarm->city}}" required></div>
            <div class="mb-3">
                <label class="block mb-1" for="vet">Вет. лекар (Име, Егн или/и Двете):</label>
                <input class="p-3" type="text" name="vet" value="{{$animalFarm->vet}}" required>
            </div>
            <button type="submit" class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Запиши
            </button>
            <a href="{{route('animal-farms.index')}}"
               class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Назад
            </a>
        </form>
    </div>
@endsection
