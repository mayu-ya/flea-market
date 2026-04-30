<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_mail_send()
    {
        //実際に送信されるのを阻止
        Mail::fake();
        $response = $this->get('/');

        $response->assertStatus(200);
        //メール送信されたか
        Mail::assertSent(VerifyEmail::class);
    }

    public function test_mail_auth()
    {
        // 未認証のユーザーを作成
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // Laravel標準の署名付き認証URLを手動で生成
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // ルート名
            now()->addMinutes(60), // 有効期限
            ['id' => $user->id, 'hash' => sha1($user->email)] // パラメータ
        );

        // 作成したURLにアクセス
        $response = $this->actingAs($user)->get($verificationUrl);
    }

    public function test_mail_mypage()
    {
        // --- 検証1：認証状態の確認 ---
        // データベースの email_verified_at が更新されているか
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
    }
}
