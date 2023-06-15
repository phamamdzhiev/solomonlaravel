@extends('welcome')

@section('title', 'Админ Панел | стр. "Качество"')

@section('body')
    <div class="container">
        <a href="{{route('app_admin')}}"
           class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Назад
        </a>
        <a href="{{route('admin-quality.create')}}"
           class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Довави качество
        </a>
        <div class="mb-6">
            <h1 class="font-bold text-2xl mb-4">Страница "Качество"</h1>
            <table class="min-w-full text-center">
                <thead>
                <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                        Снимка
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                        Заглавие
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                        Позиция
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($qualities as $quality)
                    <tr class="hover:bg-gray-200">
                        <td class="border-b border-gray-800 py-1">
                            <img width="100" class="mx-auto" src="{{asset('storage/qualities/' . $quality->image)}}"
                                 alt="{{$quality->title}}">
                        </td>
                        <td class="border-b border-gray-800 py-1">
                            {{$quality->title}}
                        </td>
                        <td class="border-b border-gray-800 py-1">
                            {{$quality->position}}
                        </td>
                        <td class="border-b border-gray-800 py-1">
                            <a class="font-semibold text-green-500"
                               href="{{route('admin-quality.edit', $quality->id)}}">Редактиране</a>
                            <form onsubmit="return window.confirm('Сигурни ли сте, че искате да изтриете този запис?');"
                                  action="{{route('admin-quality.destroy',  $quality->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-semibold text-red-500">Изтриване</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
