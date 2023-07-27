@extends('welcome')

@section('title', 'Админ Панел | Създаване нa имейл (регион)')

@section('body')
    <div class="container my-6">
        <h1 class="mb-6 text-center font-semibold text-xl">Добавяне на имейл</h1>
        @if($errors->any())
            {{ $errors->first() }}
        @endif
        <form action="{{ route('region-email.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-1" for="owner">Имейл:</label>
                <input class="p-3" type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3"><label class="block mb-1" for="region">Област:</label>
                <select name="region_id" class="p-3" id="region">
                    <option value="">Избери областен град</option>
                    @foreach (\App\Models\Region::all() as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Запиши
            </button>
            <a href="{{ route('region-email.index') }}"
                class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Назад
            </a>
        </form>
    </div>
@endsection
