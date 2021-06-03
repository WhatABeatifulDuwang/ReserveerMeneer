<?php

namespace Tests\Unit;

use Database\Seeders\RestaurantSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class RestaurantTest extends TestCase
{
    use RefreshDatabase;
    protected $seeder = RestaurantSeeder::class;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_seed()
    {
        $this->seeder();
    }

    public function test_entryAmount(){
        $this->assertDatabaseCount('restaurants', 5);
    }
}
