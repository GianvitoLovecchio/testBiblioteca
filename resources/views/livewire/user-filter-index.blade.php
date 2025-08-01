<div class="px-4">
    <!-- Filtri -->
    <div class="ps-7 md:ps-0 bg-white shadow-lg rounded-lg py-8 flex flex-col sm:flex-row sm:items-end justify-evenly gap-4 mb-6">
        <!-- Categoria -->
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
            <select id="category" wire:model.defer="tempCategory"
                class="mt-1 block w-75 bg-gray-100 ps-1 py-0.5 border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm">
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
                class="mt-1 block w-75 bg-gray-100 ps-1 py-0.5 border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm">
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
                    class="mt-1 block w-75 bg-gray-100 ps-1 py-0.5 border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm">
                    <option value="">Tutti</option>
                    <option value="disponibile">Disponibile</option>
                    <option value="prenotato">Prenotato</option>
                </select>
            </div>
        @endif

        <!-- Bottone Applica -->
        <div>
            <button wire:click="applyFilters"
                class="block mx-auto md:mx-0 md:inline-flex items-center px-4 py-2 cursor-pointer border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                Applica filtri
            </button>
        </div>
    </div>

    <!-- Copie disponibili -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($copies as $copy)
            <x-cardCopy :copy="$copy" />
        @empty
            <p class="text-gray-500 col-span-full">Nessuna copia disponibile.</p>
        @endforelse
    </div>

    <!-- Paginazione -->
    <div class="my-6">
        {{ $copies->links() }}
    </div>
</div>
