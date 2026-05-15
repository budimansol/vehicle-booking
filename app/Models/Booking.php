<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'requester_id',
        'approver_1',
        'approver_2',
        'start_date',
        'end_date',
        'destination',
        'purpose',
        'status'
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    
    public function driver(){
        return $this->belongsTo(Driver::class);
    }
    
    public function requester(){
        return $this->belongsTo(User::class, 'requester_id');
    }
}
