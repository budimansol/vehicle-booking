@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Edit Driver
</h1>

<form
    action="{{ route('drivers.update', $driver->id) }}"
    method="POST"
    class="space-y-4"
>

    @csrf
    @method('PUT')

    <div>

        <label class="block mb-1">
            Nama Driver
        </label>

        <input
            type="text"
            name="name"
            value="{{ $driver->name }}"
            class="border p-2 w-full rounded"
            required
        >

    </div>

    <div>

        <label class="block mb-1">
            No HP
        </label>

        <input
            type="text"
            name="phone_number"
            value="{{ $driver->phone_number }}"
            class="border p-2 w-full rounded"
            required
        >

    </div>

    <button
        class="bg-yellow-500 text-white px-4 py-2 rounded"
    >
        Update
    </button>

</form>

@endsection