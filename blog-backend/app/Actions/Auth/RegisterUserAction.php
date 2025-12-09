<?php

namespace App\Actions\Auth;

use App\DTOs\Auth\RegisterUserDTO;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterUserAction
{
    public function execute(RegisterUserDTO $dto) : User
    {
        return DB::transaction(function () use ($dto) {

            $files = Storage::disk('public')->files('avatars/default');

            $avatarUrl = !empty($files)
                ? Storage::url(collect($files)->random())
                : Storage::url('avatars/default/avatar1.png');

            return User::query()->create([
                'username' => $dto->username,
                'email' => $dto->email,
                'password' => Hash::make($dto->password),
                'role' => UserRole::USER,
                'display_name' => $dto->username,
                'avatar' => $avatarUrl,
                'bio' => "I am a new user",
            ]);
        });
    }
}
