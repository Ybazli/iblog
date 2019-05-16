<?php

namespace Tests\Unit;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
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
        $post = $this->createPostWithUser();

        $this->assertArrayHasKey('tags' , $post);
    }


    /** @test */
    public function post_addTag_method_can_find_or_create_tag_and_fetch_it_to_post()
    {

        $post = $this->createPostWithUser();
        $tag = $this->create(Tag::class);

        $tags = ['hello' , 'something new' , 'its awesome' , $tag->id];

        $post->addTag($tags);

        $this->assertEquals(count($tags) , $post->tags->count());
    }

    /** @test */
    public function it_post_create_user_most_instance_of_user_class()
    {
        $post = $this->createPostWithUser();

        $this->assertInstanceOf('App\User', $post->owner);
    }

    /** @test */
    public function it_post_tags_most_instance_of_tag_class()
    {
        $post = $this->createPostWithUser();
        $post->addtag(['hello world']);

        $this->assertInstanceOf(Tag::class , $post->tags{0});
        $this->assertEquals('hello world' , $post->tags{0}->name);
    }

    /** @test */
    public function it_post_category_most_instance_of_category_class()
    {
        $post = $this->createPostWithUser();
        $this->assertInstanceOf(Category::class , $post->category);
    }
}
