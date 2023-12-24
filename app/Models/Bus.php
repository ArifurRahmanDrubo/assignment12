<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'number', 'seats'];

    public function routes()
    {
        return $this->hasMany(Route::class,'number', 'number');
    }
    public function seats()
{
    return $this->hasMany(Seat::class, 'bus_id');
}
public function bookings()
{
    return $this->hasMany(Booking::class);
}
}
