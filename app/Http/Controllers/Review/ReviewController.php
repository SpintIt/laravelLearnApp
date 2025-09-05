<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewStoreRequest;
use App\Models\Review;
use App\Services\Notification\INotificationService;

class ReviewController extends Controller
{
    private INotificationService $notificationService;

    public function __construct(INotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function store(ReviewStoreRequest $request)
    {
        Review::query()->create($request->validated());

        $this->notificationService->setSuccess(__('Ваш отзыв успешно добавлен.'));
        // $this->notificationService->setError(__('Не удалось отправить ваш отзыв. Пожалуйста, попробуйте еще раз.'));

        return redirect()->back()->withInput();
    }
}
