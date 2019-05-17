<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /** @test */
    public function post_search_most_be_return_post()
    {

        $this->loginAsAdmin();
        $title = 'hello world';
        $post = $this->create(Post::class ,
            [
                'user_id' => $this->create(User::class)->id ,
                'title' => $title
            ]);

        $data = [
            'q' => $title,
            'type' => 'posts'
        ];
        $response = $this->get(route('search' , $data));
        $response->assertSee($title);
        $response->assertDontSee('something different');

    }

    /** @test */
    public function it_search_most_have_type_value()
    {
        $this->loginAsAdmin();
        $this->get(route('search' , ['q' => 'something']))
            ->assertStatus(302)
            ->assertSessionHasErrors('type');
    }

    /** @test */
    public function it_search_most_have_specific_value()
    {
        $this->loginAsAdmin();
        $this->get(route('search' , ['q' => 'something' , 'type' => 'new']))
            ->assertStatus(302)
            ->assertSessionHasErrors('type');
    }

    /** @test */
    public function it_only_admin_users_can_search()
    {
        $this->login();
        $this->get(route('search' , ['q' => 'something']))
            ->assertStatus(403);
    }
}
