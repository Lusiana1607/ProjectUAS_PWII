<?php

namespace App\Http\Controllers\Owner;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $places = Auth::user()->places;

    return view('owner.places.index', compact('places'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::orderBy('name')->get();

    return view('owner.places.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'address' => 'required|string',
        'phone' => 'required|string|max:20',
        'description' => 'required|string',
        'open_time' => 'required',
        'close_time' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = null;

if ($request->hasFile('image')) {

    $imagePath = $request->file('image')->store('places', 'public');

}

    Place::create([
        'user_id' => Auth::id(),
        'category_id' => $validated['category_id'],
        'name' => $validated['name'],
        'address' => $validated['address'],
        'phone' => $validated['phone'],
        'description' => $validated['description'],
        'open_time' => $validated['open_time'],
        'close_time' => $validated['close_time'],
'image' => $imagePath,
'status' => 'pending',
    ]);

    return redirect()
        ->route('owner.places.index')
        ->with('success', 'Tempat berhasil ditambahkan.');
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
    public function edit(string $id)
{
    $place = Auth::user()->places()->findOrFail($id);

    $categories = Category::orderBy('name')->get();

    return view('owner.places.edit', compact('place', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'address' => 'required|string',
        'phone' => 'required|string|max:20',
        'description' => 'required|string',
        'open_time' => 'required',
        'close_time' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $place = Auth::user()->places()->findOrFail($id);

    if ($request->hasFile('image')) {

        if ($place->image && Storage::disk('public')->exists($place->image)) {
            Storage::disk('public')->delete($place->image);
        }

        $validated['image'] = $request->file('image')->store('places', 'public');
    }

    $place->update($validated);

    return redirect()
        ->route('owner.places.index')
        ->with('success', 'Tempat berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $place = Auth::user()->places()->findOrFail($id);

    $place->delete();

    return redirect()
        ->route('owner.places.index')
        ->with('success', 'Tempat berhasil dihapus.');
}
}
