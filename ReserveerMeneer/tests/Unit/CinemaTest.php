<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class CinemaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_seed()
    {
        $this->seeder();

        $this->seeder(CinemaSeeder::class);
    }

    public function test_entryAmount(){
        $this->assertDatabaseCount('cinemas', 10);
    }
}
