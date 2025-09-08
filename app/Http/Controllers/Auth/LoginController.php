<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\RedirectResponse;
use \App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index(): string|Renderable
    {
        return View::make('auth.login');
    }

    public function store(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated(), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('admin.dashboards');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
