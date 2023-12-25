<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Seat;
use App\Models\Route;
use App\Models\Bus;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function index()
{
    $bookings = Booking::with(['customer', 'bus','route','seat'])->get();

    return view('bookings.index', compact('bookings'));
}

public function create()
    {
        $customers = Customer::all();
        $buses = Bus::all(); // Assuming you have a Bus model
      
        
        return view('bookings.create', compact('customers', 'buses',));
    }
public function store(Request $request)
{$request->validate([
    'customer_id' => 'required',
    'seat_number' => 'required',
    
]);


     Booking::create($request->all());
     $seat = Seat::findOrFail($request->seat_number);
     $seat->status = 'booked';
     $seat->save();

    return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
}
    public function getCustomerInfo($customerId)
    {
        $customer = Customer::find($customerId);

        return response()->json([
            'name' => $customer->name,
            'contact_number' => $customer->contact_number,
        ]);
    }
    public function getSuggestions($busNumber)
    {
        $bus = Bus::where('number', $busNumber)->first();

        // Fetch distinct sources, destinations, and available seat information based on the selected bus number
        $sources = Route::where('bus_id', $bus->id)->distinct()->pluck('source');
        $destinations = Route::where('bus_id', $bus->id)->distinct()->pluck('destination');
        $seats = Seat::where('bus_id', $bus->id)->where('status', 'available')->get();
     
        return response()->json([
            'sources' => $sources,
            'destinations' => $destinations,
            'seats' => $seats,
            
        ]);
    }
    public function calculateCost($busNumber, $source, $destination)
    { 
       $cost = Route::calculateCost($busNumber, $source, $destination);      
        return response()->json([         
            'cost' => $cost,
        ]);
    }
    public function edit($id)
{
    $booking = Booking::findOrFail($id);
    $customers = Customer::all();
    $buses = Bus::all();
    $routes = Route::all();
    $seats = Seat::all();

    return view('bookings.edit', compact('booking', 'customers', 'buses', 'routes', 'seats'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'customer_id' => 'required',
        'seat_number' => 'required',
        
    ]);

    $booking = Booking::findOrFail($id);
    $booking->update($request->all());
    $seat = Seat::findOrFail($request->seat_number);
    $seat->status = 'booked';
    $seat->save();
    return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
}
public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();
    $seat = Seat::findOrFail($booking->seat_id);
    $seat->status = 'available';
    $seat->save();
    return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
}
public function show($id)
{
    $booking = Booking::with(['customer', 'bus', 'route', 'seat'])->findOrFail($id);

    return view('bookings.show', compact('booking'));
}
   
 
}
