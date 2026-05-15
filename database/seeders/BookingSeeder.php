<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'vehicle_id' => 1,
            'driver_id' => 1,
            'requester_id' => 1,
            'approver_1' => 2,
            'approver_2' => 3,
            'start_date' => now(),
            'end_date' => now()->addHours(5),
            'destination' => 'Surabaya',
            'purpose' => 'Meeting',
            'status' => 'pending'
        ]);
    }
}
