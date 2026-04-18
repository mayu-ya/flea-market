<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Merchandise;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

class ItemTest extends TestCase
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
            'contact' => 'コメントを入力してください',
        ]);
    }

    public function test_comment_max()
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
                        'contact' => 'サ, 255'
                   ]);

        $response ->assertStatus(302);
        $response ->assertRedirect('/item/{$item_id}');
        
        $response -> assertSessionHasErrors([
            'contact' => 'コメントは255文字以下で入力してください',
        ]);
    }
}
