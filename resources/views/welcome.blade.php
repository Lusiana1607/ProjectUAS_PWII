<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReservHub</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-success navbar-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            ReservHub
        </a>

        <div class="ms-auto">

            <a href="/login" class="btn btn-light me-2">
                Login
            </a>

            <a href="/register" class="btn btn-warning">
                Register
            </a>

        </div>

    </div>
</nav>

<section class="container text-center py-5">

    <h1 class="display-4 fw-bold">
        ReservHub
    </h1>

    <p class="lead">

        Platform reservasi Coffee Shop, Salon, dan Rental Alat.

    </p>

    <a href="{{ route('customer.explore') }}" class="btn btn-success btn-lg mt-3">

        Cari Tempat

    </a>

</section>

</body>
</html>