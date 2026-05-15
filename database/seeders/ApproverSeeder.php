<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ApproverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Approver1',
            'email' => 'approver1@mail.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);
        
        User::create([
            'name' => 'Approver2',
            'email' => 'approver2@mail.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);
    }
}
