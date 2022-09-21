@extends('welcome')

@section('body')
    @if ($errors->any())
        <div>
            <div class="font-medium text-red-600">
                {{ __('Whoops! Something went wrong.') }}
            </div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('app_login_post')}}" method="post">
        @csrf
        <label for="">Email</label>
        <input type="text" name="email">
        <label for="">Pass</label>
        <input type="password" name="password">
        <button type="submit">Login!</button>
    </form>
@endsection
