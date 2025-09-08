<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Offer;
use App\Models\Catalog\Product;
use App\Models\Dictionary\Color;
use App\Models\Dictionary\Size;
use Illuminate\Support\Facades\View;

class ElementController extends Controller
{
    public function index(string $code): string
    {
        /*// Шаг 1: Получаем существующий продукт, цвет и размер
        $product = Product::query()->first();
        $color = Color::create([
            'name' => 'Черный'
        ]);
        $size = Size::create([
            'name' => 'L'
        ]);

        if ($product) {
            // Шаг 2: Создаем новую запись в таблице offers
            // Это свяжет продукт, цвет и размер в одной строке
            $offer = Offer::create([
                'name' => 'Черный продукт размера L',
                'product_id' => $product->id,
                'color_id' => $color->id,
                'size_id' => $size->id,
            ]);

            dump($offer);
        }*/

        return View::make('catalog.element'/*, compact('reviews')*/);
    }
}
