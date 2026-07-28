<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | ReservHub Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-50 via-emerald-50 to-white">

    <header class="bg-emerald-600 shadow-lg">

    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-5">

        <div>

            <h1 class="text-3xl font-bold text-white">
                ReservHub
            </h1>

            <p class="text-emerald-100 text-sm mt-1">
                Owner Panel
            </p>

        </div>

        <div class="text-right">

            <p class="text-white font-semibold">
                {{ auth()->user()->name }}
            </p>

            <p class="text-emerald-100 text-sm">
                Owner
            </p>

        </div>

    </div>

</header>

    <div class="max-w-7xl mx-auto flex gap-6 py-8 px-6">

    <aside class="w-64 bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl p-6 h-fit sticky top-6 border border-white">

    <div class="text-center border-b pb-5 mb-5">

        <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white text-3xl shadow-lg">

    {{ strtoupper(substr(auth()->user()->name,0,1)) }}

</div>

        <h2 class="mt-4 font-bold text-lg text-gray-800">
            {{ auth()->user()->name }}
        </h2>

        <p class="text-sm text-gray-500">
            Owner ReservHub
        </p>

    </div>

    <h3 class="text-xs uppercase tracking-widest text-gray-400 mb-3">
        Menu Navigasi
    </h3>

        <nav class="space-y-2">

           <a href="{{ route('owner.dashboard') }}"
   class="block px-4 py-3 rounded-xl transition
   {{ request()->routeIs('owner.dashboard')
        ? 'bg-emerald-600 text-white shadow'
        : 'hover:bg-emerald-100 hover:text-emerald-700 text-gray-700' }}">
                🏠 Dashboard
            </a>

           <a href="{{ route('owner.places.index') }}"
   class="block px-4 py-3 rounded-xl transition
   {{ request()->routeIs('owner.places.*')
        ? 'bg-emerald-600 text-white shadow'
        : 'hover:bg-emerald-100 hover:text-emerald-700 text-gray-700' }}">
                📍 Tempat Saya
            </a>

            <a href="{{ route('owner.services.index') }}"
   class="block px-4 py-3 rounded-xl transition
   {{ request()->routeIs('owner.services.*')
        ? 'bg-emerald-600 text-white shadow'
        : 'hover:bg-emerald-100 hover:text-emerald-700 text-gray-700' }}">
                🛠 Layanan
            </a>

           <a href="{{ route('owner.bookings.index') }}"
   class="block px-4 py-3 rounded-xl transition
   {{ request()->routeIs('owner.bookings.*')
        ? 'bg-emerald-600 text-white shadow'
        : 'hover:bg-emerald-100 hover:text-emerald-700 text-gray-700' }}">
                📅 Reservasi
            </a>

        </nav>

        <form action="{{ route('logout') }}" method="POST" class="pt-4 border-t mt-4">

    @csrf

    <button
        type="submit"
        class="w-full bg-red-50 hover:bg-red-100 text-red-600 rounded-xl px-4 py-3 font-medium transition">

        🚪 Logout

    </button>

</form>

    </aside>

    

    <section class="flex-1">

    <div class="bg-white/60 backdrop-blur-md rounded-3xl p-8 shadow-sm border border-white">

        @yield('content')

    </div>

</section>

</div>

</body>
</html>