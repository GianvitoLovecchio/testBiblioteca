<x-layout>
    <h1 class="text-4xl text-center m-10">Catalogo</h1>
    <x-success></x-success>
    <div class="mx-5 mb-15 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
        @foreach ($books as $book)
        {{-- se l'utente autenticato non è admin --}}
            @if (Auth::check() && !Auth::user()->is_admin)
            {{-- mostra solo i libri con almeno una copia disponibile --}}
                @if ($book->copies->where('status', 'disponibile')->count() >= 1)
                    <x-cardBook :book="$book" />
                @endif
            {{-- se l'utente autenticato è admin, mostra tutti i titoli nel catalogo --}}
            @else
                <x-cardBook :book="$book" />
            @endif
        @endforeach
    </div>
</x-layout>
