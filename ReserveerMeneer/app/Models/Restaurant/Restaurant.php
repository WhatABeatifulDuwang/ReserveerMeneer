<?php


namespace App\Models\Restaurant;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'amount_of_seats'
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
