<?php


namespace App\Models\Cinema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        "cinema_id",
    ];

    public function cinema(){
        return $this->hasOne(Cinema::class, 'id', 'cinema_id');
    }

    public function film(){
        return $this->hasOne(Film::class, 'id', 'film_id');
    }
}
