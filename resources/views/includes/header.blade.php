<header class="py-3 relative">
    <div class="container mx-auto px-16">
        <div class="_top_bar_navigation absolute right-3 top-1">
            <div class="flex items-center justify-end w-100">
                <i class="text-facebook mx-3 bi bi-facebook"></i>
                <i class="text-instagram mx-3 bi bi-instagram"></i>
                <i class="text-youtube mx-3 bi bi-youtube"></i>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="_logo_wrapper">
                <a href="{{route('app_index')}}">
                    <img width="225" src="{{asset('/storage/images/logo.png')}}" alt="Logo Solomon">
                </a>
            </div>
            <nav>
                <ul class="flex">
                    <li class="uppercase mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="{{route('app_index')}}">Продукти</a>
                    </li>
                    <li class="uppercase mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="">Качество</a>
                    </li>
                    <li class="uppercase mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="">За нас</a>
                    </li>
                    <li class="uppercase mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="">Партньори</a>
                    </li>
                    <li class="uppercase mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="">Контакти</a>
                    </li>
                    <li class="uppercase mx-3 font-semibold">
                        <a class="text-main-orange hover:underline" href="">Почивки</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
