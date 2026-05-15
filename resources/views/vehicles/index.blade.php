@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Vehicle Management
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola data kendaraan perusahaan
        </p>
    </div>

    <a
        href="{{ route('vehicles.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow-md transition duration-200 font-semibold"
    >
        + Tambah Kendaraan
    </a>
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
                        Plat Nomor
                    </th>

                    <th class="px-6 py-4 text-left">
                        Nama Kendaraan
                    </th>

                    <th class="px-6 py-4 text-left">
                        Tipe
                    </th>

                    <th class="px-6 py-4 text-center">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

                @forelse($vehicles as $vehicle)

                <tr class="hover:bg-gray-50 transition duration-200">

                    <td class="px-6 py-4 font-semibold text-gray-800">
                        {{ strtoupper($vehicle->plate_number) }}
                    </td>

                    <td class="px-6 py-4 text-gray-700">
                        {{ $vehicle->vehicle_name }}
                    </td>

                    <td class="px-6 py-4">
                        <span
                            class="px-3 py-1 rounded-full text-sm font-semibold
                            {{ $vehicle->type == 'angkutan_orang'
                                ? 'bg-blue-100 text-blue-700'
                                : 'bg-green-100 text-green-700'
                            }}"
                        >
                            {{ strtoupper(str_replace('_', ' ', $vehicle->type)) }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">

                            <a
                                href="{{ route('vehicles.edit', $vehicle->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow transition"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('vehicles.destroy', $vehicle->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin hapus kendaraan?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition"
                                >
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center py-10 text-gray-500">
                        Data kendaraan belum tersedia
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection