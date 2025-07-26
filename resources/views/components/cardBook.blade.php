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
            </div>
        @elseif(Auth::check() && !Auth::user()->is_admin)
            <div>
                Copie disponibili: <span class="text-gray-600">{{ $book->copies->where('status', 'disponibile')->count() }}</span>
            </div>
        @endif
    </div>
    <div class="flex justify-center items-center my-3">
        <a href="{{ route('book.show', $book->id) }}"
            class="text-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors">
            Visualizza
        </a>
    </div>

</div>
