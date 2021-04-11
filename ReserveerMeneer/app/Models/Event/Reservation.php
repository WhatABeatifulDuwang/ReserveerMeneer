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
        "address",
        "postal_code",
        "city",
        "img_path",
        "start_date",
        "end_date",
        "ticket_number",
        "total_price",
    ];
}
