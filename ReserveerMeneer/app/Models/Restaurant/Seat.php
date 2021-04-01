<?php


namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'reserved',
    ];

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}

