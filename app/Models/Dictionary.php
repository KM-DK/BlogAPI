<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    public function terms()
    {
        return $this->hasMany(DictionaryTerm::class);
    }

    public static function isRole($role): bool
    {
        return $role->key == "role";
    }
}

