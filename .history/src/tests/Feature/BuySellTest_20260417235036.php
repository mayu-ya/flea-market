<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Merchandise;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

class BuySellTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_buy()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->hasComments(1)
            ->create();

        $response = $this->actingAs($user)->get('/')->assertStatus(200);

        $item_id = $merchandise->id;
        $response = $this->get("/item/{$item_id}")->assertStatus(200);

        $response = $this->get("/purchase/{$item_id}")->assertStatus(200);

        $response = $this->post("/purchase/store/{$item_id}", [
            'profile_id' => $user->profile->id,
            'merchandise_id' => $item_id,
            'pay' => '1',
            'address' => $user->profile->address,
        ]);
        $response->assertRedirect('/');

        $response = $this->get('/')->assertStatus(200);
    }

    public function test_sold()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->hasComments(1)
            ->create();

        $response = $this->actingAs($user)->get('/')->assertStatus(200);

        $item_id = $merchandise->id;
        $response = $this->get("/item/{$item_id}")->assertStatus(200);

        $response = $this->get("/purchase/{$item_id}")->assertStatus(200);

        $response = $this->post("/purchase/store/{$item_id}", [
            'profile_id' => $user->profile->id,
            'merchandise_id' => $item_id,
            'pay' => '1',
            'address' => $user->profile->address,
        ]);
        $response->assertRedirect('/');

        $response = $this->get('/')->assertStatus(200);
        $response->assertSee('sold');
    }

    public function test_address()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->hasComments(1)
            ->create();

        $response = $this->actingAs($user)->get('/')->assertStatus(200);

        $item_id = $merchandise->id;
        $response = $this->get("/item/{$item_id}")->assertStatus(200);

        $response = $this->get("/purchase/{$item_id}")->assertStatus(200);

        $response = $this->get("/purchase/address/{$item_id}")->assertStatus(200);
        $response = $this->from("/purchase/address/{$item_id}")
                    ->post("/purchase/address/{$item_id}", [
                        'profile_id' => $user->profile->id,
                        'post_code' => '123-4567',
                        'address' => '京都',
                        'building' => 'aaa',
                    ]);
        $response->dump();
        $response ->assertStatus(302);
        $response ->assertRedirect("/purchase/{$item_id}");

        $response->assertSee(123-4567);
        $response->assertSee('京都');
        $response->assertSee('aaa');
    }
}
