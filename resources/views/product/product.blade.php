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
            <h2 class="text-2xl font-semibold">{{$product->price}} без ДДС</h2>
            @include('includes.order-button', ['isFeatured' => $product->features])
        </div>
        {{--  </div>--}}
    </div>
@endsection
