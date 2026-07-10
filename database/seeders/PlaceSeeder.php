<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. DAFTARKAN USER DULU (Agar user_id 1 tersedia)
        // Kita cek dulu, jika belum ada user, kita buatkan satu
        if (DB::table('users')->count() == 0) {
            DB::table('users')->insert([
                'id' => 1,
                'name' => 'Owner Contoh',
                'email' => 'owner@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. DAFTARKAN KATEGORI DULU (Agar category_id 1, 2, 3 tersedia)
        if (DB::table('categories')->count() == 0) {
            DB::table('categories')->insert([
                ['id' => 1, 'name' => 'Coffee Shop', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'name' => 'Salon', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 3, 'name' => 'Rental Alat', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        // 3. BARU SUNTIKKAN DATA TEMPAT NYA
        DB::table('places')->insert([
            [
                'user_id' => 1,
                'category_id' => 1,
                'name' => 'Kopi Srawung',
                'description' => 'Tempat tenang, cocok buat nugas dan diskusi kelompok.',
                'address' => 'Jl. Kampus Utpadaka No. 12',
                'phone' => '081234567890',
                'open_time' => '10:00:00',
                'close_time' => '22:00:00',
                'image' => null,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'name' => 'Glow Up Salon',
                'description' => 'Potong rambut dan perawatan terbaik dengan harga mahasiswa.',
                'address' => 'Ruko Zenith Blok B No. 5',
                'phone' => '089876543210',
                'open_time' => '09:00:00',
                'close_time' => '18:00:00',
                'image' => null,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'name' => 'Zenith Camera Rental',
                'description' => 'Sewa DSLR, Mirrorless, dan perlengkapan konten murah.',
                'address' => 'Gg. Swastika Sejahtera No. 99',
                'phone' => '085511223344',
                'open_time' => '07:00:00',
                'close_time' => '21:00:00',
                'image' => null,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}