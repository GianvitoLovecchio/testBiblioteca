<x-layout>
    <div class="flex justify-center">
        <h1 class="text-4xl text-center mt-10">Registrati</h1>
    </div>
    <form class="max-w-md md:mx-auto mx-5 mt-8 bg-white p-6 rounded-md shadow-md" method="POST"
        action="{{ route('register.store') }}">
        @csrf

        <div class="mt-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input id="name" type="text" name="name"  autofocus
                class="md:h-[40px] md:border-2 border-1 ps-4 mt-1 block w-full border-gray-300 rounded-md py-1 md:py-0 focus:outline-none">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" type="email" name="email" 
                class="md:h-[40px] md:border-2 border-1 ps-4 mt-1 block w-full border-gray-300 rounded-md py-1 md:py-0 focus:outline-none">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p
            @enderror
        </div>

        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" type="password" name="password" 
                class="md:h-[40px] md:border-2 border-1 ps-4 mt-1 block w-full border-gray-300 rounded-md py-1 md:py-0 focus:outline-none">
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Conferma Password</label>
            <input id="password" type="password" name="password_confirmation" 
                class="md:h-[40px] md:border-2 border-1 ps-4 mt-1 block w-full border-gray-300 rounded-md py-1 md:py-0 focus:outline-none">
            @error('password_confirmation')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <button type="submit"
                class="cursor-pointer block mx-auto bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Registrati
            </button>
        </div>
    </form>
</x-layout>
