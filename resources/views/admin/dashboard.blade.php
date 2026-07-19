@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<h1 class="text-3xl font-bold mb-2">
    Dashboard Admin
</h1>

<p class="text-gray-600 mb-8">
    Selamat datang di Dashboard Admin ReservHub.
</p>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-gray-500 text-sm">Total User</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-gray-500 text-sm">Kategori</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalCategories }}</p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-gray-500 text-sm">Total Tempat</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalPlaces }}</p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-gray-500 text-sm">Pending Approval</h2>
        <p class="text-3xl font-bold mt-2">{{ $pendingPlaces }}</p>
    </div>

</div>

{{-- Menu --}}
<div class="bg-white shadow rounded-lg p-6">

    <h2 class="text-xl font-semibold mb-4">
        Menu Admin
    </h2>

    <a href="{{ route('admin.categories.index') }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">

        📂 Kelola Kategori

    </a>

</div>

<div class="bg-white shadow rounded-lg p-6 mt-8">

    <h2 class="text-xl font-semibold mb-4">
        Tempat Terbaru
    </h2>

    @if($latestPlaces->count() > 0)

        <table class="w-full border-collapse">

            <thead>

                <tr class="border-b">
                    <th class="text-left py-2">Nama Tempat</th>
                    <th class="text-left py-2">Kategori</th>
                    <th class="text-left py-2">Status</th>
                </tr>

            </thead>

            <tbody>

                @foreach($latestPlaces as $place)

                    <tr class="border-b">

                        <td class="py-3">
                            {{ $place->name }}
                        </td>

                        <td>
                            {{ $place->category->name }}
                        </td>

                        <td>
                            {{ ucfirst($place->status) }}
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p class="text-gray-500">
            Belum ada pengajuan tempat.
        </p>

    @endif

</div>

@endsection