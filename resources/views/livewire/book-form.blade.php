<form class="md:max-w-5xl mx-5 md:mx-auto my-8 bg-white p-6 rounded-md shadow-md grid gap-6 grid-cols-1 md:grid-cols-2"
    wire:submit.prevent="store" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Titolo</label>
        <input id="name" type="text" wire:model="title" autofocus
            class="h-10 border-2 ps-4 mt-1 block w-full border-gray-300 rounded-md focus:outline-none">
        @error('title')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="author" class="block text-sm font-medium text-gray-700">Autore</label>
        <input id="author" type="text" wire:model="author" autofocus
            class="h-10 border-2 ps-4 mt-1 block w-full border-gray-300 rounded-md focus:outline-none">
        @error('author')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
        <input id="isbn" type="text" wire:model="isbn" autofocus
            class="h-10 border-2 ps-4 mt-1 block w-full border-gray-300 rounded-md focus:outline-none">
        @error('isbn')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Descrizione</label>
        <textarea id="description" type="text" wire:model="description" autofocus
            class="h-10 border-2 ps-4 mt-1 block w-full border-gray-300 rounded-md focus:outline-none">
        </textarea>
        @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="published_at" class="block text-sm font-medium text-gray-700">Pubblicato il *</label>
        <input id="published_at" type="date" wire:model="published_at" autofocus
        class="h-10 border-2 ps-4 mt-1 block w-full border-gray-300 rounded-md focus:outline-none">
        <small class="text-xs text-gray-500">*Nel caso sappiate solo l'anno di pubblicazione, inserire il 1 gennaio come data.</small>
        @error('published_at')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria</label>
        <select id="category_id" wire:model="category_id"
            class="h-10 border-2 ps-4 mt-1 block w-full border-gray-300 rounded-md focus:outline-none">
            <option value=""  selected>-- Seleziona una categoria --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="md:col-span-2 md:mx-50">
        <label for="cover_image" class="block text-sm font-medium text-gray-700">Immagine</label>
        <input id="cover_image" type="file" wire:model="cover_image" autofocus
            class="h-10 border-2 ps-4 mt-1 block w-full border-gray-300 rounded-md focus:outline-none">
        @error('cover_image')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>



    <div class="md:col-span-2 mt-6">
        <button type="submit"
            class="cursor-pointer block mx-auto bg-blue-600 text-white py-2 px-4 rounded-md
                   hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Carica libro
        </button>
    </div>
</form>
