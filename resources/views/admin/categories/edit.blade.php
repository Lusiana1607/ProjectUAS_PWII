@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit Kategori
</h1>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label class="block font-semibold mb-2">
            Nama Kategori
        </label>

        <input
            type="text"
            name="name"
            value="{{ $category->name }}"
            class="w-full border rounded-lg p-3"
        >

    </div>

    <button
        type="submit"
        class="bg-yellow-500 text-white px-5 py-2 rounded hover:bg-yellow-600">

        Update

    </button>

</form>

@endsection