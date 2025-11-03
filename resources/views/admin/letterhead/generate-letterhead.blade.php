@extends('welcome')

@section('title', 'Админ Панел | Създаване на справка')

@push('head')
  <script src="
https://cdn.jsdelivr.net/npm/slim-select@3.1.0/dist/slimselect.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/slim-select@3.1.0/dist/slimselect.min.css
" rel="stylesheet">

@endpush

@section('body')
    <style>
        [readonly] {
            opacity: 0.7;
            pointer-events: none;
        }
    </style>
    <div class="container my-6">
        @php
            $regions = $selectedAnimalFarms->pluck('region')->unique();
        @endphp
        @if ($regions->count() > 1)
            <p class="text-red-500 text-center mb-6 font-semibold text-xl">Има различни региони!</p>
        @endif

        @if (session()->has('error'))
            <p class="p-3 text-center bg-red-500 rounded-md font-semibold text-xl text-white">
                {{ session()->get('error') }}
            </p>
        @endif

        @if ($errors->any())
            <p class="p-3 text-center bg-red-500 rounded-md font-semibold text-xl text-white">{{ $errors->first() }}</p>
        @endif

        <form id="myForm" action="{{ route('store.html-to-pdf') }}" method="POST" target="_blank">
            @csrf
            @method('POST')
            <div class="grid grid-cols-3 gap-6">
                @foreach ($selectedAnimalFarms as $farm)
                    <div>
                        <h1>{{ $loop->iteration }}.</h1>
                        <input type="hidden" name="farm_ids[]" value="{{ $farm->id }}">
                        <div class="mb-3">
                            <input class="p-3" required type="text" name="owner[]" value="{{ $farm->owner }}"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <input class="p-3" required type="text" name="farm_number[]"
                                value="{{ $farm->farm_number }}" readonly />
                        </div>
                        <div class="mb-3">
                            <input class="p-3" required type="text" name="vet[]" value="{{ $farm->vet }}"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <input class="p-3" required type="text" name="region[]" value="{{ $farm->region }}"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <input class="p-3" required type="text" name="city[]" value="{{ $farm->city }}"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <input class="p-3" required type="text" name="num_from[]" placeholder="Номер от" />
                        </div>
                        <div class="mb-3">
                            <input class="p-3" required type="text" name="num_to[]" placeholder="Номер до" />
                        </div>
                        <div class="mb-3">
                            <input class="p-3" required type="number" name="quantity[]" min="1"
                                placeholder="Брой" />
                        </div>
                        <div class="mb-3">
                            <input class="p-3" required type="date" value="{{ date('Y-m-d') }}" name="date[]"
                                placeholder="Дата" />
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="regions_with_emails" class="block mb-1 font-semibold">Имейли, до които да бъде изпратена</label>
                <select name="emails[]" id="regions_with_emails" multiple style="height: 300px">
                    @php
                        $regions = \App\Models\Region::with('emails')->get();
                    @endphp
                    @foreach ($regions as $region)
                        <optgroup label="{{ $region->name }}">
                            @foreach ($region->emails as $email)
                                <option value="{{ $email->email }}">{{ $email->email }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Преглед на справката
            </button>
            <button type="button" onclick="submitForm()"
                class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                Преглед и изпращане до имейли
            </button>
            <a href="{{ route('animal-farms.index') }}"
                class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
                НАЗАД
            </a>
        </form>
    </div>

    <script>
        new SlimSelect({
            select: '#regions_with_emails',
            settings: {
                searchText: 'Няма резултати...',
                searchPlaceholder: 'Търси имейл...',
                placeholder: 'Търсене на имейл',
                allowDeselect: true
            }
        })

        function submitForm() {
            var form = document.getElementById('myForm');
            var formData = new FormData(form);
            var isValid = true;

            formData.forEach(function(value, _) {
                if (!value) {
                    isValid = false;
                }
            });

            if (isValid) {
                form.action = "{!! route('store.html-to-pdf') !!}?withEmail=1"
                return form.submit();
            }

            return alert('Моля, попълнете всички полета!');
        }
    </script>
@endsection
