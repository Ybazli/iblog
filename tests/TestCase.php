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
}
