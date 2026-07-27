@extends('layouts.admin')

@section('title', 'Layanan Saya')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold text-gray-800 mb-2">
        Layanan Saya
    </h1>

    <p class="text-gray-500 mb-6">
        Total layanan:
        <strong>{{ $services->count() }}</strong>
    </p>

    @if($services->count() > 0)

        @foreach($services as $service)

            <div class="bg-white shadow rounded-lg p-5 mb-4">

                <h2 class="text-xl font-bold">
                    {{ $service->name }}
                </h2>

                <p class="text-gray-500">
                    Tempat: {{ $service->place->name }}
                </p>

                <p class="mt-2">
                    Harga: Rp {{ number_format($service->price, 0, ',', '.') }}
                </p>

                <p>
                    Durasi: {{ $service->duration }} menit
                </p>

            </div>

        @endforeach

    @else

        <div class="bg-white shadow rounded-lg p-6">

            Belum ada layanan.

        </div>

    @endif

</div>

@endsection