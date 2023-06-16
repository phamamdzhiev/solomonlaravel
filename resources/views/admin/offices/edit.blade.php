@extends('welcome')

@section('body')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <div class="container min-h-[100vh] py-3">
        <h1 class="text-black-50 text-center">Редактиране на офис</h1>
        <form action="{{route('office.update', $office->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                {!! Form::label('map', 'Карта:*') !!}
                {{Form::textarea('map', $office->map, ['class' => 'border w-full rounded p-3', 'required' => true])}}
            </div>
            {{--                {!! Form::open(['action' => 'office.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}--}}
            <div class="mb-3">
                {!! Form::label('description', 'Текст към офиса') !!}
                {{Form::textarea('description', $office->description, ['class' => 'border w-full rounded p-3', 'id' => 'office_desc'])}}
            </div>
            <div class="mb-3">
                {!! Form::label('position', 'Позиция:') !!}
                {{Form::number('position', $office->position, ['min'=> 1, 'class' => 'border w-full rounded p-3'])}}
            </div>
            <div class="mb-3">
                {!! Form::label('image', 'Снимка:') !!}
                {{Form::file('image', null, ['class' => 'border w-full rounded p-3'])}}
            </div>
            {{Form::submit('Запиши',['class' => 'bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full mt-3'] )}}
        </form>
        @isset($office->image)
            <div class="my-5">
                <img width="500" src="{{asset('storage/assets/office/' . $office->image)}}" alt="Office Image">
            </div>
            <form method="post" class="my-4" action="{{route('office.delete.image', ['id' => $office->id])}}">
                @method('DELETE')
                {!! Form::submit('Изтрии снимката', ['class'=>'bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full mt-3', 'onclick'=> 'return confirm(\'Наистина ли искате да изтриете този снимка?\')']) !!}
                @csrf
            </form>
        @endisset
        <a href="{{route('office.index')}}" class="bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full mt-3">Назад</a>
    </div>

    <script>
        CKEDITOR.replace('office_desc');
    </script>
@endsection

