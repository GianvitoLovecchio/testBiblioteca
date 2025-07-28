<x-layout>
    <div class="px-4">
        <h1 class="text-4xl text-center my-10 font-bold text-gray-800">Elenco degli utenti registrati</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md text-sm sm:text-base mb-8">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 text-left uppercase tracking-wider">
                        <th class="px-4 sm:px-6 py-3">ID</th>
                        <th class="px-4 sm:px-6 py-3">Nome</th>
                        <th class="px-4 sm:px-6 py-3">Email</th>
                        <th class="px-4 sm:px-6 py-3 text-center">Prenotazioni</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @forelse ($users as $user)
                        <tr class="border-b hover:bg-gray-50 transition duration-150">
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-4 sm:px-6 py-4 text-center">
                                {{ $user->reservations->count() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 px-4 py-4">Nessun utente trovato.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
