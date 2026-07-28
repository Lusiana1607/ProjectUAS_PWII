<!-- CDN Font Awesome & Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-slate-900 tracking-tight flex items-center gap-2">
                    <i class="fa-solid fa-heart text-rose-500 text-xl"></i>
                    <span>Tempat Favorit Saya</span>
                </h2>
                <p class="text-xs text-slate-500 mt-1">Daftar tempat langganan pilihanmu untuk akses reservasi lebih cepat.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-xs font-semibold px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl transition-all w-fit">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F8FAFC] min-h-[calc(100vh-4rem)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Toast Notifikasi Favorit -->
            @if(session('fav_success'))
                <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-800 px-5 py-3.5 rounded-2xl flex items-center gap-3 text-xs font-semibold shadow-sm">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                    <span>{{ session('fav_success') }}</span>
                </div>
            @endif

            <!-- Grid Tempat Favorit -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($favorites as $fav)
                    @php 
                        // Deteksi otomatis apakah data berasal dari Eloquent Relationship ($fav->place) 
                        // atau langsung dari JOIN Query Builder ($fav->name / $fav->place_id)
                        $placeId    = $fav->place->id ?? $fav->place_id ?? $fav->id ?? null;
                        $placeName  = $fav->place->name ?? $fav->name ?? 'Tempat Favorit';
                        $placeImg   = $fav->place->image ?? $fav->image ?? null;
                        $placeDesc  = $fav->place->description ?? $fav->description ?? null;
                    @endphp

                    <div class="group relative bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl hover:border-emerald-500/30 transition-all duration-300 flex flex-col justify-between">
                        
                        <div>
                            <!-- Thumbnail Gambar -->
                            <div class="relative h-52 bg-slate-100 overflow-hidden">
                                @if($placeImg)
                                    <img src="{{ asset('storage/' . $placeImg) }}" alt="{{ $placeName }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 bg-slate-100">
                                        <i class="fa-regular fa-image text-3xl mb-1"></i>
                                        <span class="text-xs">Belum Ada Foto</span>
                                    </div>
                                @endif

                                <!-- Form Unfavorite Toggle -->
                                @if($placeId)
                                    <form action="{{ route('customer.favorite.toggle', $placeId) }}" method="POST" class="absolute top-3 right-3">
                                        @csrf
                                        <button type="submit" title="Hapus dari Favorit" class="w-10 h-10 bg-white/90 backdrop-blur-md rounded-2xl flex items-center justify-center text-rose-500 shadow-md hover:scale-110 active:scale-95 transition-all">
                                            <i class="fa-solid fa-heart text-lg"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <!-- Content Info -->
                            <div class="p-6">
                                <h3 class="font-bold text-slate-900 text-lg group-hover:text-emerald-600 transition-colors leading-snug">
                                    {{ $placeName }}
                                </h3>
                                <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                                    {{ $placeDesc ?? 'Tidak ada deskripsi tersedia untuk tempat ini.' }}
                                </p>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="p-6 pt-0">
                            @if($placeId)
                                <a href="{{ route('customer.show', $placeId) }}" class="w-full inline-flex items-center justify-center gap-2 py-3 bg-emerald-500 hover:bg-emerald-600 text-white font-bold rounded-2xl text-xs transition-all shadow-lg shadow-emerald-500/20">
                                    <span>Lihat Detail & Reservasi</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            @endif
                        </div>

                    </div>
                @empty
                    <!-- Modern Empty State -->
                    <div class="col-span-full py-16 px-4 text-center bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-200/80 shadow-sm">
                        <div class="w-20 h-20 bg-rose-50 text-rose-400 rounded-3xl flex items-center justify-center mx-auto mb-4 text-3xl shadow-inner">
                            <i class="fa-solid fa-heart-crack"></i>
                        </div>
                        <h3 class="font-extrabold text-slate-800 text-lg">Belum Ada Tempat Favorit</h3>
                        <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto mb-6">Jelajahi tempat-tempat keren dan tekan tombol hati untuk menyimpannya di sini.</p>
                        <a href="{{ route('customer.explore') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-500 hover:bg-emerald-600 text-white font-bold rounded-2xl text-xs transition-all shadow-lg shadow-emerald-500/25">
                            <i class="fa-solid fa-compass"></i> Cari Tempat Sekarang
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>