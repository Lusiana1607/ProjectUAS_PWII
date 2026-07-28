@extends('layouts.owner')

@section('title', 'Dashboard Owner')

@section('content')

{{-- Hero --}}
<div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-3xl shadow-xl p-8 text-white mb-8">

    <h1 class="text-4xl font-bold">
        Halo, {{ auth()->user()->name }} 👋
    </h1>

    <p class="mt-3 text-emerald-100 text-lg">
        Selamat datang di Dashboard Owner ReservHub.
        Pantau bisnis Anda dan kelola seluruh reservasi dengan lebih mudah.
    </p>

</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

    <div class="bg-white rounded-3xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6 border-l-4 border-emerald-500">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Tempat Saya
                </p>

                <h2 class="text-4xl font-bold text-gray-800 mt-2">
                    {{ $totalPlaces }}
                </h2>

                <p class="text-gray-400 text-sm mt-2">
                    Tempat Terdaftar
                </p>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-4">

    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke-width="1.8"
         stroke="currentColor"
         class="w-8 h-8 text-emerald-600">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 21s7-4.5 7-11a7 7 0 10-14 0c0 6.5 7 11 7 11z" />

        <circle
            cx="12"
            cy="10"
            r="2" />

    </svg>

</div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6 border-l-4 border-emerald-500">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Layanan
                </p>

                <h2 class="text-4xl font-bold text-gray-800 mt-2">
                    {{ $totalServices }}
                </h2>

                <p class="text-gray-400 text-sm mt-2">
                    Layanan Aktif
                </p>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-4">

    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke-width="1.8"
         stroke="currentColor"
         class="w-8 h-8 text-emerald-600">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M11.42 2.17a1 1 0 011.16 0l1.66 1.2a1 1 0 001.06.09l1.93-.96a1 1 0 011.27.39l1.03 1.88a1 1 0 00.88.52h2.18a1 1 0 01.98 1.22l-.46 2.11a1 1 0 00.29.95l1.54 1.54a1 1 0 010 1.42l-1.54 1.54a1 1 0 00-.29.95l.46 2.11a1 1 0 01-.98 1.22H20.4a1 1 0 00-.88.52l-1.03 1.88a1 1 0 01-1.27.39l-1.93-.96a1 1 0 00-1.06.09l-1.66 1.2a1 1 0 01-1.16 0l-1.66-1.2a1 1 0 00-1.06-.09l-1.93.96a1 1 0 01-1.27-.39l-1.03-1.88A1 1 0 003.6 17.4H1.42a1 1 0 01-.98-1.22l.46-2.11a1 1 0 00-.29-.95L-.93 11.58a1 1 0 010-1.42L.61 8.62a1 1 0 00.29-.95L.44 5.56A1 1 0 011.42 4.34H3.6a1 1 0 00.88-.52l1.03-1.88a1 1 0 011.27-.39l1.93.96a1 1 0 001.06-.09l1.65-1.24z" />

    </svg>

</div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6 border-l-4 border-blue-500">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Reservasi
                </p>

                <h2 class="text-4xl font-bold text-gray-800 mt-2">
                    {{ $totalBookings }}
                </h2>

                <p class="text-gray-400 text-sm mt-2">
                    Total Reservasi
                </p>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-4">

    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke-width="1.8"
         stroke="currentColor"
         class="w-8 h-8 text-emerald-600">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M8.25 2.25v2.25m7.5-2.25v2.25M3.75 9.75h16.5m-15 10.5h13.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H5.25A1.5 1.5 0 003.75 6v12.75a1.5 1.5 0 001.5 1.5z"/>

    </svg>

</div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6 border-l-4 border-yellow-500">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Pending
                </p>

                <h2 class="text-4xl font-bold text-gray-800 mt-2">
                    {{ $pendingBookings }}
                </h2>

                <p class="text-gray-400 text-sm mt-2">
                    Menunggu Konfirmasi
                </p>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center mb-4">

    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke-width="1.8"
         stroke="currentColor"
         class="w-8 h-8 text-yellow-600">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 6v6l4 2"/>

        <circle
            cx="12"
            cy="12"
            r="9" />

    </svg>

</div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6 border-l-4 border-green-500">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Disetujui
                </p>

                <h2 class="text-4xl font-bold text-gray-800 mt-2">
                    {{ $approvedBookings }}
                </h2>

                <p class="text-gray-400 text-sm mt-2">
                    Reservasi Aktif
                </p>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center mb-4">

    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke-width="1.8"
         stroke="currentColor"
         class="w-8 h-8 text-green-600">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M5 13l4 4L19 7"/>

    </svg>

</div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6 border-l-4 border-indigo-500">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Selesai
                </p>

                <h2 class="text-4xl font-bold text-gray-800 mt-2">
                    {{ $completedBookings }}
                </h2>

                <p class="text-gray-400 text-sm mt-2">
                    Reservasi Berhasil
                </p>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center mb-4">

    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke-width="1.8"
         stroke="currentColor"
         class="w-8 h-8 text-blue-600">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75"/>

        <circle
            cx="12"
            cy="12"
            r="9" />

    </svg>

</div>

        </div>

    </div>

</div>

{{-- Quick Actions + Ringkasan --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">

    {{-- Quick Actions --}}
    <div class="bg-white rounded-3xl shadow-md p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            🚀 Quick Actions
        </h2>

        <div class="space-y-4">

            <a href="{{ route('owner.places.create') }}"
               class="flex items-center justify-between p-4 rounded-2xl hover:bg-emerald-50 transition">

                <div>

                    <p class="font-semibold text-gray-800">
                        Tambah Tempat Baru
                    </p>

                    <p class="text-sm text-gray-500">
                        Daftarkan tempat usaha Anda.
                    </p>

                </div>

                <span class="text-2xl">➜</span>

            </a>

            <a href="{{ route('owner.services.create') }}"
               class="flex items-center justify-between p-4 rounded-2xl hover:bg-emerald-50 transition">

                <div>

                    <p class="font-semibold text-gray-800">
                        Tambah Layanan
                    </p>

                    <p class="text-sm text-gray-500">
                        Buat layanan baru untuk pelanggan.
                    </p>

                </div>

                <span class="text-2xl">➜</span>

            </a>

            <a href="{{ route('owner.bookings.index') }}"
               class="flex items-center justify-between p-4 rounded-2xl hover:bg-emerald-50 transition">

                <div>

                    <p class="font-semibold text-gray-800">
                        Lihat Reservasi
                    </p>

                    <p class="text-sm text-gray-500">
                        Kelola reservasi pelanggan.
                    </p>

                </div>

                <span class="text-2xl">➜</span>

            </a>

        </div>

    </div>

    {{-- Ringkasan --}}
    <div class="bg-white rounded-3xl shadow-md p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            📊 Ringkasan Bisnis
        </h2>

        <div class="space-y-5">

            <div class="flex justify-between">

                <span class="text-gray-600">
                    Tempat Terdaftar
                </span>

                <span class="font-bold text-emerald-600">
                    {{ $totalPlaces }}
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-gray-600">
                    Layanan Aktif
                </span>

                <span class="font-bold text-emerald-600">
                    {{ $totalServices }}
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-gray-600">
                    Reservasi Masuk
                </span>

                <span class="font-bold text-emerald-600">
                    {{ $totalBookings }}
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-gray-600">
                    Reservasi Selesai
                </span>

                <span class="font-bold text-emerald-600">
                    {{ $completedBookings }}
                </span>

            </div>

        </div>

    </div>

</div>

@endsection