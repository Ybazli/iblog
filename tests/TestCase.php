<?php

namespace Tests;

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
        return $this->actingAs(factory('App\User')->create(['is_admin' => true]));
    }

    protected function create($class , $params = [])
    {
        return factory($class)->create($params);
    }

    protected function make($class , $params = [])
    {
        return factory($class)->make($params);
    }

    protected function raw($class , $params = [])
    {
        return factory($class)->raw($params);
    }
}
