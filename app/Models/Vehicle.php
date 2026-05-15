<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'plate_number',
        'vehicle_name',
        'type',
        'owner',
        'fuel_consumtion',
        'last_service',
        'status'
    ];
    
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
