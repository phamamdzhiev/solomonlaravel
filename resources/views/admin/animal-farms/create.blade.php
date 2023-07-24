@extends('welcome')

@section('title', 'Админ Панел | Създаване нa Животновъдни обекти')

@section('body')
    <div class="container my-6">
        <h1 class="mb-6 text-center font-semibold text-xl">Добавяне на жив.обект</h1>
        <form action="{{ route('animal-farms.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-1" for="owner">Лице (Име, Егн (БУЛСТАТ) или/и Двете):</label>
                <input class="p-3" type="text" name="owner" required>
            </div>
            <div class="mb-3"><label class="block mb-1" for="farm_number">Жив. обект №:</label>
                <input class="p-3" type="text" name="farm_number" required></div>
            <div class="mb-3"><label class="block mb-1" for="region">Област:</label>
                <select name="region" class="p-3" id="region">
                    <option value="">Избери областен град</option>
                    @foreach (\App\Models\Region::all() as $region)
                        <option value="{{$region->name}}">{{$region->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3"><label class="block mb-1" for="city">Населено място:</label>
                <input class="p-3" type="text" name="city" required></div>
            <div class="mb-3">
                <label class="block mb-1" for="vet">Вет. лекар (Име, Егн или/и Двете):</label>
                <input class="p-3" type="text" name="vet" required>
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
