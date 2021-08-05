<?php

namespace App\Models;

use App\Enums\DictionaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function terms()
    {
        return $this->hasMany(DictionaryTerm::class);
    }

    public static function isRole($role): bool
    {
        return $role->key->key == DictionaryKey::getKey(DictionaryKey::ROLE);
    }
}
