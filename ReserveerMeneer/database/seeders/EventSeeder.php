<?php

namespace Database\Seeders;

use App\Models\Event\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'Veerplas festival',
            'description' => 'Dit jaarlijkse festival is bedoeld voor volwassenen die houden van Techno!',
            'price' => '25.95',
            'max_tickets' => '80',
            'start_date' => '2021-04-25 09:00:00',
            'end_date' => '2021-04-25 19:00:00',
        ]);

        Event::create([
            'name' => 'Optreden van Guus Meeuwis',
            'description' => 'Luister 2 dagen lang naar onze Nederlandse Legende: Guus Meeuwis.',
            'price' => '20.00',
            'max_tickets' => '20',
            'start_date' => '2021-06-01 16:00:00',
            'end_date' => '2021-06-03 22:00:00',
        ]);

        Event::create([
            'name' => 'Pinkpop',
            'description' => 'Dit festival is een week vol met geweldige muziek van diverse artiesten.',
            'price' => '25.00',
            'max_tickets' => '75',
            'start_date' => '2021-05-02 12:00:00',
            'end_date' => '2021-05-09 18:00:00',
        ]);
    }
}
