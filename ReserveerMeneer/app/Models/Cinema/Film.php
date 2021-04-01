<?php


namespace App\Models\Cinema;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
    ];

    public function hall(){
        return $this->hasOne(Hall::class);
    }

    public function seats(){
        return $this->hasMany(Seat::class);
    }
}
