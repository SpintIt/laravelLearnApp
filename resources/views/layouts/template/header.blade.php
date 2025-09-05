<x-notification.header />
<header class="bg-blue-600 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">Название сайта</h1>

        <button id="hamburger" class="md:hidden p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <nav id="navbar-menu" class="hidden md:block">
            <a href="{{ route('index') }}" class="px-4 hover:text-blue-200">{{ __('Главная') }}</a>
            <a href="{{ route('catalog.index') }}" class="px-4 hover:text-blue-200">{{ __('Каталог') }}</a>
            <a href="{{ route('admin.index') }}" class="px-4 hover:text-blue-200">{{ __('Админка') }}</a>
        </nav>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-blue-700 p-4">
        <a href="{{ route('index') }}" class="block px-4 py-2 hover:bg-blue-600">{{ __('Главная') }}</a>
        <a href="{{ route('catalog.index') }}" class="block px-4 py-2 hover:bg-blue-600">{{ __('Каталог') }}</a>
        <a href="{{ route('admin.index') }}" class="block px-4 py-2 hover:bg-blue-600">{{ __('Админка') }}</a>
    </div>
</header>
