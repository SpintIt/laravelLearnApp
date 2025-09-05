<div id="notification-container" class="fixed top-4 right-104 z-50 w-full md:max-w-md p-4 space-y-4">
    @if($messageSuccess = $notification->showSuccess())
        <div id="success-notification" class="bg-green-500 text-white rounded-lg shadow-lg p-4 transition-transform transform translate-x-full ease-in-out duration-300">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-bold">{{ __('Успех!') }}</span>
                </div>
                <button onclick="document.getElementById('success-notification').style.display='none'" class="text-white hover:text-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <p class="text-sm mt-2">{{ $messageSuccess }}</p>
        </div>
    @endif
    @if($messageError = $notification->showError())
        <div id="error-notification" class="bg-red-500 text-white rounded-lg shadow-lg p-4 transition-transform transform translate-x-full ease-in-out duration-300">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-bold">{{ __('Ошибка!') }}</span>
                </div>
                <button onclick="document.getElementById('error-notification').style.display='none'" class="text-white hover:text-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <p class="text-sm mt-2">{{ $messageError }}</p>
        </div>
    @endif
</div>
