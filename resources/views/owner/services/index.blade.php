@extends('layouts.owner')

@section('title', 'Layanan Saya')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-3xl shadow-xl p-8 text-white mb-8">

        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">

            <div>

                <h1 class="text-4xl font-bold">
                    🛠 Layanan Saya
                </h1>

                <p class="mt-3 text-emerald-100 text-lg">
                    Kelola seluruh layanan yang tersedia di tempat usaha Anda.
                </p>

                <div class="mt-5 inline-flex items-center bg-white/20 px-4 py-2 rounded-full">

                    <span class="font-semibold">
                        Total Layanan :
                    </span>

                    <span class="ml-2 bg-white text-emerald-600 px-3 py-1 rounded-full font-bold">
                        {{ $services->count() }}
                    </span>

                </div>

            </div>

            <a href="{{ route('owner.services.create') }}"
               class="bg-white text-emerald-600 hover:bg-emerald-100 font-semibold px-7 py-3 rounded-2xl shadow transition">

                + Tambah Layanan

            </a>

        </div>

    </div>


    @if($services->count())

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7">

            @foreach($services as $service)

                <div class="bg-white rounded-3xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">

                    {{-- Header Card --}}
                    <div class="bg-emerald-50 p-6">

                        <div class="w-16 h-16 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-3xl shadow">

                            🛠

                        </div>

                        <h2 class="text-2xl font-bold text-gray-800 mt-5">

                            {{ $service->name }}

                        </h2>

                        <span class="inline-block mt-3 bg-emerald-100 text-emerald-700 text-sm font-medium px-3 py-1 rounded-full">

                            📍 {{ $service->place->name }}

                        </span>

                    </div>

                    {{-- Body --}}
                    <div class="p-6">

                        <div class="flex justify-between items-center mb-5">

                            <div>

                                <p class="text-sm text-gray-500">
                                    Harga
                                </p>

                                <p class="text-3xl font-bold text-emerald-600">
                                    Rp {{ number_format($service->price,0,',','.') }}
                                </p>

                            </div>

                            <div class="bg-gray-100 rounded-2xl px-5 py-3 text-center">

                                <p class="text-xs text-gray-500">
                                    Durasi
                                </p>

                                <p class="font-bold text-gray-700">
                                    {{ $service->duration }} Menit
                                </p>

                            </div>

                        </div>

                        <div class="border-t pt-5 flex gap-3">

                            <a href="{{ route('owner.services.edit',$service->id) }}"
                               class="flex-1 text-center bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-2xl font-semibold transition">

                                ✏️ Edit

                            </a>

                            <form action="{{ route('owner.services.destroy',$service->id) }}"
                                  method="POST"
                                  class="flex-1"
                                  onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl font-semibold transition">

                                    🗑 Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-3xl shadow-md p-14 text-center">

            <div class="text-7xl mb-5">

                🛠

            </div>

            <h2 class="text-3xl font-bold text-gray-700">

                Belum Ada Layanan

            </h2>

            <p class="text-gray-500 mt-3 max-w-lg mx-auto">

                Anda belum memiliki layanan.
                Tambahkan layanan agar pelanggan dapat memilih layanan ketika melakukan reservasi.

            </p>

            <a href="{{ route('owner.services.create') }}"
               class="inline-block mt-8 bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-2xl font-semibold shadow transition">

                + Tambah Layanan Pertama

            </a>

        </div>

    @endif

</div>

@endsection