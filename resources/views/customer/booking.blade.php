<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking {{ $place->name }} - ReservHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-success navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">ReservHub</a>
        <a class="btn btn-outline-light btn-sm" href="{{ route('customer.show', $place->id) }}">← Batal</a>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="mb-0 fw-bold">Formulir Reservasi Tempat</h5>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted">Kamu akan melakukan reservasi di: <strong class="text-success">{{ $place->name }}</strong></p>
                    <hr>

                    <!-- Form ini nantinya akan mengarah ke proses simpan database -->
                    <form action="{{ route('customer.booking.store', $place->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Reservasi</label>
                            <input type="date" class="form-control" name="booking_date" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Jam Mulai</label>
                                <input type="time" class="form-control" name="start_time" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Jam Selesai</label>
                                <input type="time" class="form-control" name="end_time" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Jumlah Orang / Pax</label>
                            <input type="number" class="form-control" name="total_guests" min="1" placeholder="Contoh: 4" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 fw-bold py-2 shadow-sm">Konfirmasi & Ajukan Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>