@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Driver Management
        </h1>
        <p class="text-gray-500 mt-1">
            Kelola data driver perusahaan
        </p>
    </div>
    <a href="{{ route('drivers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow-md transition font-semibold">
        + Tambah Driver
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
                        Nama
                    </th>
                    <th class="px-6 py-4 text-left">
                        No HP
                    </th>
                    <th class="px-6 py-4 text-left">
                        Status
                    </th>
                    <th class="px-6 py-4 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($drivers as $driver)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        {{ $driver->name }}
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $driver->phone_number }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold
                            {{ $driver->status == 'available'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700'
                            }}">
                            {{ strtoupper($driver->status) }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('drivers.edit', $driver->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow transition">
                                Edit
                            </a>

                            <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus driver?')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-10 text-gray-500">
                        Data driver belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection