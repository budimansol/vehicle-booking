<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::create([
            'name' => 'Budi',
            'phone_number' => '123123123',
            'status' => 'available'
        ]);
        Driver::create([
            'name' => 'Joko',
            'phone_number' => '321321321',
            'status' => 'available'
        ]);
    }
}
