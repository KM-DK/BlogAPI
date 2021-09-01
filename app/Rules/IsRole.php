<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Dictionary;
use App\Models\DictionaryTerm;

class IsRole implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $role = DictionaryTerm::findOrFail($value);

        if (Dictionary::isRole($role)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Given term id is not a role id.';
    }
}
