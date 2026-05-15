<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Booking</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
        <aside class="w-64 min-h-screen bg-gray-800 text-white p-4">
            <h1 class="text-xl font-bold mb-6">
                Vehicle Booking
            </h1>
            <ul class="space-y-2">
                <li>
                    <a href="/dashboard">Dashboard</a>
                </li>
                @if(auth()->user()->role->name == 'admin')
                <li>
                    <a href="/vehicles">Vehicles</a>
                </li>
                <li>
                    <a href="/drivers">Drivers</a>
                </li>
                <li>
                    <a href="/bookings">Bookings</a>
                </li>
                <li>
                    <a href="/activity-logs">Activity Logs</a>
                </li>
                @endif
                
                @if(auth()->user()->role->name == 'approver')
                <li>
                    <a href="/approvals">Approvals</a>
                </li>
                @endif
            </ul>
            
            <div class="mt-10">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded w-full">
                        Logout
                    </button>
                </form>
            </div>
            
        </aside>
        
        <main class="flex-1 p-6">
            @yield('content')
        </main>
        
    </div>
</body>
</html>