<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Dictionary;
use App\Models\DictionaryTerm;
use App\Enums\StatusCode;
use App\Enums\UserType;
use Tests\TestCase;
use Tests\CreatesApplication;
use Tests\MigrateFresh;

class UserTest extends TestCase
{
    use CreatesApplication,
        MigrateFresh;

    private const TABLE = 'users';
    private const USER_ID = 1;
    private const BASE_PATH = 'api/users';

    public function test_create_user()
    {
        $this->createUser();
        $this->assertDatabaseHas(UserTest::TABLE, ['id' => UserTest::USER_ID]);
    }

    public function test_get_user()
    {
        $this->getUser(UserTest::USER_ID);
    }

    public function test_get_users()
    {
        $response = $this->get(UserTest::BASE_PATH);
        $response->assertOk();
    }

    public function test_no_such_user()
    {
        $userId = 20000;
        $this->getUser($userId, StatusCode::NOT_FOUND);
    }

    public function test_change_user_role()
    {
        $this->updateUser(UserTest::USER_ID, ['role_id' => UserType::MOD]);
        $user = User::find(UserTest::USER_ID);
        $this->assertNotNull($user);
        $exceptedRole = UserType::getKey(UserType::MOD);
        $this->assertEquals($exceptedRole, $user->role->value);
    }

    public function test_delete_user()
    {
        $this->deleteUser(UserTest::USER_ID);
    }


    public function test_do_not_create_user_due_to_not_found_role_id()
    {
        $bad_role_id = 4000;
        $this->createUser(
            role_id: $bad_role_id,
            status: StatusCode::NOT_FOUND
        );
        $bad_role_id = 0;
        $this->createUser(
            role_id: $bad_role_id,
            status: StatusCode::NOT_FOUND
        );
        $bad_role_id = -100;
        $this->createUser(
            role_id: $bad_role_id,
            status: StatusCode::NOT_FOUND
        );
    }

    public function test_do_not_create_user_due_to_bad_dict_term_id()
    {
        $not_role_key_id = 2;
        $dictionary = Dictionary::factory()->create(['key' => 'tmp']);
        DictionaryTerm::factory()->create(['dictionary_id' => $dictionary->id]);
        $dict_term_id = 4;
        $this->createUser(
            role_id: $dict_term_id,
            status: StatusCode::UNPROCESSABLE_ENTITY
        );
    }

    private function createUser(
        $name = 'Sally',
        $surname = 'Sullivan',
        $account_name = 'Tomek',
        $email = 'sally.sullivan@gmail.com',
        $password = '5=4,3m$7UaY=.Lcy',
        $role_id = 3,
        $status = StatusCode::CREATED
    ) {
        $response = $this->post(
            UserTest::BASE_PATH,
            [
                'name' => $name,
                'surname' => $surname,
                'account_name' => $account_name,
                'email' => $email,
                'password' => $password,
                'role_id' => $role_id
            ],
            [
                'Accept' => 'application/json'
            ]
        );
        $response->assertStatus($status);
        return $response;
    }

    private function getUser(int $id, $status = 200)
    {
        $response = $this->get(UserTest::BASE_PATH . '/' . $id);
        $response->assertStatus($status);
        return $response;
    }

    /**
     * Optional array can have keys like
     *   'name', 'surname', 'account_name', 'email', 'role_id'
     */
    private function updateUser(int $id, array $optional, int $status = StatusCode::OK)
    {
        $response = $this->patch(UserTest::BASE_PATH . '/' . $id, $optional);
        $response->assertStatus($status);
        return $response;
    }

    private function deleteUser(int $id, int $status = StatusCode::DELETED)
    {
        $response = $this->delete(UserTest::BASE_PATH . '/' . $id);
        $response->assertStatus($status);
        return $response;
    }
}
