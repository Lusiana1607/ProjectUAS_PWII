<!-- CDN Font Awesome & Tailwind CSS (Memastikan Icon & Styling Selalu Aktif) -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-extrabold text-2xl text-slate-900 tracking-tight flex items-center gap-2">
                <span>Dashboard</span>
                <span class="text-xs bg-emerald-500/10 text-emerald-600 border border-emerald-500/20 px-2.5 py-0.5 rounded-full font-semibold">Customer Hub</span>
            </h2>
            <div class="text-xs text-slate-400 font-medium hidden sm:block">
                {{ now()->format('l, d F Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F8FAFC] min-h-[calc(100vh-4rem)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Hero Banner: Glassmorphism Ultra Modern -->
            <div class="relative overflow-hidden rounded-3xl bg-slate-900 p-8 sm:p-10 text-white shadow-2xl shadow-slate-900/20">
                <!-- Glowing Ambient Background Effects -->
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-emerald-500/30 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-teal-500/20 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="relative z-10 max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/10 text-emerald-300 text-xs font-semibold mb-4">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Selamat Datang Kembali
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-black tracking-tight text-white leading-tight">
                        Eksplorasi Tempat & Reservasi Tanpa Antre, <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-200">{{ Auth::user()->name }}</span>.
                    </h1>
                    <p class="mt-3 text-slate-300 text-sm leading-relaxed font-light">
                        Temukan cafe favorit untuk *nongkrong*, salon terbaik, hingga spot *working space* dengan reservasi cepat & realtime.
                    </p>
                    
                    <!-- Quick Search Trigger -->
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('customer.explore') }}" class="px-6 py-3 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs rounded-2xl shadow-lg shadow-emerald-500/25 transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                            <i class="fa-solid fa-compass"></i>
                            Jelajahi Tempat Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Metric & Quick Action Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Card 1: Explore -->
                <a href="{{ route('customer.explore') }}" class="group relative bg-white/70 backdrop-blur-xl p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-emerald-500/30 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-500 to-teal-400 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-xl mb-5 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 shadow-sm">
                            <i class="fa-solid fa-magnifying-glass-location"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 text-lg group-hover:text-emerald-600 transition-colors">
                            Cari Tempat Usaha
                        </h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Filter lokasi, cek ketersediaan jam operasional, dan pilih spot reservasi terbaik secara langsung.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs font-semibold text-slate-400 group-hover:text-emerald-600 transition-colors">Buka Katalog</span>
                        <div class="w-8 h-8 rounded-full bg-slate-100 group-hover:bg-emerald-600 group-hover:text-white flex items-center justify-center text-slate-600 text-xs transition-all">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <!-- Card 2: History -->
                <a href="{{ route('customer.booking.history') }}" class="group relative bg-white/70 backdrop-blur-xl p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-amber-500/30 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-500 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-amber-50 border border-amber-100 text-amber-600 flex items-center justify-center text-xl mb-5 group-hover:bg-amber-500 group-hover:text-white transition-all duration-300 shadow-sm">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 text-lg group-hover:text-amber-600 transition-colors">
                            Riwayat Reservasi
                        </h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Pantau status pemesanan aktif, riwayat transaksi sebelumnya, serta nota booking kamu.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs font-semibold text-slate-400 group-hover:text-amber-600 transition-colors">Lihat Pesanan</span>
                        <div class="w-8 h-8 rounded-full bg-slate-100 group-hover:bg-amber-500 group-hover:text-white flex items-center justify-center text-slate-600 text-xs transition-all">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <!-- Card 3: Favorites -->
                <a href="{{ route('customer.favorite.list') }}" class="group relative bg-white/70 backdrop-blur-xl p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-rose-500/30 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-rose-500 to-pink-400 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-rose-50 border border-rose-100 text-rose-500 flex items-center justify-center text-xl mb-5 group-hover:bg-rose-500 group-hover:text-white transition-all duration-300 shadow-sm">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 text-lg group-hover:text-rose-500 transition-colors">
                            Favorit Saya
                        </h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Simpan tempat-tempat langganan agar kamu bisa melakukan reservasi ulang dengan instan.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs font-semibold text-slate-400 group-hover:text-rose-500 transition-colors">Daftar Favorit</span>
                        <div class="w-8 h-8 rounded-full bg-slate-100 group-hover:bg-rose-500 group-hover:text-white flex items-center justify-center text-slate-600 text-xs transition-all">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>