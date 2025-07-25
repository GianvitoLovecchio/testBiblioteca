<x-layout>
    <h1 class="text-4xl text-center m-10">Catalogo</h1>
    <div class="mx-5 mb-15 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
        @foreach ($books as $book)
            <x-cardBook :book="$book" />
        @endforeach
    </div>
</x-layout>