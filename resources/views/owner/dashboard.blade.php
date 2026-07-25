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
            0
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

    <button
        class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">

        + Tambah Tempat

    </button>

</div>

@endsection