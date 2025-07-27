<x-layout>
    <h1 class="text-2xl md:not-odd:text-4xl text-center mt-5 mb-10">Conferma prenotazione</h1>

    @if (Route::currentRouteName() === 'reservation.view')
        <p class="text-lg md:text-2xl ml-5 mb-5">Libro: <span class="font-semibold italic text-2xl">
                "{{ $book->title }}"</span></p>
        <h2 class="text-md md:text-lg ml-5 md:ml-15">
            In base alla nostra politica di prenotazione, ti mostriamo di seguito la miglior copia disponibile del
            libro selezionato.
        </h2>
    @elseif(Route::currentRouteName() === 'reservation.selected')
        <p class="text-center text-gray-600 mb-5">Ecco la copia che hai selezionato per il libro
            <span class="font-bold md:font-semibold italic md:text-2xl text-md"> "{{ $book->title }}" :</span>
        </p>
    @endif
    <div class="flex justify-center p-5 mt-5">
        <div class="md:w-1/3 w-full md:mx-auto mx-5 bg-white rounded-lg shadow-md px-8 py-4 md:p-5 ">
            <h3 class="mb-5 text-center italic">Dettagli della copia</h3>
            <p class="mt-2"><span class="font-medium">Barcode:</span> {{ $copy->barcode }}</p>
            <p class="my-2"><span class="font-medium">Condizione:</span> {{ $copy->condition }}</p>
            <p class="mb-2"><span class="font-medium">Note:</span> {{ $copy->notes ? $copy->notes : '-' }}</p>
        </div>
    </div>
    <div class="md:w-2/3  mx-auto flex justify-around gap-4 items-center mt-5">
        <a href="{{ Route::currentRouteName() === 'reservation.selected' ? route('copy.index') : route('book.index') }}"
            class="cursor-pointer bg-gray-500 hover:bg-gray-700 text-white font-semibold md:py-2 md:px-4 py-1.5 px-2 rounded">
            Torna al catalogo
        </a>
        <form action="{{ route('reservation.store') }}" method="POST">
            @csrf
            <input type="hidden" name="copy_id" value="{{ $copy->id }}">
            <button type="submit"
                class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-semibold md:py-2 md:px-4 py-1.5 px-2 rounded">
                Conferma prenotazione
            </button>
        </form>
    </div>
</x-layout>
