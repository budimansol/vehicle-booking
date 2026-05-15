<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityLog::create([
            'user_id' => 1,
            'action' => 'SYSTEM_INIT',
            'description' => 'Initial Seeder',
            'ip_address' => '127.0.0.1'
        ]);
    }
}
