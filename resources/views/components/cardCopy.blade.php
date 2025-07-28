            @php
                $borderColor = $copy->status === 'disponibile' ? 'border-green-500' : 'border-red-500';
                $textColor = $copy->status === 'disponibile' ? 'text-green-600' : 'text-red-600';
                $textCondition =
                    $copy->condition === 'buono'
                        ? 'text-yellow-600'
                        : ($copy->condition === 'discreto'
                            ? 'text-red-600'
                            : 'text-green-600');
            @endphp
            <div
                class="w-[375px] md:w-[400px] md:justify-between bg-white rounded shadow p-4 border-3 {{ $borderColor }} hover:shadow-lg transition duration-200">
                <div class='flex justify-between w-full'>
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">{{ $copy->book->title }}</h3>
                        <p class="text-sm text-gray-600">Barcode: {{ $copy->barcode }}</p>
                        <p class="text-sm text-gray-600">Categoria: {{ $copy->book->category->name }}</p>
                        <p class="text-sm text-gray-600">Anno:
                            {{ \Illuminate\Support\Carbon::parse($copy->book->published_at)->format('Y') }}</p>
                        <p class="text-sm text-gray-600">Condizioni: <span
                                class="font-bold {{ $textCondition }}">{{ $copy->condition }}</span> </p>
                        <p class="text-sm text-gray-600">Stato:
                            <span class='font-bold {{ $textColor }}'>{{ $copy->status }}</span>
                        </p>
                        @if (Auth::check() && Auth::user()->is_admin && $copy->status === 'prenotato')
                            <p class="text-sm text-gray-600">
                                Prenotato il:
                                <span
                                    class="font-bold">{{ \Illuminate\Support\Carbon::parse($copy->reservations->first()?->created_at)->format('d/m/Y') }}
                                    -
                                    {{ \Illuminate\Support\Carbon::parse($copy->reservations->first()?->created_at)->format('H:i:s') }}</span>
                            </p>
                            <p class="text-sm text-gray-600">Prenotato da:
                                <span class="font-bold">{{ $copy->reservations->first()?->user->name }}</span>
                            </p>
                            <p class="text-sm text-gray-600">Email: <span
                                    class="font-bold">{{ $copy->reservations->first()?->user->email }}</span></p>
                        @endif

                    </div>
                    <div>
                        <img src="{{ asset('storage/' . $copy->book->cover_image) }}" alt="Copertina"
                            class="w-30 h-40 object-cover rounded ml-4">
                    </div>
                </div>
                @if (Auth::check() && !Auth::user()->is_admin)
                    <a href="{{ route('reservation.selected', ['copyId' => $copy->id]) }}"
                        class="flex justify-center mx-auto cursor-pointer text-center bg-blue-500 text-white py-1 px-3 mt-1.5 rounded hover:bg-blue-600 transition-colors">
                        Prenota copia
                    </a>
                @endif
            </div>
