<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->count(35)->create();

        User::factory()->create([
            'role' => UserRole::ADMIN,
            'username' => 'admin',
            'email' => 'admin@example.com',
            'display_name' => 'Administrator',
        ]);

        User::factory()->create([
            'role' => UserRole::AUTHOR,
            'username' => 'author',
            'email' => 'author@example.com',
            'display_name' => 'Author',
        ]);
    }
}
