@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Edit Driver
            </h1>
            <p class="text-gray-500 mt-1">
                Perbarui data driver perusahaan
            </p>
        </div>
        <a
            href="{{ route('drivers.index') }}"
            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-xl transition"
        >
            Kembali
        </a>
    </div>
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <form
            action="{{ route('drivers.update', $driver->id) }}"
            method="POST"
            class="space-y-5"
        >
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Driver
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ $driver->name }}"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    required
                >
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    No HP
                </label>

                <input
                    type="text"
                    name="phone_number"
                    value="{{ $driver->phone_number }}"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    required >
            </div>
            <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-xl shadow-md transition duration-200">
                Update Driver
            </button>
        </form>
    </div>
</div>
@endsection