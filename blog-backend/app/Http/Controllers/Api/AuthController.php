<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\LoginUserAction;
use App\Actions\Auth\LogoutUserAction;
use App\Actions\Auth\RegisterUserAction;
use App\DTOs\Auth\LoginUserDTO;
use App\DTOs\Auth\RegisterUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request, RegisterUserAction $action): JsonResponse
    {
        $dto = new RegisterUserDTO(...$request->validated());

        $user = $action->execute($dto);

        return response()->json([
            'success' => true,
            'message' => 'User successfully registered',
            'data' => new UserResource($user)
        ], 201);
    }

    public function login(LoginUserRequest $request, LoginUserAction $action): JsonResponse
    {
        $dto = new LoginUserDTO(...$request->validated());

        $user = $action->execute($dto);

        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully',
            'data' => new UserResource($user)
        ]);
    }

    public function logout(Request $request, LogoutUserAction $action): JsonResponse
    {
        $action->execute($request);

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully',
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        $user = $request->user();

        return response()->json([
            'success' => true,
            'message' => 'User profile retrieved successfully',
            'data' => new UserResource($user)
        ]);
    }
}
