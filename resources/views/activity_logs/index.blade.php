@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Activity Log
</h1>

<table class="table-auto w-full border">
    <thead>
        <tr>
            <th class="border p-2">User</th>
            <th class="border p-2">Action</th>
            <th class="border p-2">Description</th>
            <th class="border p-2">IP Address</th>
            <th class="border p-2">Time</th>
        </tr>
    </thead>

    <tbody>
        @foreach($logs as $log)
        <tr>
            <td class="border p-2">
                {{ $log->user->name ?? '-' }}
            </td>

            <td class="border p-2">
                {{ $log->action }}
            </td>

            <td class="border p-2">
                {{ $log->description }}
            </td>

            <td class="border p-2">
                {{ $log->ip_address }}
            </td>

            <td class="border p-2">
                {{ $log->created_at }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection