@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Data Driver
</h1>

<a
    href="{{ route('drivers.create') }}"
    class="bg-blue-500 text-white px-4 py-2 rounded"
>
    Tambah Driver
</a>

<table class="table-auto w-full mt-4 border">

    <thead class="bg-gray-200">

        <tr>
            <th class="border p-2">Nama</th>
            <th class="border p-2">No HP</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Aksi</th>
        </tr>

    </thead>

    <tbody>

        @forelse($drivers as $driver)

        <tr>

            <td class="border p-2">
                {{ $driver->name }}
            </td>

            <td class="border p-2">
                {{ $driver->phone_number }}
            </td>

            <td class="border p-2">
                {{ $driver->status }}
            </td>

            <td class="border p-2 flex gap-2">

                <a
                    href="{{ route('drivers.edit', $driver->id) }}"
                    class="bg-yellow-500 text-white px-3 py-1 rounded"
                >
                    Edit
                </a>

                <form
                    action="{{ route('drivers.destroy', $driver->id) }}"
                    method="POST"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Yakin hapus driver?')"
                        class="bg-red-500 text-white px-3 py-1 rounded"
                    >
                        Delete
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="4" class="border p-4 text-center">
                Data driver kosong
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection