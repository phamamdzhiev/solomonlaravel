@extends('welcome')

@section('title', 'Админ Панел |')

@section('body')

    <div class="container">
        <div class="min-h-[100vh]">
            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="block my-6 rounded bg-main-green-dark p-3">
                    <span class="font-semibold text-[#fff]">
                        {{\Illuminate\Support\Facades\Session::get('message') }}
                    </span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-500 p-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="font-bold">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="{{route('app_admin')}}"
               class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Назад
            </a>

            <div class="container">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            #
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            № на поръчка
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Продукт
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Количество
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Име на клиент
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Мобилен на клиент
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Имейл на клиент
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Детайли
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($orders as $order)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$loop->iteration}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->id}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->pName}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->quantity }}
                                                бр.
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->client_name}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->client_mobile}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->client_email ?? 'НЕ Е ПОСОЧЕН'}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->message}}</td>
                                        </tr>
                                    @empty
                                        <h1 class="text-xl font-bold">Няма направени поръчки</h1>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
