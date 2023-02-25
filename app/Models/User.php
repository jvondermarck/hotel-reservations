<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'locale',
        'first_name',
        'last_name',
        'phone',
        'overwrite_existing'
    ];


    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
