@extends('welcome')

@section('title', 'Админ Панел | Редакция на страница ' . $page->title)

@section('body')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <div class="container min-h-[100vh]">
        <a href="{{route('app_admin_pages')}}"
           class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Назад
        </a>
        <h1 class="font-bold text-2xl mb-4">Редакция на <strong><em>{{$page->title}}</em></strong></h1>
        <form action="{{route('app_admin_page_update', ['id' => $page->id])}}" method="post">
            @csrf
            <textarea name="page_content" rows="20"
                      class="border w-full rounded p-3">{{$page->contents?->content ?? ''}}</textarea>
            <br/>
            <div @if ($page->id != 9) style="visibility: hidden" @endif>
                <input id="is_active" name="is_active" type="checkbox" @checked($page->contents?->is_active) />
                <label for="is_active">Активна?</label>
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
