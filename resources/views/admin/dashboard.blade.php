@extends('layouts.admin')

@section('content')

{{-- header --}}
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin</h1>
    <p class="text-gray-500 mt-1">Selamat datang kembali, Administrator</p>
</div>

{{-- statistik --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-3xl shadow-sm p-6 transition hover:-translate-y-1 hover:shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total User</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalUsers }}</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-5.13a4 4 0 10-4-4 4 4 0 004 4z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6 transition hover:-translate-y-1 hover:shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Owner</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalOwners }}</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14c-4.418 0-8 2.239-8 5v1h16v-1c0-2.761-3.582-5-8-5z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6 transition hover:-translate-y-1 hover:shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Tempat</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalPlaces }}</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 9v-6a1 1 0 011-1h2a1 1 0 011 1v6m-9 0h10a1 1 0 001-1v-8m-12 9V10" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6 transition hover:-translate-y-1 hover:shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Reservasi</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBookings }}</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>

</div>

{{-- aktivitas terbaru & quick menu --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

{{-- Tempat Terbaru --}}
<div class="lg:col-span-2 bg-white rounded-3xl shadow-sm p-6">

    <h2 class="text-lg font-semibold text-gray-800 mb-4">
        Tempat Terbaru
    </h2>

    <table class="w-full">

        <thead>

            <tr class="border-b">

                <th class="text-left py-3">Nama Tempat</th>

                <th class="text-left py-3">Kategori</th>

                <th class="text-left py-3">Status</th>

            </tr>

        </thead>

        <tbody>

            @forelse($latestPlaces as $place)

                <tr class="border-b hover:bg-gray-50">

                    <td class="py-3">
                        {{ $place->name }}
                    </td>

                    <td>

                        {{ $place->category->name ?? '-' }}

                    </td>

                    <td>

                        @if($place->status == 'approved')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                Disetujui
                            </span>

                        @elseif($place->status == 'pending')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                                Menunggu
                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                                Ditolak
                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center py-6 text-gray-500">

                        Belum ada data tempat.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

    {{-- quick menu --}}
    <div class="bg-white rounded-3xl shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Quick Menu</h2>

        <div class="flex flex-col gap-3">
            <a href="{{ route('users.index') }}"
               class="flex items-center gap-3 bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl text-sm font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-5.13a4 4 0 10-4-4 4 4 0 004 4z" />
                </svg>
                Kelola User
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="flex items-center gap-3 bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl text-sm font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
                Kelola Kategori
            </a>

            <a href="{{ route('admin.owner-requests.index') }}"
               class="flex items-center gap-3 bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl text-sm font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Pengajuan Owner
            </a>
        </div>
    </div>

</div>

{{-- Ringkasan ReservHub --}}
<div class="bg-white rounded-3xl shadow-sm p-6">

    <h2 class="text-lg font-semibold text-gray-800 mb-6">
        Ringkasan ReservHub
    </h2>

    <div class="grid md:grid-cols-3 gap-5">

        <div class="bg-green-50 rounded-2xl p-5">

            <p class="text-sm text-gray-500">
                Total Kategori
            </p>

            <h3 class="text-3xl font-bold text-green-700 mt-2">
                {{ $totalCategories }}
            </h3>

            <p class="text-xs text-gray-500 mt-2">
                Kategori usaha yang tersedia.
            </p>

        </div>

        <div class="bg-yellow-50 rounded-2xl p-5">

            <p class="text-sm text-gray-500">
                Menunggu Persetujuan
            </p>

            <h3 class="text-3xl font-bold text-yellow-600 mt-2">
                {{ $pendingPlaces }}
            </h3>

            <p class="text-xs text-gray-500 mt-2">
                Tempat yang masih menunggu persetujuan admin.
            </p>

        </div>

        <div class="bg-blue-50 rounded-2xl p-5">

            <p class="text-sm text-gray-500">
                Status Sistem
            </p>

            <h3 class="text-xl font-bold text-blue-700 mt-2">
                Berjalan Normal
            </h3>

            <p class="text-xs text-gray-500 mt-2">
                Semua fitur ReservHub dapat digunakan.
            </p>

        </div>

    </div>

</div>

@endsection