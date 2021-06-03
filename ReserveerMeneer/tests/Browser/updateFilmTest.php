<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class updateFilmTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_update_film()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/events-films/1/film-edit')
                ->type('email', 'admin@hotmail.com')
                ->type('password', 'password')
                ->click('.font-semibold') //button
                ->assertSee('Opslaan')
                ->type('name', 'test')
                ->click('.save') //button;
                ->assertSee('Films');
        });
    }
}
