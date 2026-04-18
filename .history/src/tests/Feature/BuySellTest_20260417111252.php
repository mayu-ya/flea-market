<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuySellTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_sold()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->hasComments(1)
            ->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);

        $item_id = $merchandise->id;
        $response = $this->get("/item/{$item_id}");
        $response->assertStatus(200);

        $response = $this->get("/purchase/{$item_id}");
        $response->assertStatus(200);

        $response = $this->post("/purchase/store/{$item_id}", [
            'profile_id' => $user->profile->id,
            'merchandise_id' => $item_id,
            'pay' => '1',
            'address' => $user->profile->address,
        ]);
        $response->assertRedirect('/');

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('sold');
    }
}
