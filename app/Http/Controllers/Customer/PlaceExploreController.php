<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Memastikan fitur query database aktif

class PlaceExploreController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel places
        $places = DB::table('places')->get();

        // Mengirimkan variabel $places ke file view customer.explore
        return view('customer.explore', compact('places'));
    }

    public function show($id)
    {
        // Cari data tempat berdasarkan ID yang diklik
        $place = DB::table('places')->where('id', $id)->first();

        // Jika tempat tidak ditemukan, kembalikan ke halaman eksplorasi
        if (!$place) {
            return redirect()->route('customer.explore');
        }

        // Kirim data tempat ke file view detail yang akan kita buat
        return view('customer.show', compact('place'));
    }
}