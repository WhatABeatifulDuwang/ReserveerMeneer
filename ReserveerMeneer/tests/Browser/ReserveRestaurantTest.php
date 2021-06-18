<?php

namespace Tests\Browser;

use Carbon\Carbon;
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
        $date = Carbon::now()->format("d-m-Y");
        $this->browse(function (Browser $browser) use ($date) {
            $browser->visit('/restaurants/1/reservation')
                    ->assertSee('Maak een reservering')
                    ->type('firstname', 'milan')
                    ->type('lastname', 'test')
                    ->type('email', 'milan@test.com')
                    ->type('address', 'berlengakade 35')
                    ->type('postal_code', '3446BG')
                    ->type('city', 'woerden')
                    ->type('date', $date)
                    ->type('time', '12:00')
                    ->click('.reserve')
                    ->assertSee('Bedankt voor je reservering');
        });
    }
}
