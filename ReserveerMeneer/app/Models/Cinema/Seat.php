<?php


namespace App\Models\Cinema;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'reserved',
    ];

    public function hall(){
        return $this->hasOne(Hall::class);
    }
}
