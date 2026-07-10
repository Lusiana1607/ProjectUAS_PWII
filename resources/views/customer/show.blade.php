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
        </div>
    </div>
</div>

</body>
</html>