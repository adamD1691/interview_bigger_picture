<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_create_succesful()
    {
        $this->post(
            '/user/create',
            [
                'name' => 'test_user',
                'email' => 'test_user@email.pl',
                'password' => 'secret',
                'password_confirmation' => 'secret',
            ]
        );
        $this->assertDatabaseHas('users', ['email' => 'test_user@email.pl']);
    }

    public function test_user_update_succesful()
    {
        $user = User::factory()->save([
            'name' => 'TestName',
            'email' => 'testemail@test.pl',
            'password' => 'secret'
        ]);

        $this->assertDatabaseHas('users', ['email' => 'testemail@test.pl']);

        $this->post(
            sprintf('/user/%d/update', $user->id),
            [
                'name' => 'test_user',
                'email' => 'test_user_updated@email.pl',
            ]
        );
        $this->assertDatabaseHas('users', ['email' => 'test_user_updated@email.pl']);
    }

    public function test_user_failed_validation()
    {
        $this->postJson('/user/create',
            [
                'name' => 'test_user',
                'email' => 'test_user@email.pl',
                'password' => 'secret'
            ])->assertStatus(422);
    }

    public function test_user_found()
    {
        $user = User::factory()->save([
            'name' => 'TestName',
            'email' => 'testemail@test.pl',
            'password' => 'secret'
        ]);

        $this->assertDatabaseHas('users', ['email' => 'testemail@test.pl']);

        $response = $this->get(sprintf('/user/%d', $user->id));

        $response->assertStatus(200);
    }

    public function test_user_not_found()
    {
        $user = User::factory()->save([
            'name' => 'TestName',
            'email' => 'testemail@test.pl',
            'password' => 'secret'
        ]);

        $this->assertDatabaseHas('users', ['email' => 'testemail@test.pl']);

        $response = $this->get(sprintf('/user/%d', $user->id + 999));

        $response->assertStatus(404);
    }
}
