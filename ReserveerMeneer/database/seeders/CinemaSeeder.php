<?php

namespace Database\Seeders;

use App\Models\Cinema\Cinema;
use App\Models\Cinema\Film;
use App\Models\Cinema\FilmSeat;
use App\Models\Cinema\Hall;
use App\Models\Cinema\Seat;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    private const minWidth = 7;
    private const minHeight = 9;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cinema::create([
            'name' => 'AnexxCinema',
            'address' => 'Linschoterweg 12',
            'city' => 'Woerden',
        ]);
        Cinema::create([
            'name' => 'Pathe',
            'address' => 'Uterechtse straatweg 10',
            'city' => 'Utrecht',
        ]);

        Hall::create([
            'cinema_id' => '1'
        ]);
        Hall::create([
            'cinema_id' => '1'
        ]);
        Hall::create([
            'cinema_id' => '1'
        ]);
        Hall::create([
            'cinema_id' => '2'
        ]);
        Hall::create([
            'cinema_id' => '2'
        ]);
        Hall::create([
            'cinema_id' => '2'
        ]);

        // for each hall, create an increasing number of seats
        for ($i = 0; $i < 6; $i++) {
            for ($y = 0; $y < (self::minHeight + $i); $y++) {
                for ($x = 0; $x < (self::minWidth + $i); $x++) {
                    Seat::create([
                        'hall_id' => ($i + 1),
                        'x' => $x,
                        'y' => $y,
                    ]);
                }
            }
        }

        Film::create([
            'hall_id' => '1',
            'name' => 'Thunder Force',
            'description' => 'Thunder Force is een Amerikaanse superheldenkomedie uit 2021, geschreven en geregisseerd door Ben Falcone, met in de hoofdrollen Melissa McCarthy, Octavia Spencer, Bobby Cannavale, Pom Klementieff, Taylor Mosby, met Melissa Leo en Jason Bateman.',
            'start_date' => '2021-06-01 10:00:00',
            'end_date' => '2021-06-01 11:40:00'
        ]);
        Film::create([
            'hall_id' => '1',
            'name' => 'Concrete Cowboy',
            'description' => 'Concrete Cowboy is een Amerikaanse westerndrama uit 2020 geregisseerd door Ricky Staub',
            'start_date' => '2021-06-01 11:00:00',
            'end_date' => '2021-06-01 13:40:00'
        ]);
        Film::create([
            'hall_id' => '2',
            'name' => 'Joker',
            'description' => 'Joker is een Amerikaans psychologisch drama uit 2019 onder regie van Todd Phillips.',
            'start_date' => '2021-06-01 14:00:00',
            'end_date' => '2021-06-01 15:40:00'
        ]);
        Film::create([
            'hall_id' => '2',
            'name' => 'The Midnight Sky',
            'description' => 'The Midnight Sky is een Amerikaanse sciencefiction- en dramafilm uit 2020 onder regie van George Clooney',
            'start_date' => '2021-06-01 16:00:00',
            'end_date' => '2021-06-01 17:40:00'
        ]);
        Film::create([
            'hall_id' => '3',
            'name' => 'Wonder Woman 1984',
            'description' => 'Wonder Woman 1984 is een Amerikaanse superheldenfilm uit 2020, onder regie van Patty Jenkins.',
            'start_date' => '2021-06-01 18:00:00',
            'end_date' => '2021-06-01 19:40:00'
        ]);
        Film::create([
            'hall_id' => '3',
            'name' => 'Raya en de Laatste Draak',
            'description' => 'Raya and the Last Dragon is een Amerikaanse 3D-computeranimatiefilm uit 2021, geproduceerd door de Walt Disney Animation Studios en geregisseerd door Don Hall en Carlos López Estrada.',
            'start_date' => '2021-06-02 10:00:00',
            'end_date' => '2021-06-02 11:40:00'
        ]);
        Film::create([
            'hall_id' => '4',
            'name' => 'The Trial of the Chicago 7',
            'description' => 'The Trial of the Chicago 7 is een Amerikaanse historische dramafilm uit 2020 die geschreven en geregisseerd werd door Aaron Sorkin.',
            'start_date' => '2021-06-02 12:00:00',
            'end_date' => '2021-06-02 13:40:00'
        ]);
        Film::create([
            'hall_id' => '4',
            'name' => 'After',
            'description' => 'After is een Amerikaanse film uit 2019 geregisseerd door Jenny Gage, gebaseerd op de boekenreeks van Anna Todd.',
            'start_date' => '2021-06-02 14:00:00',
            'end_date' => '2021-06-02 15:40:00'
        ]);
        Film::create([
            'hall_id' => '5',
            'name' => 'News of the World',
            'description' => 'News of the World is een Amerikaanse western uit 2020 onder regie van Paul Greengrass.',
            'start_date' => '2021-06-02 16:00:00',
            'end_date' => '2021-06-02 17:40:00'
        ]);
        Film::create([
            'hall_id' => '5',
            'name' => 'The Lighting',
            'description' => 'Wanneer dit gezin naar hun zomerhuis gaat had niemand kunnen verwachten wat daar zou gebeuren...',
            'start_date' => '2021-06-02 18:00:00',
            'end_date' => '2021-06-02 19:40:00'
        ]);
        Film::create([
            'hall_id' => '6',
            'name' => 'Zack Snyders Justice League',
            'description' => 'De Justice League van Zack Snyder, vaak de "Snyder Cut" genoemd, is de regisseur van de Amerikaanse superheldenfilm Justice League uit 2017.',
            'start_date' => '2021-06-01 20:00:00',
            'end_date' => '2021-06-01 21:40:00'
        ]);
        Film::create([
            'hall_id' => '6',
            'name' => 'Bohemian Rhapsody',
            'description' => 'Bohemian Rhapsody is een biografische film uit 2018 over de Britse rockband Queen. ',
            'start_date' => '2021-06-02 20:00:00',
            'end_date' => '2021-06-02 21:40:00'
        ]);

        // for each film, create seats
        $films = Film::all();
        foreach ($films as $film) {
            $seats = Seat::where('hall_id', $film->hall_id)->get();
            foreach ($seats as $seat) {
                FilmSeat::create([
                    'film_id' => $film->id,
                    'seat_id' => $seat->id,
                    'x' => $seat->x,
                    'y' => $seat->y,
                    'reserved' => '0'
                ]);
            }
        }
    }
}
