@extends('welcome')

@section('body')
    <div class="container">
        <a href="{{route('app_admin')}}"
           class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Назад
        </a>
        <a href="{{route('office.create')}}"
           class="bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full mt-3">Добави нов офис</a>
        <h1 class="text-black-50 text-center">
            Списък с офиси
        </h1>
        @if ($offices->count() > 0)
            <div class="py-2 my-6 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-center">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Снимка</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Позиция</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offices as $office)
                            <tr>
                                <td>
                                    @isset($office->image)
                                        <img width="200" src="{{asset('storage/office/' . $office->image)}}"
                                             alt="Office Image" class="mx-auto"/>
                                    @else
                                        Няма снимка
                                    @endisset
                                </td>
                                <td>
                                    {!! strip_tags($office->description) !!}
                                </td>
                                <td>
                                    {{ $office->position }}
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{route('office.edit',$office->id)}}">
                                        Редактиране
                                    </a>
                                    <form action="{{route('office.destroy', $office->id)}}" method="post">
                                        {{ Form::hidden('_method', 'DELETE')}}
                                        @csrf
                                        {!! Form::submit('Премахни', ['class'=>'btn btn-danger', 'onclick'=> 'return confirm(\'Наистина ли искате да изтриете този офис?\')']) !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <h2 class="text-center text-black-50 my-5">Няма добавени офиси</h2>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
