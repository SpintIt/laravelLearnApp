<div class="bg-white rounded-lg shadow-md p-6 mt-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold">{{ __('Отзывы покупателей') }}</h3>
        <button id="open-review-modal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-200">{{ __('Написать отзыв') }}</button>
    </div>

    @if($reviews->total())
        @foreach($reviews as $review)
            <x-review.item :review="$review" />
        @endforeach

        {{ $reviews->links() }}
    @else
        {{ __('Нет отзывов') }}
    @endif

</div>
