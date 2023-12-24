<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['bus_id', 'source', 'destination', 'cost', 'departure_date', 'departure_time'];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
    public function bookings()
{
    return $this->hasMany(Booking::class);
}
public static function calculateCost($busNumber, $source, $destination)
    {
        $route = self::whereHas('bus', function ($query) use ($busNumber) {
            $query->where('number', $busNumber);
        })
        ->where('source', $source)
        ->where('destination', $destination)
        ->first();

        return $route ? $route->cost : 0.0;
    }
}