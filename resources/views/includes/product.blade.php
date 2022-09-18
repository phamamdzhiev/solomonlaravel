<div class="border rounded-md border-[#94A3B8]">
    <div class="p-3 text-center">
        <a href="{{route('app_product', $product->id)}}">
            <img class="mx-auto" src="{{asset('storage/products/' . $product->image_path)}}" alt="Product"/>
        </a>
        <h2 class="uppercase underline text-main-green-dark font-bold my-3 text-[1.175rem]">
            <a href="{{route('app_product', $product->id)}}">
                {{$product->name}}
            </a>
        </h2>
        <p class="leading-4 mb-5">
            {{$product->desc}}
        </p>
        <p class="leading-4 mb-5 font-semibold text-xl">
            {{$product->price}} без ДДС
        </p>
        <button class="uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1">ПОРЪЧАЙ</button>
    </div>
</div>
