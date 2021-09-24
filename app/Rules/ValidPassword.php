<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPassword implements Rule
{

    public $lowercasePass = true;
    public $uppercasePass = true;
    public $numericPass = true;
    public $specialCharacterPass = true;

    public function passes($attribute, $value)
    {

        $this->lowercasePass = boolval(preg_match('/[a-z]/', $value));
        $this->uppercasePass = boolval(preg_match('/[A-Z]/', $value));
        $this->numericPass = boolval(preg_match('/[0-9]/', $value));
        $this->specialCharacterPass = boolval(preg_match('/[^A-Za-z0-9]/', $value));
        return $this->lowercasePass &&
            $this->uppercasePass &&
            $this->numericPass &&
            $this->specialCharacterPass;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $message = '';
        if (!$this->lowercasePass) {
            $message .= 'The password should contain a small letter.\n';
        }
        if (!$this->uppercasePass) {
            $message .= 'The password should contain a big letter.\n';
        }
        if (!$this->numericPass) {
            $message .= 'The password should contain at last one digit.\n';
        }
        if (!$this->specialCharacterPass) {
            $message .= 'The password should contain a special character.\n';
        }
        return $message;
    }
}
