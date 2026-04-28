<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Merchandise;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Like;

class IndexTest extends TestCase
{
    use RefreshDatabase;

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
        $merchandise = Merchandise::factory()->hasPurchase()->create();

        $response = $this->get('/')->assertStatus(200);

        $response->assertSee('sold');
    }

    public function test_login_index()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()->create([
            'profile_id' => $user->profile->id,
            'merchandise_name' => '自分'
        ]);

        $other = User::factory()->hasProfile()->create();
        $othermerchandise = Merchandise::factory()->create([
            'profile_id' => $other->profile->id,
            'merchandise_name' => '他人'
        ]);

        $response = $this->actingAs($user)->get('/')->assertStatus(200);

        $response->assertSee('他人');
        $response->assertDontSee('自分');
    }

    public function test_mylist()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()->create([
            'profile_id' => $user->profile->id,
            'merchandise_name' => 'いいね'
        ]);
        $like = Like::firstOrCreate([
                    'merchandise_id' => $merchandise->id,
                    'profile_id' => $user->profile->id,
                ]);

        $other = User::factory()->hasProfile()->create();
        $othermerchandise = Merchandise::factory()->create([
            'profile_id' => $other->profile->id,
            'merchandise_name' => '商品'
        ]);

        $response = $this->actingAs($user)->get('/?tab=mylist')->assertStatus(200);

        $response->assertSee('いいね');
    }

    public function test_mylist_sold()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()->hasPurchase()->create();
        $like = Like::firstOrCreate([
                    'merchandise_id' => $merchandise->id,
                    'profile_id' => $user->profile->id,
                ]);

        $response = $this->actingAs($user)->get('/?tab=mylist')->assertStatus(200);

        $response->assertSee('sold');
    }

    public function test_mylist_noauth()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()->create([
            'merchandise_name' => '商品'
        ]);

        $response = $this->get('/?tab=mylist')->assertStatus(200);

        $response->assertDontSee('商品');
    }

    public function test_search()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()->create([
            'merchandise_name' => '商品'
        ]);

        $response = $this->get('/')->assertStatus(200);
        $response = $this->from('/')
                    ->get('/', [
                        'keyword' => '品'
                    ]);

        $response->assertSee('商品');
    }

    public function test_search_mylist()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()->create([
            'merchandise_name' => '商品'
        ]);
        $like = Like::firstOrCreate([
                    'merchandise_id' => $merchandise->id,
                    'profile_id' => $user->profile->id,
                ]);

        $item = Merchandise::factory()->create([
            'merchandise_name' => 'アイテム'
        ]);
        $like = Like::firstOrCreate([
                    'merchandise_id' => $item->id,
                    'profile_id' => $user->profile->id,
                ]);

        $response = $this->actingAs($user)->get('/')->assertStatus(200);
        $response = $this->from('/')
                    ->get('/', [
                        'keyword' => '商品'
                    ]);

        $response = $this->get('/?tab=mylist', 'keyword=>商品');

        $response->assertSee('商品');
        $response->assertDontSee('アイテム');
    }
}
