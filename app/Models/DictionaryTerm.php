<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictionaryTerm extends Model {
    use HasFactory;

    protected String $value;
    public function key() {
        return $this->belongsTo(Dictionary::class);
    }
}
