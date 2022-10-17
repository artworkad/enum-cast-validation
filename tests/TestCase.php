<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    use RefreshDatabase {
        refreshDatabase as baseRefreshDatabase;
    }

    /**
     * Seed the database before testing.
     */
    public function refreshDatabase()
    {
        $this->baseRefreshDatabase();
    }
}
