@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Approval Booking
</h1>

<table class="table-auto w-full border">

    <thead>

        <tr>
            <th class="border p-2">Kendaraan</th>
            <th class="border p-2">Driver</th>
            <th class="border p-2">Tujuan</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Aksi</th>
        </tr>

    </thead>

    <tbody>

        @forelse($bookings as $booking)

        <tr>

            <td class="border p-2">
                {{ $booking->vehicle->vehicle_name }}
            </td>

            <td class="border p-2">
                {{ $booking->driver->name }}
            </td>

            <td class="border p-2">
                {{ $booking->destination }}
            </td>

            <td class="border p-2">
                {{ $booking->status }}
            </td>

            <td class="border p-2 flex gap-2">

                <form
                    action="{{ route('approvals.approve', $booking->id) }}"
                    method="POST"
                >

                    @csrf

                    <button
                        class="bg-green-500 text-white px-3 py-1 rounded"
                    >
                        Approve
                    </button>

                </form>

                <form
                    action="{{ route('approvals.reject', $booking->id) }}"
                    method="POST"
                >

                    @csrf

                    <button
                        class="bg-red-500 text-white px-3 py-1 rounded"
                    >
                        Reject
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="5" class="border p-4 text-center">
                Tidak ada approval
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection