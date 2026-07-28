@extends('layouts.owner')

@section('title', 'Edit Tempat')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-2xl shadow-lg p-8 text-white mb-8">

        <h1 class="text-4xl font-bold">
            Edit Tempat
        </h1>

        <p class="mt-2 text-emerald-100">
            Perbarui informasi tempat usaha Anda agar tetap menarik bagi pelanggan.
        </p>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <form
    id="placeEditForm"
    action="{{ route('owner.places.update', $place->id) }}"
    method="POST"
    enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Nama Tempat --}}
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Tempat
                </label>

                <input
    type="text"
    name="name"
    value="{{ old('name', $place->name) }}"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('name') border-red-500 @enderror">

@error('name')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

            </div>

            {{-- Kategori --}}
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Kategori
                </label>

                <select
    name="category_id"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('category_id') border-red-500 @enderror">

    @foreach($categories as $category)

        <option
            value="{{ $category->id }}"
            {{ old('category_id', $place->category_id) == $category->id ? 'selected' : '' }}>

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
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Alamat
                </label>

                <textarea
    name="address"
    rows="3"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('address') border-red-500 @enderror">{{ old('address', $place->address) }}</textarea>

@error('address')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

            </div>

            {{-- Nomor Telepon --}}
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nomor Telepon
                </label>

                <input
    type="text"
    name="phone"
    value="{{ old('phone', $place->phone) }}"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('phone') border-red-500 @enderror">

@error('phone')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi
                </label>

                <textarea
    name="description"
    rows="4"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('description') border-red-500 @enderror">{{ old('description', $place->description) }}</textarea>

@error('description')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

            </div>

            {{-- Foto --}}
            <div class="mb-8">

                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Foto Tempat
                </label>

                <div class="mb-4">

    <p class="text-sm text-gray-500 mb-2">
        Preview Foto
    </p>

    <img
        id="preview-image"
        src="{{ $place->image ? asset('storage/'.$place->image) : 'https://placehold.co/600x400/e5e7eb/6b7280?text=Preview+Foto' }}"
        class="w-full h-64 object-cover rounded-xl border">

</div>

               <input
    type="file"
    id="image"
    name="image"
    accept="image/*"
    class="w-full border rounded-xl px-4 py-3 @error('image') border-red-500 @enderror">

<p class="text-sm text-gray-500 mt-2">
    Kosongkan jika tidak ingin mengganti foto.
</p>

@error('image')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

            </div>

            {{-- Jam Operasional --}}
            <div class="grid md:grid-cols-2 gap-6 mb-8">

                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Jam Buka
                    </label>

                    <input
    type="time"
    name="open_time"
    value="{{ old('open_time', $place->open_time) }}"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('open_time') border-red-500 @enderror">

@error('open_time')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                </div>

                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Jam Tutup
                    </label>

                    <input
    type="time"
    name="close_time"
    value="{{ old('close_time', $place->close_time) }}"
    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 @error('close_time') border-red-500 @enderror">

@error('close_time')
<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>
@enderror

                </div>

            </div>

            {{-- Tombol --}}
            <div class="flex gap-4">

                <button
    id="submitBtn"
    type="submit"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-7 py-3 rounded-xl font-semibold transition">

                    💾 Update Tempat

                </button>

                <a
                    href="{{ route('owner.places.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-7 py-3 rounded-xl font-semibold transition">

                    ↩ Kembali

                </a>

            </div>

        </form>

    </div>

</div>

<script>

document.getElementById('image').addEventListener('change', function(event){

    const file = event.target.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(e){

            document.getElementById('preview-image').src = e.target.result;

        }

        reader.readAsDataURL(file);

    }

});

</script>

<script>

document.getElementById('placeEditForm').addEventListener('submit', function(){

    const btn = document.getElementById('submitBtn');

    btn.disabled = true;

    btn.innerHTML = '⏳ Menyimpan...';

    btn.classList.add('opacity-70','cursor-not-allowed');

});

</script>

@endsection