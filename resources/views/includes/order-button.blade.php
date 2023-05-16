<a href="{{$product->features === 1 ? route('app_formorder') : route('app_product', $product->id)}}"
   class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4 {{$product->price === 'Цена при запитване' ? 'pointer-events-none opacity-70' : ''}}"
>
    ПОРЪЧАЙ
</a>

{{--https://old.solomonsofia.com/bg/formlazer--}}
