<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model {
    use HasFactory;

    protected $primaryKey = 'id';
    protected String $key;
    public function terms() {
        return $this->hasMany(DictionaryTerm::class);
    }
}
