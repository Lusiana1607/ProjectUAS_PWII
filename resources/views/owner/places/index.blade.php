@extends('layouts.admin')

@section('title', 'Tempat Saya')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Tempat Saya
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola tempat usaha yang Anda miliki.
            </p>
        </div>

        <a href="{{ route('owner.places.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">
            + Tambah Tempat
        </a>

    </div>


    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif


    @if($places->count() > 0)

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($places as $place)

                <div class="bg-white rounded-xl shadow p-6">

                @if($place->image)

    <img
        src="{{ asset('storage/' . $place->image) }}"
        alt="{{ $place->name }}"
        class="w-full h-48 object-cover rounded-lg mb-4">

@else

    <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center mb-4">

        <span class="text-gray-500">
            Belum ada foto
        </span>

    </div>

@endif

                    <h2 class="text-xl font-bold text-gray-800">
                        {{ $place->name }}
                    </h2>

                    <p class="text-gray-500 mt-2">
                        {{ $place->category->name }}
                    </p>

                    <p class="text-gray-600 mt-3">
                        {{ $place->address }}
                    </p>

                    <div class="mt-4">

                        <span class="px-3 py-1 rounded-full text-sm
                            @if($place->status === 'approved')
                                bg-green-100 text-green-700
                            @elseif($place->status === 'rejected')
                                bg-red-100 text-red-700
                            @else
                                bg-yellow-100 text-yellow-700
                            @endif
                        ">
                            {{ ucfirst($place->status) }}
                        </span>

                    </div>

                    <div class="mt-6 flex gap-2">

    <a href="{{ route('owner.places.edit', $place->id) }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        Edit
    </a>

    <form action="{{ route('owner.places.destroy', $place->id) }}"
          method="POST"
          onsubmit="return confirm('Apakah Anda yakin ingin menghapus tempat ini?');">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
            Hapus
        </button>

    </form>

</div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-xl shadow p-8 text-center">

            <p class="text-gray-500">
                Belum ada tempat yang Anda miliki.
            </p>

        </div>

    @endif

</div>

@endsection