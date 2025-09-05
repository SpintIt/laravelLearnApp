<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LandingController extends Controller
{
    public function index(): string
    {
        return View::make('landing.index');
    }
}
