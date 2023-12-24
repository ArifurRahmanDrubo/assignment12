<?php

// app/Http/Controllers/TripController.php

namespace App\Http\Controllers;

use App\Models\Route;

class TripController extends Controller
{
    public function calculateCostAndDuration($source, $destination)
    {
        $legs = Route::where('source', $source)->orWhere('destination', $source)->get();

        $totalCost = 0;
        $totalDuration = 0;

        foreach ($legs as $leg) {
            $totalCost += $leg->cost;
            $totalDuration += $leg->duration;
            if ($leg->destination === $destination) {
                break; // Reached the destination
            }
        }

        return [
            'totalCost' => $totalCost,
            'totalDuration' => $totalDuration,
            'exceededEightHours' => $totalDuration > 8,
        ];
    }

    public function bookTicket($source, $destination)
    {
        $routeInfo = $this->calculateCostAndDuration($source, $destination);

        // Implement booking logic here based on $routeInfo

        return view('bookings.index', ['routeInfo' => $routeInfo]);
    }
}
