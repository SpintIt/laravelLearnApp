<?php

namespace App\View\Components\Catalog;

use App\Models\Catalog\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public Product $product;

    public float $price;
    public float $priceDiscount;

    public function __construct(Product $product)
    {
        $this->product = $product;

        $this->price = $this->product->priceMin ?? 0.0;
        $this->priceDiscount = $this->product->priceDiscountMin ?? 0.0;
    }

    public function render(): View|Closure|string
    {
        return view('components.catalog.item');
    }
}
