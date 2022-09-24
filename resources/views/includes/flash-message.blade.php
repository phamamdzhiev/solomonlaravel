@if ($errors->any())
    <div class="max-w-[500px] p-4 m-4 mx-auto text-center">
        <ul class="text-xl text-main-green-dark font-bold">
            @foreach ($errors->all() as $error)
                <li>- {{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
