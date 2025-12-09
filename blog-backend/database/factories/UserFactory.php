<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => 'password',

            'role' => UserRole::USER,

            'display_name' => $this->faker->name(),
            'avatar' => $this->faker->imageUrl(200, 200, 'avatar'),
            'bio' => $this->faker->sentence(10),
            'location' => $this->faker->city(),
            'website' => $this->faker->url(),

            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

}
