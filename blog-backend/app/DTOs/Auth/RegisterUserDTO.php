<?php

namespace App\DTOs\Auth;

class RegisterUserDTO
{
    public function __construct(
        public string $username,
        public string $email,
        public string $password,
    ){}
}
