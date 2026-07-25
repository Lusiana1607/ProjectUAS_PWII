@extends('layouts.admin')

@section('title', 'Pengajuan Owner')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Pengajuan Owner
</h1>

<div class="bg-white shadow rounded-lg p-6">

    <table class="w-full border-collapse">

        <thead>

            <tr class="border-b">
                <th class="text-left py-3">No</th>
                <th class="text-left py-3">Nama User</th>
                <th class="text-left py-3">Nama Usaha</th>
                <th class="text-left py-3">Kategori</th>
                <th class="text-left py-3">Status</th>
                <th class="text-left py-3">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($ownerRequests as $request)

                <tr class="border-b">

                    <td class="py-3">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $request->user->name }}
                    </td>

                    <td>
                        {{ $request->business_name }}
                    </td>

                    <td>
                        {{ $request->category->name }}
                    </td>

                    <td>
                        {{ ucfirst($request->status) }}
                    </td>

                    <td>
                        <a href="{{ route('admin.owner-requests.show', $request) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm">
                            Detail
                        </a>
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-5">
                        Belum ada pengajuan owner.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection