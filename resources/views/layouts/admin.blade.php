<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | ReservHub Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <header class="bg-blue-600 text-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <h1 class="text-2xl font-bold">
                ReservHub Admin
            </h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>