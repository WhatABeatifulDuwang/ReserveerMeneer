<?php


namespace App\Models\Cinema;


use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    use Encryptable;

    protected $fillable = [
        "hall_id",
        "name",
        "description",
        "start_date",
        "end_date",
    ];

    protected $encryptable = [
        "name",
        "description",
    ];

    public function hall(){
        return $this->hasOne(Hall::class, 'id', 'hall_id');
    }

    public function seats(){
        return $this->hasManyThrough(FilmSeat::class, FilmReservation::class, 'film_id', 'id', 'id', 'filmSeat_id');
    }
}
