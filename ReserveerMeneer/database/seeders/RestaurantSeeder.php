<?php

namespace Database\Seeders;

use App\Models\Restaurant\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        Restaurant::create([
            "name" => "Fabels",
            "type" => "Sushi",
            "monday_opening" => "12:00",
            "monday_closing" => "20:30",
            "tuesday_opening" => "12:00",
            "tuesday_closing" => "22:30",
            "wednesday_opening" => "12:00",
            "wednesday_closing" => "20:30",
            "thursday_opening" => "12:00",
            "thursday_closing" => "20:30",
            "friday_opening" => "12:00",
            "friday_closing" => "20:30",
            "saturday_opening" => "12:00",
            "saturday_closing" => "23:30",
            "sunday_opening" => "12:00",
            "sunday_closing" => "23:30",
            "amount_of_seats" => "30"]);

        Restaurant::create([
            "name" => "De Beren",
            "type" => "Snacks",
            "monday_opening" => "17:00",
            "monday_closing" => "22:30",
            "tuesday_opening" => "17:00",
            "tuesday_closing" => "22:30",
            "wednesday_opening" => "17:00",
            "wednesday_closing" => "22:30",
            "thursday_opening" => "17:00",
            "thursday_closing" => "22:30",
            "friday_opening" => "17:00",
            "friday_closing" => "22:30",
            "saturday_opening" => "17:00",
            "saturday_closing" => "23:30",
            "sunday_opening" => "17:00",
            "sunday_closing" => "23:30",
            "amount_of_seats" => "20"]);

        Restaurant::create([
            "name" => "Sakura",
            "type" => "Sushi",
            "monday_opening" => "11:00",
            "monday_closing" => "22:30",
            "tuesday_opening" => "11:00",
            "tuesday_closing" => "22:30",
            "wednesday_opening" => "11:00",
            "wednesday_closing" => "22:30",
            "thursday_opening" => "11:00",
            "thursday_closing" => "22:30",
            "friday_opening" => "11:00",
            "friday_closing" => "22:30",
            "saturday_opening" => "11:00",
            "saturday_closing" => "23:30",
            "sunday_opening" => "11:00",
            "sunday_closing" => "23:30",
            "amount_of_seats" => "240"]);
    }
}
