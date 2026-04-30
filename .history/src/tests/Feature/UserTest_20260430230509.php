<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Merchandise;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Category;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_get()
    {
        $user = User::factory()->hasProfile()->create();

        $buymerchandise = Merchandise::factory()
            ->hasCategories(1)
            ->hasPurchase(['profile_id' => $user->profile->id])
            ->create(['merchandise_name' => '自分']);

        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->create(['profile_id' => $user->profile->id, 'merchandise_name' => '商品']);

        $response = $this->actingAs($user)->get('/mypage?page=buy')->assertStatus(200);
        dd($response->headers->get('Location'));
        $response->assertSee($user->profile->name);
        $response->assertSee($user->profile->profile_img);
        $response->assertSee($buymerchandise->image);
        $response->assertSee('自分');

        $response = $this->actingAs($user)->get('/mypage?page=sell')->assertStatus(200);
        $response->assertSee($user->profile->name);
        $response->assertSee($user->profile->profile_img);
        $response->assertSee($merchandise->image);
        $response->assertSee('商品');
    }

    public function test_user()
    {
        $user = User::factory()->hasProfile()->create();

        $response = $this->actingAs($user)->get('/mypage/profile')->assertStatus(200);
        dd($response->headers->get('Location'));

        $response->assertSee($user->profile->profile_img);
        $response->assertSee($user->profile->name);
        $response->assertSee($user->profile->post_code);
        $response->assertSee($user->profile->address);
    }
}
