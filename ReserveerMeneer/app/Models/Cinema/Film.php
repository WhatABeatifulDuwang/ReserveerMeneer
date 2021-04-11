<?php


namespace App\Models\Cinema;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        "hall_id",
        "name",
        "description",
        "start_date",
        "end_date",
    ];
}
