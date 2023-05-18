@if ($errors->any())
    <div class="p-4 m-4 mx-auto text-center bg-red-500">
        <ul class="text-xl text-white font-semibold">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
