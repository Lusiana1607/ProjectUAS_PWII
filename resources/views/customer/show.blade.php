<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $place->name }} - ReservHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-success navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">ReservHub</a>
        <a class="btn btn-outline-light btn-sm" href="{{ route('customer.explore') }}">← Kembali</a>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <h1 class="fw-bold text-success mb-3">{{ $place->name }}</h1>
                    <p class="lead text-muted">{{ $place->description }}</p>
                    <hr class="my-4">
                    
                    <h5 class="fw-bold mb-3">Informasi Lengkap Tempat:</h5>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><strong>📍 Alamat:</strong> {{ $place->address }}</li>
                        <li class="list-group-item"><strong>📞 Kontak/No. HP:</strong> {{ $place->phone }}</li>
                        <li class="list-group-item"><strong>🕒 Jam Operasional:</strong> {{ substr($place->open_time, 0, 5) }} - {{ substr($place->close_time, 0, 5) }} WIB</li>
                    </ul>

                    <a href="{{ url('/explore/'.$place->id.'/booking') }}" class="btn btn-success btn-lg w-100 fw-bold shadow-sm">Booking Tempat Sekarang</a>
                    <small class="text-muted d-block text-center mt-2">*Fitur booking akan aktif setelah sistem user terintegrasi.</small>
                </div>
            </div>
            <hr class="my-5">

            <div class="row">
                <!-- KOLOM KIRI: DAFTAR ULASAN DARI CUSTOMER LAIN -->
                <div class="col-md-7 mb-4">
                    <h4 class="fw-bold mb-4">💬 Ulasan Pengguna</h4>
                    
                    @if($reviews->isEmpty())
                        <div class="alert alert-light border text-muted py-4 text-center shadow-sm">
                            Belum ada ulasan untuk tempat ini. Jadi yang pertama memberikan review!
                        </div>
                    @else
                        <div class="d-flex flex-column gap-3">
                            @foreach($reviews as $review)
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="fw-bold m-0 text-success">{{ $review->user_name }}</h6>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small>
                                        </div>
                                        <!-- Cetak Bintang Berdasarkan Angka Rating -->
                                        <div class="text-warning mb-2" style="font-size: 0.9rem;">
                                            @for($i = 1; $i <= 5; $i++)
                                                {{ $i <= $review->rating ? '⭐' : '☆' }}
                                            @endfor
                                        </div>
                                        <p class="card-text text-secondary m-0">{{ $review->comment ?? '(Tidak ada komentar tertulis)' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- KOLOM KANAN: FORM INPUT REVIEW BARU (Hanya muncul jika sudah selesai booking) -->
                <div class="col-md-5 mb-4">
                    <div class="card shadow-sm border-0 position-sticky" style="top: 20px;">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3">Tulis Ulasan & Rating</h4>
                            
                            @if(session('review_success'))
                                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                    ✨ {{ session('review_success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Pengecekan apakah user berhak memberikan ulasan -->
                            @if($bookingToReview)
                                <form action="{{ route('customer.review.store', $place->id) }}" method="POST">
                                    @csrf
                                    <!-- Input hidden untuk mengirim ID Booking agar tersimpan di tabel reviews -->
                                    <input type="hidden" name="booking_id" value="{{ $bookingToReview->id }}">

                                    <!-- Pilihan Rating Bintang -->
                                    <div class="mb-3">
                                        <label for="rating" class="form-label fw-bold text-muted small">BERI RATING BINTANG</label>
                                        <select name="rating" id="rating" class="form-select" required>
                                            <option value="">-- Pilih Rating --</option>
                                            <option value="5">⭐⭐⭐⭐⭐ (5 - Puas Banget)</option>
                                            <option value="4">⭐⭐⭐⭐ (4 - Bagus)</option>
                                            <option value="3">⭐⭐⭐ (3 - Biasa Saja)</option>
                                            <option value="2">⭐⭐ (2 - Kurang Puas)</option>
                                            <option value="1">⭐ (1 - Kecewa)</option>
                                        </select>
                                    </div>

                                    <!-- Input Komentar Teks -->
                                    <div class="mb-3">
                                        <label for="comment" class="form-label fw-bold text-muted small">ULASAN / KOMENTAR</label>
                                        <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="Bagikan pengalaman menarikmu di tempat ini..." required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-success w-100 fw-bold">Kirim Ulasan Sekarang</button>
                                </form>
                            @else
                                <div class="text-center py-4 text-muted">
                                    <div style="font-size: 3rem;">🔒</div>
                                    <p class="mt-2 fw-semibold">Form Ulasan Terkunci</p>
                                    <p class="small text-secondary px-3">Kamu hanya bisa memberikan ulasan setelah melakukan booking tempat ini dan status kunjunganmu dinyatakan **Selesai** oleh Admin.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>