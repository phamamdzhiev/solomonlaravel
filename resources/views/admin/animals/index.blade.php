@extends('welcome')

@section('title', 'Админ Панел | Видове животни')

@section('body')
    <div class="container">
        <div class="min-h-[100vh]">
            <a href="{{route('app_admin')}}"
               class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Назад
            </a>
            <h1 class="font-bold text-2xl mb-4">Видове Животни</h1>
            <table class="min-w-full text-center">
                <thead>
                <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                        #
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                        Животно
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($animals as $animal)
                    <tr class="hover:bg-gray-200">
                        <td class="border-b border-gray-800 py-1">
                            {{$animal->id}}
                        </td>
                        <td class="border-b border-gray-800 py-1">
                            {{$animal->animal}}
                        </td>
                        <td class="border-b border-gray-800 py-1">
                            <a class="font-semibold text-green-500"
                               href="{{route('app_admin_animal_edit', ['id' => $animal->id])}}">Редактиране</a>
                            <form onsubmit="return window.confirm('Сигурни ли сте, че искате да изтриете този запис?');"
                                  action="{{route('app_admin_delete_update', ['id' => $animal->id])}}" method="post">
                                @csrf
                                <button type="submit" class="font-semibold text-red-500">Изтриване</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h1 class="font-bold text-2xl mb-4">Видове Животни</h1>
            <form action="">

            </form>
        </div>
    </div>
@endsection
