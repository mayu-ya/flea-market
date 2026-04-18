<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
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
                    ->post("/purchase/{$item_id}", [
                        'profile_id' => $user->profile->id,
                        'post_code' => '123-4567',
                        'address' => '京都',
                        'building' => 'aaa',
                    ]);
        
        $response ->assertStatus(302);
        $response ->assertRedirect("/purchase/{$item_id}");

        $response = $this->get(route('purchase.index', ['item_id' => $item_id]))->assertStatus(200);

        $response->assertSee('123-4567');
        $response->assertSee('京都');
        $response->assertSee('aaa');
    }

    public function test_sell()
    {
        $user = User::factory()->hasProfile()->create();
        $categoryId = 11;

        $response = $this->actingAs($user)->get('/')->assertStatus(200);
        $response = $this->get('/sell')->assertStatus(200);
        $response = $this->from('/sell')
                    ->post('/', [
                        'profile_id' => $user->profile->id,
                        'image' => UploadedFile::fake()->create('item.png', 100),
                        'content' => [$categoryId],
                        'condition' => 1,
                        'merchandise_name' => 'セル',
                        'brand_name' => 'sample',
                        'explanation' => 'サンプルテキスト',
                        'price' => 1000
                    ]);
        //$response->dump();

        //$response->assertSessionHasNoErrors();

        dump('ステータスコード: ' . $response->getStatusCode());
        dump('リダイレクト先: ' . $response->headers->get('Location'));

        if (session('errors')) {
        dump("バリデーションエラーが発生しています：");
        dd(session('errors')->getMessages());
    }

        $response = $this->assertDatabaseHas('merchandises', [
                        'condition' => 1,
                        'merchandise_name' => 'セル',
                        'brand_name' => 'sample',
                        'explanation' => 'サンプルテキスト',
                        'price' => 1000
        ]);

        $merchandise = Merchandise::where('merchandise_name', 'セル')->first();

        $this->assertNotNull($merchandise, '商品はDBに保存されていません');

        $response = $this->assertDatabaseHas('details', [
                        'category_id' => $categoryId,
        ]);
    }
}
