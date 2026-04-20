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
    public function test_user()
    {
        $user = User::factory()->hasProfile()->create();

        $buymerchandise = Merchandise::factory()
            ->hasCategories(1)
            ->hasPurchase()
            ->create(['merchandise_name' => '自分']);

        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->create(['merchandise_name' => '商品']);

        $response = $this->actingAs($user)->get('/mypage?page=buy')->assertStatus(200);
        $response->assertSee($user->profile->name);
        $response->assertSee($user->profile->image);
        $response->asserSee($buymerchandise->image);
        $response->asserSee($buymerchandise->merchandise_name);

        $response = $this->get('/mypage?page=sell')->assertStatus(200);
        $response->assertSee($user->profile->name);
        $response->assertSee($user->profile->image);
        $response->asserSee($merchandise->image);
        $response->asserSee($merchandise->merchandise_name);
    }

    public function test_()
    {
        $user = User::factory()->hasProfile()->create();

        $response = $this->actingAs($user)->get('/mypage')->assertStatus(200);

        $response->assertSee($user->profile->image);
        $response->assertSee($user->profile->name);
        $response->assertSee($user->profile->post_code);
        $response->assertSee($user->profile->address);
    }
}
