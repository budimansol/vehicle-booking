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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            
            $table->string('plate_number')->unique();
            $table->string('vehicle_name');
            $table->enum('type', [
                "angkutan_orang",
                "angkutan_barang"
            ]);
            $table->enum('owner', [
                "company",
                "rental"
            ]);
            $table->decimal('fuel_consumtion', 8, 2)->nullable();
            $table->date("last_service")->nullable();
            $table->enum('status', [
                "available",
                "booked",
                "maintainance"
            ])->default("available");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
