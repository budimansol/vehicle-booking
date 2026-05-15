@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Booking Kendaraan
</h1>

@if(session('error'))
<div class="bg-red-500 text-white p-4 rounded mb-4">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('bookings.store') }}" method="POST" class="space-y-4">

    @csrf

    <div>
        <label>Kendaraan</label>
        <select name="vehicle_id" class="border p-2 w-full">
            @foreach($vehicles as $vehicle)
            <option value="{{ $vehicle->id }}">
                {{ $vehicle->vehicle_name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Driver</label>
        <select name="driver_id" class="border p-2 w-full">
            @foreach($drivers as $driver)
            <option value="{{ $driver->id }}">
                {{ $driver->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Tanggal Mulai</label>
        <input type="datetime-local" name="start_date" class="border p-2 w-full">
    </div>

    <div>
        <label>Tanggal Selesai</label>
        <input type="datetime-local" name="end_date" class="border p-2 w-full">
    </div>

    <div>
        <label>Tujuan</label>
        <textarea name="destination" class="border p-2 w-full"></textarea>
    </div>

    <div>
        <label>Keperluan</label>
        <textarea name="purpose" class="border p-2 w-full"></textarea>
    </div>

    <div>
        <label>Approver Level 1</label>
        <select name="approver_1"class="border p-2 w-full">
            @foreach($approvers as $approver)
            <option value="{{ $approver->id }}">
                {{ $approver->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Approver Level 2</label>
        <select name="approver_2" class="border p-2 w-full">
            @foreach($approvers as $approver)
            <option value="{{ $approver->id }}">
                {{ $approver->name }}
            </option>
            @endforeach
        </select>
    </div>

    <button class="bg-blue-500 text-white px-4 py-2">
        Submit Booking
    </button>

</form>

@endsection