@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Tambah Kendaraan
            </h1>

            <p class="text-gray-500 mt-1">
                Tambahkan data kendaraan baru
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

        <form action="{{ route('vehicles.store') }}" method="POST">

            @csrf

            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Plat Nomor
                </label>

                <input
                    type="text"
                    name="plate_number"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: N 1234 AA"
                >
            </div>

            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Kendaraan
                </label>

                <input
                    type="text"
                    name="vehicle_name"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Toyota Avanza"
                >
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Tipe Kendaraan
                </label>

                <select
                    name="type"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="angkutan_orang">
                        Angkutan Orang
                    </option>

                    <option value="angkutan_barang">
                        Angkutan Barang
                    </option>
                </select>
            </div>

            <button
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-md transition duration-200"
            >
                Simpan Kendaraan
            </button>

        </form>

    </div>

</div>

@endsection