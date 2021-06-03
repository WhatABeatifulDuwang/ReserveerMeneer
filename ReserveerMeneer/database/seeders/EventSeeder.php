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
            'name' => 'Concert Guus Meeuwis',
            'description' => 'Een mooi concert van onze Nederlandse legende.',
            'price' => '5.00',
            'max_tickets' => '100',
            'start_date' => '2021-07-01 09:00:00',
            'end_date' => '2021-07-01 19:00:00',
            'address' => 'Groenenweg 12',
            'city' => 'Spakenisse',
        ]);

        Event::create([
            'name' => 'Act van de Hans Klok',
            'description' => 'Word verrast door de goocheltrucs van Hans',
            'price' => '10.00',
            'max_tickets' => '100',
            'start_date' => '2021-06-01 16:00:00',
            'end_date' => '2021-06-03 22:00:00',
            'address' => 'Blankenweg 14',
            'city' => 'Perlen',
        ]);

        Event::create([
            'name' => 'Pinkpop',
            'description' => 'Dit festival is een week vol met hiphop muziek van diverse artiesten.',
            'price' => '15.00',
            'max_tickets' => '100',
            'start_date' => '2021-05-02 12:00:00',
            'end_date' => '2021-05-09 18:00:00',
            'address' => 'Tegelweg 61',
            'city' => 'Maarssen',
        ]);
    }
}
