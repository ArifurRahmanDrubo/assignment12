<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Seat;

class SeatController extends Controller
{   public function index()
    {
        $seats = Seat::with('bus')->get();
        return view('seats.index', compact('seats'));
    }
    public function showSeatArrangementForm()
    {
        return view('seats.index');
    }
    public function showSeatArrangement(Request $request)
    {
        $request->validate([
            'bus_number' => 'required|exists:buses,number',
        ]);

        $busNumber = $request->input('bus_number');
        $bus = Bus::where('number', $busNumber)->first();

        if ($bus) {
            $maxSeats = $bus->seats;
            $seats = Seat::where('bus_id', $bus->id)->get();

            return view('seats.index', compact('bus', 'maxSeats', 'seats'));
        } else {
            return redirect()->route('seats.index')->with('error', 'Bus not found');
        }
    }
    public function create()
    {
        $buses = Bus::all();
        return view('seats.create', compact('buses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'seat_number' => 'required',
            'status' => 'required|in:available,booked',
            
        ]);

        Seat::create($request->all());

        return redirect()->route('seats.index')->with('success', 'Seate created successfully!');
    }

    public function edit(Seat $seat)
    {
        $buses = Bus::all();
        return view('seats.edit', compact('seat', 'buses'));
    }

    public function update(Request $request, Seat $seat)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'seat_number' => 'required',
            'status' => 'required|in:available,booked',
        ]);

        $seat->update($request->all());

        return redirect()->route('seats.index')->with('success', 'Seat updated successfully!');
    }


    public function destroy(Seat $seat)
    {
        $seat->delete();

        return redirect()->route('seats.index')->with('success', 'seats deleted successfully!');
    }
   
}