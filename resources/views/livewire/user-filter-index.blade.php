<div class="px-4">
    <!-- Filtri -->
    <div class="flex flex-col sm:flex-row sm:items-end gap-4 mb-6">
        <!-- Categoria -->
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
            <select id="category" wire:model.defer="tempCategory"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Tutte</option>
                @foreach (\App\Models\Category::all() as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Anno -->
        <div>
            <label for="year" class="block text-sm font-medium text-gray-700">Anno</label>
            <select id="year" wire:model.defer="tempYear"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Tutti</option>
                @foreach ($years as $yr)
                    <option value="{{ $yr }}">{{ $yr }}</option>
                @endforeach
            </select>
        </div>

        <!-- Stato -->
        @if (Auth::check() && Auth::user()->is_admin)
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Stato</label>
            <select id="status" wire:model.defer="tempStatus"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Tutti</option>
                <option value="disponibile">Disponibile</option>
                <option value="prenotato">Prenotato</option>
            </select>
        </div>
        @endif

        <!-- Bottone Applica -->
        <div>
            <button wire:click="applyFilters"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                Applica filtri
            </button>
        </div>
    </div>

    <!-- Copie disponibili -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($copies as $copy)
            @php
                $borderColor = $copy->status === 'disponibile' ? 'border-green-500' : 'border-red-500';
                $textColor = $copy->status === 'disponibile' ? 'text-green-600' : 'text-red-600';
            @endphp
            <div
                class='flex justify-between bg-white rounded shadow p-4 border-2 {{ $borderColor }} hover:shadow-lg transition duration-200'>

                <div>
                    <h3 class="font-bold text-lg text-gray-800">{{ $copy->book->title }}</h3>
                    <p class="text-sm text-gray-600">Barcode: {{ $copy->barcode }}</p>
                    <p class="text-sm text-gray-600">Categoria: {{ $copy->book->category->name }}</p>
                    <p class="text-sm text-gray-600">Anno:
                        {{ \Illuminate\Support\Carbon::parse($copy->book->published_at)->format('Y') }}</p>
                    <p class="text-sm text-gray-600">Stato:
                        <span class='font-bold {{ $textColor }}'>{{ $copy->status }}</span>
                    </p>
                    <p class="text-sm text-gray-600">Condizioni: {{ $copy->condition }}</p>
                </div>
                <div>
                    <img src="{{ asset('storage/' . $copy->book->cover_image) }}" alt="Copertina"
                        class="w-24 h-36 object-cover rounded ml-4">
                </div>
            </div>
        @empty
            <p class="text-gray-500 col-span-full">Nessuna copia disponibile.</p>
        @endforelse
    </div>

    <!-- Paginazione -->
    <div class="mt-6">
        {{ $copies->links() }}
    </div>
</div>
