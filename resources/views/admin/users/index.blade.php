@extends('layouts.admin')

@section('title', 'Kelola User')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Kelola User
</h1>

<div class="bg-white shadow rounded-lg p-6">

    <table class="w-full border-collapse">

        <thead>

            <tr class="border-b">
                <th class="text-left py-3">No</th>
                <th class="text-left py-3">Nama</th>
                <th class="text-left py-3">Email</th>
                <th class="text-left py-3">Role</th>
            </tr>

        </thead>

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

                    <td>
                        {{ $user->role->name ?? '-' }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center py-5">
                        Belum ada user.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection