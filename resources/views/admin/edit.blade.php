@extends('welcome')

@section('body')
    <div class="_edit container">
       <div class="flex">
           <div class="w-full max-w-xs">
               <form id="_edit_product_form" class="px-2 pt-6 pb-8 mb-4" method="post"
                     action="{{route('app_admin_edit_save', $product->id)}} ">
                   <h1 class="mb-6 text-xl font-bold">Редактирай продукт <i class="font-light">({{$product->name}})</i></h1>
                   <div class="mb-4">
                       <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                           Редактирай име на продукта
                       </label>
                       <input
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="name" value="{{$product->name}}" name="name" type="text">
                   </div>
                   <div class="mb-4">
                       <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                           Редактирай цена
                       </label>
                       <input
                           class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="price" value="{{$product->price}}" name="price" type="text">
                   </div>
                   <div class="mb-4">
                       <label class="block text-gray-700 text-sm font-bold mb-2" for="desc">
                           Редактирай описание
                       </label>
                       <textarea
                           class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="desc" name="desc">{{$product->desc}}</textarea>
                   </div>
                   {{--                <div class="mb-4">--}}
                   {{--                    <input--}}
                   {{--                        class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
                   {{--                        id="file" name="file" type="file">--}}
                   {{--                </div>--}}
                   <div class="mb-4">
                       <label class="block text-gray-700 text-sm font-bold mb-2" for="position">
                           Позиция
                       </label>
                       <input
                           class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="position" value="{{$product->position}}" name="position" min="0" type="number"/>
                   </div>
                   <div class="mb-4">
                       <label class="block text-gray-700 text-sm font-bold mb-2" for="features">
                           Горе?
                           <input {{$product->features ? 'checked': ''}} class="" name="features" id="features"
                                  type="checkbox"/>
                       </label>
                   </div>
                   @csrf
                   <button class="bg-main-green hover:bg-blue-700 font-semibold py-2 px-4 rounded-full"
                           type="submit">Редактирай
                   </button>
                   <a href="{{route('app_admin')}}" class="bg-[#b5b5b5] hover:bg-blue-700 font-semibold py-2 px-4 rounded-full"
                      type="submit">Назад
                   </a>
               </form>

           </div>
           <div class="_product_image ml-16 mt-16">
               <img width="200" src="{{asset('storage/products/' . $product->image_path)}}" alt="Product image">
           </div>
       </div>
    </div>
@endsection
