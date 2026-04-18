<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
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
            'name' => 'お名前を入力してください',
        ]);
    }
}
