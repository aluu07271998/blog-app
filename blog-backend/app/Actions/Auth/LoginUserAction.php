<?php

namespace App\Actions\Auth;

use App\DTOs\Auth\LoginUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginUserAction
{
    public function execute(LoginUserDTO $dto) : User
    {
        $user = User::query()->where('username', $dto->username)->first();

        if(! $user || ! Hash::check($dto->password, $user->password))
        {
            abort(401, 'Invalid credentials provided.');
        }

        Auth::login($user);
        request()->session()->regenerate();

        return $user;
    }
}
