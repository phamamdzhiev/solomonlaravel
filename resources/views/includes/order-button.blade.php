@php $class = 'inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4' @endphp

@if ($product->features === 1)
    <a href="{{route('app_formorder')}}"
       class="{{$class}}">
        ПОРЪЧАЙ
    </a>
@else
    <a href="{{route('app_product', $product->id)}}"
       class="{{$class}}">
        ПОРЪЧАЙ
    </a>
@endif

{{--https://old.solomonsofia.com/bg/formlazer--}}
