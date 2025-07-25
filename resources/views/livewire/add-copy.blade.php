<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-8">
    <form wire:submit.prevent="store">
        {{-- Codice a barre --}}
        @php
            $barcode = strtoupper(Str::random(12));
        @endphp
        <div class="mb-8">
            <label for="barcode" class="block text-sm font-medium text-gray-700">Codice a barre</label>
            <input type="text" wire:model="barcode" id="barcode" readonly 
                class="px-2 py-1 mt-1 block w-full bg-gray-100 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" />
        </div>

        {{-- Libro --}}
        <div class="mb-8">
            <label for="book_id" class="block text-sm font-medium text-gray-700">Libro</label>
            <select wire:model="book_id" id="book_id"
                class="px-2 py-1 mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Seleziona un libro --</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            @error('book_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>



        {{-- Condizione --}}
        <div class="mb-8">
            <label for="condition" class="block text-sm font-medium text-gray-700">Condizione</label>
            <select wire:model="condition" id="condition"
                class="px-2 py-1 mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Seleziona la condizione --</option>
                <option value="ottimo">Ottimo</option>
                <option value="buono">Buono</option>
                <option value="discreto">Discreto</option>
            </select>
            @error('condition')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="text-right">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Salva copia
            </button>
        </div>
    </form>
</div>
