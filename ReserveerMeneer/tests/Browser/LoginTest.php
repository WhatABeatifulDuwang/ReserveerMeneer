<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_can_render_login_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Email')
                    ->assertSee('Password');
        });
    }

    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@hotmail.com')
                ->type('password', 'password')
                ->click('.font-semibold') //button
                ->assertSee('Welkom!');
        });
    }

    public function testLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Welkom!')
                ->click('.btn')
                ->assertSee('Log in');
        });
    }
}
