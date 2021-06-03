<?php

namespace App\Models\Cinema;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmReservation extends Model
{
    use HasFactory;
    use Encryptable;

    protected $fillable = [
        "film_id",
        "seat_id",
        "name",
        "email",
        "address",
        "postal_code",
        "city",
    ];

    protected $encryptable = [
        "name",
        "address",
        "city",
    ];

    public function film(){
        return $this->hasOne(Film::class, 'id', 'film_id');
    }

    public function seats(){
        return $this->hasMany(FilmSeat::class);
    }
}
