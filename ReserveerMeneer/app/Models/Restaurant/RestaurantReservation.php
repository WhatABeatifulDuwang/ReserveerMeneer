<?php

namespace App\Models\Restaurant;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantReservation extends Model
{
    use HasFactory;
    use Encryptable;

    protected $fillable = [
        "restaurant_id",
        "date",
        "time",
        "firstname",
        "lastname",
        "email",
        "address",
        "postal_code",
        "city",
        "waiting_list",
    ];

    protected $encryptable = [
        "firstname",
        "lastname",
        "address",
        "city",
    ];

    public function restaurant(){
        return $this->hasOne(Restaurant::class, 'id', 'restaurant_id');
    }
}
