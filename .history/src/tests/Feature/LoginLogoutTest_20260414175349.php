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
    public function test_email_required()
    {
        $response = $this->get('/login')->assertStatus(200);

        $response = $this->from('/login')
                    ->post('/login', [
                        'email' => '',
                        'password' => 'password',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/login');
        
        $response -> assertSessionHasErrors([
            'email' => 'メールアドレスを入力してください',
        ]);
    }

    public function test_password_required()
    {
        $response = $this->get('/login')->assertStatus(200);

        $response = $this->from('/login')
                    ->post('/login', [
                        'email' => 'test@example.com',
                        'password' => '',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/login');
        
        $response -> assertSessionHasErrors([
            'password' => 'パスワードを入力してください',
        ]);
    }

    public function test_password()
    {
        $response = $this->get('/login')->assertStatus(200);

        $response = $this->from('/login')
                    ->post('/login', [
                        'email' => 'test@example.com',
                        'password' => 'password',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/login');
        
        $response -> assertSessionHasErrors([
            'email' => 'ログイン情報が登録されていません',
        ]);
    }

    public function test_login()
    {
        $response = $this->get('/login')->assertStatus(200);

        $response = $this->from('/login')
                    ->post('/login', [
                        'email' => 'test@example.com',
                        'password' => 'password123',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/');
    }
}
