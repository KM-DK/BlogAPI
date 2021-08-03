<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder {

    public function run() {
        DB::table('dictionary')->insert([
            'id' => 1,
            'key' => "role"
        ]);

        DB::table('dictionary_term')->insert([
            'value' => "Admin",
            'dictionary_id' => 1
        ]);

        DB::table('dictionary_term')->insert([
            'value' => "Mod",
            'dictionary_id' => 1
        ]);

        DB::table('dictionary_term')->insert([
            'value' => "User",
            'dictionary_id' => 1
        ]);
    }
}
