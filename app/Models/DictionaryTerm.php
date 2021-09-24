<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictionaryTerm extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function key()
    {
        return $this->belongsTo(Dictionary::class, 'dictionary_id');
    }
}

/**
 * @OA\Schema(
 * schema="Role",
 * @OA\Property(property="id", type="integer"),
 * @OA\Property(property="value", type="string"),
 * @OA\Property(property="dictionary_id", type="integer"),
 * )
 */
