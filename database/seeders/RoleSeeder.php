<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{

    public function run()
    {
        DB::table('dictionaries')->insert([
            'id' => 1,
            'key' => "role"
        ]);

        DB::table('dictionary_terms')->insert([
            'value' => "Admin",
            'dictionary_id' => 1
        ]);

        DB::table('dictionary_terms')->insert([
            'value' => "Mod",
            'dictionary_id' => 1
        ]);

        DB::table('dictionary_terms')->insert([
            'value' => "User",
            'dictionary_id' => 1
        ]);
    }
}
