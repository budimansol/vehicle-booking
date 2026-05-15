<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVehicles = Vehicle::all()->count();

        $availableVehicles = Vehicle::all()->where(
            'status',
            'available'
        )->count();

        $totalDrivers = Driver::all()->count();

        $totalBookings = Booking::all()->count();

        $pendingBookings = Booking::all()->where(
            'status',
            'pending'
        )->count();

        $approvedBookings = Booking::all()->where(
            'status',
            'approved'
        )->count();

        $rejectedBookings = Booking::all()->where(
            'status',
            'rejected'
        )->count();

        $recentBookings = Booking::orderBy('created_at', 'desc')->get();

        $chartLabels = [
            'Pending',
            'Approved',
            'Rejected'
        ];
        
        $chartData = [
            Booking::all()->where('status', 'pending')->count(),
            Booking::all()->where('status', 'approved')->count(),
            Booking::all()->where('status', 'rejected')->count(),
        ];
        
        return view('dashboard', compact(
            'totalVehicles',
            'availableVehicles',
            'totalDrivers',
            'totalBookings',
            'pendingBookings',
            'approvedBookings',
            'rejectedBookings',
            'recentBookings',
            'chartLabels',
            'chartData'
        ));
    }
}
