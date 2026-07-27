<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksplorasi Tempat - ReservHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-success navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">ReservHub</a>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm fw-bold px-3">
            🏠 Kembali ke Dashboard
        </a>
    </div>
</nav>

<div class="container py-5">
    <!-- 1. NOTIFIKASI BESAR (HANYA UNTUK SELESAI RESERVASI) -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4 p-4" role="alert">
            <div class="d-flex align-items-start">
                <svg class="bi flex-shrink-0 me-3 mt-1" width="28" height="28" role="img" aria-label="Success:" viewBox="0 0 16 16" fill="currentColor">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div>
                    <h5 class="alert-heading fw-bold mb-1">Berhasil Diajukan!</h5>
                    <p class="mb-3">{{ session('success') }}</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-success btn-sm fw-bold">🏠 Selesai & Kembali ke Dashboard</a>
                        <a href="{{ route('customer.booking.history') }}" class="btn btn-outline-success btn-sm">📋 Cek Status di Riwayat</a>
                    </div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- 2. NOTIFIKASI SIMPEL (KHUSUS UNTUK TAMBAH/HAPUS FAVORIT) -->
    @if(session('fav_success'))
        <div class="alert alert-warning alert-dismissible fade show shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-center">
                <span class="me-2">✨</span>
                <div>{{ session('fav_success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="fw-bold mb-2">Eksplorasi Tempat Reservasi</h2>
    <p class="text-muted">Temukan Coffee Shop, Salon, dan Rental Alat terbaik di sini.</p>
    
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
        @foreach($places as $place)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">

            @if($place->image)

    <img
        src="{{ asset('storage/' . $place->image) }}"
        class="card-img-top"
        style="height:220px; object-fit:cover;"
        alt="{{ $place->name }}">

@else

    <div
        class="bg-secondary text-white d-flex align-items-center justify-content-center"
        style="height:220px;">

        Belum ada foto

    </div>

@endif
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title fw-bold">{{ $place->name }}</h5>
                        <p class="card-text text-muted text-sm">{{ $place->description }}</p>
                    </div>
                    
                    <!-- Tata Letak Tombol Aksi & Tombol Love -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('customer.show', $place->id) }}" class="btn btn-outline-success btn-sm flex-grow-1 me-2">Lihat Detail</a>
                        
                        <!-- FORM TOMBOL LOVE CUSTOMER -->
                        <form action="{{ route('customer.favorite.toggle', $place->id) }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 text-decoration-none" title="Tambah ke Favorit" style="font-size: 1.5rem; line-height: 1;">
                                @php
                                    $isFavorite = DB::table('favorites')
                                        ->where('user_id', Auth::id())
                                        ->where('place_id', $place->id)
                                        ->exists();
                                @endphp
                                
                                @if($isFavorite)
                                    ❤️
                                @else
                                    🤍
                                @endif
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>