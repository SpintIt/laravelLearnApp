<?php

namespace App\View\Components\Catalog;

use App\Models\Catalog\Offer;
use App\Models\Catalog\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class CatalogList extends Component
{
    private $countPaginate;

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

        /*$offerMinimalPrice = DB::table('offers as o')
            ->select('id')
            ->whereColumn('o.product_id', 'products.id')
            ->orderBy('o.price')
            ->limit(1);

        $products = Product::query()
            ->select('products.id', 'products.name', 'products.image', 'products.code',
                'offers.price as priceMin', 'offers.price_discount as priceDiscountMin')
            ->leftJoin('offers', function ($join) use ($offerMinimalPrice) {
                $join->on('offers.id', '=', DB::raw("({$offerMinimalPrice->toSql()})"));
            })
            ->where('products.active', true)
            ->orderBy('products.sort')
            ->get();*/

        /*$products = Product::query()
            ->select('products.id', 'products.name', 'products.image', 'products.code',
                'offers.price as priceMin', 'offers.price_discount as priceDiscountMin')
            ->leftJoin('offers', function ($join) {
                $join->on('offers.id', '=', DB::raw('(
                    SELECT id FROM offers AS o
                    WHERE o.product_id = products.id
                    ORDER BY o.price ASC
                    LIMIT 1
                )'));
            })
            ->where('products.active', true)
            ->orderBy('products.sort')
            ->get();*/

        $minPrices1 = Offer::query()
            ->select('product_id', DB::raw('MIN(price) AS min_price'))
            ->groupBy('product_id');

        $products1 = Product::query()
            ->from('products as p')
            ->select('p.id', 'p.name', 'p.image', 'p.code',
                'o.price as priceMin', 'o.price_discount as priceDiscountMin')
            ->leftJoinSub($minPrices1, 'min_prices', function ($join) {
                $join->on('p.id', '=', 'min_prices.product_id');
            })
            ->leftJoin('offers as o', function ($join) {
                $join->on('o.product_id', '=', 'min_prices.product_id')
                    ->whereColumn('o.price', '=', 'min_prices.min_price');
            })
            ->where('p.active', true)
            ->orderBy('p.sort')
            ->orderBy('p.id', 'desc')
            ->groupBy('p.id')
            ->paginate(2);

        /*$this->countPaginate = 1;
        $minPrices = Offer::query()
            ->select('product_id', DB::raw('MIN(price) AS min_price'))
            ->groupBy('product_id');

        $paginatedQuery = Product::query()
            ->from('products as p')
            ->leftJoinSub($minPrices, 'min_prices', function ($join) {
                $join->on('p.id', '=', 'min_prices.product_id');
            })
            ->where('p.active', true)
            ->orderBy('p.sort');

        // Get total count for the paginator
        $totalProducts = $paginatedQuery->count();

        // Get product IDs for the current page
        $currentPage = request('page', 1);
        $productIds = $paginatedQuery
            ->forPage($currentPage, $this->countPaginate)
            ->pluck('p.id');

        // If no products found on this page, return an empty paginator
        if ($productIds->isEmpty()) {
            $paginatedProducts = new LengthAwarePaginator(
                collect(),
                $totalProducts,
                $this->countPaginate,
                $currentPage,
                ['path' => url()->current()]
            );

            return view('components.catalog.catalog-list', ['products' => $paginatedProducts]);
        }

        // Fetch the full product data using the IDs and the optimized JOIN
        $products = Product::query()
            ->select('p.id', 'p.name', 'p.image', 'p.code',
                'o.price as priceMin', 'o.price_discount as priceDiscountMin')
            ->from('products as p')
            ->leftJoin('offers as o', function ($join) {
                $join->on('o.product_id', '=', 'p.id')
                    ->whereColumn('o.price', '=', DB::raw('(SELECT MIN(price) FROM offers WHERE product_id = p.id)'));
            })
            ->whereIn('p.id', $productIds)
            ->orderBy('p.sort')
            ->groupBy('p.id') // This group by is still necessary to prevent duplicates if multiple offers share the min price
            ->get();

        $paginatedProducts = new LengthAwarePaginator(
            $products,
            $totalProducts,
            $this->countPaginate,
            $currentPage,
            ['path' => url()->current()]
        );*/

        return view('components.catalog.catalog-list', ['products' => $products1]);
    }
}
