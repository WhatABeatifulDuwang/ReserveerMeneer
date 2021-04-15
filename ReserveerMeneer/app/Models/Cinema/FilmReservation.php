<?php

namespace App\Models\Cinema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "film_id",
        "seat_id",
        "name",
        "email",
        "address",
        "postal_code",
        "city",
    ];

    public function film(){
        return $this->hasOne(Film::class, 'id', 'film_id');
    }

    public function seats(){
        return $this->hasMany(FilmSeat::class);
    }
}
