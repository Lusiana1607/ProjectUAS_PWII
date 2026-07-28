@extends('layouts.owner')

@section('title', 'Reservasi Masuk')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-3xl shadow-xl p-8 text-white mb-8">

        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-5">

            <div>

                <h1 class="text-4xl font-bold">
                    📅 Reservasi Masuk
                </h1>

                <p class="mt-3 text-emerald-100 text-lg">
                    Kelola reservasi pelanggan dengan cepat dan mudah.
                </p>

                <div class="mt-5 inline-flex items-center bg-white/20 px-4 py-2 rounded-full">

                    <span class="font-semibold">
                        Total Reservasi :
                    </span>

                    <span class="ml-2 bg-white text-emerald-600 px-3 py-1 rounded-full font-bold">
                        {{ $bookings->count() }}
                    </span>

                </div>

            </div>

        </div>

    </div>

    @if($bookings->count())

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">

            @foreach($bookings as $booking)

                <div class="bg-white rounded-3xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">

                    {{-- Header Card --}}
                    <div class="bg-emerald-50 p-6 flex justify-between items-start">

                        <div class="flex items-center gap-4">

                            <div class="w-16 h-16 rounded-full bg-emerald-500 text-white flex items-center justify-center text-2xl font-bold">

                                {{ strtoupper(substr($booking->user->name,0,1)) }}

                            </div>

                            <div>

                                <h2 class="text-2xl font-bold text-gray-800">

                                    {{ $booking->user->name }}

                                </h2>

                                <p class="text-emerald-600 mt-1">

                                    📍 {{ $booking->place->name }}

                                </p>

                            </div>

                        </div>

                        @if($booking->status=='pending')

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                                ⏳ Menunggu
                            </span>

                        @elseif($booking->status=='approved')

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                ✅ Disetujui
                            </span>

                        @elseif($booking->status=='completed')

                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                                🎉 Selesai
                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                                ❌ Ditolak
                            </span>

                        @endif

                    </div>

                    {{-- Informasi --}}
                    <div class="p-6">

                        <div class="grid grid-cols-3 gap-3">

                            <div class="bg-gray-50 rounded-2xl p-4 text-center">

                                <div class="text-2xl mb-2">
                                    📅
                                </div>

                                <p class="text-xs text-gray-500">
                                    Tanggal
                                </p>

                                <p class="font-semibold text-gray-700 mt-1">
                                    {{ $booking->booking_date }}
                                </p>

                            </div>

                            <div class="bg-gray-50 rounded-2xl p-4 text-center">

                                <div class="text-2xl mb-2">
                                    🕒
                                </div>

                                <p class="text-xs text-gray-500">
                                    Jam
                                </p>

                                <p class="font-semibold text-gray-700 mt-1 text-sm">
                                    {{ $booking->start_time }}
                                    -
                                    {{ $booking->end_time }}
                                </p>

                            </div>

                            <div class="bg-gray-50 rounded-2xl p-4 text-center">

                                <div class="text-2xl mb-2">
                                    👥
                                </div>

                                <p class="text-xs text-gray-500">
                                    Tamu
                                </p>

                                <p class="font-semibold text-gray-700 mt-1">
                                    {{ $booking->total_guests }}
                                </p>

                            </div>

                        </div>

                        {{-- Tombol --}}
                        <div class="border-t mt-6 pt-6">

                            @if($booking->status=='pending')

                                <div class="grid grid-cols-2 gap-3">

                                    <form action="{{ route('owner.bookings.update-status',$booking->id) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <input type="hidden" name="status" value="approved">

                                        <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-2xl font-semibold transition">

                                            ✅ Terima

                                        </button>

                                    </form>

                                    <form action="{{ route('owner.bookings.update-status',$booking->id) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <input type="hidden" name="status" value="rejected">

                                        <button class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl font-semibold transition">

                                            ❌ Tolak

                                        </button>

                                    </form>

                                </div>

                            @elseif($booking->status=='approved')

                                <form action="{{ route('owner.bookings.update-status',$booking->id) }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden" name="status" value="completed">

                                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-2xl font-semibold transition">

                                        🎉 Tandai Selesai

                                    </button>

                                </form>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-3xl shadow-md p-16 text-center">

            <div class="text-7xl mb-5">

                📅

            </div>

            <h2 class="text-3xl font-bold text-gray-700">

                Belum Ada Reservasi

            </h2>

            <p class="text-gray-500 mt-3 max-w-lg mx-auto">

                Reservasi dari pelanggan akan muncul di halaman ini setelah mereka melakukan pemesanan.

            </p>

        </div>

    @endif

</div>

@endsection