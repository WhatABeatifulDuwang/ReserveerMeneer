<?php


namespace App\Models\Cinema;


use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    use Encryptable;

    protected $fillable = [
        'name',
        'address',
        'city'
    ];

    protected $encryptable = [
        'name',
        'address',
        'city'
    ];

    public function halls(){
        return $this->hasMany(Hall::class);
    }
}
