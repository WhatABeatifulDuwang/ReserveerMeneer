<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');

        Artisan::call('db:seed');

        Artisan::call('db:seed', ['--class' => 'EventSeeder ', '--database' => 'testing']);
    }
}
