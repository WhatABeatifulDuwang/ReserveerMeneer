<?php


namespace App\Models\Cinema;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function cinema(){
        return $this->hasOne(Cinema::class);
    }

    public function film(){
        return $this->HasOne(Film::class);
    }
}
