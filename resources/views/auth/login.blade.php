@extends('welcome')

@section('body')
    @include('includes.flash-message')

    <div class="p-6 text-center min-h-[50vh] max-w-xl mx-auto">
        <form action="{{route('app_login_post')}}" method="post">
            @csrf
            <div class="mb-4">
                <label class="block font-bold text-left" for="email">Имейл:</label>
                <input type="text" class="w-full px-3 py-2 rounded border" name="email" id="email">
            </div>
            <div class="mb-6">
                <label class="block font-bold text-left" for="password">Парола:</label>
                <input type="password" class="w-full px-3 py-2 rounded border" name="password" id="password">
            </div>
            <div>
                <button type="submit"
                        class="bg-main-green-dark px-8 uppercase text-[#fff] font-bold py-2 block w-full rounded">Вход
                </button>
            </div>
        </form>
    </div>
@endsection
