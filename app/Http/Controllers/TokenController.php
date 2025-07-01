<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTokenRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class TokenController extends Controller
{
    public function store(StoreTokenRequest $request): JsonResponse
    {
        $user = User::query()->where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(data: ['error' => 'Invalid credentials'], status: Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(
            data: ['token' => $user->createToken('api-token')->plainTextToken],
            status: Response::HTTP_CREATED
        );
    }
}
