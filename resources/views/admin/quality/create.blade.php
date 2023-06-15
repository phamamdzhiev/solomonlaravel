@extends('welcome')

@section('title', 'Админ Панел | Добавяне на качесво')

@section('body')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <div class="container min-h-[100vh]">
        <a href="{{route('app_admin_pages')}}"
           class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Назад
        </a>
        <h1 class="font-bold text-2xl mb-4">Добавяне на качесво</h1>
        <form action="{{route('admin-quality.store')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="mb-3">
                <label class="mb-1 font-semibold inline-block" for="title">Заглавие</label>
                <input class="border border-black w-full rounded p-3" type="text" name="title" id="title" required/>
            </div>
            <div class="mb-3">
                <label class="mb-1 font-semibold inline-block" for="description">Описание (макс: 5000 символа)</label>
                <textarea class="border border-black w-full rounded p-3" name="description" id="description" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label class="mb-1 font-semibold inline-block" for="position">Позиция</label>
                <input class="border border-black w-full rounded p-3" type="number" min="1" name="position" id="position" />
            </div>
            <div class="mb-3">
                <label class="mb-1 font-semibold inline-block" for="image">Снимка</label>
                <input class="border border-black w-full rounded p-3" type="file" accept="image/*" name="image" id="image" required />
            </div>
            <button class="bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full mt-3" type="submit">
                Запис
            </button>
        </form>
    </div>
    <script>
        CKEDITOR.replace('page_content');
    </script>
@endsection
