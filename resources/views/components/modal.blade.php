<div id="review-modal"
     {{ $attributes->class([
        'fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-50 flex items-center justify-center',
        'hidden' => $errors->isEmpty(),
    ]) }}
>
    <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md mx-4 p-6">
        <div class="flex justify-between items-center mb-4">
            <h4 class="text-lg font-bold">{{ $title }}</h4>
            <button id="close-review-modal" class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{ $errors->first()  }}

        {{ $slot }}

    </div>
</div>
