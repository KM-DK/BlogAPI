<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Tests\CreatesApplication;
use Tests\MigrateFreshSeedOnce;

class UserTest extends TestCase
{
    use CreatesApplication,
        MigrateFreshSeedOnce;

    private string $tableName = 'users';
    private int $user_id = 1;
    private string $basePath = "api/users";

    public function test_create_user()
    {
        $this->createUser();
        $this->assertDatabaseHas($this->tableName, ['id' => $this->user_id]);
    }

    public function test_get_user()
    {
        $this->getUser($this->user_id);
    }

    public function test_get_users()
    {
        $response = $this->get($this->basePath);
        $response->assertStatus(200);
    }

    public function test_no_such_user()
    {
        $this->getUser(20000, 404);
    }

    public function test_change_user_role()
    {
        $user_id = 1;
        $role_id = 2;
        $this->putUser($user_id, ['role_id' => $role_id]);
        $user = User::find($user_id);
        $this->assertNotNull($user);
        $this->assertEquals("Mod", $user->role->value);
    }

    public function test_delete_user()
    {
        $this->deleteUser(1);
    }

    private function createUser(
        $name = "Sally",
        $surname = "Sullivan",
        $account_name = "Tomek",
        $email = "sally.sullivan@gmail.com",
        $password = "123456",
        $role_id = 3,
        $status = 200
    ) {
        $response = $this->post(
            $this->basePath,
            [
                "name" => $name,
                "surname" => $surname,
                "account_name" => $account_name,
                "email" => $email,
                "password" => $password,
                "role_id" => $role_id
            ]
        );
        $response->assertStatus($status);
        return $response;
    }

    private function getUser(int $id, $status = 200)
    {
        $response = $this->get($this->basePath .'/'. $id);
        $response->assertStatus($status);
        return $response;
    }

    /**
     * Optional array can have keys like
     *   "name", "surname", "account_name", "email", "role_id"
     */
    private function putUser(int $id, array $optional, int $status = 200)
    {
        $response = $this->put($this->basePath .'/'. $id, $optional);
        $response->assertStatus($status);
        return $response;
    }

    private function deleteUser(int $id, int $status = 200)
    {
        $response = $this->delete($this->basePath .'/'. $id);
        $response->assertStatus($status);
        return $response;
    }
}
