<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Throwable;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    public function test_anyone_can_visit_posts()
    {
        $this->get(route('posts.index'))->assertStatus(200);

    }

    public function test_a_guest_can_not_visit_post_create_form()
    {
        $this->get(route('posts.create'))->assertRedirect('/login');
    }

    public function test_user_with_not_admin_role_cant_show_post_create_page()
    {
        $this->login();
        $this->get(route('posts.create'))
            ->assertStatus(403);
    }

    /** @test */
    public function it_admin_can_visit_post_create_form()
    {
        $this->loginAsAdmin();
        $this->get(route('posts.create'))
            ->assertSeeText('create');
    }


}
