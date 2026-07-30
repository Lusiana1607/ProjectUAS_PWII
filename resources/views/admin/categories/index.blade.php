@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')

{{-- Notifikasi Berhasil --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">
        {{ session('success') }}
    </div>
@endif

{{-- Header Halaman --}}
<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold">
        Daftar Kategori
    </h1>

    {{-- Tombol Tambah Kategori --}}
    <a href="{{ route('admin.categories.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Tambah Kategori
    </a>

</div>

{{-- Daftar Kategori --}}
@if($categories->count())

    <ul class="space-y-3">
        @foreach($categories as $category)

        {{-- Item Kategori --}}
        <div class="bg-white rounded-lg shadow p-4 flex justify-between items-center">

            <span>
                {{ $category->name }}
            </span>

            {{-- Tombol Aksi --}}
            <div class="flex gap-2">

                {{-- Tombol Edit --}}
                <a href="{{ route('admin.categories.edit', $category->id) }}"
                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">

                    Edit

                </a>

                {{-- Tombol Hapus --}}
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

        @endforeach

    </ul>

@else

    {{-- Data Kosong --}}
    <div class="bg-white p-6 rounded-lg shadow">
        Belum ada kategori.
    </div>

@endif

@endsection