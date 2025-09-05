<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function index(): string
    {
        return View::make('auth.login');
    }
}
