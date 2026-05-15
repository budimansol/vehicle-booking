@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Tambah Kendaraan
</h1>

<form action="{{ route('vehicles.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Plat Nomor</label>

        <input
            type="text"
            name="plate_number"
            class="border p-2 w-full"
        >
    </div>

    <div class="mb-3">
        <label>Nama Kendaraan</label>

        <input
            type="text"
            name="vehicle_name"
            class="border p-2 w-full"
        >
    </div>

    <div class="mb-3">
        <label>Tipe</label>

        <select
            name="type"
            class="border p-2 w-full"
        >
            <option value="angkutan_orang">
                Angkutan Orang
            </option>

            <option value="angkutan_barang">
                Angkutan Barang
            </option>
        </select>
    </div>

    <button class="bg-blue-500 text-black px-4 py-2">
        Simpan
    </button>

</form>

@endsection