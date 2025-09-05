<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    public function index(): string
    {
        return View::make('admin.index');
    }
}
