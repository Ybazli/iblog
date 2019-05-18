<?php

namespace Tests;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function login()
    {
        return $this->actingAs(factory('App\User')->create());
    }

    protected function loginAsAdmin()
    {
        return $this->actingAs(factory('App\User')->create(['email' => config('iblog.admins')[0]]));
    }

    protected function create($class , $params = [] , $counter = null)
    {
        return factory($class , $counter)->create($params);
    }

    protected function make($class , $params = [])
    {
        return factory($class)->make($params);
    }

    protected function raw($class , $params = [])
    {
        return factory($class)->raw($params);
    }

    protected function createPostWithUser()
    {
        $user = $this->create(User::class);
        return $this->create(Post::class , ['user_id' => $user->id]);
    }
}
