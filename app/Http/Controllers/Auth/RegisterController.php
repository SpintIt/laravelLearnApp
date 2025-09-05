<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class RegisterController extends Controller
{
    public function index(): string
    {
        return View::make('auth.register');
    }

    public function store(RegisterRequest $request)
    {

        $user = User::query()->create($request->validated());
        Auth::login($user);

        return redirect()->route('admin.dashboards');
    }
}
