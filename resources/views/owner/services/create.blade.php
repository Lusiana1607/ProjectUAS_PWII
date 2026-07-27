@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">
        Tambah Layanan
    </h1>

    <form action="{{ route('owner.services.store') }}" method="POST">

        @csrf

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Pilih Tempat
            </label>

            <select
                name="place_id"
                class="w-full border rounded-lg px-4 py-2">

                @foreach($places as $place)

                    <option value="{{ $place->id }}">
                        {{ $place->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Nama Layanan
            </label>

            <input
                type="text"
                name="name"
                class="w-full border rounded-lg px-4 py-2">

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Deskripsi
            </label>

            <textarea
                name="description"
                rows="4"
                class="w-full border rounded-lg px-4 py-2"></textarea>

        </div>

        <div class="grid grid-cols-2 gap-4">

            <div>

                <label class="block mb-2 font-semibold">
                    Harga
                </label>

                <input
                    type="number"
                    name="price"
                    class="w-full border rounded-lg px-4 py-2">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Durasi (menit)
                </label>

                <input
                    type="number"
                    name="duration"
                    class="w-full border rounded-lg px-4 py-2">

            </div>

        </div>

        <button
            class="mt-8 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

            Simpan Layanan

        </button>

    </form>

</div>

@endsection