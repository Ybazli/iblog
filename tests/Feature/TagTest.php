<?php

namespace Tests\Feature;

use App\Http\Controllers\Traids\Messageable;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /** @test */
    public function tags_has_a_index_page()
    {
        $this->loginAsAdmin();
        $this->get(route('tags.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function admin_users_only_can_see_tags_index_page()
    {
        $this->loginAsAdmin();
        $this->get(route('tags.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function users_not_admin_cant_see_tags_index_page()
    {
        $this->login();
        $this->get(route('tags.index'))
            ->assertStatus(403)
            ->assertSeeText('dont have permission');
    }

    /** @test */
    public function guest_user_cant_see_tags_index_page()
    {
        $this->get(route('tags.index'))
            ->assertStatus(302);
    }

    /** @test */
    public function tag_index_page_most_have_latest_tag_list()
    {
        $this->loginAsAdmin();
        $this->create(Tag::class, ['created_at' => Carbon::yesterday()], 20);

        $last = $this->create(Tag::class);

        $this->get(route('tags.index'))
            ->assertSee($last->name);
    }

    /** @test */
    public function tag_most_have_name()
    {
        $this->loginAsAdmin();
        $tag = $this->raw(Tag::class, ['name' => '']);
        $this->post(route('tags.store'), $tag)
            ->assertStatus(302)
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function admin_can_store_a_tag_with_valid_data()
    {
        $this->loginAsAdmin();
        $tag = $this->raw(Tag::class);

        $this->post(route('tags.store' ,  $tag))
            ->assertStatus(302)
            ->assertRedirect(route('tags.index'))
            ->assertSessionHas(['message' => 'The Tag was created successfully.']);
        $this->assertDatabaseHas('tags' , ['name' => $tag['name']]);
    }

    /** @test */
    public function admin_can_delete_tag()
    {
        $this->loginAsAdmin();
        $tag = $this->create(Tag::class);
        $this->delete(route('tags.delete' , $tag))
            ->assertStatus(302)
            ->assertRedirect(route('tags.index'))
            ->assertSessionHas(['message' => 'The Tag was deleted successfully.']);
        $this->assertDatabaseMissing('tags' , ['name' => $tag->name]);

    }

    /** @test */
    public function unauthenticated_admin_user_cant_delete_tag()
    {
        $this->login();
        $tag = $this->create(Tag::class);
        $this->delete(route('tags.delete' , $tag))
            ->assertStatus(403);
        $this->assertDatabaseHas('tags' , ['name' => $tag->name]);
    }

    /** @test */
    public function admin_users_can_update_tag()
    {
        $this->loginAsAdmin();
        $tag = $this->create(Tag::class);
        $updated = ['name' => 'hello world' , 'slug'];
        $this->patch(route('tags.update' , $tag) , $updated)
            ->assertStatus(302)
            ->assertSessionHasNoErrors()
            ->assertSessionHas(['message' => 'The Tag was updated successfully.']);
        $this->assertDatabaseHas('tags' , ['name' => $updated['name']]);
        $this->assertDatabaseMissing('tags' , ['name' => $tag->name]);

    }

    /** @test */
    public function only_admin_users_can_see_tag_edit_form()
    {
        $this->login();
        $tag = $this->create(Tag::class);
        $this->get(route('tags.edit' , $tag))
            ->assertStatus(403);

        $this->loginAsAdmin();
        $this->get(route('tags.edit' , $tag))
            ->assertStatus(200)
            ->assertSee($tag->name);
    }
}
