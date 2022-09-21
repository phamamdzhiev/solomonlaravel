<footer>
    <div class="inner bg-main-green p-8">
        <div class="flex items-center flex-col md:flex-row text-center md:text-left justify-between max-w-[900px] mx-auto">
            <div class="_logo_wrapper mb-4">
                <img width="200" class="brightness-0 invert	" src="{{asset('/storage/images/logo.png')}}"
                     alt="Logo Solomon">
            </div>
            <div class="text-[#fff] text-lg mb-4">
                Соломон-София ЕООД
            </div>
            <div>
                <span class="block text-[#fff]"><i class="bi bi-phone"></i> 089 981 17 58</span>
                <span class="block text-[#fff]"><i class="bi bi-envelope"></i> solomonsofia@abv.bg </span>
                <a href="{{route('app_policy')}}">
                    <span class="block text-[#000] hover:text-[#fff]">УСЛОВИЯ ЗА ЗАЩИТА НА ЛИЧНИТЕ ДАННИ</span>
                </a>
            </div>
        </div>
    </div>
    <div class="text-center">
        <p class="text-[0.785rem] p-2"> Соломон - София ЕООД &copy; {{ date('Y') }} | Всички права запазени.</p>
    </div>
</footer>
