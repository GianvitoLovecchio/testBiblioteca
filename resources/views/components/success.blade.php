@if (session('success'))
    <div class="max-w-xl mx-auto mt-6 px-4 py-3 rounded-md bg-green-100 text-green-800 relative">
        {{ session('success') }}
        <button type="button" class="cursor-pointer absolute top-2 right-2 text-green-800 hover:text-green-900" onclick="this.parentElement.remove()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 8.586l4.95-4.95 1.414 1.414L11.414 10l4.95 4.95-1.414 1.414L10 11.414l-4.95 4.95-1.414-1.414L8.586 10 3.636 5.05l1.414-1.414L10 8.586z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
@endif
