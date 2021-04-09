<?php


namespace App\Models\Event;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "event_id",
        "name",
        "email",
        "img",
        "start_date",
        "end_date",
        "ticket_number",
        "total_price"
    ];

    public function restaurant(){
        return $this->hasOne(Restaurant::class);
    }

    public function seats(){
        return $this->hasMany(Seat::class);
    }
}
