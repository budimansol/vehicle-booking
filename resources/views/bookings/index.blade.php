@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Booking Management
        </h1>
        <p class="text-gray-500 mt-1">
            Kelola data booking kendaraan perusahaan
        </p>
    </div>

    <div class="flex gap-3">
        <a
            href="{{ route('bookings.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow-md transition font-semibold"
        >
            + Tambah Booking
        </a>
        <a
            href="{{ route('bookings.export') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl shadow-md transition font-semibold"
        >
            Export Excel
        </a>
    </div>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-6 py-4 text-left">
                        Kendaraan
                    </th>
                    <th class="px-6 py-4 text-left">
                        Driver
                    </th>
                    <th class="px-6 py-4 text-left">
                        Tanggal Booking
                    </th>
                    <th class="px-6 py-4 text-left">
                        Status
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        {{ $booking->vehicle->vehicle_name }}
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $booking->driver->name }}
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y H:i') }}
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="px-3 py-1 rounded-full text-sm font-semibold
                            {{
                                $booking->status == 'pending'
                                ? 'bg-yellow-100 text-yellow-700'
                                : (
                                    $booking->status == 'approved'
                                    ? 'bg-green-100 text-green-700'
                                    : (
                                        str_contains($booking->status, 'approved_level')
                                        ? 'bg-blue-100 text-blue-700'
                                        : 'bg-red-100 text-red-700'
                                    )
                                )
                            }}"
                        >
                            {{ strtoupper(str_replace('_', ' ', $booking->status)) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td
                        colspan="4"
                        class="text-center py-10 text-gray-500"
                    >
                        Data booking belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection