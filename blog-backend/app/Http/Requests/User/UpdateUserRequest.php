<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        $userId = $this->route('user')->id;

        return [
            'username' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($userId),
            ],

            'email' => [
                'nullable',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],

            'password' => [
                'nullable',
                'string',
                'min:6',
            ],

            'role' => [
                'nullable',
                Rule::in(['admin', 'user', 'author']),
            ],

            'display_name' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'website' => ['nullable', 'string'],
        ];
    }
}
