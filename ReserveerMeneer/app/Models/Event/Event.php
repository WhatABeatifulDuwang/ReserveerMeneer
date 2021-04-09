<?php


namespace App\Models\Event;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'start_date',
        'end_date',
        'max_tickets'
    ];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
