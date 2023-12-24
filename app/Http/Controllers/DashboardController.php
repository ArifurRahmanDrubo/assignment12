<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Your logic for the dashboard goes here
        return view('dashboard.index'); // Adjust the view name as needed
    }
}

