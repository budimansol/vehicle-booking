<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $bookings = Booking::all()->filter(function ($booking) use ($userId) {
        return (($booking->approver_1 == $userId && $booking->status == 'pending') ||
        ($booking->approver_2 == $userId && $booking->status == 'approved_1'));
        });
        return view('approvals.index', compact('bookings'));
    }
    
    public function approve(string $id){
        $booking = Booking::findOrFail($id);
        $userId = Auth::id();
        // LEVEL 1
        if ($booking->approver_1 == $userId && $booking->status == 'pending') {
            $booking->update([
                'status' => 'approved_1'
                ]);
            }
        // LEVEL 2
        elseif ($booking->approver_2 == $userId && $booking->status == 'approved_1') {
            $booking->update([
                'status' => 'approved'
                ]);
            }
        
        activityLog(
            'APPROVE_BOOKING',
            'Approve Booking ID : ' . $booking->id
        );
            
        return redirect()
        ->route('approvals.index');
    }
    
    public function reject(string $id){
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'rejected']);
        activityLog(
            'REJECT_BOOKING',
            'Reject Booking ID : ' . $booking->id
        );
        return redirect()->route('approvals.index');
    }
}
