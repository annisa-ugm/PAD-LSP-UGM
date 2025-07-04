
<header class="bg-blue-300 p-3 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="LSP UGM Logo" class="w-16 h-16 ml-4">

        <!-- Mobile Menu Button -->
        <button id="menu-button" class="block lg:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <!-- Navbar Links -->
        <nav id="navbar" class="hidden lg:flex space-x-4">
            <a href="/admin/home-admin" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
                Home
            </a>
            <a href="{{ route('admin.event.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Event</a>
            <a href="{{ route('admin.tuk.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            TUK</a>
            <a href="{{ route('admin.skema.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Skema</a>
            <a href="{{ route('admin.uk.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Unit Kompetensi</a>
            <a href="/admin/pengguna" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Pengguna</a>
            <a href="{{ route('admin.asesi.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Assign Asesor</a>
            <form action="{{ url('/admin/logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-white font-semibold hover:bg-red-500 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
                    Logout
                </button>
            </form>
        </nav>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobile-menu" class="lg:hidden bg-blue-300 mt-3 space-y-2 p-4 hidden">
    <a href="/admin/home-admin" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
                Home
            </a>
            <a href="{{ route('admin.event.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Event</a>
            <a href="{{ route('admin.tuk.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            TUK</a>
            <a href="{{ route('admin.skema.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Skema</a>
            <a href="{{ route('admin.uk.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Unit Kompetensi</a>
            <a href="/admin/pengguna" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Pengguna</a>
            <a href="{{ route('admin.asesi.index') }}" class="text-white font-semibold hover:bg-blue-400 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
            Assign Asesor</a>
            <form action="{{ url('/admin/logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-white font-semibold hover:bg-red-500 hover:text-gray-100 rounded-md px-3 py-2 transition duration-300">
                    Logout
                </button>
            </form>
    </nav>
</header>

<script>
    // JavaScript untuk toggle navbar pada layar kecil
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>


