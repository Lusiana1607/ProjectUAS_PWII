<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Models\Place;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $services = Service::whereHas('place', function ($query) {
        $query->where('user_id', Auth::id());
    })->get();

    return view('owner.services.index', compact('services'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $places = Auth::user()->places;

    return view('owner.services.create', compact('places'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'place_id' => 'required|exists:places,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
    ]);

    // Pastikan tempat tersebut milik owner yang sedang login
    $place = Auth::user()->places()->findOrFail($validated['place_id']);

    $place->services()->create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'price' => $validated['price'],
        'duration' => $validated['duration'],
    ]);

    return redirect()
        ->route('owner.services.index')
        ->with('success', 'Layanan berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $service = \App\Models\Service::findOrFail($id);

    // Pastikan layanan milik owner yang sedang login
    abort_if($service->place->user_id != Auth::id(), 403);

    $places = Auth::user()->places;

    return view('owner.services.edit', compact('service', 'places'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'place_id' => 'required|exists:places,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
    ]);

    $service = \App\Models\Service::findOrFail($id);

    // Pastikan layanan milik owner yang sedang login
    abort_if($service->place->user_id != Auth::id(), 403);

    $service->update($validated);

    return redirect()
        ->route('owner.services.index')
        ->with('success', 'Layanan berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $service = \App\Models\Service::findOrFail($id);

    // Pastikan layanan milik owner yang sedang login
    abort_if($service->place->user_id != Auth::id(), 403);

    $service->delete();

    return redirect()
        ->route('owner.services.index')
        ->with('success', 'Layanan berhasil dihapus.');
}
}
