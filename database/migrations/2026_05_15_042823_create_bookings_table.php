<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('driver_id')->constrained()->cascadeOnDelete();
            $table->foreignId('requester_id')->constrained('users');
            $table->foreignId('approver_1')->constrained('users');
            $table->foreignId('approver_2')->constrained('users');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('destination');
            $table->string('purpose');
            $table->enum('status', [
                'pending',
                'approved_level_1',
                'approved',
                'rejected',
                'completed'
            ])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
