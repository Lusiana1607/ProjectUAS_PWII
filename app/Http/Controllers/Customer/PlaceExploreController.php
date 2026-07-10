<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function bookingForm($id)
    {
        // Cari data tempat berdasarkan ID
        $place = DB::table('places')->where('id', $id)->first();

        if (!$place) {
            return redirect()->route('customer.explore');
        }

        // Tampilkan halaman form booking bawa data tempat
        return view('customer.booking', compact('place'));
    }

    public function storeBooking(Request $request, $id)
    {
        // 1. Validasi inputan form terlebih dahulu
        $request->validate([
            'booking_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'total_guests' => 'required|integer|min:1',
        ]);

        // 2. Suntik data ke tabel bookings
        DB::table('bookings')->insert([
            'user_id' => auth()->id(), // Mengambil ID Desta yang sedang login
            'place_id' => $id,         // ID tempat yang sedang dibooking
            'booking_date' => $request->booking_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_guests' => $request->total_guests,
            'status' => 'pending',     // Default nunggu persetujuan owner
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Kembalikan rute redirect ke halaman explore setelah sukses booking
        return redirect()->route('customer.explore')->with('success', 'Reservasi kamu berhasil diajukan! Menunggu konfirmasi owner.');
    }

    public function bookingHistory()
    {
      // Ambil data booking milik user yang sedang login saat ini, urutkan dari yang terbaru
        $bookings = DB::table('bookings')
           ->join('places', 'bookings.place_id', '=', 'places.id') // Hubungkan ke tabel tempat untuk ambil nama cafenya
           ->where('bookings.user_id', Auth::id())
           ->select('bookings.*', 'places.name as place_name')
           ->orderBy('bookings.created_at', 'desc')
           ->get();
        return view('customer.history', compact('bookings'));
    }

    // Fungsi untuk menambah atau menghapus favorit (Toggle)
    public function toggleFavorite($place_id)
    {
        $userId = Auth::id();

        // Cek apakah user sudah memfavoritkan tempat ini
        $existing = DB::table('favorites')
            ->where('user_id', $userId)
            ->where('place_id', $place_id)
            ->first();

        if ($existing) {
            // Jika sudah ada, hapus dari favorit (unfavorite)
            DB::table('favorites')->where('id', $existing->id)->delete();
            return redirect()->back()->with('fav_success', 'Tempat berhasil dihapus dari daftar favorit kamu.');
        } else {
            // Jika belum ada, tambahkan ke favorit
            DB::table('favorites')->insert([
                'user_id' => $userId,
                'place_id' => $place_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with('fav_success', 'Tempat berhasil ditambahkan ke favorite.');
        }
    }

    // Fungsi untuk menampilkan halaman daftar favorit customer
    public function favoriteList()
    {
        $favorites = DB::table('favorites')
            ->join('places', 'favorites.place_id', '=', 'places.id')
            ->where('favorites.user_id', Auth::id())
            ->select('places.*', 'favorites.id as favorite_id')
            ->get();

        return view('customer.favorites', compact('favorites'));
    }
}