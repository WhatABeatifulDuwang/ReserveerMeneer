<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReserveRestaurantTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testReserve()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/restaurants/1/reservation')
                    ->assertSee('Maak een reservering')
                    ->type('firstname', 'milan')
                    ->type('lastname', 'test')
                    ->type('email', 'milan@test.com')
                    ->type('address', 'berlengakade 35')
                    ->type('postal_code', '3446BG')
                    ->type('city', 'woerden')
                    ->type('date', '12-06-2021')
                    ->type('time', '12:00')
                    ->click('.reserve')
                    ->assertSee('Bedankt voor je reservering');
        });
    }
}
