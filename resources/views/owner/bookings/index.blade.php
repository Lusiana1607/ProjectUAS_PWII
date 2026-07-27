@extends('layouts.admin')

@section('title', 'Reservasi Masuk')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Reservasi Masuk
        </h1>

        <p class="text-gray-500 mt-2">
            Daftar reservasi yang masuk ke tempat Anda.
        </p>
    </div>

    @if($bookings->count() > 0)

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left">
                                Customer
                            </th>

                            <th class="px-6 py-4 text-left">
                                Tempat
                            </th>

                            <th class="px-6 py-4 text-left">
                                Tanggal
                            </th>

                            <th class="px-6 py-4 text-left">
                                Jam
                            </th>

                            <th class="px-6 py-4 text-left">
                                Jumlah Tamu
                            </th>

                            <th class="px-6 py-4 text-left">
                                Status
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($bookings as $booking)

                            <tr class="border-t">

                                <td class="px-6 py-4">
                                    {{ $booking->user->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $booking->place->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $booking->booking_date }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $booking->start_time }}
                                    -
                                    {{ $booking->end_time }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $booking->total_guests }} orang
                                </td>

                                <td class="px-6 py-4">

    {{-- Status Reservasi --}}
    <div class="mb-3">

        @if($booking->status === 'approved')

            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                Diterima
            </span>

        @elseif($booking->status === 'rejected')

            <span class="px-3 py-1 rounded-full text-sm bg-red-100 text-red-700">
                Ditolak
            </span>

        @elseif($booking->status === 'completed')

            <span class="px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700">
                Selesai
            </span>

        @else

            <span class="px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-700">
                Menunggu
            </span>

        @endif

    </div>


    {{-- Tombol Aksi --}}
    <div class="flex flex-wrap gap-2">

        @if($booking->status === 'pending')

            {{-- Tombol Terima --}}
            <form action="{{ route('owner.bookings.update-status', $booking->id) }}"
                  method="POST">

                @csrf
                @method('PATCH')

                <input type="hidden" name="status" value="approved">

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm">
                    Terima
                </button>

            </form>


            {{-- Tombol Tolak --}}
            <form action="{{ route('owner.bookings.update-status', $booking->id) }}"
                  method="POST">

                @csrf
                @method('PATCH')

                <input type="hidden" name="status" value="rejected">

                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm">
                    Tolak
                </button>

            </form>

        @elseif($booking->status === 'approved')

            {{-- Tombol Selesai --}}
            <form action="{{ route('owner.bookings.update-status', $booking->id) }}"
                  method="POST">

                @csrf
                @method('PATCH')

                <input type="hidden" name="status" value="completed">

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm">
                    Selesai
                </button>

            </form>

        @endif

    </div>

</td>
                    

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    @else

        <div class="bg-white rounded-xl shadow p-8 text-center">

            <p class="text-gray-500">
                Belum ada reservasi yang masuk.
            </p>

        </div>

    @endif

</div>

@endsection
