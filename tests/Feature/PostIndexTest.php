<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_all_posts_in_the_posts_directory(): void
    {
        $user = User::factory()->create();
        $post = new Post();
        $post->user_id = $user->id;
        $post->title = 'A sample post';
        $post->description = 'A description for the sample post.';
        $post->save();

        $response = $this->get(route('posts.index'));

        $response->assertOk()
            ->assertSeeText('Post directory')
            ->assertSeeText((string) $post->id)
            ->assertSeeText((string) $user->id)
            ->assertSeeText('A sample post')
            ->assertSeeText('A description for the sample post.');
    }
}
