<x-layout>
    <h1 class="text-4xl text-center my-10 font-bold text-gray-800">
        Modifica categoria <strong class="text-indigo-600">{{ $category->name }}</strong>
    </h1>
    <x-error></x-error>

    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('category.update', $category) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="actualName" class="block text-sm font-medium text-gray-700 mb-1">Nome attuale</label>
                <input type="text" id="actualName" name="actualName" value="{{ $category->name }}" disabled
                    class="w-full bg-gray-100 text-gray-700 border border-gray-300 rounded-md px-3 py-2 font-bold shadow-sm cursor-not-allowed">
            </div>
            <div>
                <label for="newName" class="block text-sm font-medium text-gray-700 mb-1">Nuovo nome</label>
                <input type="text" id="newName" name="newName"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Inserisci nuovo nome categoria" required>
            </div>

            <!-- Pulsante -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('category.index') }}"
                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-md shadow hover:bg-red-600 transition"">Torna alla lista categorie
                </a>
                <button type="submit"
                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-700 transition">
                    Salva modifiche
                </button>
            </div>
        </form>
    </div>
</x-layout>
