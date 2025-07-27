<x-layout>

    <div class=" m-5 p-6 bg-white rounded shadow mt-8">
        <h1 class="text-3xl font-bold mb-4">{{ $book->title }}</h1>
        <span class="mb-3 inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
            {{ $book->category->name }}
        </span>
        <div class=" md:flex gap-6">
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Copertina di {{ $book->title }}"
                class="w-[300px] object-cover rounded shadow md:my-0 my-4">

            <div class="md:flex-1">
                <p class="text-lg mb-2"><strong>Autore:</strong> {{ $book->author }}</p>

                <p class="text-lg mb-2"><strong>ISBN:</strong> {{ $book->isbn }}</p>


                <p class="mb-4"><strong>Data di pubblicazione:</strong>
                    {{ \Carbon\Carbon::parse($book->published_at)->format('d/m/Y') }}</p>

                <div>
                    <h3 class="text-xl font-semibold mb-2">Descrizione</h3>
                    <p class="text-gray-700 whitespace-pre-line">{{ $book->description }}</p>
                </div>

            </div>
        </div>
        <div class="flex justify-between gap-6">
            <a href="{{ route('book.index') }}"
                class="ml-auto bg-gray-300 hover:bg-gray-500 text-gray-800 hover:text-white py-2 px-4 rounded transition-300">
                <i class="fa-solid fa-arrow-left"></i>
                Torna alla lista
            </a>
            @if (Auth::check() && !Auth::user()->is_admin)
            <a href="{{ route('reservation.view', compact('book')) }}"
                class="cursor-pointer text-center bg-blue-500 text-white py-1.5 px-3 rounded hover:bg-blue-600 transition-colors">
                Prenota copia
            </a>
        @endif
        </div>
    </div>

</x-layout>
