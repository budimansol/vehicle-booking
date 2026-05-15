<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Booking</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white shadow-2xl">
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-2xl font-bold tracking-wide">
                    Vehicle Booking
                </h1>
                <p class="text-gray-400 text-sm mt-1">Management System</p>
            </div>
            <div class="p-4">
                <p class="text-xs uppercase text-gray-400 mb-2">Main Menu</p>
                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            Dashboard
                        </a>
                    </li>
                    
                    @if(auth()->user()->role->name == 'admin')
                    <li>
                        <a href="/vehicles" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            Vehicles
                        </a>
                    </li>
                    <li>
                        <a href="/drivers" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            Drivers
                        </a>
                    </li>
                    <li>
                        <a href="/bookings" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            Bookings
                        </a>
                    </li>
                    <li>
                        <a href="/activity-logs" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            Activity Logs
                        </a>
                    </li>
                    @endif

                    @if(auth()->user()->role->name == 'approver')
                    <li>
                        <a href="/approvals" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            Approvals
                        </a>
                    </li>
                    @endif
                </ul>
            </div>

            <div class="absolute bottom-0 w-64 p-4 border-t border-gray-700">
                <div class="mb-4">
                    <p class="text-sm font-semibold">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-xs text-gray-400 uppercase">
                        {{ auth()->user()->role->name }}
                    </p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl transition font-semibold">
                        Logout
                    </button>
                </form>
            </div>
        </aside>
        <main class="flex-1 p-8 overflow-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>