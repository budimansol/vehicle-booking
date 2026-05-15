@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Edit Kendaraan
</h1>

<form
    action="{{ route('vehicles.update', $vehicle->id) }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Plat Nomor</label>

        <input
            type="text"
            name="plate_number"
            value="{{ $vehicle->plate_number }}"
            class="border p-2 w-full"
        >

    </div>

    <div class="mb-3">

        <label>Nama Kendaraan</label>

        <input
            type="text"
            name="vehicle_name"
            value="{{ $vehicle->vehicle_name }}"
            class="border p-2 w-full"
        >

    </div>

    <button class="bg-yellow-500 text-black px-4 py-2">
        Update
    </button>

</form>

@endsection