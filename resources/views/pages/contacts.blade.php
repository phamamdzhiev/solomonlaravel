@extends('welcome')

@section('body')
    @include('includes.banners', ['banner' => 'https://solomonsofia.com/cow.png'])
    <div class="container my-10 max-w-[1200px] w-full">
        <h1 class="text-4xl font-semibold mb-10 text-main-green-dark">Контакти</h1>
        <div id="_contacts_form">
            <form action="/" method="post">
                <div class="flex items-stretch">
                    <div class="mr-4 flex-[0_1_350px]">
                        <div class="mb-3">
                            <input class="py-3 px-4 border rounded-md w-full" type="text" name="name" id="name"
                                   placeholder="Име" required/>
                        </div>
                        <div class="mb-3">
                            <input class="py-3 px-4 border rounded-md w-full" type="text" name="mobile" id="mobile"
                                   placeholder="Мобилен" required/>
                        </div>
                        <div class="mb-3">
                            <input class="py-3 px-4 border rounded-md w-full" type="email" name="email" id="email"
                                   placeholder="Имейл"/>
                        </div>
                    </div>
                    <div>
                        <textarea class="py-3 px-4 border rounded-md w-full" name="message" id="message" cols="50" rows="6"
                                  placeholder="Съобщение" required></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="rounded bg-main-green-dark px-8 uppercase text-[#fff] font-bold py-3">Изпрати</button>
                </div>
            </form>
        </div>
    </div>
@endsection
