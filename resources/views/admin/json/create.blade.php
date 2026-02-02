@extends('welcome')

@section('title', 'Админ Панел | Създаване Марка и Модел')

@section('body')
    <div class="container py-6">
        <h1 class="font-bold text-2xl mb-4"> Създаване Марка и Модел</h1>
        <a class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full" href="{{ route('app_admin') }}">НАЗАД</a>
        @php
            $isEdit = isset($item);
        @endphp

        <div class="grid grid-cols-2 gap-4">
            <form
                action="{{ $isEdit ? route('json.marka-model.update', $item['id']) : route('json.marka-model.post') }}"
                method="POST"
                class="max-w-xl space-y-4"
            >
                @csrf

                @if($isEdit)
                    @method('PUT')
                @endif

                {{-- Name --}}
                <div>
                    <label class="block font-semibold mb-1">
                        Име
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $item['name'] ?? '') }}"
                        class="w-full border rounded p-3"
                        required
                    >

                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Price --}}
                <div>
                    <label class="block font-semibold mb-1">
                        Цена (в евро)
                    </label>

                    <input
                        type="text"
                        name="price"
                        value="{{ old('price', $item['price'] ?? '') }}"
                        class="w-full border rounded p-3"
                        required
                    >

                    @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <div>
                    <button
                        type="submit"
                        class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full"
                    >
                        {{ $isEdit ? 'Редактирай' : 'Създай' }}
                    </button>
                </div>
            </form>
            <div class="p-4">
                <ul>
                    @foreach($items as $item)
                        <li style="padding: 5px 0; margin-bottom: 5px">
                            {{ $loop->index + 1 }}.
                            {{ $item['name'] }} - {{ $item['price'] }}

                            <a
                                href="{{ route('marka.destroy', $item['id']) }}"
                                style="color:red; margin-left:10px; font-weight:bold;"
                                onclick="return confirm('Изтрий този запис?')"
                            >
                                ✖
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
