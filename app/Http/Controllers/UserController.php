<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Dictionary;
use App\Models\DictionaryTerm;
use App\Models\User;
use DateTime;
use Illuminate\Bus\Dispatcher;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UserController extends Controller
{

    /**
     * @OA\Get(
     *      path="/users",
     *      operationId="getUsersList",
     *      tags={"Users"},
     *      summary="Get list of users",
     *      description="Returns list of users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UserResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        return new UserCollection(User::All());
    }

    /**
     * @OA\Post(
     *      path="/users",
     *      operationId="storeUser",
     *      tags={"Users"},
     *      summary="Store new user",
     *      description="Returns user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreUserResource")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UserResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(Request $request)
    {
        $user_role_id = 3;
        $role_id = $request->input("role_id") != null ?
            $request->input("role_id") : $user_role_id;
        if (!$this->checkRole($role_id)) {
            return response('Bad request', 400);
        }
        $user = new User($request->all());
        $user->role_id = $role_id;
        return $user->save();
    }

    /**
     * @OA\Get(
     *      path="/users/{id}",
     *      operationId="getUserById",
     *      tags={"Users"},
     *      summary="Get user information",
     *      description="Returns user data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UserResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    /**
     * @OA\Put(
     *      path="/users/{id}",
     *      operationId="updateUser",
     *      tags={"Users"},
     *      summary="Update existing user",
     *      description="Returns updated user data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateUserResource")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UserResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $role_id = $request->input("role_id");
        if (!$this->checkRole($role_id)) {
            return response('Bad request', 400);
        }
        if ($role_id != null) {
            $user->role_id = $role_id;
        }
        $user->update($request->all());
        return new UserResource($user);
    }

    /**
     * @OA\Delete(
     *      path="/users/{id}",
     *      operationId="deleteUser",
     *      tags={"Users"},
     *      summary="Delete existing user",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return 204;
    }

    private function checkRole($role_id): bool
    {
        $role = DictionaryTerm::findOrFail($role_id);
        if (Dictionary::isRole($role)) {
            return false;
        }
        return true;
    }
}
