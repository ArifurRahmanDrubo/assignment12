<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusesController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('buses.index', compact('buses'));
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'seats' => 'required|integer',
        ]);

        Bus::create($validatedData);

        return redirect()->route('buses.index')->with('success', 'Bus added successfully!');
    }

    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'seats' => 'required|integer',
        ]);

        $bus->update($validatedData);

        return redirect()->route('buses.index')->with('success', 'Bus updated successfully!');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();

        return redirect()->route('buses.index')->with('success', 'Bus deleted successfully!');
    }
}