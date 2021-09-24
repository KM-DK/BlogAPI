<?php

namespace Database\Seeders;

use App\Enums\DictionaryKey;
use App\Enums\UserType;
use App\Models\DictionaryTerm;
use App\Models\Dictionary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{

    public function run()
    {
        Dictionary::factory()->create([
            'key' => DictionaryKey::getKey(DictionaryKey::ROLE)
        ]);

        DictionaryTerm::factory()->create([
            'value' => UserType::getKey(UserType::ADMIN),
            'dictionary_id' => UserType::ADMIN
        ]);

        DictionaryTerm::factory()->create([
            'value' => UserType::getKey(UserType::MOD),
            'dictionary_id' => DictionaryKey::ROLE
        ]);

        DictionaryTerm::factory()->create([
            'value' => UserType::getKey(UserType::USER),
            'dictionary_id' => DictionaryKey::ROLE
        ]);
    }
}
