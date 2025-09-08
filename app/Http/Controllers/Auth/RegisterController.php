<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Contracts\Support\Renderable;

class RegisterController extends Controller
{
    public function index(): string|Renderable
    {
        return View::make('auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {

        $user = User::query()->create($request->validated());
        Auth::login($user);

        return redirect()->route('admin.dashboards');
    }
}
