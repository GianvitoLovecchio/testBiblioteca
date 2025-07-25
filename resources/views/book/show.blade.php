<x-layout>

    <div class=" m-5 p-6 bg-white rounded shadow mt-8">
        <h1 class="text-3xl font-bold mb-4">{{ $book->title }}</h1>
        <span class="mb-3 inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
            {{ $book->category->name }}
        </span>
        <div class=" md:flex gap-6">
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Copertina di {{ $book->title }}"
                class="md:w-[200px] object-cover rounded shadow">

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
        <div class="flex">
            <a href="{{ route('book.index') }}"
                class="ml-auto bg-gray-300 hover:bg-gray-400 text-gray-800 hover:underline hover:decoration-underline hover:underline-offset-8 py-2 px-4 rounded">
                <i class="fa-solid fa-arrow-left"></i>
                Torna alla lista
            </a>
        </div>
    </div>

</x-layout>
