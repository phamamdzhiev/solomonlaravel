@extends('welcome')

@section('title', $product->name . ' |')

@section('body')
    <div class="container mt-10">
        {{--  <div class="flex items-center my-10">--}}
        <div>
            <img width="300px" class="rounded inline-block" src="{{asset('storage/products/' . $product->image_path )}}"
                 alt="{{$product->name}}">
        </div>
        <div class="mt-10">
            <h1 class="text-2xl font-bold text-main-green-dark ">{{$product->name}}</h1>
            <h2 class="text-md my-3">{{$product->desc}}</h2>
            <h2 class="text-2xl font-semibold">
                @if($product->price === 'Цена при запитване')
                    {{$product->price}}
                @else
                    Цена: {{$product->price}} <small>без ДДС</small>
                @endif
            </h2>
            @if($product->features === 1)
                <a href="https://old.solomonsofia.com/bg/formlazer"
                   class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                    ПОРЪЧАЙ
                </a>
            @else
                <button type="button"
                        class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">
                    ПОРЪЧАЙ
                </button>
            @endif
        </div>
        {{--  </div>--}}
    </div>
@endsection
