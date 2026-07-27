@extends('layouts.admin')

@section('title', 'Dashboard Owner')

@section('content')

<h1 class="text-3xl font-bold mb-2">
    Dashboard Owner
</h1>

<p class="text-gray-600 mb-8">
    Selamat datang, {{ auth()->user()->name }} 👋
</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-gray-500 text-sm">
            Tempat Saya
        </h2>

        <p class="text-3xl font-bold mt-2">
            {{ $placesCount }}
        </p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-gray-500 text-sm">
            Reservasi Masuk
        </h2>

        <p class="text-3xl font-bold mt-2">
            0
        </p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-gray-500 text-sm">
            Status Akun
        </h2>

        <p class="text-green-600 font-semibold mt-2">
            Owner Aktif
        </p>
    </div>

</div>

<div class="bg-white shadow rounded-lg p-6 mt-8">

    <h2 class="text-xl font-semibold mb-4">
        Menu Owner
    </h2>

    <div class="flex gap-3">

        <a href="{{ route('owner.places.create') }}"
           class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg transition">
            + Tambah Tempat
        </a>

        <a href="{{ route('owner.places.index') }}"
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg transition">
            Lihat Tempat Saya
        </a>

        <a href="{{ route('owner.bookings.index') }}"
   class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition">
    Reservasi Masuk
</a>

<a href="{{ route('owner.services.index') }}"
   class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition">
    Kelola Layanan
</a>

    </div>

</div>

@endsection