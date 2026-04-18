<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_name_required()
    {
        $response = $this->get('/register')->assertStatus(200);

        $response = $this->from('/register')
                    ->post('/register', [
                        'user_name' => '',
                        'email' => 'test@example.com',
                        'password' => 'password123',
                        'password_confirmation' => 'password123',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/register');
        
        $response -> assertSessionHasErrors([
            'user_name' => 'お名前を入力してください',
        ]);
    }

    public function test_email_required()
    {
        $response = $this->get('/register')->assertStatus(200);

        $response = $this->from('/register')
                    ->post('/register', [
                        'user_name' => '山田　太郎',
                        'email' => '',
                        'password' => 'password123',
                        'password_confirmation' => 'password123',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/register');
        
        $response -> assertSessionHasErrors([
            'email' => 'メールアドレスを入力してください',
        ]);
    }

    public function test_password_required()
    {
        $response = $this->get('/register')->assertStatus(200);

        $response = $this->from('/register')
                    ->post('/register', [
                        'user_name' => '山田　太郎',
                        'email' => 'test@example.com',
                        'password' => '',
                        'password_confirmation' => 'password123',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/register');
        
        $response -> assertSessionHasErrors([
            'password' => 'パスワードを入力してください',
        ]);
    }

    public function test_password_max()
    {
        $response = $this->get('/register')->assertStatus(200);

        $response = $this->from('/register')
                    ->post('/register', [
                        'user_name' => '山田　太郎',
                        'email' => 'test@example.com',
                        'password' => 'pass',
                        'password_confirmation' => 'pass',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/register');
        
        $response -> assertSessionHasErrors([
            'password' => 'パスワードは8文字以上で入力してください',
        ]);
    }

    public function test_password_confirmed()
    {
        $response = $this->get('/register')->assertStatus(200);

        $response = $this->from('/register')
                    ->post('/register', [
                        'user_name' => '山田　太郎',
                        'email' => 'test@example.com',
                        'password' => 'password',
                        'password_confirmation' => 'password123',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/register');
        
        $response -> assertSessionHasErrors([
            'password' => 'パスワードと一致しません',
        ]);
    }

    public function test_register_required()
    {
        $response = $this->get('/register')->assertStatus(200);

        $response = $this->from('/register')
                    ->post('/register', [
                        'user_name' => '山田　太郎',
                        'email' => 'test@example.com',
                        'password' => 'password123',
                        'password_confirmation' => 'password123',
                    ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/mypage/profile');
    }
}
