@php
    if ($product->can_order == 0) {
        $url = route('app_contacts');
    } elseif ($product->features == 1) {
        $url = route('app_formorder');
    } else {
        $url = route('app_product', $product->id);
    }
@endphp

<a href="{{ $url }}"
   class="inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4">

    {{ $product->can_order == 0 ? 'ЗАПИТВАНЕ' : 'ПОРЪЧАЙ' }}

</a>

{{-- https://old.solomonsofia.com/bg/formlazer --}}
