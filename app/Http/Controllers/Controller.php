<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Blog API",
 *      description="It is the API for a Blogs webpage",
 *      @OA\Contact(
 *          email="krzysztofmichalski987@gmail.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Server(
 *        description="OpenApi host",
 *        url="http://localhost:8000/api"
 * )
 */

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

/**
 * @OA\Tag(
 *     name="Users",
 *     description="API Endpoints of User"
 * )
 */
