<?php


namespace App\Models\Restaurant;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'date',
        'amount',
    ];

    public function restaurant(){
        return $this->hasOne(Restaurant::class);
    }

    public function seats(){
        return $this->hasMany(Seat::class);
    }
}
