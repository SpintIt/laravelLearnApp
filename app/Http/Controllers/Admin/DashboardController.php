<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index(): string
    {
        return View::make('admin.dashboard.index');
    }


    public function show(int $id): string
    {
        return View::make('admin.dashboard.index', ['id' => $id]);
    }
}
