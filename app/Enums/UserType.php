<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class UserType extends Enum
{
    const ADMIN = 1;
    const MOD = 2;
    const USER = 3;
}
