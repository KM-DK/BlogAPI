<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    public function run() {
        User::Factory(1)->admin()->create();
        User::Factory(1)->moderator()->create();
        User::Factory(2)->unverified()->create();
        User::Factory(6)->create();
    }
}
