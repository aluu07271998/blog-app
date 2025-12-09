<?php

namespace App\DTOs\Auth;

class LoginUserDTO
{
    public function __construct(
        public string $username,
        public string $password
    ){}
}
