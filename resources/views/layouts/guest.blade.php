<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ReservHub</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased bg-gradient-to-br from-green-100 via-white to-green-50">

<div class="min-h-screen flex items-center justify-center px-6">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center max-w-6xl w-full">

        <!-- Kiri -->

        <div class="hidden lg:block">

            <h1 class="text-5xl font-bold text-green-700">

                ReservHub 

            </h1>

            <p class="text-gray-600 text-lg mt-6 leading-relaxed">

                Temukan dan reservasi tempat rental favoritmu dengan mudah,
                cepat, dan nyaman.

            </p>

        </div>

        <!-- Kanan -->

        <div>

            {{ $slot }}

        </div>

    </div>

</div>

</body>
</html>