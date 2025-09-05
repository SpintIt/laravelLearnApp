<?php

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MainPageController extends Controller
{
    public function index(): string
    {
        return View::make('main.index');
    }
}
