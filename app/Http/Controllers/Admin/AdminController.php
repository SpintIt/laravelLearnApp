<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function index(): string
    {
        return View::make('admin.index');
    }
}
