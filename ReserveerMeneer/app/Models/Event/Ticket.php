<?php


namespace App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
    ];

    public function event(){
        return $this->hasOneThrough(Event::class, Reservation::class, 'ticket_id', 'id', 'id', 'event_id');
    }
}
