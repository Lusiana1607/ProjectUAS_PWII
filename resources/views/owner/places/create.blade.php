@extends('layouts.owner')

@section('title', 'Tambah Tempat')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-3xl shadow-xl p-8 text-white mb-8">

        <h1 class="text-4xl font-bold">
            📍 Tambah Tempat
        </h1>

        <p class="mt-3 text-emerald-100 text-lg">
            Lengkapi informasi tempat usaha agar pelanggan dapat menemukannya di ReservHub.
        </p>

    </div>

    <form
    id="placeForm"
    action="{{ route('owner.places.store') }}"
    method="POST"
    enctype="multipart/form-data">

        @csrf

        <div class="bg-white rounded-3xl shadow-lg p-8">

            {{-- Informasi Dasar --}}
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Informasi Tempat
            </h2>

            <div class="space-y-6">

                {{-- Nama --}}
                <div>

                    <label class="block font-semibold text-gray-700 mb-2">
                        Nama Tempat
                    </label>

                   <input
    type="text"
    name="name"
    value="{{ old('name') }}"
    class="w-full rounded-xl px-4 py-3 border @error('name') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
    placeholder="Contoh: Coffee Senja">

@error('name')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror
                </div>

                {{-- Kategori --}}
                <div>

                    <label class="block font-semibold text-gray-700 mb-2">
                        Kategori
                    </label>

                    <select
    name="category_id"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('category_id') border-red-500 @enderror">

    <option value="">-- Pilih Kategori --</option>

    @foreach ($categories as $category)

        <option
            value="{{ $category->id }}"
            {{ old('category_id') == $category->id ? 'selected' : '' }}>

            {{ $category->name }}

        </option>

    @endforeach

</select>

@error('category_id')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                </div>

                {{-- Alamat --}}
                <div>

                    <label class="block font-semibold text-gray-700 mb-2">
                        Alamat
                    </label>

                    <textarea
    name="address"
    rows="3"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('address') border-red-500 @enderror"
    placeholder="Masukkan alamat tempat">{{ old('address') }}</textarea>

@error('address')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                </div>

                {{-- Nomor Telepon --}}
                <div>

                    <label class="block font-semibold text-gray-700 mb-2">
                        Nomor Telepon
                    </label>

                    <input
    type="text"
    name="phone"
    value="{{ old('phone') }}"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('phone') border-red-500 @enderror"
    placeholder="08xxxxxxxxxx">

@error('phone')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                </div>

                {{-- Deskripsi --}}
                <div>

                    <label class="block font-semibold text-gray-700 mb-2">
                        Deskripsi
                    </label>

                    <textarea
    name="description"
    rows="4"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('description') border-red-500 @enderror"
    placeholder="Ceritakan tempat usaha Anda">{{ old('description') }}</textarea>

@error('description')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                </div>

            </div>

            {{-- Upload Foto --}}
            <div class="mt-10">

                <h2 class="text-2xl font-bold text-gray-800 mb-5">
                    Foto Tempat
                </h2>

                <div class="border-2 border-dashed border-emerald-300 rounded-3xl p-8 text-center bg-emerald-50">

                    <div class="text-6xl mb-4">

                        📷

                    </div>

                    <p class="text-gray-600 mb-5">

                        Upload foto utama tempat usaha Anda.

                    </p>

                    <div class="mb-4">

    <img
        id="preview-image"
        src="https://placehold.co/600x400/e5e7eb/6b7280?text=Preview+Foto"
        class="w-full h-64 object-cover rounded-xl border">

</div>

                    <input
    type="file"
    id="image"
    name="image"
    accept="image/*"
    class="w-full border rounded-xl px-4 py-3 @error('image') border-red-500 @enderror">

<p class="text-sm text-gray-500 mt-2">
    Format JPG, JPEG, atau PNG. Maksimal 2 MB.
</p>

@error('image')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                </div>

            </div>

            {{-- Jam Operasional --}}
            <div class="mt-10">

                <h2 class="text-2xl font-bold text-gray-800 mb-5">
                    Jam Operasional
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div class="bg-gray-50 rounded-2xl p-5">

                        <label class="block font-semibold text-gray-700 mb-2">
                            🟢 Jam Buka
                        </label>

                        <input
    type="time"
    name="open_time"
    value="{{ old('open_time') }}"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('open_time') border-red-500 @enderror">

@error('open_time')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                    </div>

                    <div class="bg-gray-50 rounded-2xl p-5">

                        <label class="block font-semibold text-gray-700 mb-2">
                            🔴 Jam Tutup
                        </label>

                        <input
    type="time"
    name="close_time"
    value="{{ old('close_time') }}"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('close_time') border-red-500 @enderror">

@error('close_time')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                    </div>

                </div>

            </div>

            {{-- Tombol --}}
            <div class="flex flex-col md:flex-row gap-4 justify-end mt-10">

                <a href="{{ route('owner.places.index') }}"
                   class="px-8 py-3 rounded-2xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold text-center transition">

                    ← Batal

                </a>

                <button
    id="submitBtn"
    type="submit"
    class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl transition">

    Simpan Tempat

</button>

            </div>

        </div>

    </form>

</div>

<script>

document.getElementById('image').addEventListener('change', function (event) {

    const file = event.target.files[0];

    if (file) {

        const reader = new FileReader();

        reader.onload = function(e) {

            document.getElementById('preview-image').src = e.target.result;

        }

        reader.readAsDataURL(file);

    }

});

</script>

<script>

document.getElementById('placeForm').addEventListener('submit', function(){

    const btn = document.getElementById('submitBtn');

    btn.disabled = true;

    btn.innerHTML = '⏳ Menyimpan...';

    btn.classList.add('opacity-70','cursor-not-allowed');

});

</script>

@endsection