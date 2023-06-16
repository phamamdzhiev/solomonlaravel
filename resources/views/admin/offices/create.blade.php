@extends('welcome')

@section('body')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <div class="container min-h-[100vh]">
        <h1 class="text-black-50 text-center">Добавяне на офис</h1>
        <form action="{{route('office.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                {!! Form::label('map', 'Карта:*') !!}
                {{Form::textarea('map', null, ['class' => 'border w-full rounded p-3', 'required' => true])}}
            </div>
            {{--                {!! Form::open(['action' => 'office.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}--}}
            <div class="mb-3">
                {!! Form::label('description', 'Текст към офиса') !!}
                {{Form::textarea('description', null, ['class' => 'border w-full rounded p-3', 'id' => 'office_desc'])}}
            </div>
            <div class="mb-3">
                {!! Form::label('position', 'Позиция:') !!}
                {{Form::number('position', null, ['min'=> 1, 'class' => 'border w-full rounded p-3'])}}
            </div>
            <div class="mb-3">
                {!! Form::label('image', 'Снимка:') !!}
                {{Form::file('image', null, ['class' => 'border w-full rounded p-3'])}}
            </div>
            {{Form::submit('Запиши',['class' => 'bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full mt-3'] )}}
            {{--        {!! Form::close() !!}--}}
        </form>
        <br>
        <a href="{{route('office.index')}}" class="bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full mt-3">Назад</a>
    </div>
    <script>
        CKEDITOR.replace('office_desc');
    </script>
@endsection

