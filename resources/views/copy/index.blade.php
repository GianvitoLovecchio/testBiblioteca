<x-layout>
    @if(Auth::check() && Auth::user()->is_admin)
        <h1 class="text-4xl text-center m-10">Ricerca per filtri</h1>
        @else
            <h1 class="text-4xl text-center m-10">Catalogo delle Copie</h1>
        @endif
    @livewire('user-filter-index')
</x-layout>