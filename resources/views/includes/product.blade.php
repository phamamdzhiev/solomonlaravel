<div class="border rounded-md border-[#94A3B8] hover:shadow-md">
    <div class="p-3 text-center flex flex-col justify-between h-full">
        <a href="{{route('app_product', $product->id)}}">
            <img class="mx-auto h-[205px]" src="{{asset('storage/products/' . $product->image_path)}}" alt="Product"/>
        </a>
        <h2 class="uppercase underline text-main-green-dark font-bold my-3 text-[1.175rem]">
            <a href="{{route('app_product', $product->id)}}">
                {{$product->name}}
            </a>
        </h2>
        @if($product->desc !== '---')
            <p class="leading-4 mb-5">
                {{$product->desc}}
            </p>
        @endif
        <p class="leading-4 mb-2 font-semibold text-xl">
            @if($product->price === 'Цена при запитване')
                {{$product->price}}
            @else
                Цена: {{$product->price}} <small>без ДДС</small>
            @endif
        </p>
        @include('includes.order-button')
    </div>
</div>
