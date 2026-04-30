<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Mail\CustomRequestMail;
use App\Notifications\CustomRequestMail;
use Illuminate\Support\Facades\Notification
//use Illuminate\Auth\Notifications\VerifyEmail;

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
        //実際に送信されるのを阻止
        Notification::fake();

        $response = $this->get('/register')->assertStatus(200);
        $response = $this->from('/register')
                    ->post('/register', [
                        'user_name' => '山田　太郎',
                        'email' => 'test@example.com',
                        'password' => 'password123',
                        'password_confirmation' => 'password123',
                    ]);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/mypage/profile');
        //$response = $this->get('/email/verify')->assertStatus(200);
        $user = User::where('email', 'test@example.com')->first();
        //メール送信されたか
        Notification::assertSentTo($user, CustomRequestMail::class);
    }

    public function test_mail_auth()
    {
        // 未認証のユーザーを作成
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'email_verified_at' => null,
        ]);

        // Laravel標準の署名付き認証URLを手動で生成
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // ルート名
            now()->addMinutes(60), // 有効期限
            ['id' => $user->id, 'hash' => sha1($user->email)] // パラメータ
        );

        $response = $this->actingAs($user)->get('/email/verify')->assertStatus(200);
        // 作成したURLにアクセス
        $response = $this->get($verificationUrl);

        // --- 検証1：認証状態の確認 ---
        // データベースの email_verified_at が更新されているか
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
    }

    //public function test_mail_mypage()
    //{
        //
    //}
}
