@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Dashboard
</h1>

<!-- CARD STATISTIK -->

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="bg-blue-500 text-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold">
            Total Kendaraan
        </h2>
        <p class="text-4xl mt-4 font-bold">
            {{ $totalVehicles }}
        </p>
    </div>

    <div class="bg-green-500 text-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold">
            Kendaraan Tersedia
        </h2>
        <p class="text-4xl mt-4 font-bold">
            {{ $availableVehicles }}
        </p>
    </div>

    <div class="bg-yellow-500 text-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold">
            Total Driver
        </h2>
        <p class="text-4xl mt-4 font-bold">
            {{ $totalDrivers }}
        </p>
    </div>

    <div class="bg-orange-500 text-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold">
            Booking Pending
        </h2>
        <p class="text-4xl mt-4 font-bold">
            {{ $pendingBookings }}
        </p>
    </div>

    <div class="bg-green-700 text-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold">
            Booking Approved
        </h2>
        <p class="text-4xl mt-4 font-bold">
            {{ $approvedBookings }}
        </p>
    </div>

    <div class="bg-red-500 text-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold">
            Booking Rejected
        </h2>
        <p class="text-4xl mt-4 font-bold">
            {{ $rejectedBookings }}
        </p>
    </div>

</div>

<!-- CHART -->
<div class="bg-white p-6 rounded shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">
        Statistik Booking
    </h2>
    <div class="relative h-96">
        <canvas id="bookingChart"></canvas>
    </div>
</div>

<!-- SCRIPT CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document
    .getElementById('bookingChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($chartLabels),
        datasets: [{
            label: 'Jumlah Booking',
            data: @json($chartData),
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspecRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks:{
                    stepSize: 1
                }
            }
        }
    }
});
</script>

@endsection