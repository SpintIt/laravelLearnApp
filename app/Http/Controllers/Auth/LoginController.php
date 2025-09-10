<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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

        $user = Auth::user();
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
            'status' => 'ok',
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $user = $request->user('sanctum');

        if ($user) {
            $user->tokens()->delete();
        }

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'status' => 'ok',
        ]);
    }
}
