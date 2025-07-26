<x-layout>
    <div>
        <h1 class="text-4xl text-center m-10">Elenco degli utenti registrati</h1>
        <table class="w-3xl mx-auto table-auto bg-white border border-gray-200">
            <thead>
                <tr class="border">
                    <th class="px-4 py-2 border-2">ID</th>
                    <th class="px-4 py-2 border-2">Nome</th>
                    <th class="px-4 py-2 border-2">Email</th>
                    <th class="px-4 py-2 border-2">Prenotazioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->id }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2 text-center">prenotazioni</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>