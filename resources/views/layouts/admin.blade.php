<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - ReservHub</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-green-50 via-white to-green-50">

    <!-- header -->
    <header class="bg-white/80 backdrop-blur-md border-b border-green-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-xl font-extrabold text-green-700 tracking-tight">ReservHub</h1>
                <p class="text-xs text-gray-500">Admin Panel</p>
            </div>

            <div class="text-right">
                <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-500">Administrator</p>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row gap-6">

        <!-- sidebar -->
        <aside class="w-full md:w-72 shrink-0">
            <div class="bg-white/70 backdrop-blur-md rounded-3xl shadow-md border border-white/60 p-6">

                <!-- profil -->
                <div class="flex flex-col items-center text-center mb-6">
                    <div class="w-16 h-16 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-bold shadow">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <p class="mt-3 font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>

                <!-- menu -->
                <nav class="flex flex-col gap-1">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('admin.dashboard') ? 'bg-green-600 text-white shadow' : 'text-gray-700 hover:bg-green-50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h4v-6h6v6h4a1 1 0 001-1V10" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('admin.categories.*') ? 'bg-green-600 text-white shadow' : 'text-gray-700 hover:bg-green-50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                        Kelola Kategori
                    </a>

                    <a href="{{ route('users.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('users.*') ? 'bg-green-600 text-white shadow' : 'text-gray-700 hover:bg-green-50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-5.13a4 4 0 10-4-4 4 4 0 004 4z" />
                        </svg>
                        Kelola User
                    </a>

                    <a href="{{ route('admin.owner-requests.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('admin.owner-requests.*') ? 'bg-green-600 text-white shadow' : 'text-gray-700 hover:bg-green-50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Pengajuan Owner
                    </a>

                    <hr class="my-3 border-green-100">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-gray-700 hover:bg-green-50 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </nav>

            </div>
        </aside>

        <!-- content -->
        <main class="flex-1">
            <div class="bg-white rounded-3xl shadow-md p-6 min-h-[70vh]">
                @yield('content')
            </div>
        </main>

    </div>

</body>
</html>