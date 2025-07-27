<x-layout>
    <div>
        <h1 class="text-2xl md:text-4xl text-center m-10">Aggiungi una nuova copia al catalogo</h1>
        <x-success />
        @livewire('add-copy',['books' => $books])
    </div>
</x-layout>