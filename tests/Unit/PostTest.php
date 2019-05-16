<?php

namespace Tests\Unit;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    /** @test */
    public function it_post_article_most_be_have_unique_slug()
    {
        $user = $this->create(User::class);
        $post1 = $this->create(Post::class , ['title' => 'hello world' , 'user_id' => $user->id]);
        $post2 = $this->create(Post::class , ['title' => 'hello world' , 'user_id' => $user->id]);

        //assert count of all of post with hello world slug most be 1 not 2
        $postCount = Post::where('slug' , str_slug($post1->title))->count();
        $this->assertEquals(1 , $postCount);

        $this->assertDatabaseHas('posts' , [
            'slug' => str_slug($post1->title)
        ]);

        $this->assertDatabaseHas('posts' , [
            'slug' => str_slug($post2->title).'-1'
        ]);
    }

    
    /** @test */
    public function it_post_most_return_with_tags()
    {
        $user = $this->create(User::class);
        $post = $this->create(Post::class , ['user_id' => $user->id]);

        $this->assertArrayHasKey('tags' , $post);
    }
}
