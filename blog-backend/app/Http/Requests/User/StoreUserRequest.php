<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:50', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', Rule::in(['admin', 'user', 'author'])],
            'display_name' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'website' => ['nullable', 'string'],
        ];
    }
}
