@extends('layouts.admin')

@section('title', 'Layanan Saya')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">
                Layanan Saya
            </h1>

            <p class="text-gray-500 mt-2">
                Total layanan:
                <strong>{{ $services->count() }}</strong>
            </p>

        </div>

        <a href="{{ route('owner.services.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">
            + Tambah Layanan
        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif

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

                <div class="mt-4 flex gap-2">

    <a href="{{ route('owner.services.edit', $service->id) }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

        Edit

    </a>

    <form action="{{ route('owner.services.destroy', $service->id) }}"
          method="POST"
          onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">

            Hapus

        </button>

    </form>

</div>

            </div>

        @endforeach

    @else

        <div class="bg-white shadow rounded-lg p-6">

            Belum ada layanan.

        </div>

    @endif

</div>

@endsection