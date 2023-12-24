<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','bus_id','seats_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
    public function bus()
    {
        return $this->belongsTo(bus::class);
    }
}