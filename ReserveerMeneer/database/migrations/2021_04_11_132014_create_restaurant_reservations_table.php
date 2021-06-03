<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('restaurant_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign("restaurant_id")->references("id")->on("restaurants")->onDelete('cascade');
            $table->date("date");
            $table->time("time");
            $table->text("firstname");
            $table->text("lastname");
            $table->text("email");
            $table->text("address");
            $table->text("postal_code");
            $table->text("city");
            $table->boolean("waiting_list");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurant_reservations');
    }
}
