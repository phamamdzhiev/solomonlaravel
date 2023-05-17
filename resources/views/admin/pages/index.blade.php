@extends('welcome')

@section('title', 'Админ Панел | Редакция на страници')

@section('body')
    <div class="container">
        <div class="min-h-[100vh]">
            <a href="{{route('app_admin')}}"
               class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Назад
            </a>
            <h1 class="font-bold text-2xl mb-4">Страници</h1>
            <table class="min-w-full text-center">
                <thead>
                <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                        #
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                        Страница
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td class="border-b">
                            {{$page->id}}
                        </td>
                        <td class="border-b">
                            {{$page->title}}
                        </td>
                        <td class="border-b">
                            <a href="{{route('app_admin_page_edit', ['id' => $page->id])}}">Редактиране</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
