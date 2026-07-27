@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">
        Edit Layanan
    </h1>

    <form action="{{ route('owner.services.update', $service->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Tempat
            </label>

            <select
                name="place_id"
                class="w-full border rounded-lg px-4 py-2">

                @foreach($places as $place)

                    <option
                        value="{{ $place->id }}"
                        @selected($service->place_id == $place->id)>

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
                value="{{ old('name', $service->name) }}"
                class="w-full border rounded-lg px-4 py-2">

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Deskripsi
            </label>

            <textarea
                name="description"
                rows="4"
                class="w-full border rounded-lg px-4 py-2">{{ old('description', $service->description) }}</textarea>

        </div>

        <div class="grid grid-cols-2 gap-4">

            <div>

                <label class="block mb-2 font-semibold">
                    Harga
                </label>

                <input
                    type="number"
                    name="price"
                    value="{{ old('price', $service->price) }}"
                    class="w-full border rounded-lg px-4 py-2">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Durasi (menit)
                </label>

                <input
                    type="number"
                    name="duration"
                    value="{{ old('duration', $service->duration) }}"
                    class="w-full border rounded-lg px-4 py-2">

            </div>

        </div>

        <button
            class="mt-8 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

            Update Layanan

        </button>

    </form>

</div>

@endsection