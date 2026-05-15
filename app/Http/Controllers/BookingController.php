<?php

namespace App\Http\Controllers;

use App\Exports\BookingExport;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with([
            'vehicle',
            'driver',
            'requester'
        ])->latest()->get();
        
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $approvers = User::all();
        
        return view('bookings.create', compact(
            'vehicles',
            'drivers',
            'approvers'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehicleConflict = Booking::all()->where('vehicle_id', $request->vehicle_id)
                ->where('status', '!=', 'rejected')
                ->where(function ($query) use ($request) {
                    $query->whereBetween('start_date', [
                        $request->start_date,
                        $request->end_date
                        ])
                    ->orWhereBetween('end_date', [
                        $request->start_date,
                        $request->end_date
                        ]);
                    })
                ->exists();
        
        if($vehicleConflict){
            return back()->with(
                'error',
                'Kendaraan sudah dibooking pada jadwal tersebut'
            );
        }
        
        $driverConflict = Booking::all()->where('driver_id', $request->driver_id)
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [
                    $request->start_date,
                    $request->end_date
                    ])
                ->orWhereBetween('end_date', [
                    $request->start_date,
                    $request->end_date
                    ]);
                })
            ->exists();
            
    if ($driverConflict) {
        return back()->with(
            'error',
            'Driver sudah memiliki jadwal pada waktu tersebut.'
            );
        }
        
        $booking = Booking::create([
            'vehicle_id'=> $request->vehicle_id,
            'driver_id'=>$request->driver_id,
            'requester_id'=> Auth::id(),
            'approver_1' => $request->approver_1,
            'approver_2' => $request->approver_2,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'destination' => $request->destination,
            'purpose' => $request->purpose,
            'status' => 'pending'
        ]);
        
        activityLog(
            'CREATE_BOOKING',
            'Membuat booking kendaraan ID : '. $booking->id
        );
        
        return redirect()->route('bookings.index')->with('success', 'Booking Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function export(){
    
        activityLog(
            'EXPORT_BOOKING',
            'Export Laporan Booking ke excel'
        );
    
        return Excel::download(
            new BookingExport,
            'bookings.xlsx'
        );
    }
}
