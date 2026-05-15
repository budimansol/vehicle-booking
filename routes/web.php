<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::resource('vehicles', VehicleController::class);
    Route::resource('drivers',DriverController::class);
    Route::resource('bookings', BookingController::class);
    Route::get('/booking-export', [BookingController::class, 'export'])->name('bookings.export');
    Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity.logs.index');
});

Route::middleware(['auth', 'role:approver'])->group(function(){
    Route::get('/approvals',[ApprovalController::class, 'index'])->name('approvals.index');
    Route::post('/approvals/{id}/approve', [ApprovalController::class, 'approve'] )->name('approvals.approve');
    Route::post('/approvals/{id}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
