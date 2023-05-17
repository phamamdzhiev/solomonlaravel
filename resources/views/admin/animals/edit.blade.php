@extends('welcome')

@section('title', 'Админ Панел | Редакция на страница ' . $animal->animal)

@section('body')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <div class="container min-h-[100vh]">
        <a href="{{route('app_admin_animals')}}"
           class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Назад
        </a>
        <h1 class="font-bold text-2xl mb-4">Редакция на <strong><em>{{$animal->animal}}</em></strong></h1>
        <form action="{{route('app_admin_animal_update', ['id' => $animal->id])}}" method="post">
            @csrf

            <label for="animal" class="mb-1 font-semibold inline-block">Вид на животното</label>
            <input type="text" class="border border-black w-full rounded p-3" id="animal" name="animal" value="{{$animal->animal}}" required/>

            <button class="bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full mt-3" type="submit">
                Запис
            </button>
        </form>
    </div>
    <script>
        CKEDITOR.replace('page_content');
    </script>
@endsection
