<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CatalogController extends Controller
{
    public function index(): string
    {
        return View::make('catalog.index');
    }
}
