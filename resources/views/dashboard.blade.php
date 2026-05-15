@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
        Dashboard
    </h1>
    <p class="text-gray-500 mt-1">
        Ringkasan monitoring pemesanan kendaraan
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow">
        <p class="text-sm opacity-90">Total Kendaraan</p>
        <h2 class="text-4xl font-bold mt-3">{{ $totalVehicles }}</h2>
    </div>

    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-2xl shadow">
        <p class="text-sm opacity-90">Kendaraan Tersedia</p>
        <h2 class="text-4xl font-bold mt-3">{{ $availableVehicles }}</h2>
    </div>

    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-6 rounded-2xl shadow">
        <p class="text-sm opacity-90">Total Driver</p>
        <h2 class="text-4xl font-bold mt-3">{{ $totalDrivers }}</h2>
    </div>

    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-2xl shadow">
        <p class="text-sm opacity-90">Booking Pending</p>
        <h2 class="text-4xl font-bold mt-3">{{ $pendingBookings }}</h2>
    </div>

    <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 text-white p-6 rounded-2xl shadow">
        <p class="text-sm opacity-90">Booking Approved</p>
        <h2 class="text-4xl font-bold mt-3">{{ $approvedBookings }}</h2>
    </div>

    <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-6 rounded-2xl shadow">
        <p class="text-sm opacity-90">Booking Rejected</p>
        <h2 class="text-4xl font-bold mt-3">{{ $rejectedBookings }}</h2>
    </div>
</div>

<div class="bg-white p-6 rounded-2xl shadow mt-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Statistik Booking
            </h2>
            <p class="text-gray-500 text-sm mt-1">
                Grafik jumlah booking berdasarkan status
            </p>
        </div>
    </div>

    <div class="relative h-72">
        <canvas id="bookingChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('bookingChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($chartLabels),
        datasets: [{
            label: 'Jumlah Booking',
            data: @json($chartData),
            borderWidth: 1,
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>

@endsection