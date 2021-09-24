<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{

    protected $model = User::class;

    const PASSWORD = 'admin';

    public function definition()
    {
        return [
            'name' => $this->faker
                ->firstName(),
            'surname' => $this->faker
                ->lastName(),
            'account_name' => $this->faker
                ->unique()
                ->colorName(),
            'email' => $this->faker
                ->unique()
                ->safeEmail(),
            'role_id' => UserType::USER,
            'email_verified_at' => now(),
            'is_active' => true,
            'password' => Hash::make(UserFactory::PASSWORD),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
                'is_active' => false
            ];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'account_name' => strtolower(UserType::getKey(UserType::ADMIN)),
                'role_id' => UserType::ADMIN,
            ];
        });
    }

    public function moderator()
    {
        return $this->state(function (array $attributes) {
            return [
                'account_name' => strtolower(UserType::getKey(UserType::MOD)),
                'role_id' => UserType::MOD,
            ];
        });
    }
}
