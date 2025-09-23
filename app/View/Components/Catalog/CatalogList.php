<?php

namespace App\View\Components\Catalog;

use App\Models\Catalog\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class CatalogList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        /*$products = Product::query()
            ->select('id', 'name', 'image', 'code')
            ->with('offerWithMinimalPrice')
            ->where('active', true)
            ->orderBy('sort')
            ->get();*/

        $products = Product::query()
            ->select('products.id', 'products.name', 'products.image', 'products.code',
                'offers.price as priceMin', 'offers.price_discount as priceDiscountMin')
            ->leftJoin('offers', function ($join) {
                $join->on('offers.id', '=', DB::raw('(
                    SELECT id FROM offers AS o2
                    WHERE o2.product_id = products.id
                    ORDER BY o2.price ASC
                    LIMIT 1
                )'));
            })
            ->where('products.active', true)
            ->orderBy('products.sort')
            ->get();

        return view('components.catalog.catalog-list', compact('products'));
    }
}
