@extends('layouts.admin')

@section('title', 'Kelola User')

@section('content')

{{-- Judul Halaman --}}
<h1 class="text-3xl font-bold mb-6">
    Kelola User
</h1>

{{-- Tabel Kelola User --}}
<div class="bg-white shadow rounded-lg p-6">

    <table class="w-full border-collapse">

        {{-- Header Tabel --}}
        <thead>

            <tr class="border-b">
                <th class="text-left py-3">No</th>
                <th class="text-left py-3">Nama</th>
                <th class="text-left py-3">Email</th>
                <th class="text-left py-3">Role</th>
                <th class="text-left py-3">Role</th>
                <th class="text-left py-3">Status</th>
                <th class="text-left py-3">Aksi</th>
            </tr>

        </thead>

        {{-- Isi Tabel --}}
        <tbody>

            @forelse($users as $user)

                <tr class="border-b">

                    <td class="py-3">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $user->name }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>

                    {{-- Status User --}}
                    <td>
                        @if($user->is_active)
                        <span class="text-green-600 font-semibold">
                            Aktif
                        </span>
                        @else
                        <span class="text-red-600 font-semibold">
                            Nonaktif
                        </span>
                        @endif
                    </td>

                    {{-- Tombol Aksi --}}
                    <td>
                        <form action="{{ route('admin.users.toggle-status', $user) }}" method="POST">

                            @csrf
                            @method('PATCH')

                            @if($user->is_active)

                            {{-- Tombol Nonaktifkan --}}
                            <button
                                type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">

                                Nonaktifkan

                            </button>

                            @else

                            {{-- Tombol Aktifkan --}}
                            <button
                                type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">

                                Aktifkan

                            </button>

                            @endif

                        </form>
                    </td>

                </tr>

            @empty

                {{-- Data Kosong --}}
                <tr>

                    <td colspan="6" class="text-center py-5">
                        Belum ada user.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection