@extends('welcome')

@section('body')
    <div class="container my-5">
        <div>
            <a class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full"
               href="{{route('admin.statistics.index')}}">За деня</a>
            <a class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full"
               href="{{route('admin.statistics.week')}}">За седмицата</a>
            <a href="{{route('app_admin')}}"
               class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">Назад</a>
            <h2 class="font-bold text-2xl mb-4">Статистика за
                месеца: {{now()->startOfMonth()->format('d.m.Y') . ' - ' . now()->endOfMonth()->format('d.m.Y')}}; Общо:
                <strong>{{$total}}</strong> бр.; Уникални: {{$unique}} бр.</h2>
            <div class="my-6">
                <table class="min-w-full text-center">
                    <thead>
                    <tr>
                        {{--                   <th>Идентификатор</th>--}}
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Линк</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Брой посещения
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($month as $visit)
                        <tr class="hover:bg-gray-200">
                            {{--                       <td>{{$visit->ip}}</td>--}}
                            <td class="border-b border-gray-800 py-1">
                                <a class="text-dark" href="{{$visit->full_url}}"
                                   target="_blank">{{$visit->full_url}}</a>
                            </td>
                            <td class="border-b border-gray-800 py-1">{{$visit->count}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
