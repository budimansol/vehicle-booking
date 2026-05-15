@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Data Kendaraan
</h1>

<a
    href="{{ route('vehicles.create') }}"
    class="bg-blue-500 text-black px-4 py-2"
>
    Tambah Kendaraan
</a>

<table class="table-auto w-full mt-4 border">

    <thead>
        <tr>
            <th class="border p-2">Plat</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Tipe</th>
            <th class="border p-2">Action</th>
        </tr>
    </thead>

    <tbody>

        @foreach($vehicles as $vehicle)

        <tr>
            <td class="border p-2">
                {{ $vehicle->plate_number }}
            </td>

            <td class="border p-2">
                {{ $vehicle->vehicle_name }}
            </td>

            <td class="border p-2">
                {{ $vehicle->type }}
            </td>
            <td>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}">
                Edit
                </a>
            </td>
        </tr>

        @endforeach

    </tbody>

</table>

@endsection