@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Activity Logs
        </h1>
        <p class="text-gray-500 mt-1">
            Monitoring aktivitas pengguna sistem
        </p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-6 py-4 text-left">
                        User
                    </th>
                    <th class="px-6 py-4 text-left">
                        Action
                    </th>
                    <th class="px-6 py-4 text-left">
                        Description
                    </th>
                    <th class="px-6 py-4 text-left">
                        IP Address
                    </th>
                    <th class="px-6 py-4 text-left">
                        Time
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($logs as $log)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        {{ $log->user->name ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-700">
                            {{ strtoupper(str_replace('_', ' ', $log->action)) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $log->description }}
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $log->ip_address }}
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ \Carbon\Carbon::parse($log->created_at)->format('d M Y H:i') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td
                        colspan="5"
                        class="text-center py-10 text-gray-500"
                    >
                        Activity log belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection