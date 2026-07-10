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
    </div>
</nav>

<div class="container py-5">
    <h2 class="fw-bold mb-2">Eksplorasi Tempat Reservasi</h2>
    <p class="text-muted">Temukan Coffee Shop, Salon, dan Rental Alat terbaik di sini.</p>
    
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
        @foreach($places as $place)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $place->name }}</h5>
                    <p class="card-text text-muted text-sm">{{ $place->description }}</p>
                    <a href="{{ route('customer.show', $place->id) }}" class="btn btn-outline-success btn-sm w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>