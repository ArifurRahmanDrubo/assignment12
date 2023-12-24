<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_number'];

    // Listen for the 'creating' event
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            // Generate a unique customer ID
            $customer->customer_id = 'CUST-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
        });
    }
    public function bookings()
{
    return $this->hasMany(Booking::class);
}

public static function calculateCost($busNumber, $source, $destination)
{
    // Add your actual cost calculation logic here.
    // This is just a placeholder example.

    // Fetch the route information based on bus number, source, and destination
    $route = self::where('bus_number', $busNumber)
        ->where('source', $source)
        ->where('destination', $destination)
        ->first();

    // If the route is found, return the cost; otherwise, return a default value
    return $route ? $route->cost : 0.0;
}
}