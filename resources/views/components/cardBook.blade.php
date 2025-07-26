<div
    class="md:w-[300px] mx-auto md:justify-between bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Copertina di {{ $book->title }}"
        class="md:w-[200px] md:h-[250px] md:mx-auto md:mt-5 object-cover">
    <span class="inline-block bg-blue-100 text-blue-800 my-3 ms-4 text-xs px-2 py-1 rounded">
        {{ $book->category->name }}
    </span>
    <div class="px-4 pb-4 space-y-2">
        <h2 class="text-xl font-semibold text-gray-800">{{ $book->title }}</h2>
        <p class="text-sm text-gray-600">di {{ $book->author }}</p>
        <p class="text-sm text-gray-500 italic">ISBN: {{ $book->isbn }}</p>
        <p class="text-sm text-gray-600 truncate">{{ $book->description }}</p>

        <div class="text-sm text-gray-400">
            Pubblicato il: {{ \Carbon\Carbon::parse($book->published_at)->format('d/m/Y') }}
        </div>
        @if (Auth::check() && Auth::user()->is_admin && Route::currentRouteName() === 'search' || Route::currentRouteName() === 'search.filter')
            <div>
                <p>Stato: <span class="text-gray-600">{{ $copy->status }}</span></p>
                <p>Condizione: <span class="text-gray-600">{{ $copy->condition }}</span></p>
                <p>Copie totali: <span class="text-gray-600">{{ $book->available_copies }}</span></p>
                <p>Copie prenotate: <span class="text-gray-600">{{ $book->copies->where('status', 'prenotato')->count() }}</span></p>
                <p>Copie disponibili: <span class="text-gray-600">{{ $book->copies->where('status', 'disponibile')->count() }}</span></p>
            </div>
        @elseif(Auth::check() && !Auth::user()->is_admin)
            <div>
                Copie disponibili: <span class="text-gray-600">{{ $book->copies->where('status', 'disponibile')->count() }}</span>
            </div>
        @endif
    </div>
    <div class='flex mb-6 {{Auth::check() && Auth::user()->is_admin ? 'justify-end mr-4' : 'justify-evenly'}} items-center my-3'>
        <a href="{{ route('book.show', $book->id) }}"
            class="text-center bg-blue-500 text-white py-1.5 px-3 rounded hover:bg-blue-600 transition-colors">
            Visualizza
        </a>
        <a href="{{route('reservation.view', compact('book'))}}" class="cursor-pointer text-center bg-blue-500 text-white py-1.5 px-3 rounded hover:bg-blue-600 transition-colors">
            Prenota copia
        </a>
    </div>
</div>
