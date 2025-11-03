@extends('welcome')

@section('title', 'Админ Панел | Животновъдни обекти')

@section('body')
    @if ($errors->any())
        <p class="p-3 text-center bg-red-500 rounded-md font-semibold text-xl text-white">{{ $errors->first() }}</p>
    @endif
    <div class="container">
        <a href="{{ route('app_admin') }}" class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Назад
        </a>
        <a href="{{ route('animal-farms.create') }}"
            class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full">
            Добавяне на нов
        </a>
        <div class="mb-6">
            <h1 class="font-bold text-2xl mb-4">Обекти</h1>
         

            <!-- search -->
             <div>
                <form method="GET" action="{{ url()->current() }}" class="mb-4">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <input 
            type="text" 
            name="owner" 
            value="{{ request('owner') }}" 
            placeholder="Име" 
            class="border rounded px-3 py-2"
        />

        <!-- <input 
            type="text" 
            name="farm_number" 
            value="{{ request('farm_number') }}" 
            placeholder="Farm Number" 
            class="border rounded px-3 py-2"
        />

        <input 
            type="text" 
            name="region" 
            value="{{ request('region') }}" 
            placeholder="Регион" 
            class="border rounded px-3 py-2"
        />

        <input 
            type="text" 
            name="city" 
            value="{{ request('city') }}" 
            placeholder="Град" 
            class="border rounded px-3 py-2"
        /> -->

        <input 
            type="text" 
            name="vet" 
            value="{{ request('vet') }}" 
            placeholder="Ветеринар" 
            class="border rounded px-3 py-2"
        />
    </div>

    <div class="mt-3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Търси
        </button>
        <a href="{{ url()->current() }}" class="ml-2 text-gray-600 hover:underline">
            Нулирай
        </a>
    </div>
</form>

             </div>
             <!-- end of search -->

            <form target="_blank" action="{{ route('generate.letterhead') }}" method="post">
                <button class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full" type="submit">
                    Създай справка
                </button>
                <br/>
                {!! $animalFarms->links() !!}
                @csrf
                <div class="overflow-x-auto">
                    <table class="min-w-full text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Жив. обект №
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Име
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Регион
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Населено място
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Ветеринар
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($animalFarms as $farm)
                                <tr class="hover:bg-gray-200">
                                    <td class="border-b border-gray-800 py-1">
                                        <input type="checkbox" id="farm_{{ $farm->id }}" name="farm_ids[]"
                                            value="{{ $farm->id }}" />
                                        <input type="number" id="farm_id_quantity[{{ $farm->id }}]"
                                            name="farm_id_quantity[{{ $farm->id }}]" value="1" min="1"
                                            class="p-1 border text-center" style="width:40px;" />
                                    </td>
                                    <td class="border-b border-gray-800 py-1">
                                        <label for="farm_{{ $farm->id }}">{{ $farm->farm_number }}</label>
                                    </td>
                                    <td data-farm-number="{{ $farm->owner }}"
                                        class="js-farm-number border-b border-gray-800 py-1">
                                        {{ $farm->owner }}
                                    </td>
                                    <td class="border-b border-gray-800 py-1">
                                        {{ $farm->region }}
                                    </td>
                                    <td class="border-b border-gray-800 py-1">
                                        {{ $farm->city }}
                                    </td>
                                    <td data-vet-number="{{ $farm->vet }}" class="js-vet-name border-b border-gray-800 py-1">
                                        {{ $farm->vet }}
                                    </td>
                                    <td class="border-b border-gray-800 py-1">
                                        <a class="font-semibold text-green-500"
                                            href="{{ route('animal-farms.edit', $farm->id) }}">Редактиране
                                        </a>
                                        <a class="font-semibold text-red-500"
                                            href="{{ route('animal-farms.delete', $farm->id) }}">Изтриване
                                        </a>
                                        {{-- <br />
                                        <form id="deleteForm"
                                            onsubmit="return window.confirm('Сигурни ли сте, че искате да изтриете този запис?');"
                                            action="{{ route('animal-farms.destroy', $farm->id) }}" method="post">

                                            @csrf
                                            @method('DELETE')
                                            <button form="deleteForm" type="submit" class="font-semibold text-red-500">
                                                Изтриване
                                            </button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br/>
                {!! $animalFarms->links() !!}
                <br/>
                <button class="inline-block my-6 bg-main-green font-semibold py-2 px-4 rounded-full" type="submit">
                    Създай справка
                </button>
            </form>
        </div>
    </div>
    <!-- 
    OLD SEARCH FUNTIONALITY
    <script>
    
        window.addEventListener('load', function() {
            var searchBar = document.getElementById('js-animal-farm-search');
            var vetSearchBar = document.getElementById('js-vet-search');
            
            var farmNumberNodes = document.querySelectorAll('.js-farm-number');
            var vetNodes = document.querySelectorAll('.js-vet-name');

            searchBar.addEventListener('keyup', (e) => handleSearch(e, farmNumberNodes));
            vetSearchBar.addEventListener('keyup', (e) => handleVetSearch(e, vetNodes));
        });

         function handleSearch(e, farmNumberNodes) {
          var searchQuery = e.target.value.trim().toLowerCase();
          var searchWords = searchQuery.split(/\s+/); // Split the query by spaces

          for (var i = 0; i < farmNumberNodes.length; i++) {
            var parent = farmNumberNodes[i].parentNode;
            var farmNumber = farmNumberNodes[i].getAttribute('data-farm-number').toLowerCase();
            var farmWords = farmNumber.split(/\s+/); // Split the farm number by spaces

            // Check if all search words are present in the farm number words
            var matches = searchWords.every(word => farmWords.some(farmWord => farmWord.indexOf(word) > -1));

            parent.style.display = matches ? "table-row" : "none";
          }
        }
<<<<<<< HEAD
    </script> -->
=======
        
              function handleVetSearch(e, farmNumberNodes) {
          var searchQuery = e.target.value.trim().toLowerCase();
          var searchWords = searchQuery.split(/\s+/); // Split the query by spaces

          for (var i = 0; i < farmNumberNodes.length; i++) {
            var parent = farmNumberNodes[i].parentNode;
            var farmNumber = farmNumberNodes[i].getAttribute('data-vet-number').toLowerCase();
            var farmWords = farmNumber.split(/\s+/); // Split the farm number by spaces

            // Check if all search words are present in the farm number words
            var matches = searchWords.every(word => farmWords.some(farmWord => farmWord.indexOf(word) > -1));

            parent.style.display = matches ? "table-row" : "none";
          }
        }
    </script>
>>>>>>> b8b7baa600d4efabe1e90f5c1962394817dd5227

@endsection
