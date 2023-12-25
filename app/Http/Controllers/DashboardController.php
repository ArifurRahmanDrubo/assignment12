<?php



namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Seat;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $totalSeats = Seat::count();
        $totalBuses = Bus::count();
        $availableSeats = Seat::where('status', 'available')->count();
        $totalCustomers = Customer::count();
        return view('pages.home',compact('totalSeats', 'totalBuses', 'availableSeats', 'totalCustomers')); // Adjust the view name as needed
    }
}

