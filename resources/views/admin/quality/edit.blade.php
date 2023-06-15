@extends('welcome')

@section('title', 'Админ Панел | Редактиране на качесво')

@section('body')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <div class="container min-h-[100vh]">
        <a href="{{route('app_admin')}}"
           class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Назад
        </a>
        <h1 class="font-bold text-2xl mb-4">Редактиране на качесво</h1>
        <form action="{{route('admin-quality.update',$quality->id)}}" method="post" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="mb-1 font-semibold inline-block" for="title">Заглавие</label>
                <input class="border border-black w-full rounded p-3" type="text" value="{{$quality->title}}"
                       name="title" id="title" required/>
            </div>
            <div class="mb-3">
                <label class="mb-1 font-semibold inline-block" for="description">Описание (макс: 5000 символа)</label>
                <textarea class="border border-black w-full rounded p-3" name="description" id="description" rows="5"
                          required>{!! $quality->description !!}</textarea>
            </div>
            <div class="mb-3">
                <label class="mb-1 font-semibold inline-block" for="position">Позиция</label>
                <input class="border border-black w-full rounded p-3" type="number" value="{{$quality->position}}"
                       min="1" name="position" id="position"/>
            </div>
            <div class="mb-3">
                <label class="mb-1 font-semibold inline-block" for="image">Снимка</label>
                <input class="border border-black w-full rounded p-3" type="file" accept="image/*" name="image"
                       id="image"/>
            </div>
            @isset($quality->image)
                <img width="150" src="{{asset('storage/qualities/' . $quality->image)}}"
                     alt="{{$quality->title}}">
            @endisset
            <button class="bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full mt-3" type="submit">
                Запис
            </button>
        </form>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
