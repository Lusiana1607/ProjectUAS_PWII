@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Tambah Kategori
</h1>

<form action="{{ route('admin.categories.store') }}" method="POST">

    @csrf

    <div class="mb-4">
        <label class="block font-semibold mb-2">
            Nama Kategori
        </label>

        <input
            type="text"
            name="name"
            class="w-full border rounded-lg p-3"
            placeholder="Masukkan nama kategori"
        >
    </div>

    <button
        type="submit"
        class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

        Simpan

    </button>

</form>

@endsection