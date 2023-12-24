<?php



namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Bus;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::with('bus')->get();
        return view('routes.index', compact('routes'));
    }

    public function create()
    {
        $buses = Bus::all();
        return view('routes.create', compact('buses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'source' => 'required',
            'destination' => 'required',
            'cost' => 'required|integer',
        ]);

        Route::create($request->all());

        return redirect()->route('routes.index')->with('success', 'Route created successfully!');
    }

    public function edit(Route $route)
    {
        $buses = Bus::all();
        return view('routes.edit', compact('route', 'buses'));
    }

    public function update(Request $request, Route $route)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'source' => 'required',
            'destination' => 'required',
            'cost' => 'required|integer',
        ]);

        $route->update($request->all());

        return redirect()->route('routes.index')->with('success', 'Route updated successfully!');
    }

    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route('routes.index')->with('success', 'Route deleted successfully!');
    }
}
