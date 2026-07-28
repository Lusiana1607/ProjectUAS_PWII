@extends('layouts.owner')

@section('title', 'Tempat Saya')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-2xl shadow-lg p-8 text-white mb-8">

        <div class="flex flex-col md:flex-row md:justify-between md:items-center">

            <div>

                <h1 class="text-4xl font-bold">
                    Tempat Saya
                </h1>

                <p class="mt-2 text-emerald-100">
                    Kelola seluruh tempat usaha yang Anda miliki.
                </p>

            </div>

            <a href="{{ route('owner.places.create') }}"
               class="mt-5 md:mt-0 bg-white text-emerald-600 hover:bg-emerald-100 font-semibold px-6 py-3 rounded-xl transition">

                + Tambah Tempat

            </a>

        </div>

    </div>

    
    @if($places->count() > 0)

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach($places as $place)

                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                    {{-- Foto --}}
                    @if($place->image)

                        <img
                            src="{{ asset('storage/' . $place->image) }}"
                            alt="{{ $place->name }}"
                            class="w-full h-56 object-cover hover:scale-105 transition duration-500">

                    @else

                        <div class="w-full h-56 bg-gray-100 flex flex-col items-center justify-center">

                            <div class="text-5xl">
                                🏪
                            </div>

                            <p class="text-gray-400 mt-2">
                                Belum ada foto
                            </p>

                        </div>

                    @endif

                    {{-- Isi Card --}}
                    <div class="p-6">

                        <div class="flex justify-between items-start">

                            <div>

                                <h2 class="text-2xl font-bold text-gray-800">
                                    {{ $place->name }}
                                </h2>

                                <p class="text-emerald-600 font-medium mt-1">
                                    {{ $place->category->name }}
                                </p>

                            </div>

                            @if($place->status == 'approved')

                                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                                    ✔ Disetujui
                                </span>

                            @elseif($place->status == 'rejected')

                                <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">
                                    ✖ Ditolak
                                </span>

                            @else

                                <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full">
                                    ⏳ Menunggu
                                </span>

                            @endif

                        </div>

                        <div class="mt-5 space-y-3 text-gray-600 text-sm">

                            <p>
                                📍 {{ $place->address }}
                            </p>

                            <p>
                                🕒
                                {{ \Carbon\Carbon::parse($place->open_time)->format('H.i') }}
                                -
                                {{ \Carbon\Carbon::parse($place->close_time)->format('H.i') }}
                            </p>

                            <p>
                                📞 {{ $place->phone }}
                            </p>

                        </div>

                        <div class="mt-6 flex gap-3">

                            <a href="{{ route('owner.places.edit', $place->id) }}"
                               class="flex-1 text-center bg-emerald-600 hover:bg-emerald-700 text-white py-2.5 rounded-xl font-medium transition">

                                ✏️ Edit

                            </a>

                            <form action="{{ route('owner.places.destroy', $place->id) }}"
                                  method="POST"
                                  class="flex-1"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus tempat ini?');">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full bg-red-500 hover:bg-red-600 text-white py-2.5 rounded-xl font-medium transition">

                                    🗑 Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-2xl shadow-md p-12 text-center">

            <div class="text-6xl mb-4">
                🏪
            </div>

            <h2 class="text-2xl font-bold text-gray-700">
                Belum Ada Tempat
            </h2>

            <p class="text-gray-500 mt-2">
                Tambahkan tempat pertama Anda agar pelanggan dapat melakukan reservasi.
            </p>

            <a href="{{ route('owner.places.create') }}"
               class="inline-block mt-6 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-medium">

                + Tambah Tempat

            </a>

        </div>

    @endif

</div>

@endsection