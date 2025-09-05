<div class="bg-white rounded-lg shadow-md p-6 mt-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold">{{ __('Отзывы покупателей') }}</h3>
        <button id="open-review-modal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-200">{{ __('Написать отзыв') }}</button>
    </div>

    <x-review.item name="Иван Петров" description='"Отличный товар, полностью соответствует описанию. Быстрая доставка и хорошее качество!"' />
</div>
