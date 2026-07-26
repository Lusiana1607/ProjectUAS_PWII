@extends('layouts.admin')

@section('title', 'Edit Tempat')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold text-gray-800 mb-2">
        Edit Tempat
    </h1>

    <p class="text-gray-500 mb-8">
        Perbarui informasi tempat usaha Anda.
    </p>

    <div class="bg-white shadow rounded-xl p-6">

        <form action="{{ route('owner.places.update', $place->id) }}" method="POST">

            @csrf
            @method('PUT')

            {{-- Nama Tempat --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Tempat
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $place->name }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500"
                >
            </div>

            {{-- Kategori --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Kategori
                </label>

                <select
                    name="category_id"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500"
                >

                    @foreach ($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $place->category_id == $category->id ? 'selected' : '' }}
                        >
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
                >{{ $place->address }}</textarea>
            </div>

            {{-- Nomor Telepon --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nomor Telepon
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ $place->phone }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500"
                >
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
                >{{ $place->description }}</textarea>
            </div>

            {{-- Jam Operasional --}}
            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jam Buka
                    </label>

                    <input
                        type="time"
                        name="open_time"
                        value="{{ $place->open_time }}"
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jam Tutup
                    </label>

                    <input
                        type="time"
                        name="close_time"
                        value="{{ $place->close_time }}"
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500"
                    >
                </div>

            </div>

            {{-- Tombol --}}
            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('owner.places.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection