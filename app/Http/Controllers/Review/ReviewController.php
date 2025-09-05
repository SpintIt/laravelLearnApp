<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewStoreRequest;
use App\Models\Review;
use App\Services\Notification\INotificationService;
use Illuminate\Support\Facades\Cache;

class ReviewController extends Controller
{
    public const array PUBLIC_FIELDS = [
        'id', 'name', 'description', 'published_at'
    ];

    private INotificationService $notificationService;

    public function __construct(INotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public static function getCacheTag(int $productId): string
    {
        return "reviews.product.{$productId}";
    }

    public function store(ReviewStoreRequest $request)
    {
        Review::query()->create($request->validated());

        $this->notificationService->setSuccess(__('Ваш отзыв успешно добавлен.'));
        Cache::tags(ReviewController::getCacheTag(1111))->flush();
        // $this->notificationService->setError(__('Не удалось отправить ваш отзыв. Пожалуйста, попробуйте еще раз.'));

        return redirect()->back()->withInput();
    }
}
