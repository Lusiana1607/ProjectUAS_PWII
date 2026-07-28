@extends('layouts.owner')

@section('title', 'Tambah Layanan')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- Hero --}}
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-3xl shadow-lg p-8 text-white mb-8">

        <h1 class="text-4xl font-bold">
            Tambah Layanan
        </h1>

        <p class="mt-2 text-emerald-100 text-lg">
            Tambahkan layanan baru yang tersedia pada tempat usaha Anda.
        </p>

    </div>

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form
    id="serviceForm"
    action="{{ route('owner.services.store') }}"
    method="POST">

    @csrf

            @csrf

            {{-- Pilih Tempat --}}
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    📍 Pilih Tempat
                </label>

                <select
    name="place_id"
    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('place_id') border-red-500 @else border-gray-300 @enderror">

    <option value="">-- Pilih Tempat --</option>

    @foreach($places as $place)

        <option
            value="{{ $place->id }}"
            {{ old('place_id') == $place->id ? 'selected' : '' }}>

            {{ $place->name }}

        </option>

    @endforeach

</select>

@error('place_id')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror
            </div>

            {{-- Nama --}}
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    🛠 Nama Layanan
                </label>

                <input
    type="text"
    name="name"
    value="{{ old('name') }}"
    placeholder="Contoh: Haircut Premium"
    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('name') border-red-500 @else border-gray-300 @enderror">

@error('name')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    📝 Deskripsi
                </label>

                <textarea
    name="description"
    rows="5"
    placeholder="Jelaskan layanan yang diberikan..."
    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('description') border-red-500 @else border-gray-300 @enderror">{{ old('description') }}</textarea>

@error('description')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

            </div>

            {{-- Harga & Durasi --}}
            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        💰 Harga (Rp)
                    </label>

                    <input
    type="number"
    name="price"
    value="{{ old('price') }}"
    placeholder="50000"
    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('price') border-red-500 @else border-gray-300 @enderror">

@error('price')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror
                </div>

                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        ⏱ Durasi (Menit)
                    </label>

                    <input
    type="number"
    name="duration"
    value="{{ old('duration') }}"
    placeholder="60"
    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('duration') border-red-500 @else border-gray-300 @enderror">

@error('duration')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                </div>

            </div>

            {{-- Tombol --}}
            <div class="mt-8 flex gap-4">

                <button
    id="submitBtn"
    type="submit"
    class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-semibold transition">

    💾 Simpan Layanan

</button>

                <a
                    href="{{ route('owner.services.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-8 py-3 rounded-xl font-semibold transition">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

<script>

document.getElementById('serviceForm').addEventListener('submit', function(){

    const btn = document.getElementById('submitBtn');

    btn.disabled = true;

    btn.innerHTML = '⏳ Menyimpan...';

    btn.classList.add('opacity-70','cursor-not-allowed');

});

</script>

@endsection