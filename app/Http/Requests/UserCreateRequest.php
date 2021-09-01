<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IsRole;


class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role_id' => [new IsRole],
            'email' => 'required|email:rfc,dns',
            //TODO
            //Validate if password has one big letter, one number and special character
            'password' => 'required|min:8|max:69|',
            'name' => 'min:1|max:20',
            'surname' => 'min:1|max:100',
            'account_name' => 'required|min:3|max:20'
        ];
    }
}
