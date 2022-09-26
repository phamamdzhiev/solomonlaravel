<header class="py-3">
    <div class="container mx-auto">
        <div class="_top_bar_navigation absolute right-3 top-1">
            <div class="hidden items-center justify-end w-100 lg:flex">
                <a href="https://www.facebook.com/solomonsofia.ltd" target="_blank">
                    <i class="text-facebook mx-3 text-xl bi bi-facebook"></i>
                </a>
                {{--                <i class="text-instagram mx-3 bi bi-instagram"></i>--}}
                {{--                <i class="text-youtube mx-3 bi bi-youtube"></i>--}}
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="_logo_wrapper">
                <a href="{{route('app_index')}}">
                    <img width="225" src="{{asset('/storage/images/logo.png')}}" alt="Logo Solomon">
                </a>
            </div>
            <div class="lg:hidden block">
                <button id="js-toggle-hamburger">
                    <i class="bi bi-list text-4xl"></i>
                </button>
            </div>
            <nav id="js-navigation-list" class="hidden top-0 left-0 bottom-0 z-[5000] shadow-lg md:shadow-none md:relative bg-[#F1F2F2] absolute lg:block">
                <ul class="flex flex-col md:flex-row px-6 md:px-0 mt-4 md:mt-0">
                    <li class="uppercase my-4 md:my-0 mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="{{route('app_index')}}">Продукти</a>
                    </li>
                    <li class="uppercase my-4 md:my-0 mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="{{route('app_quality')}}">Качество</a>
                    </li>
                    <li class="uppercase my-4 md:my-0 mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="{{route('app_about')}}">За нас</a>
                    </li>
                    <li class="uppercase my-4 md:my-0 mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="{{route('app_partners')}}">Партньори</a>
                    </li>
                    <li class="uppercase my-4 md:my-0 mx-3 font-semibold">
                        <a class="hover:text-main-green-dark" href="{{route('app_contacts')}}">Контакти</a>
                    </li>
                    <li class="uppercase my-4 md:my-0 mx-3 font-semibold">
                        <a class="text-main-orange hover:underline" href="https://www.ssky.bg/"
                           target="_blank">Почивки</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

