<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | ReservHub Owner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-50 via-emerald-50 to-white">

@if(session('success'))

<div
    id="toast-success"
    class="fixed top-6 right-6 z-50 bg-emerald-600 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3 transition-all duration-500">

    <div class="text-2xl">
        ✅
    </div>

    <div>

        <p class="font-semibold">
            Berhasil
        </p>

        <p class="text-sm text-emerald-100">
            {{ session('success') }}
        </p>

    </div>

</div>

@endif

<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-emerald-100 shadow-sm">

    <div class="max-w-7xl mx-auto flex justify-between items-center px-8 py-4">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white text-xl shadow-lg">

                🌿

            </div>

            <div>

                <h1 class="text-2xl font-bold text-gray-800">
                    ReservHub
                </h1>

                <p class="text-sm text-emerald-600">
                    Owner Panel
                </p>

            </div>

        </div>

        <div class="flex items-center gap-4">

            <div class="text-right">

                <h2 class="font-bold text-gray-800">
                    {{ auth()->user()->name }}
                </h2>

                <p class="text-sm text-gray-500">
                    Owner
                </p>

            </div>

            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white font-bold shadow">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

        </div>

    </div>

</header>

<div class="max-w-7xl mx-auto flex gap-8 py-8 px-6">

    {{-- Sidebar --}}
    <aside class="w-72 bg-white rounded-3xl shadow-xl border border-gray-100 p-6 h-fit sticky top-24">

        <div class="text-center">

            <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white text-4xl shadow-lg">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

            <h2 class="mt-4 text-xl font-bold text-gray-800">

                {{ auth()->user()->name }}

            </h2>

            <p class="text-gray-500 text-sm">

                Owner ReservHub

            </p>

        </div>

        <hr class="my-6">

        <nav class="space-y-3">

            <a href="{{ route('owner.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all
            {{ request()->routeIs('owner.dashboard') ? 'bg-emerald-600 text-white shadow-lg' : 'hover:bg-emerald-50 text-gray-700' }}">

                🏠 Dashboard

            </a>

            <a href="{{ route('owner.places.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all
            {{ request()->routeIs('owner.places.*') ? 'bg-emerald-600 text-white shadow-lg' : 'hover:bg-emerald-50 text-gray-700' }}">

                📍 Tempat Saya

            </a>

            <a href="{{ route('owner.services.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all
            {{ request()->routeIs('owner.services.*') ? 'bg-emerald-600 text-white shadow-lg' : 'hover:bg-emerald-50 text-gray-700' }}">

                🛠 Layanan

            </a>

            <a href="{{ route('owner.bookings.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all
            {{ request()->routeIs('owner.bookings.*') ? 'bg-emerald-600 text-white shadow-lg' : 'hover:bg-emerald-50 text-gray-700' }}">

                📅 Reservasi

            </a>

        </nav>

        <hr class="my-6">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button
                class="w-full bg-red-50 hover:bg-red-100 text-red-600 py-3 rounded-2xl font-semibold transition">

                🚪 Logout

            </button>

        </form>

    </aside>

    {{-- Content --}}
    <main class="flex-1">

        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8 min-h-[700px]">

            @yield('content')

        </div>

        <footer class="text-center text-gray-400 text-sm mt-8">

            © {{ date('Y') }} ReservHub • Owner Panel

        </footer>

    </main>

</div>

<script>

const toast = document.getElementById('toast-success');

if(toast){

    setTimeout(() => {

        toast.classList.add(
            'opacity-0',
            'translate-x-20'
        );

    },3000);

}

</script>

</body>
</html>