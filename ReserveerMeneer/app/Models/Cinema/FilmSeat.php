<?php

namespace App\Models\Cinema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmSeat extends Model
{
    use HasFactory;

    protected $fillable = [
        "film_id",
        "seat_id",
        "x",
        "y",
        "occupied",
    ];
}
