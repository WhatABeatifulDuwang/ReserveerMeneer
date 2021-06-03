<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("type");
            $table->time("monday_opening", $precision = 0);
            $table->time("monday_closing", $precision = 0);
            $table->time("tuesday_opening", $precision = 0);
            $table->time("tuesday_closing", $precision = 0);
            $table->time("wednesday_opening", $precision = 0);
            $table->time("wednesday_closing", $precision = 0);
            $table->time("thursday_opening", $precision = 0);
            $table->time("thursday_closing", $precision = 0);
            $table->time("friday_opening", $precision = 0);
            $table->time("friday_closing", $precision = 0);
            $table->time("saturday_opening", $precision = 0);
            $table->time("saturday_closing", $precision = 0);
            $table->time("sunday_opening", $precision = 0);
            $table->time("sunday_closing", $precision = 0);
            $table->integer("amount_of_seats");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
