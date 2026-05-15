<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
           'plate_number' => 'N 5454 JI',
           'vehicle_name' => 'Toyota Avanza',
           'type' => 'angkutar_orang',
           'owner' => 'company',
           'status' => 'available' 
        ]);
        
        Vehicle::create([
           'plate_number' => 'N 7274 KIL',
           'vehicle_name' => 'Mitsubishi L300',
           'type' => 'angkutar_barang',
           'owner' => 'company',
           'status' => 'available' 
        ]);
    }
}
