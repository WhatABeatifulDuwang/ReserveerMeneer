<?php


namespace App\Models\Event;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'price',
        'start_date',
        'end_date',
        'max_tickets'
    ];

    public function reservations(){
        return $this->hasManyThrough(Reservation::class, Ticket::class, 'event_id', 'id', 'id', 'reservation_id');
    }
}
