<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_created_succesful()
    {
        User::factory()->save([
            'name' => 'TestName',
            'email' => 'testemail@test.pl',
            'password' => 'secret'
        ]);
        $this->assertDatabaseHas('users', ['email' => 'testemail@test.pl']);
    }

    public function test_user_updated_succesful()
    {
        $user = User::factory()->save([
            'name' => 'TestName',
            'email' => 'testemail@test.pl',
            'password' => 'secret'
        ]);

        $this->assertDatabaseHas('users', ['email' => 'testemail@test.pl']);

        User::factory()->update($user, [
            'email' => 'testemail_updated@test.pl',
        ]);

        $this->assertDatabaseHas('users', ['email' => 'testemail_updated@test.pl']);
    }

    public function test_user_deleted_succesful()
    {
        $user = User::factory()->save([
            'name' => 'TestName',
            'email' => 'testemail@test.pl',
            'password' => 'secret'
        ]);

        $this->assertDatabaseHas('users', ['email' => 'testemail@test.pl']);

        $userRepository = new UserRepository($user);

        $userRepository->delete($user);

        $this->assertDatabaseMissing('users', ['email' => 'testemail@test.pl']);
    }
}
