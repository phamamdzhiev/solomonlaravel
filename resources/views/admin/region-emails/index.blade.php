@extends('welcome')

@section('title', 'Админ Панел | Регионални имейли')

@section('body')
    @if ($errors->any())
        <p class="p-3 text-center bg-red-500 rounded-md font-semibold text-xl text-white">{{ $errors->first() }}</p>
    @endif
    <div class="container">
        <a href="{{ route('app_admin') }}" class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Назад
        </a>
        <a href="{{ route('region-email.create') }}"
            class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Добавяне на нов
        </a>
        <div class="mb-6">
            <h1 class="font-bold text-2xl mb-4">Имейли на региони</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                Област
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                Имейл
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regionEmails as $mail)
                            <tr class="hover:bg-gray-200">
                                <td class="border-b border-gray-800 py-1">
                                    {{ $mail->region->name }}
                                </td>
                                <td class="border-b border-gray-800 py-1">
                                    {{ $mail->email }}
                                </td>
                                <td class="border-b border-gray-800 py-1">
                                    <a class="font-semibold text-green-500"
                                        href="{{ route('region-email.edit', $mail->id) }}">Редактиране</a>
                                    <br />
                                    <form
                                        onsubmit="return window.confirm('Сигурни ли сте, че искате да изтриете този запис?');"
                                        action="{{ route('region-email.destroy', $mail->id) }}" method="post">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-semibold text-red-500">
                                            Изтриване
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
