<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Contracts\Support\Renderable;

class RegisterController extends Controller
{
    public function index(): string|Renderable
    {
        return View::make('auth.register');
    }

    public function store(RegisterRequest $request): JsonResponse
    {

        $user = User::query()->create($request->validated());
        Auth::login($user);

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
            'status' => 'ok'
        ], 201);
    }
}
