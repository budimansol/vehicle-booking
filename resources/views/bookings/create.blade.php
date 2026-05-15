@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Booking Kendaraan
            </h1>
            <p class="text-gray-500 mt-1">
                Buat booking kendaraan perusahaan
            </p>
        </div>
        <a
            href="{{ route('bookings.index') }}"
            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-xl transition"
        >
            Kembali
        </a>
    </div>

    @if(session('error'))
    <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">
        {{ session('error') }}
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-lg p-8">
        <form
            action="{{ route('bookings.store') }}"
            method="POST"
            class="space-y-5"
        >
            @csrf
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Kendaraan
                </label>
                <select
                    name="vehicle_id"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">
                        {{ $vehicle->vehicle_name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Driver
                </label>
                <select
                    name="driver_id"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}">
                        {{ $driver->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tanggal Mulai
                    </label>
                    <input
                        type="datetime-local"
                        name="start_date"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tanggal Selesai
                    </label>
                    <input
                        type="datetime-local"
                        name="end_date"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Tujuan
                </label>
                <textarea
                    name="destination"
                    rows="3"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Keperluan
                </label>
                <textarea
                    name="purpose"
                    rows="3"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Approver Level 1
                    </label>
                    <select
                        name="approver_level_1"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        @foreach($approvers as $approver)
                        <option value="{{ $approver->id }}">
                            {{ $approver->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Approver Level 2
                    </label>
                    <select
                        name="approver_level_2"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        @foreach($approvers as $approver)
                        <option value="{{ $approver->id }}">
                            {{ $approver->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-md transition duration-200"
            >
                Submit Booking
            </button>
        </form>
    </div>
</div>
@endsection