<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginLogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/login')->assertStatus(200);

        $response = $this->from('/login')
                    ->post('/login', [
                        'email' => '',
                        'password' => 'password',
                        'password_confirmation' => 'password123',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/login');
        
        $response -> assertSessionHasErrors([
            'email' => 'メールアドレスを入力してください',
        ]);
    }
}
