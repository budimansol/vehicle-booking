@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Edit Kendaraan
            </h1>

            <p class="text-gray-500 mt-1">
                Perbarui data kendaraan
            </p>
        </div>

        <a
            href="{{ route('vehicles.index') }}"
            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-xl transition"
        >
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <form
            action="{{ route('vehicles.update', $vehicle->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Plat Nomor
                </label>

                <input
                    type="text"
                    name="plate_number"
                    value="{{ $vehicle->plate_number }}"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                >
            </div>

            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Kendaraan
                </label>

                <input
                    type="text"
                    name="vehicle_name"
                    value="{{ $vehicle->vehicle_name }}"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                >
            </div>

            <button
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-xl shadow-md transition duration-200"
            >
                Update Kendaraan
            </button>

        </form>

    </div>

</div>

@endsection