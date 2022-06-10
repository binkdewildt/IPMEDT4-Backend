<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * It tests that a user can login with the right credentials
     */
    public function test_login_right_creds()
    {
        $response = $this->postJson('/api/login', [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'permissions',
                'access_token',
                'token_type',
            ]);
    }


    /**
     * > This function tests the login route with wrong credentials
     */
    public function test_login_wrong_creds()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'admin1234',
        ]);

        $response->assertStatus(400);
    }


    /**
     * > This function tests the register route without properties
     */
    public function test_register_with_fields()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->postJson('/api/register', [
            'name' => 'newUser',
            'email' => 'newUser@gmail.com',
            'password' => 'imanewuser',
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
            ]);
    }


    /**
     * > This function tests the register route without properties
     */
    public function test_register_without_fields()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->postJson('/api/register', [
            ''
        ]);

        $response->assertStatus(400);
    }


    /**
     * > This function tests the me route without authorization
     */
    public function test_check_me_without_auth()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->getJson('/api/me', [
            ''
        ]);

        $response->assertUnauthorized();
    }


    /**
     * > This function tests the me route with authorization
     */
    public function test_check_me_auth()
    {

        $user = User::factory()->create()->first();
        $response = $this
            ->actingAs($user)
            ->withHeaders([
                'Accept' => 'application/json'
            ])
            ->getJson('/api/me');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'name',
                'email',
            ]);
    }
}
