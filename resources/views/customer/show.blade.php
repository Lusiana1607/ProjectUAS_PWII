<!-- CDN Font Awesome & Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('customer.explore') }}" class="w-9 h-9 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all shadow-sm">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                </a>
                <div>
                    <h2 class="font-extrabold text-xl text-slate-900 tracking-tight">Detail Tempat</h2>
                    <p class="text-xs text-slate-500">Informasi lengkap dan reservasi</p>
                </div>
            </div>
            <a href="{{ route('customer.explore') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition-all">
                <i class="fa-solid fa-compass"></i>
                Jelajahi Tempat Lain
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F8FAFC] min-h-[calc(100vh-4rem)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Banner & Informasi Utama Tempat -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12">
                    
                    <!-- Foto Tempat Header -->
                    <div class="lg:col-span-5 relative h-64 lg:h-auto min-h-[280px] bg-slate-100">
                        @if(!empty($place->image))
                            <img src="{{ asset('storage/' . $place->image) }}" alt="{{ $place->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 text-slate-400 p-6 text-center">
                                <i class="fa-regular fa-image text-5xl mb-2"></i>
                                <span class="text-xs font-medium">Foto tempat belum tersedia</span>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-900/80 backdrop-blur-md text-emerald-400 text-xs font-semibold">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                Buka
                            </span>
                        </div>
                    </div>

                    <!-- Detail Informasi Tempat & Tombol Booking -->
                    <div class="lg:col-span-7 p-6 sm:p-8 flex flex-col justify-between">
                        <div>
                            <div>
                                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">{{ $place->name }}</h1>
                                <p class="text-slate-500 text-sm mt-2 leading-relaxed font-normal">
                                    {{ $place->description ?? 'Tidak ada deskripsi tempat.' }}
                                </p>
                            </div>

                            <hr class="my-6 border-slate-100">

                            <!-- Detail Info Grid -->
                            <div class="space-y-4">
                                <div class="flex items-start gap-3.5">
                                    <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 text-sm">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div>
                                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Alamat</div>
                                        <div class="text-sm font-medium text-slate-800 mt-0.5">{{ $place->address ?? '-' }}</div>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3.5">
                                    <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 text-sm">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div>
                                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Kontak / No. HP</div>
                                        <div class="text-sm font-medium text-slate-800 mt-0.5">{{ $place->phone ?? '-' }}</div>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3.5">
                                    <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 text-sm">
                                        <i class="fa-regular fa-clock"></i>
                                    </div>
                                    <div>
                                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Jam Operasional</div>
                                        <div class="text-sm font-medium text-slate-800 mt-0.5">
                                            @if(isset($place->open_time) && isset($place->close_time))
                                                {{ substr($place->open_time, 0, 5) }} - {{ substr($place->close_time, 0, 5) }} WIB
                                            @else
                                                {{ $place->opening_hours ?? '-' }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Booking Aktif -->
                        <div class="mt-8 pt-6 border-t border-slate-100">
                            <a href="{{ url('/explore/'.$place->id.'/booking') }}" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-500 active:scale-[0.99] text-white font-bold text-sm rounded-2xl shadow-lg shadow-emerald-600/20 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer">
                                <i class="fa-solid fa-calendar-check"></i>
                                Booking Tempat Sekarang
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Section Ulasan Pengguna & Form Input -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <!-- KOLOM KIRI: DAFTAR ULASAN CUSTOMER -->
                <div class="lg:col-span-7 space-y-4">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-comments text-emerald-600 text-lg"></i>
                        <h3 class="text-lg font-bold text-slate-900">Ulasan Pengguna</h3>
                    </div>

                    @if($reviews->isEmpty())
                        <div class="bg-white rounded-3xl border border-slate-200/80 p-8 text-center shadow-sm">
                            <div class="w-12 h-12 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-3 text-xl">
                                <i class="fa-regular fa-comment-dots"></i>
                            </div>
                            <h4 class="font-bold text-slate-800 text-sm">Belum Ada Ulasan</h4>
                            <p class="text-xs text-slate-400 mt-1">Belum ada ulasan untuk tempat ini. Jadi yang pertama memberikan review!</p>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach($reviews as $review)
                                <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm">
                                    <div class="flex items-center justify-between mb-2">
                                        <h5 class="font-bold text-sm text-emerald-600">{{ $review->user_name }}</h5>
                                        <span class="text-[11px] text-slate-400">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                                    </div>
                                    <!-- Cetak Bintang Rating -->
                                    <div class="text-amber-400 text-xs mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="{{ $i <= $review->rating ? 'fa-solid fa-star' : 'fa-regular fa-star text-slate-300' }}"></i>
                                        @endfor
                                    </div>
                                    <p class="text-xs text-slate-600 leading-relaxed">{{ $review->comment ?? '(Tidak ada komentar tertulis)' }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- KOLOM KANAN: FORM INPUT REVIEW BARU -->
                <div class="lg:col-span-5">
                    <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-sm sticky top-6">
                        <h3 class="font-extrabold text-slate-900 text-lg mb-4">Tulis Ulasan & Rating</h3>

                        @if(session('review_success'))
                            <div class="mb-4 p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-emerald-500 text-sm"></i>
                                <span>{{ session('review_success') }}</span>
                            </div>
                        @endif

                        @if($bookingToReview)
                            <form action="{{ route('customer.review.store', $place->id) }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $bookingToReview->id }}">

                                <div>
                                    <label for="rating" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Beri Rating Bintang</label>
                                    <select name="rating" id="rating" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none bg-slate-50/50" required>
                                        <option value="">-- Pilih Rating --</option>
                                        <option value="5">⭐⭐⭐⭐⭐ (5 - Puas Banget)</option>
                                        <option value="4">⭐⭐⭐⭐ (4 - Bagus)</option>
                                        <option value="3">⭐⭐⭐ (3 - Biasa Saja)</option>
                                        <option value="2">⭐⭐ (2 - Kurang Puas)</option>
                                        <option value="1">⭐ (1 - Kecewa)</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="comment" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Ulasan / Komentar</label>
                                    <textarea name="comment" id="comment" rows="4" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none bg-slate-50/50" placeholder="Bagikan pengalaman menarikmu di tempat ini..." required></textarea>
                                </div>

                                <button type="submit" class="w-full py-3 bg-emerald-600 hover:bg-emerald-500 active:scale-[0.99] text-white font-bold text-xs rounded-xl shadow-md shadow-emerald-600/20 transition-all cursor-pointer">
                                    Kirim Ulasan Sekarang
                                </button>
                            </form>
                        @else
                            <div class="text-center py-4">
                                <div class="w-14 h-14 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl border border-amber-100 shadow-sm">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                                <h4 class="font-extrabold text-slate-900 text-base">Form Ulasan Terkunci</h4>
                                <div class="inline-block px-3 py-1 bg-amber-500/10 text-amber-700 font-semibold text-xs rounded-full my-2">
                                    Akses Dibatasi
                                </div>
                                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                                    Kamu hanya bisa memberikan ulasan setelah melakukan booking tempat ini dan status kunjunganmu dinyatakan <span class="font-bold text-slate-800">"Selesai"</span> oleh Admin.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>