<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Notifications\CustomRequestMail;
use Illuminate\Support\Facades\Notification;

class MailTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_mail_send()
    {
        Notification::fake();

        $response = $this->get('/register')->assertStatus(200);
        $response = $this->from('/register')
                    ->post('/register', [
                        'user_name' => '山田　太郎',
                        'email' => 'test@example.com',
                        'password' => 'password123',
                        'password_confirmation' => 'password123',
                    ]);
        $response->assertRedirect('/mypage/profile');

        $user = User::where('email', 'test@example.com')->first();

        Notification::assertSentTo($user, CustomRequestMail::class);
    }

    public function test_mail_auth()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get('/email/verify')->assertStatus(200);
        $response = $this->get($verificationUrl)->assertStatus(302);
    }

    public function test_mail_mypage()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get('/email/verify')->assertStatus(200);

        $response = $this->get($verificationUrl);

        $response->assertRedirect('/mypage/profile')->assertStatus(302);
    }
}
