<x-layout>
    <h1 class="text-4xl text-center my-10 font-bold text-gray-800">Lista prenotazioni</h1>

    <div class="overflow-x-auto px-4">
        <table class="min-w-full bg-white rounded-lg shadow-md text-sm sm:text-base">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left uppercase tracking-wider">
                    <th class="px-4 sm:px-6 py-3">Libro</th>
                    <th class="px-4 sm:px-6 py-3">Utente</th>
                    <th class="px-4 sm:px-6 py-3">Data</th>
                    <th class="px-4 sm:px-6 py-3">Condizione</th>
                    <th class="px-4 sm:px-6 py-3">Barcode</th>
                    <th class="px-4 sm:px-6 py-3">Note</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @forelse ($reservations as $reservation)
                    <tr class="border-b hover:bg-gray-50 transition duration-150">
                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">{{ $reservation->copy->book->title }}</td>
                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">{{ $reservation->user->name }}</td>
                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">{{ $reservation->created_at->format('d/m/Y') }} - {{ $reservation->created_at->format('H:i') }}</td>
                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap capitalize font-bold 
                            {{ $reservation->copy->condition === 'ottimo' ? 'text-green-500' : 
                               ($reservation->copy->condition === 'buono' ? 'text-yellow-500' : 'text-red-500') }}">
                            {{ $reservation->copy->condition }}
                        </td>
                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">{{ $reservation->copy->barcode }}</td>
                        <td class="px-4 sm:px-6 py-4  break-words md:max-w-[150px]">
                            @if ($reservation->copy->notes)
                            <span class="text-gray-500 italic text-xs">{{ $reservation->copy->notes }}</span>
                            @else
                            <span class="text-gray-400">Nessuna nota</span>
                            @endif
                        </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 px-4 py-4">Nessuna prenotazione trovata.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
