<x-layout>
    <h1 class="text-4xl text-center mt-5 mb-10">Conferma prenotazione</h1>

    <h2 class="text-xl ml-15">
        In base alla nostra politica di prenotazione, ti mostriamo di seguito la miglior copia disponibile del
        libro:
        <span class="font-semibold italic text-2xl"> "{{ $book->title }}"</span>
    </h2>
    <div class="flex justify-center p-5 mt-5">
        <div class="w-1/3 mx-auto bg-white rounded-lg shadow-md p-5 ">
            <h3 class="mb-5 text-center italic">Dettagli della copia</h3>
            <p class="mt-2"><span class="font-medium">Barcode:</span> {{ $copy->barcode }}</p>
            <p class="my-2"><span class="font-medium">Condizione:</span> {{ $copy->condition }}</p>
            <p class="mb-2"><span class="font-medium">Note:</span> {{ $copy->notes ? $copy->notes : '-' }}</p>
        </div>
    </div>
    <div class="w-2/3 mx-auto flex justify-around items-center mt-5">
        <a href="{{ route('book.index') }}"
            class="cursor-pointer bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
            Torna al catalogo
        </a>
        <form action="{{ route('reservation.store') }}" method="POST">
            @csrf
            <input type="hidden" name="copy_id" value="{{ $copy->id }}">
            <button type="submit"
                class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Conferma prenotazione
            </button>
        </form>
    </div>
</x-layout>
