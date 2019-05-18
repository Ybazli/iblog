<?php

namespace Tests\Unit;

use App\Post;
use App\Tag;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /** @test */
    public function tag_have_many_posts()
    {
        $tag = $this->create(Tag::class);
        $user = $this->create(User::class);
        $post1 = $this->make(Post::class , ['user_id' => $user->id]);
        $post2 = $this->make(Post::class , ['user_id' => $user->id]);
        $tag->posts()->save($post1);
        $tag->posts()->save($post2);
        $this->assertEquals(2 , $tag->posts->count());
    }

    /** @test */
    public function tag_most_have_unique_slug()
    {
        $name = 'hello world';
        $tag1 = $this->create(Tag::class , ['name' => $name]);
        $tag2 = $this->create(Tag::class , ['name' => $name]);

        $this->assertEquals(1 , Tag::where('slug' , str_slug($name))->count());

    }
}
