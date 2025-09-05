<nav class="flex items-center text-gray-500 text-sm mb-4" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-2">
        <li>
            <a href="{{ route('index') }}" class="hover:text-blue-600">Главная</a>
        </li>
        <li>
            <span class="text-gray-400">/</span>
        </li>
        <li>
            <a href="{{ route('catalog.index') }}" class="hover:text-blue-600">Каталог</a>
        </li>
        <li>
            <span class="text-gray-400">/</span>
        </li>
        <li class="text-gray-700 font-medium">
            Название товара
        </li>
    </ol>
</nav>
