<div class="mx-auto md:p-6 mt-4">
    <div class="md:flex items-center justify-evenly">
        <h2 class="text-2xl"> Ricerca per parola chiave:</h2>
        <input type="text" wire:model.live="search" placeholder="Cerca per titolo, autore, ISBN o descrizione..."
            class="md:w-[400px] w-full border rounded my-5 md:my-0 p-2 bg-white">
    </div>
    @if ($copies->isEmpty())
        <p class="text-gray-500 my-3">Nessun libro trovato per "{{ $search }}"</p>
    @else
        @if ($search)
            <p class="text-gray-500 my-5 ml-8">Trovati {{ $copies->total() }} libri per "{{ $search }}"</p>
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($copies as $copy)
                    <x-cardCopy :book="$copy->book" :copy="$copy" />
                @endforeach
            </div>
            <div class="m-8 flex justify-center space-x-4">
                {{ $copies->links() }}
            </div>
        @endif
    @endif
</div>
