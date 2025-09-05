<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CatalogElementController extends Controller
{
    public function index(string $code): string
    {
        return View::make('catalog.element'/*, compact('reviews')*/);
    }
}
