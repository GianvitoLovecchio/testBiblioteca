<!-- NAVBAR -->
<nav class="bg-white border-b border-gray-200">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Left Side -->
            <div class="flex items-center gap-6">
                <a href="{{ route('homepage') }}" class="text-xl font-bold text-gray-900">Biblioteca</a>

                @auth
                    @if (auth()->user()->is_admin)
                        <div class="hidden md:flex items-center gap-4 relative">
                            <a href="{{ route('book.create') }}" class="nav-link">Aggiungi libro</a>
                            <a href="{{ route('copy.add') }}" class="nav-link">Carica copie</a>
                            <a href="{{ route('book.index') }}" class="nav-link">Catalogo</a>
                            <a href="{{ route('reservation.index') }}" class="nav-link">Prenotazioni</a>
                            <a href="{{ route('user.index') }}" class="nav-link">Utenti</a>
                            <a href="{{ route('category.index')}}" class="nav-link">Gestione categorie</a>

                            <!-- Dropdown Ricerca -->
                            <div class="relative">
                                <button id="dropdownButton" class="nav-link flex items-center gap-1" type="button">
                                    Ricerca
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <ul id="dropdownMenu"
                                    class="absolute mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg hidden z-20">
                                    <li class="p-2">
                                        <a href="{{ route('search')}}" class="dropdown-link ">Ricerca
                                            Testuale</a>
                                    </li>
                                    <li class="p-2">
                                        <a href="{{ route('copy.index')}}" class="dropdown-link ">Ricerca
                                            per filtri</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="hidden md:flex items-center gap-4">
                            <a href="{{ route('book.index') }}" class="nav-link">Catalogo titoli</a>
                            <a href="{{ route('copy.index') }}" class="nav-link">Catalogo copie</a>
                        </div>
                    @endif
                @endauth
            </div>

            <!-- Right Side -->
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <a href="{{ route('user.profile') }}" class="text-gray-700 hover:text-gray-900">
                        Ciao, <span class="font-bold">{{ Auth::user()->name }}</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="cursor-pointer text-gray-700 hover:text-red-600">
                            <i class="fa-solid fa-right-from-bracket text-red-600 text-2xl"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Accedi</a>
                    <a href="{{ route('register') }}" class="nav-link">Registrati</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="menu-btn" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2 bg-white border-t border-gray-200">
        @auth
            @if (auth()->user()->is_admin)
                <a href="{{ route('book.create') }}" class="block nav-link">Aggiungi libro</a>
                <a href="{{ route('copy.add') }}" class="block nav-link">Carica copie</a>
                <a href="{{ route('book.index') }}" class="block nav-link">Catalogo</a>
                <a href="#" class="block nav-link">Visualizza prenotazioni</a>
                <a href="{{ route('user.index') }}" class="block nav-link">Elenco utenti</a>
                <a href="{{ route('search')}}" class="block nav-link">Ricerca Testuale</a>
                <a href="" class="block nav-link">Ricerca per filtri</a>
            @else
                <a href="{{ route('book.index') }}" class="block nav-link">Catalogo</a>
                <a href="#" class="block nav-link">Prenotazioni</a>
            @endif
        @endauth

        @guest
            <a href="{{ route('login') }}" class="block nav-link">Accedi</a>
            <a href="{{ route('register') }}" class="block nav-link">Registrati</a>
        @endguest
    </div>
</nav>

<!-- Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        const dropdownBtn = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }

        if (dropdownBtn && dropdownMenu) {
            dropdownBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            window.addEventListener('click', function (e) {
                if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        }
    });
</script>


<!-- Tailwind Utility Styles -->
<style>
    .nav-link {
        @apply text-gray-700 hover:text-gray-900 text-sm;
    }

    .dropdown-link {
        @apply block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100;
    }
</style>
