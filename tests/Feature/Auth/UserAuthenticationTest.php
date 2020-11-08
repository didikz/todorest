<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     * @return void
     */
    public function test_user_is_able_to_login_using_valid_data()
    {
        $user = User::factory()->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->postJson(route('api.auth'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);

        $user->refresh();

        $this->assertEquals(1, $user->tokens->count());
    }

    /**
     *
     * @return void
     */
    public function test_user_is_unable_to_login_using_invalid_data()
    {
        $user = User::factory()->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->postJson(route('api.auth'), [
            'email' => $user->email,
            'password' => 'wrongpassword'
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'email' => [
                    'The provided credentials are incorrect.'
                ]
            ]
        ]);
    }
}
