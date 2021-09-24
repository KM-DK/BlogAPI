<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusCode extends Enum
{
    const OK = 200;
    const CREATED = 201;
    const DELETED = 204;
    const BAD_REQUEST = 400;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const UNPROCESSABLE_ENTITY = 422;
    const INTERNAL_SERVER_ERROR = 500;
}
