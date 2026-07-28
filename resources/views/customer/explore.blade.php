<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksplorasi Tempat - ReservHub</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased">

    <!-- Header Navigation -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center text-white shadow-md shadow-emerald-200">
                    <i class="fa-solid fa-leaf text-lg"></i>
                </div>
                <div>
                    <span class="font-bold text-lg text-slate-900 tracking-tight block leading-tight">ReservHub</span>
                    <span class="text-xs text-emerald-600 font-semibold tracking-wide uppercase">Customer Panel</span>
                </div>
            </div>

            <!-- Profile & Navigation Buttons -->
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-xs transition-all flex items-center gap-2">
                    <i class="fa-solid fa-house"></i> Dashboard
                </a>
                <a href="{{ route('customer.booking.history') }}" class="px-4 py-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-semibold rounded-xl text-xs transition-all flex items-center gap-2">
                    <i class="fa-solid fa-clock-rotate-left"></i> Riwayat
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- NOTIFIKASI SUKSES (RESERVASI) -->
        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl mb-6 flex items-start justify-between shadow-sm">
                <div class="flex items-start gap-3">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-xl mt-0.5"></i>
                    <div>
                        <h4 class="font-bold text-sm">Berhasil Diajukan!</h4>
                        <p class="text-xs text-emerald-700 mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
                <a href="{{ route('customer.booking.history') }}" class="text-xs font-bold bg-emerald-600 text-white px-3 py-1.5 rounded-lg hover:bg-emerald-700 transition-all">
                    Cek Riwayat
                </a>
            </div>
        @endif

        <!-- NOTIFIKASI FAVORIT -->
        @if(session('fav_success'))
            <div class="bg-amber-50 border border-amber-200 text-amber-800 px-4 py-3 rounded-2xl mb-6 flex items-center gap-2 text-xs font-semibold shadow-sm">
                <i class="fa-solid fa-star text-amber-500"></i>
                <span>{{ session('fav_success') }}</span>
            </div>
        @endif

        <!-- Banner Title -->
        <div class="mb-8">
            <h1 class="text-2xl font-extrabold text-slate-900">Eksplorasi Tempat Reservasi</h1>
            <p class="text-xs text-slate-500 mt-1">Temukan tempat usaha, salon, cafe, dan fasilitas terbaik yang telah terdaftar.</p>
        </div>

        <!-- LIST TEMPAT (DINAMIS DARI DATABASE) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($places as $place)
                <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                    <div>
                        <!-- Foto Tempat -->
                        <div class="relative h-48 bg-slate-100 overflow-hidden">
                            @if($place->image)
                                <img src="{{ asset('storage/' . $place->image) }}" 
                                     alt="{{ $place->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 bg-slate-100">
                                    <i class="fa-regular fa-image text-3xl mb-1"></i>
                                    <span class="text-xs">Belum ada foto</span>
                                </div>
                            @endif

                            <!-- Tombol Favorite (Dinamis Form Laravel) -->
                            <form action="{{ route('customer.favorite.toggle', $place->id) }}" method="POST" class="absolute top-3 right-3">
                                @csrf
                                @php
                                    $isFavorite = DB::table('favorites')
                                        ->where('user_id', Auth::id())
                                        ->where('place_id', $place->id)
                                        ->exists();
                                @endphp
                                <button type="submit" class="w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:scale-110 transition-all">
                                    @if($isFavorite)
                                        <i class="fa-solid fa-heart text-rose-500 text-base"></i>
                                    @else
                                        <i class="fa-regular fa-heart text-slate-400 hover:text-rose-500 text-base"></i>
                                    @endif
                                </button>
                            </form>
                        </div>

                        <!-- Info Tempat -->
                        <div class="p-5">
                            <h3 class="font-bold text-slate-900 text-base group-hover:text-emerald-600 transition-colors">
                                {{ $place->name }}
                            </h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                                {{ $place->description ?? 'Tidak ada deskripsi.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Tombol Aksi Detail -->
                    <div class="p-5 pt-0">
                        <a href="{{ route('customer.show', $place->id) }}" 
                           class="w-full block text-center py-2.5 bg-emerald-50 hover:bg-emerald-600 text-emerald-600 hover:text-white font-semibold rounded-xl text-xs transition-all shadow-sm">
                            Lihat Detail & Reservasi
                        </a>
                    </div>
                </div>
            @empty
                <!-- Tampilan jika belum ada tempat yang disetujui/dibuat owner -->
                <div class="col-span-full py-12 text-center bg-white rounded-2xl border border-slate-100">
                    <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-store-slash text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-slate-700 text-base">Belum Ada Tempat Terdaftar</h3>
                    <p class="text-xs text-slate-400 mt-1">Tempat yang dibuat oleh Owner dan telah disetujui akan muncul di sini.</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>