@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Data Booking
</h1>

<a href="{{ route('bookings.create') }}" class="bg-blue-500 text-white px-4 py-2">
    Tambah Booking
</a>

<a href="{{ route('bookings.export') }}" class="bg-green-500 text-white px-4 py-2 rounded">
    Export Excel
</a>

<table class="table-auto w-full mt-4 border">
    <thead>
        <tr>
            <th class="border p-2">Kendaraan</th>
            <th class="border p-2">Driver</th>
            <th class="border p-2">Tanggal</th>
            <th class="border p-2">Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td class="border p-2">
                {{ $booking->vehicle->vehicle_name }}
            </td>
            <td class="border p-2">
                {{ $booking->driver->name }}
            </td>
            <td class="border p-2">
                {{ $booking->start_date }}
            </td>
            <td class="border p-2">
                {{ $booking->status }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection