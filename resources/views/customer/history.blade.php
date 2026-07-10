<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Riwayat Reservasi Saya') }}
            </h2>
            <!-- Tombol Navigasi Kembali ke Dashboard -->
            <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm fw-bold">
                ⬅️ Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- 1. TATA LETAK NOTIFIKASI SUKSES SETELAH BOOKING -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                        <div class="d-flex align-items-center">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:" viewBox="0 0 16 16" fill="currentColor">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            <div>
                                <strong>Berhasil!</strong> {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                <!-- 2. TATA LETAK TABEL DATA RIWAYAT RESERVASI -->
                @if($bookings->isEmpty())
                    <div class="alert alert-info text-center py-5 shadow-sm">
                        <p class="mb-3 fs-5">Kamu belum pernah melakukan reservasi tempat.</p>
                        <a href="{{ route('customer.explore') }}" class="btn btn-primary fw-bold">
                            🔍 Cari Tempat & Mulai Reservasi
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle shadow-sm">
                            <thead class="table-dark">
                                <tr>
                                    <th>Tempat / Kafe</th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Waktu / Jam</th>
                                    <th>Jumlah Orang</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td><strong>{{ $booking->place_name }}</strong></td>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }} WIB</td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $booking->pax ?? $booking->total_guests ?? $booking->number_of_people ?? '-' }} Orang
                                        </span>
                                    </td>
                                    <td>
                                        <!-- Status bawaan otomatis pending menunggu konfirmasi owner -->
                                        <span class="badge bg-warning text-dark px-3 py-2 fw-bold">⏳ Pending</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>