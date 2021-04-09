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
            'name' => 'Ballonnenbrigade',
            'price' => '5.00',
            'max_tickets' => '100',
            'start_date' => '2021-04-01 09:00:00',
            'end_date' => '2021-04-01 19:00:00',
        ]);

        Event::create([
            'name' => 'Optreden van de Beatles (coverband)',
            'price' => '10.00',
            'max_tickets' => '100',
            'start_date' => '2021-06-01 16:00:00',
            'end_date' => '2021-06-03 22:00:00',
        ]);

        Event::create([
            'name' => 'Paaspop',
            'price' => '15.00',
            'max_tickets' => '100',
            'start_date' => '2021-05-02 12:00:00',
            'end_date' => '2021-05-09 18:00:00',
        ]);


    }
}
