<nav id="navbar" x-data="{ open: false }" class="fixed top-0 left-0 w-full z-50 bg-white border-b border-gray-300 px-5 sm:px-10 lg:px-44 py-10 flex items-center justify-between transition-all duration-300">
    <!-- Hamburger Menu -->
    <button @click="open = !open" class="sm:hidden focus:outline-none z-50">
        <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- Logo -->
    <div class="flex items-center space-x-1 mx-auto sm:mx-0">
        <template x-for="char in ['A','N','I','P','L','E','X']">
            <div class="border border-gray-300 px-2 py-1">
                <span class="font-bold text-black" x-text="char"></span>
            </div>
        </template>
    </div>

    <!-- Menu Desktop -->
    <div class="hidden sm:flex space-x-6 font-semibold">
        <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 transition duration-300">HOME</a>
        <a href="{{ route('book') }}" class="text-gray-800 hover:text-blue-800 transition duration-300">LIBRARY</a>
        <a href="#" class="text-gray-800 hover:text-blue-800 transition duration-300">SHOWS</a>
        <a href="{{ route('shop') }}" class="text-gray-800 hover:text-blue-800 transition duration-300">SHOP</a>
    </div>

    <!-- Menu Mobile with Animation -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         @click.away="open = false"
         class="absolute top-full left-0 w-full bg-white border-t border-gray-300 flex flex-col space-y-4 py-4 px-5 sm:hidden z-40 shadow-md"
    >
        <a href="{{ route('home') }}" class="font-semibold text-gray-800 hover:text-blue-800 transition">HOME</a>
        <a href="{{ route('book') }}" class="font-semibold text-gray-800 hover:text-blue-800 transition">LIBRARY</a>
        <a href="#" class="font-semibold text-gray-800 hover:text-blue-800 transition">SHOWS</a>
        <a href="{{ route('shop') }}" class="font-semibold text-gray-800 hover:text-blue-800 transition">SHOP</a>
    </div>
</nav>

<!-- Script Scroll Behavior -->
<script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");

        if (window.scrollY > 50) {
            navbar.classList.remove("py-10");
            navbar.classList.add("py-4", "shadow-md");
        } else {
            navbar.classList.remove("py-4", "shadow-md");
            navbar.classList.add("py-10");
        }
    });
</script>

