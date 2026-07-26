@extends('layouts.admin')

@section('title', 'Tambah Tempat')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold text-gray-800 mb-2">
        Tambah Tempat
    </h1>

    <p class="text-gray-500 mb-8">
        Lengkapi informasi tempat usaha Anda.
    </p>

    <div class="bg-white shadow rounded-xl p-6">

    <form action="{{ route('owner.places.store') }}" method="POST">
    @csrf

    {{-- Nama Tempat --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Nama Tempat
        </label>

        <input
    type="text"
    name="name"
    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500"
    placeholder="Contoh: Coffee Senja">
    </div>

    {{-- Kategori --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Kategori
        </label>

        <select
    name="category_id"
    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">

    <option value="">-- Pilih Kategori --</option>

    @foreach ($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach

</select>
    </div>

    {{-- Alamat --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Alamat
        </label>

        <textarea
    name="address"
    rows="3"
    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500"
    placeholder="Masukkan alamat tempat"></textarea>
    </div>

    {{-- Nomor Telepon --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Nomor Telepon
        </label>

        <input
            type="text"
            name="phone"
            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500"
            placeholder="08xxxxxxxxxx">
    </div>

    {{-- Deskripsi --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Deskripsi
        </label>

        <textarea
            name="description"
            rows="4"
            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500"
            placeholder="Ceritakan tempat usaha Anda"></textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">

        {{-- Jam Buka --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Jam Buka
            </label>

            <input
                type="time"
                name="open_time"
                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
        </div>

        {{-- Jam Tutup --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Jam Tutup
            </label>

            <input
                type="time"
                name="close_time"
                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
        </div>

    </div>

    <div class="mt-8">
        <button
            type="submit"
            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
            Simpan Tempat
        </button>
    </div>

</form>

    </div>

</div>

@endsection