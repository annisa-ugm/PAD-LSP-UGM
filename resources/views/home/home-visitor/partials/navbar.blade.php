<style>
    #navbar {
        background-color: #93C5FD;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
    }
</style>
<header id='navbar' class="w-full">
    <nav id="navbar" class="fixed z-20 top-0 inset-x-4 bg-biru mt-4 rounded-full shadow-lg">
        <div class="flex flex-wrap items-center justify-between mx-auto py-4 px-16">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.png') }}" alt="LSP UGM Logo" class="h-12 me-3">
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ route('login') }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
            Logout
            </a>
            <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-row font-medium gap-x-16 rounded-lg text-center items-center">
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-white bg-blue-400 rounded-md p-2' : 'text-blue-700 hover:text-black'}} text-center block py-auto px-3">Beranda</a>
                </li>
                <li>
                    <a href="{{route('user.persetujuan.index') }}" class="{{ request()->routeIs('user.persetujuan.index') ? 'text-white bg-blue-400 rounded-md p-2' : 'text-blue-700 hover:text-black'}} text-center block py-auto px-3">Daftar Sertifikasi</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</header>

