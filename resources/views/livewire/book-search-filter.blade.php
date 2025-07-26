<div>
    <div class="flex justify-between items-center mb-8 mx-20 px-10 py-6 rounded-xl bg-white shadow">
        <!-- Filtri -->
        <div>
            <select wire:model="tempCategory" class="border rounded p-2">
                <option value="">Tutte le categorie</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>

            <select wire:model="tempYear" class="border rounded mx-4 p-2">
                <option value="">Tutti gli anni</option>
                @foreach ($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>

            <select wire:model="tempStatus" class="border rounded p-2">
                <option value="">Tutti gli stati</option>
                <option value="disponibile">Disponibile</option>
                <option value="prenotato">Prenotato</option>
            </select>
        </div>

        <button wire:click="applyFilters" class="bg-blue-500 text-white px-10 py-2 rounded mt-2 ms-10 cursor-pointer">
            Cerca
        </button>

    </div>
    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($copies as $copy)
            <div class='flex justify-between bg-gray-100 rounded p-4 {{ $copy->status === 'disponibile' ? 'border-2 border-green-500' : 'border-2 border-red-500' }}'>
                <div>
                    <h3 class="font-bold">{{ $copy->book->title }}</h3>
                    <p>Barcode: {{ $copy->barcode }}</p>
                    <p>Categoria: {{ $copy->book->category->name }}</p>
                    <p>Anno: {{ \Illuminate\Support\Carbon::parse($copy->book->published_at)->format('Y') }}</p>
                    <p>Stato: <span class="font-bold">{{ $copy->status }}</span></p>
                    <p>Condizioni: {{ $copy->condition }} </p>
                </div>
                <div>
                    <img src="{{ asset('storage/' . $copy->book->cover_image) }}" alt="" class="w-24 h-34 object-cover rounded ml-4 mt-1">
                </div>
            </div>
        @empty
            <p class="text-gray-500">Nessun libro trovato.</p>
        @endforelse
    </div>
    <!-- link paginazione -->
    <div class="m-8 flex justify-center space-x-4">
        {{ $copies->links() }}
    </div>

</div>
