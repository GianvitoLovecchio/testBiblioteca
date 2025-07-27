<x-layout>
    <h1 class="text-4xl text-center my-8 font-bold text-gray-800">Area di gestione delle categorie</h1>
    
    <x-success />

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
        {{-- Sezione categorie esistenti --}}
        <div class="md:col-span-2 ">
            <h2 class="text-2xl text-center my-4 font-semibold text-gray-700">Tutte le categorie</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 my-8 md:border-r pt-4 md:pr-6">
                @foreach ($categories as $category)
                    <div class="bg-white shadow rounded-lg p-4">
                        <h3 class="text-lg font-bold text-gray-800">{{ $category->name }}</h3>
                        <p class="text-gray-600 text-sm mt-1">{{ $category->description }}</p>
                        <div class="mt-4 flex gap-10">
                            <a href="{{ route('category.edit', $category->id) }}"
                                class="flex-1 text-center rounded py-1 bg-blue-500 text-white text-sm font-semibold hover:bg-blue-600 transition-colors">
                                Modifica
                            </a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="cursor-pointer w-full rounded py-1 bg-red-500 text-white text-sm font-semibold hover:bg-red-600 transition-colors">
                                    Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center my-4 mr-6">
                {{ $categories->links() }}
            </div>
        </div>

        {{-- Sezione aggiunta nuova categoria --}}
        <div class="md:col-span-1">
            <h2 class="text-2xl text-center my-4 font-semibold text-gray-700">Aggiungi una categoria</h2>
            <div class="md:pt-0.5">
                <form action="{{ route('category.store') }}" method="POST"
                    class="bg-white p-6 rounded-lg shadow-md w-full my-8">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome
                            categoria</label>
                        <input type="text" id="name" name="name" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Inserisci nome categoria">
                    </div>
                    <button type="submit"
                        class="w-full inline-flex justify-center items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-700 transition-colors">
                        Aggiungi categoria
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
