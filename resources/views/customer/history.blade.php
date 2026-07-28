<!-- CDN Font Awesome & Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-slate-900 tracking-tight flex items-center gap-2">
                    <i class="fa-solid fa-clock-rotate-left text-emerald-600 text-xl"></i>
                    <span>Riwayat Reservasi</span>
                </h2>
                <p class="text-xs text-slate-500 mt-1">Pantau status reservasi aktif, jadwal, dan riwayat pesanan tempatmu.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-xs font-semibold px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl transition-all w-fit">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F8FAFC] min-h-[calc(100vh-4rem)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Container Riwayat -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                    <h3 class="font-bold text-slate-900 text-sm tracking-wide uppercase flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Daftar Pesanan Kamu
                    </h3>
                </div>

                <div class="divide-y divide-slate-100">
                    @forelse($bookings as $booking)
                        <div class="p-6 flex flex-col md:flex-row md:items-center justify-between gap-6 hover:bg-slate-50/60 transition-all group">
                            
                            <!-- Info Utama Reservasi -->
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-105 transition-transform">
                                    <i class="fa-solid fa-store"></i>
                                </div>
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <!-- MEMANGGIL place_name HASIL ALIAS QUERY BUILDER -->
                                        <h4 class="font-bold text-slate-900 text-base group-hover:text-emerald-600 transition-colors">
                                            {{ $booking->place_name ?? 'Tempat Reservasi' }}
                                        </h4>
                                        
                                        <!-- Status Badge Dynamic -->
                                        @php
                                            $status = strtolower($booking->status ?? 'pending');
                                            $badgeClasses = [
                                                'approved' => 'bg-emerald-500/10 text-emerald-700 border-emerald-500/20',
                                                'success'  => 'bg-emerald-500/10 text-emerald-700 border-emerald-500/20',
                                                'pending'  => 'bg-amber-500/10 text-amber-700 border-amber-500/20',
                                                'rejected' => 'bg-rose-500/10 text-rose-700 border-rose-500/20',
                                                'cancelled'=> 'bg-slate-100 text-slate-600 border-slate-200'
                                            ][$status] ?? 'bg-slate-100 text-slate-600 border-slate-200';
                                        @endphp

                                        <span class="text-[10px] font-extrabold px-2.5 py-0.5 rounded-full border uppercase tracking-wider {{ $badgeClasses }}">
                                            {{ $booking->status ?? 'Pending' }}
                                        </span>
                                    </div>

                                    <p class="text-xs text-slate-500 flex items-center gap-2">
                                        <i class="fa-regular fa-calendar text-emerald-600"></i>
                                        Jadwal: <span class="font-semibold text-slate-700">{{ $booking->booking_date ?? '-' }}</span>
                                    </p>
                                    @if(!empty($booking->note))
                                        <p class="text-xs text-slate-400 italic">"{{ $booking->note }}"</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Aksi / Detail -->
                            <div class="flex items-center gap-3 self-end md:self-center">
                                <a href="{{ route('customer.show', $booking->place_id) }}" class="px-4 py-2 bg-slate-100 hover:bg-emerald-600 hover:text-white text-slate-700 font-bold text-xs rounded-xl transition-all shadow-sm">
                                    Lihat Tempat
                                </a>
                            </div>

                        </div>
                    @empty
                        <!-- Modern Empty State -->
                        <div class="py-16 px-4 text-center">
                            <div class="w-20 h-20 bg-slate-100 text-slate-300 rounded-3xl flex items-center justify-center mx-auto mb-4 text-3xl shadow-inner">
                                <i class="fa-solid fa-receipt"></i>
                            </div>
                            <h3 class="font-extrabold text-slate-800 text-lg">Belum Ada Riwayat Reservasi</h3>
                            <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto mb-6">Kamu belum pernah memesan tempat. Temukan tempat menarik dan buat reservasi pertamamu sekarang!</p>
                            <a href="{{ route('customer.explore') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-500 hover:bg-emerald-600 text-white font-bold rounded-2xl text-xs transition-all shadow-lg shadow-emerald-500/25">
                                <i class="fa-solid fa-compass"></i> Cari & Reservasi Tempat
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>