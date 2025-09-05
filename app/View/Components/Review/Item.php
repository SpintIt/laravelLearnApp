<?php

namespace App\View\Components\Review;

use App\Models\Review;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public Review $review;


    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function render(): View|Closure|string
    {
        return view('components.review.item');
    }
}
