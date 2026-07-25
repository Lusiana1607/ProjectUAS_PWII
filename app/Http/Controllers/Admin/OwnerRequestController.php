<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OwnerRequest;

class OwnerRequestController extends Controller
{
    public function index()
    {
        $ownerRequests = OwnerRequest::latest()->get();

        return view('admin.owner_requests.index', compact('ownerRequests'));
    }

    public function show(OwnerRequest $ownerRequest)
{
    return view('admin.owner_requests.show', compact('ownerRequest'));
}

public function approve(OwnerRequest $ownerRequest)
{
    $ownerRequest->update([
        'status' => 'approved',
    ]);

    $ownerRequest->user->update([
    'role_id' => 2,
]);

    return redirect()
        ->route('admin.owner-requests.show', $ownerRequest)
        ->with('success', 'Pengajuan owner berhasil disetujui.');
}

public function reject(OwnerRequest $ownerRequest)
{
    $ownerRequest->update([
        'status' => 'rejected',
    ]);

    return redirect()
        ->route('admin.owner-requests.show', $ownerRequest)
        ->with('success', 'Pengajuan owner berhasil ditolak.');
}

}