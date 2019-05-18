<?php

namespace Tests\Feature;

use App\Category;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{

    use DatabaseMigrations;
    use RefreshDatabase;



    /** @test */
    public function categories_has_index_page_and_categories_show_by_latest()
    {
        $this->loginAsAdmin();
        $this->create(Category::class , ['created_at' => Carbon::yesterday()] , 25);
        $newCategory = $this->create(Category::class);
        $this->get(route('categories.index'))
            ->assertStatus(200)
            ->assertSee($newCategory->name);
    }

    /** @test */
    public function admin_user_can_post_a_category()
    {
        $this->loginAsAdmin();
        $category = $this->raw(Category::class);
        $this->post(route('categories.store' , $category))
            ->assertStatus(302)
            ->assertRedirect(route('categories.index'))
            ->assertSessionHas('message' , 'The Category was created successfully.');
    }
    
    /** @test */
    public function category_has_create_form_and_only_admin_users_can_see_it()
    {
        $this->get(route('categories.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->login();
        $this->get(route('categories.create'))
            ->assertStatus(403)
            ->assertSee('You dont have permission to access this route');

        $this->loginAsAdmin();
        $this->get(route('categories.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function admin_can_delete_a_category()
    {
        $this->loginAsAdmin();
        $category = $this->create(Category::class);
        $this->delete(route('categories.delete' , $category))
            ->assertStatus(302)
            ->assertSessionHas('message' , 'The Category was deleted successfully.');
        $this->assertDatabaseMissing('categories' , ['name' => $category->name]);
    }

    /** @test */
    public function admin_can_see_category_edit_form()
    {
        $this->loginAsAdmin();
        $category = $this->create(Category::class);
        $this->get(route('categories.edit' , $category))
            ->assertStatus(200)
            ->assertSee($category->name);
    }


    /** @test */
    public function admin_users_can_update_category()
    {
        $this->loginAsAdmin();
        $category = $this->create(Category::class, ['name' => 'hello world']);
        
        $updatedCatgory = ['name' => 'hello world 2'];

        $this->patch(route('categories.update' , $category) , $updatedCatgory)
            ->assertStatus(302)
            ->assertSessionHas('message' , 'The Category was updated successfully.');

        $this->assertDatabaseHas('categories' , ['name' => $updatedCatgory['name']]);
        $this->assertDatabaseMissing('categories' , ['name' => $category->name]);

        



    }

}
