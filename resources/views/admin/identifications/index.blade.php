@extends('welcome')

@section('title', 'Админ Панел | Идентификатор')

@section('body')
    <div class="container">
        <a href="{{route('app_admin')}}"
           class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Назад
        </a>
        <div class="mb-3">
            <h1 class="font-bold text-2xl mb-4">Добавяне на Идентификатор</h1>
            <form
                    action="{{ isset($identificator)
        ? route('identification.update', $identificator->id)
        : route('identification.store') }}"
                    method="POST"
            >
                @csrf

                @if(isset($identificator))
                    @method('PUT')
                @endif
                <div class="flex items-center gap-4" style="gap: 20px">
                    @php
                        $inputClass = "border border-black w-full rounded p-3";
                    @endphp

                    <div class="flex-1" style="flex: 1">
                        <label class="mb-1 font-semibold inline-block" for="name">
                            Идентификатор:
                        </label>

                        <input
                                class="{{ $inputClass }}"
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $identificator->name ?? '') }}"
                                required
                        />

                        @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1" style="flex: 1">
                        <label class="mb-1 font-semibold inline-block" for="model">
                            Модел:
                        </label>

                        <input
                                class="{{ $inputClass }}"
                                type="text"
                                name="model"
                                id="model"
                                value="{{ old('model', $identificator->model ?? '') }}"
                                required
                        />

                        @error('model')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                @if(isset($identificator))
                    <button class="bg-main-green font-semibold py-2 px-4 rounded-full mt-3" type="submit">
                        <span>Редактирай</span>
                    </button>
                    <a href="{{ route('identification.index') }}"
                       class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-full mt-3"
                       type="submit">
                        <span>Добави нов</span>
                    </a>
                @else
                    <button class="bg-main-green font-semibold py-2 px-4 rounded-full mt-3" type="submit">
                        <span>Запиши</span>
                    </button>
                @endif
            </form>
        </div>
        <!-- search -->
        <div>
            <form method="GET" action="{{ url()->current() }}" class="mb-4">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                    <input
                            type="text"
                            name="name"
                            value="{{ request('name') }}"
                            placeholder="Идентификатор"
                            class="border rounded px-3 py-2"
                    />

                    <input
                            type="text"
                            name="model"
                            value="{{ request('model') }}"
                            placeholder="МОДЕЛ"
                            class="border rounded px-3 py-2"
                    />
                </div>

                <div class="mt-3">
                    <button type="submit" class="inline-block bg-main-green font-semibold py-2 px-4 rounded-full">
                        Търси
                    </button>
                    <a href="{{ url()->current() }}" class="ml-2 text-gray-600 hover:underline">
                        Нулирай
                    </a>
                </div>
            </form>

        </div>
        <!-- end of search -->
        <div class="mb-6">
            <form action="{{ route('spravka.babh') }}" method="post">
                {!! $identifications->links() !!}
                @csrf
                <h1 class="font-bold text-2xl mb-4">Идентификатори</h1>
                <button class="bg-main-green font-semibold py-2 px-4 rounded-full mt-3"
                        id="create_babh"
                        type="submit">
                    <span>Създaване на справка (БАБХ)</span>
                </button>
                <table class="min-w-full text-center">
                    <thead>
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">

                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                            #
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                            Идентификатор
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                            Модел
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                            Добавен на
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($identifications as $identification)
                        <tr class="hover:bg-gray-200">
                            <td class="border-b border-gray-800 py-1">
                                <input type="checkbox" id="identificator_{{ $identification->id }}"
                                       name="identificator_ids[]"
                                       value="{{ $identification->id }}"/>
                                <input type="number" id="identificator_id_quantity[{{ $identification->id }}]"
                                       name="identificator_id_quantity[{{ $identification->id }}]" value="1" min="1"
                                       class="p-1 border text-center" style="display: none!important;width:40px;"/>
                            </td>
                            <td class="border-b border-gray-800 py-1">
                                {{$identification->id}}
                            </td>
                            <td class="border-b border-gray-800 py-1">
                                {{$identification->name}}
                            </td>
                            <td class="border-b border-gray-800 py-1">
                                {{$identification->model}}
                            </td>
                            <td class="border-b border-gray-800 py-1">
                                {{$identification->created_at?->format('d.m.Y H:i')}}
                            </td>
                            <td class="border-b border-gray-800 py-1">
                                <a class="font-semibold text-green-500"
                                   href="{{ url()->current() . '?edit=true&identificatorID=' . $identification->id }}">Редактиране</a>
                                <a onclick="return window.confirm('Сигурни ли сте, че искате да изтриете този запис?');"
                                   class="font-semibold text-red-500"
                                   href="{{ route('identification.delete', $identification) }}">Изтриване</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $identifications->links() !!}
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const checkboxes = document.querySelectorAll('input[name="identificator_ids[]"]');
            const button = document.getElementById('create_babh');

            checkboxes.forEach(function (checkbox) {

                toggleQuantity(checkbox);

                checkbox.addEventListener('change', function () {
                    toggleQuantity(checkbox);
                    toggleButton();
                });
            });

            toggleButton(); // run on page load

            function toggleQuantity(checkbox) {
                const id = checkbox.value;

                const quantityInput = document.querySelector(
                    `input[name="identificator_id_quantity[${id}]"]`
                );

                if (!quantityInput) return;

                quantityInput.disabled = !checkbox.checked;
            }

            function toggleButton() {
                const checkedCount = document.querySelectorAll(
                    'input[name="identificator_ids[]"]:checked'
                ).length;

                if (checkedCount === 0) {
                    button.classList.add('opacity-50', 'pointer-events-none');
                } else {
                    button.classList.remove('opacity-50', 'pointer-events-none');
                }
            }

        });
    </script>

@endsection
