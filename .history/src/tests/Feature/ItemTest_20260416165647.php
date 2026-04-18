<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Merchandise;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $merchandises = Merchandise::factory()->count(10)->create();

        $response = $this->get('/');
        $response->assertStatus(200);

        foreach($merchandises as $merchandise) {
            $response->assertSee($merchandise->merchandise_name);
            $response->assertSee($merchandise->image);
        }
    }

    public function test_sold()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $merchandises = Merchandise::factory()->count(10)->create();

        $response = $this->get('/');
        $response->assertStatus(200);

        $merchandise = $merchandises->first;
        'item_id' => $merchandise->id;
        $response = $this->get('route('item.show')');
        $response->assertStatus(200);

        $response = $this->get('route('purchase.index')');
        $response->assertStatus(200);

        $response = $this=>post('/purchase/store/{item_id}');
        $response->assertStatus(200);
    }
}
