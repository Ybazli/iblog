<?php

namespace Tests\Feature;

use App\Post;
use Barryvdh\Debugbar\Facade;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /** @test */
    public function it_authentication_admin_user_can_see_post_create_form()
    {
        $this->loginAsAdmin();
        $this->get(route('posts.create'))
            ->assertStatus(200)
            ->assertSee('create');
    }

    /** @test */
    public function it_authenticated_with_not_admin_role_cant_see_post_create_form()
    {
        $this->login();
        $this->get(route('posts.create'))
            ->assertStatus(403);

    }

    /** @test */
    public function it_unauthenticated_admin_users_cant_see_post_update_form()
    {
        $this->login();
        $post = $this->create(Post::class , ['user_id' => auth()->user()->id]);
        $this->get(route('posts.edit' , $post))
            ->assertStatus(403);
    }

    /** @test */
    public function it_unauthenticated_admin_users_cant_see_post_index_page()
    {
        $this->login();
        $this->get(route('posts.index'))
            ->assertStatus(403);
    }

    /** @test */
    public function it_unauthenticated_admin_users_cant_post_a_article_post()
    {
        $this->login();

        $post = $this->raw(Post::class , ['title' => 'hello world']);

        $this->post(route('posts.store') , $post)
            ->assertStatus(403);

            $this->assertDatabaseMissing('posts' ,
                [
                    'title' => $post['title']
                ]);
    }

    /** @test */
    public function it_unauthenticated_admin_users_delete_a_article_post()
    {
        $this->login();
        $post = $this->create(Post::class , ['user_id' => auth()->user()->id] );
        $this->delete(route('posts.delete' , $post))
            ->assertStatus(403);
        $this->assertDatabaseHas('posts' , [
            'title' => $post->title
        ]);
    }

    /** @test */
    public function it_post_can_deletable_by_admin()
    {
        $this->loginAsAdmin();
        $post = $this->create(Post::class , ['user_id' => auth()->user()->id]);
        $this->delete(route('posts.delete' , $post))
            ->assertStatus(302)
            ->assertSessionHas('message');
        $this->assertDatabaseMissing('posts' , [
            'id' => $post->id
        ]);
    }

    /** @test */
    public function it_post_most_have_title()
    {
        $this->loginAsAdmin();
        $post = $this->raw(Post::class , ['title' => '']);

        $this->post(route('posts.store') , $post)
            ->assertStatus(302)
            ->assertSessionHasErrors('title');
    }
    
    /** @test */
    public function it_post_article_most_have_body()
    {
        $this->loginAsAdmin();
        $post = $this->raw(Post::class , ['body' => '']);

        $this->post(route('posts.store') , $post)
            ->assertStatus(302)
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function it_post_article_most_have_category_id()
    {
        $this->loginAsAdmin();
        $post = $this->raw(Post::class , ['category_id' => '']);

        $this->post(route('posts.store') , $post)
            ->assertStatus(302)
            ->assertSessionHasErrors('category_id');
    }

}
