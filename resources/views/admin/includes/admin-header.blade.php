<a href="#_add_product_form"
   class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
    Довави продукт
</a>
<a href="{{route('app_orders')}}"
   class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
    Поръчки
</a>
<form action="{{route('logout')}}" method="post" class="inline-block">
    @csrf
    <button type="submit"
            class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
        Изход
    </button>
</form>
