<?php


namespace App\Models\Event;


use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use Encryptable;

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

    protected $encryptable = [
        'name',
        'description',
        'address',
        'city',
    ];

    public function reservations(){
        return $this->hasManyThrough(Reservation::class, Ticket::class, 'event_id', 'id', 'id', 'reservation_id');
    }
}
