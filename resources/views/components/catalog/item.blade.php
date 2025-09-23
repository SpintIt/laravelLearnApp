<div class="bg-gray-50 rounded-lg shadow-md overflow-hidden flex flex-col justify-between">
    <a href="{{ route('catalog.page', ['code' => $product->code ?? 'catalog/']) }}" class="block">
        <img src="{{ $product->image ? asset($product->image) : 'https://dummyimage.com/300/200' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
    </a>
    <div class="p-4 flex flex-col justify-between flex-grow">
        <div>
            <h3 class="font-semibold text-lg mb-2">
                <a href="{{ route('catalog.page', ['code' => $product->code ?? 'catalog/']) }}" class="hover:text-blue-600 transition-colors duration-200">
                   {{ $product->id }} : {{ $product->name }}
                </a>
            </h3>
            <div class="flex items-baseline mb-4">
                @if ($priceDiscount > 0 && $priceDiscount < $price)
                    <span class="text-red-500 text-xl font-bold mr-2">{{ $priceDiscount }} ₽</span>
                    <span class="text-gray-400 line-through">{{ $price }} ₽</span>
                @else
                    <span class="text-red-500 text-xl font-bold mr-2">{{ $price }} ₽</span>
                @endif
            </div>
        </div>
        <button class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors duration-200">
            Купить
        </button>
    </div>
</div>
