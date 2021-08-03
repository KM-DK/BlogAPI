<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory {

    protected $model = User::class;

    public function definition() {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'account_name' => $this->faker->unique()->colorName(),
            'email' => $this->faker->unique()->safeEmail(),
            'role_id' => 3,
            'email_verified_at' => now(),
            'is_active' => true,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified() {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
                'is_active' => false
            ];
        });
    }

    public function admin() {
        return $this->state(function (array $attributes) {
            return [
                'account_name' => 'admin',
                'password' => 'admin',
                'role_id' => 1,
            ];
        });
    }

    public function moderator() {
        return $this->state(function (array $attributes) {
            return [
                'account_name' => 'mod',
                'password' => 'mod',
                'role_id' => 2,
            ];
        });
    }
}
