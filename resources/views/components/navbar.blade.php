<nav class="bg-white border-b border-gray-200">
    <div class=" px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold text-gray-900">Biblioteca</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#" class="text-gray-700 hover:text-gray-900">Home</a>
                <a href="#" class="text-gray-700 hover:text-gray-900">Catalogo</a>
                <a href="#" class="text-gray-700 hover:text-gray-900">Prenotazioni</a>
                <a href="#" class="text-gray-700 hover:text-gray-900">Profilo</a>
            </div>

            <!-- Mobile Button -->
            <div class="md:hidden flex items-center">
                <button id="menu-btn" class="text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-4 pt-4 pb-2 space-y-2 bg-white border-t border-gray-200">
        <a href="#" class="block text-gray-700 hover:text-gray-900">Home</a>
        <a href="#" class="block text-gray-700 hover:text-gray-900">Catalogo</a>
        <a href="#" class="block text-gray-700 hover:text-gray-900">Prenotazioni</a>
        <a href="#" class="block text-gray-700 hover:text-gray-900">Profilo</a>
    </div>
</nav>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
