<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 * @OA\Property(property="id", type="integer"),
 * @OA\Property(property="name", type="string"),
 * @OA\Property(property="surname", type="string"),
 * @OA\Property(property="account_name", type="string"),
 * @OA\Property(property="email",type="string"),
 * @OA\Property(property="email_verified_at",type="string"),
 * @OA\Property(property="is_active",type="boolean"),
 * @OA\Property(property="created_at",type="string"),
 * @OA\Property(property="updated_at",type="string")
 * )
 */
class UserResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'account_name' => $this->account_name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

/**
 * @OA\Schema(
 * schema="StoreUserResource",
 * @OA\Property(property="name", type="string"),
 * @OA\Property(property="surname", type="string"),
 * @OA\Property(property="account_name", type="string"),
 * @OA\Property(property="email",type="string")
 * )
 */

 /**
 * @OA\Schema(
 * schema="UpdateUserResource",
 * @OA\Property(property="name", type="string"),
 * @OA\Property(property="surname", type="string"),
 * @OA\Property(property="account_name", type="string"),
 * @OA\Property(property="email",type="string"),
 * @OA\Property(property="created_at",type="string"),
 * @OA\Property(property="updated_at",type="string")
 * )
 */
