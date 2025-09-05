<?php

namespace App\View\Components\Review;

use App\Http\Controllers\Review\ReviewController;
use App\Models\Review;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class ReviewList extends Component
{
    private int $productId;

    /**
     * @var LengthAwarePaginator<Review>
     */
    public LengthAwarePaginator $reviews;

    public function __construct(int $productId)
    {
        $this->productId = $productId;

        $this->init();
    }

    public function render(): View|Closure|string
    {
        return view('components.review.reviewList');
    }

    private function init(): void
    {
        $currentPage = Request::input('page', 0);
        $cacheKey = "reviews.product.{$this->productId}.page.{$currentPage}";

        $this->reviews = Cache::tags(ReviewController::getCacheTag($this->productId))->remember(
            key: $cacheKey,
            ttl: now()->addHour(),
            callback: function () {
                return Review::query()->latest()->paginate(3, ReviewController::PUBLIC_FIELDS); // TODO Where product_id = $this->productId
            }
        );
    }
}
