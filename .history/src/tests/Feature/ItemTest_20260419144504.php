<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Merchandise;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_item()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->hasComments(1)
            ->create();
        $item_id = $merchandise->id;

        $response = $this->get("/item/{$item_id}")->assertStatus(200);
        $like = Like::firstOrCreate([
                    'merchandise_id' => $merchandise->id,
                    'profile_id' => $user->profile->id,
                ]);

        $response->assertSee($merchandise->image);
        $response->assertSee($merchandise->merchandise_name);
        $response->assertSee($merchandise->brand_name);
        $response->assertSee($merchandise->price);
        $response->assertSee($merchandise->condition);
        $response->assertSee($merchandise->explanation);
        $response->assertSee($merchandise->categories->first()->content);
        $response->assertSee($merchandise->comments->first()->profile->name);
        $response->assertSee($merchandise->comments->first()->profile->image);
        $response->assertSee($merchandise->comments->first()->contact);
        $this->assertDatabaseCount('comments', 1);
        $this->assertDatabaseCount('likes', 1);
    }

    public function test_categories()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()
            ->hasCategories(3)
            ->create();
        $item_id = $merchandise->id;

        $response = $this->get("/item/{$item_id}")->assertStatus(200);

        foreach ($merchandise->categories as $category)
        $response->assertSee($category->content);
    }

    public function test_comment_submit()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->create();
        $item_id = $merchandise->id;

        $response = $this->actingAs($user)->get('/')->assertStatus(200);
        $response = $this->get("/item/{$item_id}")->assertStatus(200);
        $response =$this->from('/item/{$item_id}')
                   ->post('/posts/comment', [
                        'profile_id' => $user->profile->id,
                        'merchandise_id' => $merchandise->id,
                        'contact' => 'サンプルテスト'
                   ]);
        
        $response = $this->assertDatabaseHas('comments', [
                        'contact' => 'サンプルテスト',
        ]);
    }

    public function test_comment_required()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->create();
        $item_id = $merchandise->id;

        $response = $this->actingAs($user)->get('/')->assertStatus(200);
        $response = $this->get("/item/{$item_id}")->assertStatus(200);
        $response =$this->from('/item/{$item_id}')
                   ->post('/posts/comment', [
                        'profile_id' => $user->profile->id,
                        'merchandise_id' => $merchandise->id,
                        'contact' => ''
                   ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/item/{$item_id}');
        
        $response -> assertSessionHasErrors([
            'contact' => 'コメントを入力してください'
        ]);
    }

    public function test_comment_max()
    {
        $user = User::factory()->hasProfile()->create();
        $merchandise = Merchandise::factory()
            ->hasCategories(1)
            ->create();
        $item_id = $merchandise->id;

        $comment_long = str_repeat('あ', 256);

        $response = $this->actingAs($user)->get('/')->assertStatus(200);
        $response = $this->get("/item/{$item_id}")->assertStatus(200);
        $response =$this->from('/item/{$item_id}')
                   ->post('/posts/comment', [
                        'profile_id' => $user->profile->id,
                        'merchandise_id' => $merchandise->id,
                        'contact' => $comment_long
                   ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/item/{$item_id}');
        
        $response -> assertSessionHasErrors([
            'contact' => 'コメントは255文字以下で入力してください'
        ]);
    }
}
