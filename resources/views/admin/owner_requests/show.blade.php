@extends('layouts.admin')

@section('title', 'Detail Pengajuan Owner')

@section('content')

@if(session('success'))

    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">

        {{ session('success') }}

    </div>

@endif

<h1 class="text-3xl font-bold mb-6">
    Detail Pengajuan Owner
</h1>

<div class="bg-white shadow rounded-lg p-6 space-y-4">

    <div>
        <h2 class="font-semibold text-gray-700">Nama User</h2>
        <p>{{ $ownerRequest->user->name }}</p>
    </div>

    <div>
        <h2 class="font-semibold text-gray-700">Email</h2>
        <p>{{ $ownerRequest->user->email }}</p>
    </div>

    <div>
        <h2 class="font-semibold text-gray-700">Nama Usaha</h2>
        <p>{{ $ownerRequest->business_name }}</p>
    </div>

    <div>
        <h2 class="font-semibold text-gray-700">Kategori</h2>
        <p>{{ $ownerRequest->category->name }}</p>
    </div>

    <div>
        <h2 class="font-semibold text-gray-700">Alamat</h2>
        <p>{{ $ownerRequest->address }}</p>
    </div>

    <div>
        <h2 class="font-semibold text-gray-700">Nomor HP</h2>
        <p>{{ $ownerRequest->phone }}</p>
    </div>

    <div>
        <h2 class="font-semibold text-gray-700">Jam Operasional</h2>
        <p>{{ $ownerRequest->operating_hours }}</p>
    </div>

    <div>
        <h2 class="font-semibold text-gray-700">Status</h2>
        <p>{{ ucfirst($ownerRequest->status) }}</p>
    </div>

    <div class="flex gap-3 pt-6">

    @if($ownerRequest->status == 'pending')

        <form action="{{ route('admin.owner-requests.approve', $ownerRequest) }}" method="POST">

            @csrf
            @method('PATCH')

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                ✔ Approve

            </button>

        </form>

        <form action="{{ route('admin.owner-requests.reject', $ownerRequest) }}" method="POST">

    @csrf
    @method('PATCH')

    <button
        type="submit"
        class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">

        ✖ Reject

    </button>

</form>

    @elseif($ownerRequest->status == 'approved')

        <span class="bg-green-100 text-green-700 px-5 py-2 rounded-lg">

            ✅ Pengajuan Sudah Disetujui

        </span>

         @elseif($ownerRequest->status == 'rejected')

    <span class="bg-red-100 text-red-700 px-5 py-2 rounded-lg">

        ❌ Pengajuan Ditolak

    </span>

    @endif

</div>

</div>

@endsection