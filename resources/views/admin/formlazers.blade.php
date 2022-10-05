@extends('welcome')

@section('title', 'Админ Панел | Заявки за лазерно надписаване')

@section('body')
    <style>
        thead th {
            font-size: 12px;
        }

        td,
        th {
            text-align: center;
            min-width: 100px;
            border: 1px solid black;
            padding: 0.5rem 1rem;
        }
    </style>
    <div class="container">
        <div class="min-h-[100vh]">
            <a href="{{route('app_admin')}}"
               class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Назад
            </a>
            <h1 class="font-bold text-2xl mb-4">Заявки</h1>
            @if (count($formlazers) === 0)
                <h1 class="text-center my-6 text-xl font-bold">Няма направени заявки</h1>
            @else
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ОДБХ</th>
                                        <th>ОБЩИНА</th>
                                        <th>ВЕТЕРИНАР</th>
                                        <th>ВЕТ. МОБИЛЕН</th>
                                        <th>No животновъдния обект</th>
                                        <th>ГРАД</th>
                                        <th>ИМЕНА</th>
                                        <th>ЕГН</th>
                                        <th>ИМЕЙЛ</th>
                                        <th>КЛИЕНТ МОБИЛЕН</th>
                                        <th>ДАННИ ЗА ФАКТУРА</th>
                                        <th>ДЕТАЙЛИ ЗА ДОСТАВКА</th>
                                        <th>BG код</th>
                                        <th>Номер на марка</th>
                                        <th>пор.№ на заместваща марка</th>
                                        <th>ЗАЯВЕНА НА</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($formlazers as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->odbh}}</td>
                                            <td>{{$item->obshtina}}</td>
                                            <td>{{$item->vet}}</td>
                                            <td>{{$item->vet_tel }}</td>
                                            <td>{{$item->no }}</td>
                                            <td>{{$item->city }}</td>
                                            <td>{{$item->names }}</td>
                                            <td>{{$item->egn }}</td>
                                            <td>{{$item->mail }}</td>
                                            <td>{{$item->client_mobile }}</td>
                                            <td>{{$item->invoice }}</td>
                                            <td>{{$item->ekont }}</td>
                                            <td>
                                                @foreach(json_decode($item->field1,true) as $f1)
                                                    {{$f1}} ;
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach(json_decode($item->field2,true) as $f2)
                                                    {{$f2}} ;
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach(json_decode($item->field3,true) as $f3)
                                                    {{$f3}} ;
                                                @endforeach
                                            </td>
                                            <td>{{\Illuminate\Support\Carbon::parse($item->created_at)->format('H:i d.m.Y') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
