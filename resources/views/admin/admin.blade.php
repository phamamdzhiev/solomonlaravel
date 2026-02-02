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

           <div class="my-6">
               @include('admin.includes.admin-header')
           </div>

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
                                        № на продукта
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Продукт
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Цена
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Горе?
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Позиция
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Действия
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$loop->iteration}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$product->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$product->name}}
                                            @if($product->can_order)
                                                <span class="text-green-500 text-xl">*</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$product->price ?? 'Няма'}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$product->features ? 'ДА' : 'НЕ'}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$product->position}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <a class="font-semibold text-main-green-dark"
                                               href="{{route('app_admin_edit', $product->id)}}">Редактирай</a>
                                            <form id="js-delete-form" method="POST"
                                                  action="{{route('app_admin_delete', $product->id)}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <div class="form-group">
                                                    <button type="button"
                                                            id="{{$product->name}}"
                                                            class="js-delete-button font-semibold text-[#FD380E]"
                                                    >Изтрий
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="_add">
                <div class="w-full max-w-xs">
                    <form id="_add_product_form" enctype="multipart/form-data" class="px-2 pt-6 pb-8 mb-4" method="post"
                          action="{{route('app_admin_post')}} ">
                        <h1 class="mb-6 text-xl font-bold">Добави продукт</h1>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Име на продукта
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name" name="name" type="text">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                                Цена
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="price" name="price" type="text">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="desc">
                                Описание
                            </label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="desc" name="desc"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                                Снимка
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="file" name="file" type="file">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="position">
                                Позиция
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="position" name="position" min="0" type="number"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="can_order">
                                Активен бутон "Поръчай"?
                            </label>
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="can_order" id="can_order">
                                <option value="1" selected>ДА</option>
                                <option value="0">НЕ</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="features">
                                Горе?
                                <input class="" name="features" id="features" type="checkbox"/>
                            </label>
                        </div>
                        @csrf
                        <button class="bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full"
                                type="submit">Запази
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
